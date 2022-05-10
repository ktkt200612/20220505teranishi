<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo//モデル名※todosテーブル全データ取得
        ::all();
        return view ('index', ['items'=> $items]);//index.blade.phpにitemsの情報をもたせたまま画面表示させる
    }

    
    public function create(Request $request) {
        $this->validate($request,Todo::$rules);//バリデーションの記述を入れる↑<br/>
        //「$requestの内容を$contentに格納する」という記述を追加する↑
        $content = $request;
        Todo::create($content);
        return redirect('/');
    }
}