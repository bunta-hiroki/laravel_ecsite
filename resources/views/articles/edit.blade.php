
<x-app-layout>
  
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit
      </h2>
  </x-slot>
  
  <x-tests.app>
    <a href="/articles" class="mb-5 block">一覧へ</a>
    <x-slot name="header"></x-slot>
    <div class="flex flex-col">
      <form action="/articles/{{$article->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group flex mb-5">
          <label class="w-32 block" for="exampleFormControlInput1">タイトル</label>
          <input type="text" class="form-control" name="title" value="{{$article->title}}">
        </div>
        <div class="form-group flex mb-5">
          <label class="w-32 block" for="exampleFormControlTextarea1">本文</label>
          <textarea class="form-control"rows="5" name="content">{{$article->content}}</textarea>
        </div>
        <div class="form-group flex mb-5">
          <label class="w-32 block" for="exampleFormControlTextarea1">画像</label>
          <div>
            <img class="max-w-xs h-auto mb-5" src="{{ asset($article->img_path) }}">
            <input type="file" name="img_path">
          </div>
        </div>
        <input type="submit" class="cursor-pointer btn btn-primary text-xl block mt-5 w-fit border-dotted border-2" value="更新"/>
      </form>
      <form action="/articles/{{$article->id}}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" class="cursor-pointer btn btn-primary text-xl block mb-5 w-fit border-dotted border-2" value="削除"/>
      </form>
    </div>

  </x-tests.app>

</x-app-layout>
