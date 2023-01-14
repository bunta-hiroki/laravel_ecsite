<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ブログ編集
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">

            <!-- フラッシュメッセージコンポーネント　 -->
            <x-flash-message status="session('status')" />

            <div class="flex justify-end mb-4">
              <button onclick="location.href='{{ route('owner.blogs.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
            </div>

            <div class="flex flex-wrap"> 
              @foreach ($blogs as $blog)
                <div class="w-full md:p-4 p-2">
                  <a href="{{ route('owner.blogs.edit', ['blog' => $blog->id]) }}">
                    <div class="border rounded-md md:p-4 p-2">
                      <div class="text-gray-700">{{ $blog->title }}</div> 
                      <div class="text-gray-700 text-xs">{{ $blog->content }}</div> 

                      @if(isset( $blog->image ))
                      <img class="h-28 w-28" src="{{ asset('storage/' . $blog->image) }}">
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
</x-app-layout>
