@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-3" style="height:250px;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
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


<body>
<div class="content">
    <a class="js-modal-open" href="">つぶやく</a>
</div>
</body>
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
