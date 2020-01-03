@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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

            @if(Auth::check())
            <div class="card">
                <form action="/post" method="POST">
                    {{ csrf_field() }}
                    <div class="card-headder alert alert-success">
                        こんにちは{{$user->name}}さん。
                    </div>
                    <textarea class="form-control" rows="3" name="content"></textarea><br>
                    <input type="submit" value="送信"><input type="reset" value="リセット">
                </form>
                @endif



                @if ($posts)
                    @foreach($posts as $post)
                    <div class="card tweetcard">
                    <div class="card-body alert tweet">
                        {{ $post->name }}
                        {{ $post->created_at }}
                        <br>
                        {{ $post->content }}
                        <br>
                        <br>
                    {{ Form::open(['url' => '/', 'method' => 'post']) }}
                    {{ Form::hidden('invisible', 'secret') }}
                    {{ Form::token() }}

                            <i class="far fa-heart"></i>
                    {{ Form::close() }}


                </div>

                </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/sample.js') }}" type="text/javascript"></script>
@endsection
