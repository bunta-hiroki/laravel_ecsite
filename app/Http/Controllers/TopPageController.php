<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryCategory;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\jobs\SendThanksMail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;

class TopPageController extends Controller
{
    public function index(Request $request) {

        // $test = DB::table('users')  // 主となるテーブル名
        // ->join('products', 'users.id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        // ->join('t_stocks', 'users.id', '=', 't_stocks.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        // ->get(); 
        // dd($test);

        // $players = DB::table('players')  // 主となるテーブル名
        // ->select('players.id', 'players.name', 'teams.id as team_id', 'teams.name as team_name')
        // ->join('teams', 'players.team_id', '=', 'teams.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        // ->get();

        //同期的に送信
        // Mail::to('test@test.com')
        // ->send(new TestMail());

        //非同期的に送信
        // dispatch->発火
        // SendThanksMail::dispatch();

        $categories = PrimaryCategory::with('secondary')->get();
        // $blogs = Blog::all();
        // dd($blogs);
        // $blogs = Blog::orderBy('created_at', 'desc')->paginate(3);
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3, ["*"], 'blog-page');
        // ->appends(["user-page" => $request::input('user-page')];
        
        // dd(Product::get());
        
        $products = Product::availableItems()
        ->selectCategory($request->category ?? '0')
        ->sortOrder($request->sort)
        ->searchKeyword($request->keyword)
        ->paginate($request->pagination ?? '20');
        
        // dd($products);
        
        return view('welcome', compact('products','categories','blogs'));
    }
}
