<?php

namespace App\Http\Controllers\User;

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

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            
            $id = $request->route()->parameter('item');
            if(!is_null($id)){
                //exists()->入ってきた値が存在するか判定
                $itemId = Product::availableItems()->where('products.id', $id)->exists();
                    if(!$itemId){ 
                        abort(404); 
                    }
            }
            return $next($request);
        });

        // $this->middleware('auth:users');
    }

    public function index(Request $request) {
        //同期的に送信
        // Mail::to('test@test.com')
        // ->send(new TestMail());

        //非同期的に送信
        // dispatch->発火
        // SendThanksMail::dispatch();

        $categories = PrimaryCategory::with('secondary')->get();
        // $blogs = Blog::all();
        // dd($blogs);
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3, ["*"], 'blog-page');
        
        $products = Product::availableItems()
        ->selectCategory($request->category ?? '0')
        ->sortOrder($request->sort)
        ->searchKeyword($request->keyword)
        ->paginate($request->pagination ?? '20');
        
        // dd($products);
        
        return view('user.index', compact('products','categories','blogs'));
    }


}
