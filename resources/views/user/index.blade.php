<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Blog</h1>
              <div class="flex flex-wrap"> 
                @foreach ($blogs as $blog)
                  <a href="/blogs/{{ $blog->id }}" class="text-gray-600 body-font w-1/3">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-wrap -mx-4 -my-8">
                        <div class="py-8 px-4">
                          <div class="h-full flex items-start">
                            <div class="flex-grow pl-6">
                              <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{  $blog->updated_at }}</h2>
                              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{  $blog->title }}</h1>
                              <p class="leading-relaxed mb-5">{{ $blog->content }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Products</h1>
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
