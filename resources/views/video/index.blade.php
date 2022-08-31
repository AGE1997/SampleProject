@extends('layouts.nav')

@section('content')
<div class="text-center m-3">
<h1>新着動画</h1>
</div>
<div class="row">
@foreach ($videos as $video)
    <div class="col-sm-6">
    <div class="card mb-3" style="width: 700px;">
        <div class="row g-3">
            <div class="col-md-8">
            @if (isset($video))
                @if (auth()->user()->role === 'member')
                    @if (Auth::id() == $video->user_id || App\Models\Order::Where('user_id', '=', Auth::id())->where('video_id', '=', $video->id)->exists())
                        <div class="card-body">
                        <video controls muted width="400px" height="240px">
                            <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
                        </video>
                        </div>
                    @else
                        <div class="card-body">
                            <video width="400px" height="240px">
                                <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
                            </video>
                        </div>
                    @endif
                @else
                <div class="card-body">
                <video controls muted width="400px" height="240px">
                    <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
                </video>
                </div>
                @endif
            @endif
            </div>
                <div class="col-md-4">
                <div class="card-body">
                    <h3 class="card-title">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}" class="link-dark font-weight-bold text-decoration-none">{{$video->title}}
                    </h3>
                    <p class="card-text">{{$video->price}}円</p>
                    <p class="card-text">{{$video->user->first_name}}</p>
                    <p class="card-text"><small class="text-muted">{{$video->created_at->diffForHumans()}}</small></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endforeach
</div>
@endsection