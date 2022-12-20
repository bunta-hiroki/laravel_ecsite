
@props([
  'title',
  'content' => '本文の初期値です。',
  ])

<div {{ $attributes->merge([
  'class' => 'border-2 shadow-md w-2/4 p-2'
  ]) }} >
  <div>{{ $article->title }}</div>
  <div>{{($article->created_at)->format('Y/m/d')}}</div>
  <div>{{($article->updated_at)->format('Y/m/d')}}</div>
  <img class="max-w-xs h-auto" src="{{ asset($article->img_path) }}">
  <div>{{ $article->content }}</div>
</div>