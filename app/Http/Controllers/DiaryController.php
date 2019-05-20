<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
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
    }

    public function create() {
        return view('diaries.create');
    }
}


















