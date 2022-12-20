

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$article->title}}
      </h2>
  </x-slot>

  <x-tests.app>
    <x-slot name="header"></x-slot>
    <a href="/articles" class="mb-5 block">一覧へ</a>
    <div class="">
      <div class="grid grid-cols-1 sm:grid-cols-2">
        <div>
          <h5 class="text-xl mb-4">{{$article->title}}</h5>
          <small>投稿日:{{($article->created_at)->format('Y/m/d')}}</small><br/>
          <small class="">更新日:{{($article->updated_at)->format('Y/m/d')}}</small><br>
          <p class="mt-4">{{$article->content}}</p>
        </div>
        <div class="flex justify-center">
          <img class="max-w-xs h-auto" src="{{ asset($article->img_path) }}">
        </div>
      </div>
      @auth
        <a href="/articles/{{$article->id}}/edit">編集</a>
      @endauth
    </div>
  </x-tests.app>

</x-app-layout>
