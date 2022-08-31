@extends('layouts.nav')

@section('content')
<!-- <div class="text-center m-3">
<h1>新着動画</h1>
</div> -->
<div class="card" style="max-width: 60%;">
  @if (auth()->user()->role === 'member')
    @if (Auth::id() == $video->user_id || App\Models\Order::Where('user_id', '=', Auth::id())->where('video_id', '=', $video->id)->exists())
      <video controls muted class="img-fluid">
          <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
      </video>
    @else
      <video class="img-fluid">
          <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
      </video>
    @endif
  @else
    <video controls muted class="img-fluid">
        <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
    </video>
  @endif

  <div class="card-body">
      <h3 class="card-title">{{$video->title}}</h3>
      <p class="card-text"><small class="text-muted">{{$video->created_at->diffForHumans()}}</small></p>
      <p class="card-text">{{$video->user->first_name}}</p>
      <p class="card-text">{{$video->price}}円</p>
      <p class="card-text">{{$video->genre->name}}</p>
      <p class="card-text">{{$video->prefecture->name}}</p>
      <p class="card-text">{{$video->description}}</p>
      <div class="text-center">
      @if (auth()->user()->role === 'member')
        @if (Auth::id() == $video->user_id)
          <a href="{{ route('video.edit', ['id' => $video->id]) }}" class="btn btn-primary">編集する</a>
          <span class="ml-2">
            <form method="POST" action="{{ route('video.destroy', ['id' => $video->id]) }}" id="delete_{{ $video->id}}">
              @csrf
              <a href="#" class="btn btn-danger" data-id="{{ $video->id }}" onclick="deletePost(this)">削除する</a>
            </form>
          </span>
        @elseif (!(Auth::id() == isset($order->user_id)))
          <a href="{{ route('order.create', ['id' => $video->id]) }}" class="btn btn-primary">購入する</a>
        @else
        @endif
      @else
      <span class="ml-2">
        <form method="POST" action="{{ route('video.destroy', ['id' => $video->id]) }}" id="delete_{{ $video->id}}">
          @csrf
          <a href="#" class="btn btn-danger" data-id="{{ $video->id }}" onclick="deletePost(this)">削除する</a>
        </form>
      </span>
      @endif
      </div>
  <!-- </div> -->
</div>

<script>
    function deletePost(e) {
      'use strict';
      if (confirm('本当に削除していいですか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
      }

}
</script>

@endsection