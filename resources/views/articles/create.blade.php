

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
      </h2>
  </x-slot>

  <x-tests.app>
    <x-slot name="header"></x-slot>
    <a href="/articles" class="mb-5 block">一覧へ</a>
    <div class="flex flex-col">
      <form method="POST" action="/articles" enctype="multipart/form-data">
        @csrf
        <div class="form-group flex mb-5">
          <label class="w-32 block" for="exampleFormControlInput1">タイトル</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group flex mb-5">
          <label class="w-32 block" for="exampleFormControlTextarea1">本文</label>
          <textarea class="form-control"rows="5" name="content"></textarea>
        </div>

        <div class="form-group  flex">
          <label class="w-32 block" for="exampleFormControlTextarea1">画像</label>
          <input type="file" name="img_path">
        </div>

        <input type="submit" class="cursor-pointer btn btn-primary text-xl block mt-5 mb-5 w-fit border-dotted border-2" value="投稿"/>
      </form>
    </div>
  </x-tests.app>

</x-app-layout>