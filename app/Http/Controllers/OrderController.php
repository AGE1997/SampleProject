<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MstPrefecture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return view('order.create', compact('cardList'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (auth()->user()->role === 'member') {
            $id = (int) $request->route('id');
            $video = Video::find($id);
            $prefectures = MstPrefecture::all();
            $user = auth()->user();
            $cardList = [];
            
            // 既にpayjpに登録済みの場合
            if (!empty($user->payjp_customer_id)) {
            // カード一覧を取得
                \Payjp\Payjp::setApiKey(config('payjp.secret_key'));
                $cardDatas = \Payjp\Customer::retrieve($user->payjp_customer_id)->cards->data;
                // dd($cardDatas);
                foreach ($cardDatas as $cardData) {
                    $cardList[] = [
                    'id' => $cardData->id,
                    'cardNumber' =>  "**** **** **** {$cardData->last4}",
                    'brand' =>  $cardData->brand,
                    'exp_year' =>  $cardData->exp_year,
                    'exp_month' =>  $cardData->exp_month,
                    'name' =>  $cardData->name,
                    ];
                }
            }
            return view('order.create', compact('cardList'))
            ->with([
                'prefectures' => $prefectures,
                'video' => $video,
            ]);
        } else {
            return redirect()->route('login');
            // ->with('message', '権限がありません')
        }
    }


    public function payment(Request $request)
    {
        if (auth()->user()->role === 'member') {
            if (empty($request->get('payjp-token'))) {
                abort(404);
            }
            
            DB::beginTransaction();
            
            try {
                // ログインユーザー取得
                $user = auth()->user();
                //  シークレットキーを設定
                \Payjp\Payjp::setApiKey(config('payjp.secret_key'));
                

                    //  以前使用したカードを使う場合
                if (!empty($request->get('payjp_card_id'))) {
                    $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
                    // 使用するカードを設定
                    $customer->default_card = $request->get('payjp_card_id');
                    $customer->save();
                //  既にpayjpに登録済みの場合
                } elseif (!empty($user['payjp_customer_id'])) {
                    // カード情報を追加
                    $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
                    $card = $customer->cards->create([
                    'card' => $request->get('payjp-token'),
                    ]);
                    // 使用するカードを設定
                    $customer->default_card = $card->id;
                    $customer->save();
                //  payjp未登録の場合
                } else {
                    $user = auth()->user();
                    // payjpで顧客新規登録 & カード登録
                    $customer = \Payjp\Customer::create([
                        'card' => $request->get('payjp-token'),
                    ]);
                    // DBにcustomer_idを登録
                    $user->payjp_customer_id = $customer->id;
                    $user->save();
                }
                // //  顧客情報登録
                // $customer = \Payjp\Customer::create([
                // // カード情報も合わせて登録する
                // 'card' => $request->get('payjp-token'),
                // // 概要
                // 'description' => "userId: {$user->id}, userName: {$user->last_name}",
                // ]);
                
                // //  DBにpayjpの顧客idを登録
                // $user->payjp_customer_id = $customer->id;
                // $user->save();

                DB::commit();
                return redirect(route('order.create'));
                // ->with('message', '支払いが完了しました');
            } catch (\Exception $e) {
                Log::error($e);
                DB::rollback();
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
            // ->with('message', '権限がありません')
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $customer)
    {
        $input = $request->validate([
            'prefecture_id' => 'required|numeric',
            'payjp_card_id' => 'required',
        ]);
        $order = new Order;
        $id = (int) $request->route('id');
        $video = Video::find($id);
        $order->prefecture_id = $request->input('prefecture_id');
        $order->user_id = auth()->user()->id;
        $order->video_id = $video->id;
        $order->save();

        if (empty($request->get('payjp-token')) && !$request->get('payjp_card_id')) {
            
            abort(404);
        }
        
        DB::beginTransaction();
        
        try {
             // ログインユーザー取得
            $user = auth()->user();
            // シークレットキーを設定
            \Payjp\Payjp::setApiKey(config('payjp.secret_key'));

            // 以前使用したカードを使う場合
            if (!empty($request->get('payjp_card_id'))) {
                $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
            // 使用するカードを設定
                $customer->default_card = $request->get('payjp_card_id');
                $customer->save();
            // 既にpayjpに登録済みの場合
            } elseif (!empty($user['payjp_customer_id'])) {
            // カード情報を追加
                $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
                $card = $customer->cards->create([
                'card' => $request->get('payjp-token'),
            ]);
            // 使用するカードを設定
                $customer->default_card = $card->id;
                $customer->save();
            // payjp未登録の場合
            } else {
            // payjpで顧客新規登録 & カード登録
                $customer = \Payjp\Customer::create([
                'card' => $request->get('payjp-token'),
                ]);
            // DBにcustomer_idを登録
                $user->payjp_customer_id = $customer->id;
                $user->save();
            }

            // 支払い処理
            // 新規支払い情報作成
            \Payjp\Charge::create([
                "customer" => $customer->id,
                "amount" => $video->price,
                "currency" => 'jpy',
            ]);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            if (strpos($e, 'has already been used') !== false) {
                return redirect()->back()->with('error-message', '既に登録されているカード情報です');
            }

            return redirect()->back();
        }

        return redirect(route('home'))->with('message', '支払いが完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
