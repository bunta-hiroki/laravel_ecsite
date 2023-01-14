<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ブログ詳細
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 rounded border border-gray-300">

          <div class="">
            <div class="relative">
              <p class="w-full bg-opacity-50 text-xs focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 px-3 leading-8 transition-colors duration-200 ease-in-out">更新日:{{ $blog->updated_at }}</p>
            </div>
          </div>

          <div class="">
            <div class="relative">
              <p class="w-full bg-opacity-50 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $blog->title }}</p>
            </div>
          </div>

          @if(isset($blog->image))
          <div class="">
            <div class="relative">
            <img class="h-28 w-28" src="{{ asset('storage/' . $blog->image) }}">            
            </div>
          </div>
          @endif
          
          <div class="">
            <div class="relative">
              <p id="content" name="content" rows="10" required class="w-full bg-opacity-50  focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $blog->content }}</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
