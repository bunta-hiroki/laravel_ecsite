<x-app-layout>
  
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      こんにちは、{{ Auth::user()->name }}さん
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="p-6 bg-white">
            <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Blog一覧</h1>
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
  </div>

</x-app-layout>