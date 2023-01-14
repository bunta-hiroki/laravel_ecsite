<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ブログ投稿、編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                <form  method="POST" action="{{ route('owner.blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="-m-2">
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">タイトル　※必須</label>
                              <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="content" class="leading-7 text-sm text-gray-600">本文</label>
                              <textarea id="content" name="content" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('content') }}</textarea>
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                              <input type="file" name="image">                            
                            </div>
                          </div>
                        </div>

                        <div class="p-2 w-full mt-4 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('owner.products.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
      'use strict'
      const images = document.querySelectorAll('.image')
      images.forEach(image => {
        image.addEventListener('click', function(e){
          const imageName = e.target.dataset.id.substr(0, 6)
          const imageId = e.target.dataset.id.replace(imageName + '_', '')
          const imageFile = e.target.dataset.file
          const imagePath = e.target.dataset.path
          const modal = e.target.dataset.modal
          document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile
          document.getElementById(imageName + '_hidden').value = imageId
          MicroModal.close(modal);
        })
      });

    </script>
</x-app-layout>
