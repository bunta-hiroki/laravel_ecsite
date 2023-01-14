<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Facades\DB; //クエリビルダ

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('owner.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        // バリデーション
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // dd($request);

        try {
            DB::transaction(function () use($request) {
                
                $result = $request->has('image');

                if ($result) {
                    //getClientOriginalNameでオリジナルの名前が取れる。　
                    $filename = $request->image->getClientOriginalName();
    
                    // 保存処理
                    $product = Blog::create([
                        'title' => $request->title,
                        'content' => $request->content,
                        //storeAsメソッドを追加して引数に上で取得したオリジナル名を入れる。
                        'image' => $request->image->storeAs('',$filename,'public'),
                    ]);   
                } else {
                      // 保存処理
                      $product = Blog::create([
                        'title' => $request->title,
                        'content' => $request->content,
                    ]);
                }
            }, 2);

        } catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()
        ->route('owner.blogs.index')
        ->with(['message' => 'ブログを投稿しました',
        'status' => 'info' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        // dd($blog);
        return view('user.detail',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('owner.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // バリデーション
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        
        //getClientOriginalNameでオリジナルの名前が取れる。　
        $filename = $request->image;
        
        //storeAsメソッドを追加して引数に上で取得したオリジナル名を入れる。
        $blog->image = $request->image->storeAs('',$filename,'public');
        
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        return redirect()
        ->route('owner.blogs.index')
        ->with(['message' => '投稿を更新しました',
        'status' => 'info' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BLog::findOrFail($id)->delete();

        return redirect()
        ->route('owner.blogs.index')
        ->with(['message' => '投稿を削除しました',
        'status' => 'alert']);
    }

    public function showall()
    {
        $blogs = Blog::all();
        return view('owner.blogs.showall', compact('blogs'));
    }
}
