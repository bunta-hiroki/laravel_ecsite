
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Articles
      </h2>
  </x-slot>

  <x-tests.app>
    <x-slot name="header"></x-slot>
    
    @auth
      <a class="text-xl block mb-5 w-fit border-dotted border-2" href="/articles/create">新規投稿</a>
    @endauth

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-4">
      @if(count($articles) > 0)
        @foreach($articles as $article)
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
          <a href="/articles/{{$article->id}}" class="block p-5">
              <img class="rounded-t-lg w-48 h-auto m-auto" src="{{ asset($article->img_path) }}" alt="" />
          </a>
          <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{($article->created_at)->format('Y/m/d')}}</p>
            <a href="/articles/{{$article->id}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                詳細
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  
  </x-tests.app>
</x-app-layout>


<!-- <a class="border-2 shadow-md p-2 flex flex-col justify-start items-center" href="/articles/{{$article->id}}">
  <div>{{ $article->title }}</div>
  <div>{{($article->created_at)->format('Y/m/d')}}</div>
  <img class="w-48 h-auto" src="{{ asset($article->img_path) }}">
</a> -->