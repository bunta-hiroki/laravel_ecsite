<x-app-layout>
  
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      こんにちは、{{ Auth::user()->name }}さん
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex flex-wrap"> 
            @foreach ($favoriteitems as $product)
            <div class="w-1/4 md:p-4 p-2">
              <a href="{{ route('user.items.show', ['item' => $product->id]) }}">
                <div class="border rounded-md md:p-4 p-2">
                  <x-thumbnail filename="{{ $product->imageFirst->filename ?? '' }}" type="products" />
                  <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category->name }}</h3>
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

        </div>
      </div>
    </div>
  </div>



  </x-app-layout>