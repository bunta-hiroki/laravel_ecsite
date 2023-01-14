<x-app-layout>
  
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      こんにちは、{{ Auth::user()->name }}さん
    </h2>
  </x-slot>

  {{--<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="p-6 bg-white">
            <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Blog</h1>
            <div class="flex flex-wrap"> 
              @foreach ($blogs as $blog)
              <div class="w-full md:p-4 p-2">
                <a href="{{ route('user.blogs.show', ['id' => $blog->id]) }}">
                  <div class="border-b border-gray-200 md:p-4 p-2 flex">
                    <div class="mt-4">
                      <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $blog->title }}</h3>
                      <h2 class="text-gray-900 title-font text-lg font-medium">{{ $blog->content }}</h2>
                    </div>

                    @if(isset( $blog->image ))
                    <img class="h-28 w-28 ml-auto" src="{{ asset('storage/' . $blog->image) }}">
                    @endif
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>--}}

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Products</h1>
          <form method="get" action="{{ route('user.items.index') }}" class="py-6">
              <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center">
                  <select name="category" class="mb-2 lg:mb-0 lg:mr-2">
                    <option value="0" @if(\Request::get('category') === '0') selected @endif>全て</option>
                    @foreach($categories as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach($category->secondary as $secondary)
                          <option value="{{ $secondary->id }}" @if(\Request::get('category') == $secondary->id) selected @endif>
                            {{ $secondary->name }}
                          </option>
                        @endforeach
                    @endforeach
                  </select>
                  <div class="flex space-x-2 items-center">
                    <div>
                      <input class="border border-gray-500 py-2" name="keyword" placeholder="キーワードを入力">
                    </div>
                    <div>
                      <button class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
                    </div>
                </div>
              </div>
              <div class="flex">
                <div>
                  <span class="text-sm">表示順</span class="text-sm"><br>
                  <select name="sort" id="sort" class="mr-4">
                    <option value="{{ \Constant::SORT_ORDER['recommend'] }}"
                      @if(\Request::get('sort') === \Constant::SORT_ORDER['recommend']) selected @endif>おすすめ順
                    </option>
                    <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
                      @if(\Request::get('sort') === \Constant::SORT_ORDER['higherPrice']) selected @endif>料金の高い順
                    </option>
                    <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
                      @if(\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice']) selected @endif>料金の低い順
                    </option>
                    <option value="{{ \Constant::SORT_ORDER['later'] }}"
                      @if(\Request::get('sort') === \Constant::SORT_ORDER['later']) selected @endif>新しい順
                    </option>
                    <option value="{{ \Constant::SORT_ORDER['older'] }}"
                      @if(\Request::get('sort') === \Constant::SORT_ORDER['older']) selected @endif>古い順
                    </option>
                  </select>
        
                </div>
                <div>
                  <span class="text-sm">表示件数</span><br>
                  <select id="pagination" name="pagination">
                    <option value="20"
                      @if(\Request::get('pagination') === '20')
                        selected
                      @endif>20件
                    </option>
                    <option value="50"
                      @if(\Request::get('pagination') === '50')
                        selected
                      @endif>50件
                    </option>
                    <option value="100"
                      @if(\Request::get('pagination') === '100')
                        selected
                      @endif>100件
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </form>
          <div class="flex flex-wrap"> 
            @foreach ($products as $product)
            <div class="w-1/4 md:p-4 p-2">
              <a href="{{ route('user.items.show', ['item' => $product->id]) }}">
                <div class="border rounded-md md:p-4 p-2">
                  <x-thumbnail filename="{{ $product->filename ?? '' }}" type="products" />
                  <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category }}</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                    <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm">円(税込)</span></p>
                  </div>

                  <!-- {{--いいね機能、ログインユーザーのみ--}} -->
                  <div class="text-right flex items-center">
                    @if($product->favoriteusers()->where('user_id', Auth::id())->exists())
                    <form action="{{ route('user.favorites.destroy', ['id' => $product->id]) }}" method="post">
                      @csrf
                      <button type="submit" class=""><i class="fas fa-heart"></i></button>
                    </form>
                    @else
                    <form action="{{ route('user.favorites', ['id' => $product->id]) }}" method="post">
                      @csrf
                      <button type="submit" class=""><i class="far fa-heart"></i></button>
                    </form>
                    @endif
                    <p class="text-xs py-2 ml-2">{{ $product->favoriteusers->count() }}</p>
                  </div>
                  <!-- {{--いいね機能、ログインユーザーのみ--}} -->
                </div>
              </a>
            </div>
            @endforeach
          </div>
          {{ $products->appends([
              'sort' => \Request::get('sort'),
              'pagination' => \Request::get('pagination'),
            ])->links() }}
        </div>
      </div>
    </div>
  </div>

<script>
  const select = document.getElementById('sort')

  select.addEventListener('change', function(){
    this.form.submit()
  }) 

  const paginate = document.getElementById('pagination')

  paginate.addEventListener('change', function(){
    this.form.submit()
  })



  $(function () {
    var like = $('.js-like-toggle');
    var likePostId;

    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター
                },
        })

            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 

    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 

            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
  });
</script>

</x-app-layout>
