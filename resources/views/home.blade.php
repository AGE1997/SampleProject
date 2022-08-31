@extends('layouts.nav')

@section('content')

<div class="container-fluid mt-20">
<div id="japan-map" class="clearfix">

<div id="hokkaido-touhoku" class="clearfix">
	<p class="area-title">北海道・東北</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 1]) }}">
        	<div id="hokkaido">
        		<p>北海道</p>
          	</div>
		</a>
		<a href="{{ route('video.index', ['id' => 2]) }}">
			<div id="aomori">
				<p>青森</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 5]) }}">
			<div id="akita">
				<p>秋田</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 3]) }}">
			<div id="iwate">
				<p>岩手</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 6]) }}">
			<div id="yamagata">
				<p>山形</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 4]) }}">
			<div id="miyagi">
				<p>宮城</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 7]) }}">
			<div id="fukushima">
				<p>福島</p>
			</div>
		</a>
	</div>
</div>

<div id="kantou">
	<p class="area-title">関東</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 10]) }}">
			<div id="gunma">
				<p>群馬</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 9]) }}">
			<div id="tochigi">
				<p>栃木</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 8]) }}">
			<div id="ibaraki">
				<p>茨城</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 11]) }}">
			<div id="saitama">
				<p>埼玉</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 12]) }}">
			<div id="chiba">
				<p>千葉</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 13]) }}">
			<div id="tokyo">
				<p>東京</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 14]) }}">
			<div id="kanagawa">
				<p>神奈川</p>
			</div>
		</a>
	</div>
</div>

<div id="tyubu" class="clearfix">
	<p class="area-title">中部</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 15]) }}">
			<div id="nigata">
				<p>新潟</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 16]) }}">
			<div id="toyama">
				<p>富山</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 17]) }}">
			<div id="ishikawa">
				<p>石川</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 18]) }}">
			<div id="fukui">
				<p>福井</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 20]) }}">
			<div id="nagano">
				<p>長野</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 21]) }}">
			<div id="gifu">
				<p>岐阜</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 19]) }}">
			<div id="yamanashi">
				<p>山梨</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 23]) }}">
			<div id="aichi">
				<p>愛知</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 22]) }}">
			<div id="shizuoka">
				<p>静岡</p>
			</div>
		</a>
	</div>
</div>

<div id="kinki" class="clearfix">
	<p class="area-title">近畿</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 26]) }}">
			<div id="kyoto">
				<p>京都</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 25]) }}">
			<div id="shiga">
				<p>滋賀</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 27]) }}">
			<div id="osaka">
				<p>大阪</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 29]) }}">
			<div id="nara">
				<p>奈良</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 24]) }}">
			<div id="mie">
				<p>三重</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 30]) }}">
			<div id="wakayama">
				<p>和歌山</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 28]) }}">
			<div id="hyougo">
				<p>兵庫</p>
			</div>
		</a>
	</div>
</div>

<div id="tyugoku" class="clearfix">
	<p class="area-title">中国</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 31]) }}">
			<div id="tottori">
				<p>鳥取</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 33]) }}">
			<div id="okayama">
				<p>岡山</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 32]) }}">
			<div id="shimane">
				<p>島根</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 34]) }}">
			<div id="hiroshima">
				<p>広島</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 35]) }}">
			<div id="yamaguchi">
				<p>山口</p>
			</div>
		</a>
	</div>
</div>

<div id="shikoku" class="clearfix">
	<p class="area-title">四国</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 37]) }}">
			<div id="kagawa">
				<p>香川</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 38]) }}">
			<div id="ehime">
				<p>愛媛</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 36]) }}">
			<div id="tokushima">
				<p>徳島</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 39]) }}">
			<div id="kouchi">
				<p>高知</p>
			</div>
		</a>
	</div>
</div>

<div id="kyusyu" class="clearfix">
	<p class="area-title">九州・沖縄</p>
	<div class="area">
		<a href="{{ route('video.index', ['id' => 40]) }}">
			<div id="fukuoka">
				<p>福岡</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 41]) }}">
			<div id="saga">
				<p>佐賀</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 42]) }}">
			<div id="nagasaki">
				<p>長崎</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 44]) }}">
			<div id="oita">
				<p>大分</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 43]) }}">
			<div id="kumamoto">
				<p>熊本</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 45]) }}">
			<div id="miyazaki">
				<p>宮崎</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 46]) }}">
			<div id="kagoshima">
				<p>鹿児島</p>
			</div>
		</a>
		<a href="{{ route('video.index', ['id' => 47]) }}">
			<div id="okinawa">
				<p>沖縄</p>
			</div>
		</a>
	</div>
</div>

</div> <!-- japan-map -->
</div>
<div class="text-center m-3">
<h1>新着動画</h1>
</div>
<div class="row">
@foreach ($videos as $video)
    <div class="col-sm-6">
    <div class="card mb-3" style="width: 700px;">
        <div class="row g-3">
            <div class="col-md-8">
							@if (auth()->user()->role === 'member')
								@if (Auth::id() == $video->user_id || App\Models\Order::Where('user_id', '=', Auth::id())->where('video_id', '=', $video->id)->exists())
                <div class="card-body">
                <video controls preload="metadata" muted width="400px" height="240px">
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
