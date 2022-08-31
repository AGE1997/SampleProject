@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Movie') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="formFileSm" class="col-md-4 col-form-label text-md-end">動画をアップロード</label>
                            <div class="col-md-6">
                                <input id="movie" type="file" class="form-control form-control-sm" name="movie">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="例）Line Dance in OKAYAMA（40文字まで)" maxlength="40">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" placeholder="動画の説明（必須 1,000文字まで）(MusicName, DancerName, Place etc.)" rows="7" maxlength="1000">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="genre" class="col-md-4 col-form-label text-md-end">{{ __('Genre') }}</label>
                            <!-- <small class="col-md-4 col-form-label text-md-end">※必須</small> -->
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="genre_id" required>
                                  <option disabled style='display:none;' @if (empty($post->genre_id)) selected @endif>選択してください</option>
                                  @foreach($genres as $genre)
                                      <option value="{{ $genre->id }}" @if (isset($video->genre_id) && ($video->genre_id === $genre->id)) selected @endif>{{ $genre->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prefecture" class="col-md-4 col-form-label text-md-end">{{ __('Repezen') }}</label>
                            <!-- <small class="col-md-4 col-form-label text-md-end">※必須</small> -->
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="prefecture_id" required>
                                  <option disabled style='display:none;' @if (empty($post->prefecture_id)) selected @endif>選択してください</option>
                                  @foreach($prefectures as $pref)
                                      <option value="{{ $pref->id }}" @if (isset($video->prefecture_id) && ($video->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- 販売価格 -->
                        <div class="sell-price">
                          <div class="weight-bold-text question-text">
                            <!-- <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price(¥100〜9,999,999)') }}</label> -->
                            <span>Price<br>(¥100〜9,999,999)</span>
                            <!-- <a class="question" href="#">?</a> -->
                          </div>
                          <div>
                            <div class="price-content">
                              <div class="price-text">
                                <span>価格</span>
                                <span class="indispensable">必須</span>
                              </div>
                              <span class="sell-yen">¥</span>
                              

                              <div class="col-md-6">
                                  <input id="video-price" type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="例）300">
                              <!-- <%= f.text_field :price, class:"price-input", id:"video-price", placeholder:"例）300" %> -->
                              </div>
                            </div>
                            <div class="price-content">
                              <span>販売手数料 (10%)</span>
                              <span>
                                <span id='add-tax-price'></span>円
                              </span>
                            </div>
                            <div class="price-content">
                              <span>販売利益</span>
                              <span>
                                <span id='profit'></span>円
                            </div>
                            </span>
                          </div>
                        </div>
                        <!-- 販売価格 -->

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('投稿する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
