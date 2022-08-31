<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos=Video::orderBy('id', 'desc')->get();
        $user=auth()->user();
        // $orders = Order::find('user_id', '=', $user->id, video_id == $video->id);
        // $orders=Order::orderBy('user_id')->get();
        // $order = Order::find('user_id');
        // $order = Order::query()->where('user_id', '=', $user->id)->get();

        // and 'video_id', '=', Video::find($user->id))->get();
            // $exists = Order::where('video_id')->exists();
        // $users = Auth::whereExists(function ($q) {
            // ($order && $exists))
        //     $q->from('orders')
        //         ->whereRaw('orders.user_id = users.id');
        // })->get();
        // $orders->user_id = DB::table('orders')->orderBy('user_id == Auth:id()');
        // $orders = DB::table('orderd')->where('user_id', '=', Auth::id())->get();
        return view('home', compact('videos', 'user'));
    }
}
// App\Models\Order::Where('user_id', '=', $user->id)->where('video_id', '=', $video->id)->exists()