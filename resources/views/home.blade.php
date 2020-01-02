@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<<<<<<< HEAD
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
=======
>>>>>>> #7
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
<<<<<<< HEAD


                @if ($posts)
                    @foreach($posts as $post)
                    <div class="card">
                    <div class="card-body alert tweet">
                        {{ $post->name }}
                        {{ $post->created_at }}
<br>
                        {{ $post->content }}
                    </div>
                </div>

                    <hr>

                    @endforeach
=======
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    aa
                    {{ dd($posts) }}

                @if ($posts)
                    @foreach($posts as $post)
                    <div class="card-body alert tweet">
                        {{ $post->content }}
                    </div>
                    @endforeach

>>>>>>> #7
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
