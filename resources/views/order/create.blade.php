@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Movie') }}</div>
                <div class="row mb-3">
                  <div class="card-body text-center">
                  <h1 class='info-input-haedline'>
                  <strong>購入内容の確認</strong>
                  </h1>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                  
                  <video width="400px" height="240px">
                    <source src="{{ asset('/storage/movies/' . $video->movie) }}" type="video/mp4">
                  </video>
                </div>
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title">{{$video->title}}</h5>
                  <p class="card-text">{{$video->price}}円</p>
                  <p class="card-text">{{$video->description}}</p>
                  <h3 class='info-input-haedline'>
                    <strong>クレジットカード情報入力</strong>
                  </h3>
                  <form method="POST" action="{{ route('payment', ['id' => $video->id]) }}">
                      @csrf
                      <script
                        src="https://checkout.pay.jp/"
                        class="payjp-button"
                        data-key="{{ config('payjp.public_key') }}"
                        data-text="カード情報を登録する"
                        data-submit-text="カードを登録する"
                      ></script>
                  </form>

                  @if (!empty($cardList))
                    <p>もしくは登録済みのカードで支払い</p>
                    <form method="POST" action="{{ route('order.store', ['id' => $video->id]) }}" >
                      @csrf
                      
                      @foreach ($cardList as $card)
                        <div class="card-item">
                          <label>
                            <input type="radio" name="payjp_card_id" value="{{ $card['id'] }}" />
                            <span class="brand">{{ $card['brand'] }}</span>
                            <span class="number">{{ $card['cardNumber'] }}</span>
                          </label>
                          <div>
                            <p>名義: {{ $card['name'] }}</p>
                            <p>期限: {{ $card['exp_year'] }}/{{ $card['exp_month'] }}</p>
                          </div>
                        </div>
                      @endforeach
                      <h3 class='info-input-haedline'>
                        <strong>購入者情報入力</strong>
                      </h3>
                      <div class="row mb-3">
                            <label for="prefecture" class="col-md-4 col-form-label text-md-end">{{ __('Repezen') }}</label>
                            <div class="col-md-6">
                              <select type="text" class="form-control" name="prefecture_id" required>
                                  <option disabled style='display:none;' @if (empty($post->prefecture_id)) selected @endif>選択してください</option>
                                  @foreach($prefectures as $pref)
                                      <option value="{{ $pref->id }}" @if (isset($order->prefecture_id) && ($order->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                    {{ __('購入する') }}
                            </button>
                            </div>
                        </div>
                    </form>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
