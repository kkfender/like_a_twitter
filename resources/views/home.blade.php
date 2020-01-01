@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
