<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          BlogEdit
      </h2>
  </x-slot>

  <x-tests.app>

    <x-slot name="header"></x-slot>
    
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form method="POST" action="/blogs/update">
          @csrf
          <input type="hidden" name="id" value="{{ $blog->id }}">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input 
                      id="title"
                      name="title"
                      value="{{ $blog->title }}"
                      type="text"
                      class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                      >

                      @if ($errors->has('title'))
                        <div class="">
                            {{ $errors->first('title') }}
                        </div>
                      @endif
                  </div>
                </div>
              </div>

              <div>
                <label for="content" class="block text-sm font-medium text-gray-700">content</label>
                <div class="mt-1">
                  <textarea 
                      id="content"
                      name="content"
                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                  >
                      {{ $blog->content }}
                  </textarea>
                  @if ($errors->has('content'))
                    <div class="">
                        {{ $errors->first('content') }}
                    </div>
                  @endif
                </div>
              </div>

            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">更新</button>
              <a href="/blogs" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">キャンセル</a>
            </div>
          </div>
        </form>
      </div>
    </div>

        
  </x-tests.app>
      
</x-app-layout>
    
    
<!-- <div class="grid grid-cols-1 gap-6 sm:grid-cols-4">
    
      <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <form method="POST" action="/blogs/store">
              @csrf
              <div class="form-group">
                  <label for="title">
                      タイトル
                  </label>
                  <input
                      id="title"
                      name="title"
                      class="form-control"
                      value="{{ old('title') }}"
                      type="text"
                  >
                  @if ($errors->has('title'))
                      <div class="text-danger">
                          {{ $errors->first('title') }}
                      </div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="content">
                      本文
                  </label>
                  <textarea
                      id="content"
                      name="content"
                      class="form-control"
                      rows="4"
                  >{{ old('content') }}</textarea>
                  @if ($errors->has('content'))
                      <div class="text-danger">
                          {{ $errors->first('content') }}
                      </div>
                  @endif
              </div>
              <div class="mt-5">
                  <a class="btn btn-secondary" href="/blogs">
                      キャンセル
                  </a>
                  <button type="submit" class="btn btn-primary">
                      投稿する
                  </button>
              </div>
            </form>


            <div>
              </div>
              
            </div>
          </div>
        </div> -->