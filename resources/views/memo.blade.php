<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Memo</title>
    </head>
    <body>
    @extends('layouts.app')

    @section('css')
    <style>
        .card {
            margin-top: 40px;
        }

        .left {
            width: 55%;
        }

        .submit {
            position: absolute;
            top: 5px;
            right: 20px;
        }

        #delete {
            background-color: #f00;
            border: #f00;
        }
    </style>
    @endsection

    @section('content')
    <div class="card" style="width: 100%;">
        <div class="card-header">
            メモ一覧
            <a href="{{ route('submit')}}" class="submit btn btn-secondary">メモを追加</a>
        </div>
        <table class="table">
            <tbody>
            @foreach ($memos as $memo)
            @if ($memo->name == Auth::user()->name)
                <tr data-href="{{route('submit', ['id' => $memo->id])}}" class="table-row">
                    <td class="left">{{$memo->title}}</td>
                    <td>作成日時:{{$memo->created_at}}</td>
                    <td><a href="{{ route('submit', ['id' => $memo->id])}}" class="btn btn-primary">編集</a></td>
                    <td><a href="{{ route('delete', ['id' => $memo->id])}}" class="btn btn-primary" id="delete" data-toggle="modal" data-target="#modal{{$memo->id}}">削除</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal{{$memo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">以下のメモを本当に削除しますか？</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{$memo->title}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="location.href='{{ route('delete', ['id' => $memo->id])}}'">
                                    削除
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
    </body>
</html>