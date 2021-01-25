<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;
use App\User;

class MemoController extends Controller
{
    public function showHome()
    {
        $memos = Memo::get();
        return view("memo", ['memos' => $memos]);
    }

    public function showSubmit($id = 0)
    {
        if ($id != 0) {
            $memo = Memo::where('id', $id)->get()->first();
        } else {
            $memo = (object) ["id" => 0, "title" => "", "content" => "", "name" => "", "created_at" => ""];
        }
        return view("submit", ['memo' => $memo]);
    }

    public function postSubmit(Request $request, $id = 0)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $name = $request->user()->name;
        if ($id == 0) {
            Memo::create([
                'title' => $title,
                'content' => $content,
                'name' => $name,
                "created_at" => now()
            ]);
        } else {
            $memo = Memo::find($id);
            $memo->update([
                'title' => $title,
                'content' => $content,
                'name' => $name,
                "created_at" => now()
            ]);
        }
        return redirect()->route('memo');
    }

    public function deleteMemo($id)
    {
        Memo::destroy($id);
        return redirect()->route('memo');
    }
}
