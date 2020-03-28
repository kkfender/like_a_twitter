@extends('layouts.app')

@section('content')
<div class="navbar navbar-expand-md bg-white shadow-sm border-top" style="height:300px">
</div>
<div class="navbar navbar-expand-md bg-white shadow-sm border-top mb-4" style="height:60px">
    <div class="center-right">
        <a class="js-modal-edit-open nav-link" href="">プロフィール編集</a>
        <form action="/update" method="POST">
            {{ csrf_field() }}
             @csrf
            <div class="modal js-modal-edit">
                <div class="modal__bg js-modal-edit-close"></div>
                <div class="modal__content">
                    <input type="text" name="userName" placeholder="{{$user->name}}"></input>
                    <input type="submit" value="送信"><input type="reset" value="リセット">
                </div><!--modal__inner-->
            </div><!--modal-->
        </form>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <h1 style="font-size:30px;">{{$user->name}}</h1>

        </div>

        <div class="col-md-8">
            @if (session('flash_message'))
            <div class="flash_message card-headder alert alert-success">
                {{ session('flash_message') }}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <script type="text/javascript">
                $('.alert').on('click', function(){
                        $(this).fadeOut();
                });
            </script>



    @if(Auth::check())
            <div class="card">
                <form action="/post" method="POST">
                    {{ csrf_field() }}
                    <div class="card-headder alert alert-success">
                        こんにちは{{$user->name}}さん。
                    </div>
                    <div class="modal js-modal">
                        <div class="modal__bg js-modal-close"></div>
                        <div class="modal__content">
                            <textarea class="form-control" rows="3" name="content"></textarea><br>
                            <input type="submit" value="送信"><input type="reset" value="リセット">
                        </div><!--modal__inner-->
                    </div><!--modal-->
                </form>
                @endif


                @if ($posts)
                    @foreach($posts as $post)

                    <div class="card tweetcard">
                    <div class="card-body  alert ">

                        {{ $post->name }}
                        {{ $post->created_at }}
                        <br>
                        {{ $post->content }}
                        <br>
                        <br>
                    {{ Form::hidden('invisible', 'secret') }}
                    {{ Form::token() }}
                    {{ Form::close() }}

                        @if(Auth::id())
                            @if($post->liked)
                            <div class="unlike" id="{{ $post->id }}">
                                <i class="fa fa-heart" style="color: pink;"></i>
                                <span data-like="{{$post->count}}">{{$post->count}}</span>
                            </div>
                            @else
                            <div class="like" id="{{ $post->id }}">
                                <i class="far fa-heart" style="color: pink;"></i>
                                <span data-like="{{$post->count}}">{{$post->count}}</span>
                            </div>
                            @endif
                        @endif
                    </div>
                    <script type="text/javascript">
                    //関数化してoneを適用
                    (function () {
                        var $likeButton = $('#{{$post->id}}')

                        $likeButton.on('click',function(){

                            if ('like' == $(this).attr('class'))
                            {
                                $.ajax('api/user/like/',
                                    {
                                        type: 'post',
                                        data: {
                                            user: {{$user->id}},
                                            post: {{$post->id}},
                                        },

                                    }
                                ).done(function(data, textStatus, jqXHR) {

                                     $likeButton.find('i').removeClass();
                                     $likeButton.find('i').addClass('fa fa-heart');
                                     $likeButton.removeClass();
                                     $likeButton.addClass('unlike');
                                     var likeCount = $likeButton.find('span').data('like');
                                     $likeButton.find('span').text(data);

                                }).fail(function(e) {
                                    console.log('正しい結果を得られませんでした。');
                                    console.log(e)
                                });
                            }
                            else
                            {
                                $.ajax('api/user/unlike/',
                                    {
                                        type: 'post',
                                        data: {
                                            user: {{$user->id}},
                                            post: {{$post->id}},
                                        },

                                    }
                                ).done(function(data, textStatus, jqXHR) {

                                     $likeButton.find('i').removeClass();
                                     $likeButton.find('i').addClass('far fa-heart');
                                     $likeButton.removeClass();
                                     $likeButton.addClass('like');

                                     var likeCount = $likeButton.find('span').data('like');
                                     $likeButton.find('span').text(data);

                                }).fail(function(e) {
                                    console.log('正しい結果を得られませんでした。');
                                    console.log(e)
                                });
                            }
                        })
                    }());
                    </script>
                </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
