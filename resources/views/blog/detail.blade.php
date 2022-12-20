<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ブログ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <a href="/blogs" class="block mb-4 font-semibold text-gray-800 leading-tight">ブログ一覧へ</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-gray-50 mb-4">
                      <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-16 lg:px-8">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                          <span class="block text-indigo-600">{{ $blog->title }}</span>

                          @if (session('err_msg'))
                            <p class="text-danger">
                              {{ session('err_msg') }}
                            </p>
                          @endif

                          <span class="block text-indigo-400">{{ $blog->updated_at }}</span>
                          <span class="block">{{ $blog->content }}</span>
                        </h2>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>