<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
use App\Http\Requests\CreateDiary;
use Illuminate\Support\Facades\Auth;
// ↑require_once('別のファイル');のイケてる版

class DiaryController extends Controller
{
    public function index() {
        // dd('Hello Laravel');
        // dump and die関数というLaravelに用意された関数
        // var_dumpとdieを組み合わせたもの
        // Laravel開発の必須ツールです

        // モデルファイルを使ってデータを取得する
        $diaries = Diary::all()->toArray();
        // SELECT * FROM diaries WHERE 1を実行し$diariesに入れる
        // all()メソッド
        // CollectionをArrayに変換するtoArray()メソッドをチェインする
        // dd($diaries);

        return view('diaries.index', ['diaries' => $diaries]);
        // view関数はresources/views/内にあるファイルを取得する関数
        // view('ファイル名')もしくは
        // view('フォルダ名.ファイル名')のように記述する
        // 例）view('welcome')
        // 例）view('diaries.edit')
        // ※ファイル名は.bladeの前のみ
        // view(③, [② => ①]);
        // ①の変数を、②の変数名に変えて③のviewへ送る。
    }

    public function create() {
        // 投稿画面
        return view('diaries.create');
    }

    public function store(CreateDiary $request) {
        // 保存処理
        // POST送信データの受け取り
        // $_POSTの代わりにRequestクラスを使用します。

        // INSERT INTO テーブル名 (カラム名) VALUE (値)
        // INSERT INTO diaries (title, body) VALUE ($_POST['title'], $_POST['body'])
        // INSERT INTO diaries (title, body) VALUE ($request->title, $request->body)
        // ModelクラスDiaryを使用する
        $diary = new Diary(); // インスタンス化
        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->user_id = Auth::user()->id;
        $diary->save();

        // 一覧ページに戻る（リダイレクト処理）
        return redirect()->route('diary.index'); // header()と同じような処理
    }

    // リクエスト→http://localhost:8000/diary/3/delete
    // web.php→Route::delete('diary/{id}/delete'
    public function destroy($id) { // web.phpの'diary/{id}/delete'にある{id}と同名の引数が定義される
        
        $diary = Diary::find($id);
        // SELECT * FROM diaries WHERE id=?

        $diary->delete();
        // DELETE FROM テーブル名 WHERE id=?

        return redirect()->route('diary.index');
    }
}




















