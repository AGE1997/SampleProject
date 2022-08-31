<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\MstPrefecture;
use App\Models\MstGenre;
use App\Http\Requests\StoreVideo;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $videos = Video::orderBy('id', 'desc')->where('prefecture_id', $id)->get();
        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role === 'member') {
        // 都道府県テーブルの全データを取得する
            $prefectures = MstPrefecture::all();
            $genres = MstGenre::all();
            return view('video.create')
                ->with([
                    'prefectures' => $prefectures,
                    'genres' => $genres,
                ]);
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
    public function store(StoreVideo $request)
    {

        $video = new Video;
        $movie = $request->file('movie');
        $path = Storage::put('/public/movies', $movie);
        $path = explode('/', $path);
        $video->movie = $path[2];

        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->genre_id = $request->input('genre_id');
        $video->prefecture_id = $request->input('prefecture_id');
        $video->price = $request->input('price');
        $video->user_id = auth()->user()->id;

        $video->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        $order = Order::find($id);
        return view('video.show', compact('video', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role === 'member') {
            $video = Video::find($id);
            // 都道府県テーブルの全データを取得する
            $prefectures = MstPrefecture::all();
            $genres = MstGenre::all();
            return view('video.edit', compact('video'))
                ->with([
                    'prefectures' => $prefectures,
                    'genres' => $genres,
                ]);
        } else {
            return redirect()->route('login');
            // ->with('message', '権限がありません')
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVideo $request, $id)
    {
        $video = Video::find($id);
        $movie = $request->file('movie');
        $path = Storage::put('/public/movies', $movie);
        $path = explode('/', $path);
        $video->movie = $path[2];

        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->genre_id = $request->input('genre_id');
        $video->prefecture_id = $request->input('prefecture_id');
        $video->price = $request->input('price');
        $video->user_id = auth()->user()->id;

        $video->save();

        return redirect('video/show/' . $video->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role === 'member') {
            $video = Video::find($id);
            $video->delete();
            return redirect('/');
        } else {
            $video = Video::find($id);
            $video->delete();
            return redirect('/');
        }
    }
}
