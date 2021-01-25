<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>submit画面</title>
    </head>
    <body>
    @extends('layouts.app')

    @section('css')
    <style>
        .container {
            margin-top: 40px;
        }

        .head {
            margin-top: 0;
        }
    </style>
    @endsection

    @section('content')
    <form method="POST" action="{{ route('submit', ['id' => $memo->id])}}">
        @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$memo->title}}">
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <input type="text" class="form-control" id="content" name="content" value="{{$memo->content}}">
        </div>
        <a href="{{ route('memo')}}" class="btn btn-primary">戻る</a>
        @if($memo->id == 0)
        <button type="submit" class="btn btn-success">追加</button>
        @else
        <button type="submit" class="btn btn-success">適用</button>
        @endif
    </form>
    @endsection
    </body>
</html>