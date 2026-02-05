@extends('user.layout.main')

@section('content')

<article class="article-page">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Header --}}
    <header class="article-header">
        <h1 class="article-title">
            {{ $article->title }}
        </h1>

        <div class="article-meta">
            <div class="author">
                <span>{{ $article->author ?? 'Admin' }}</span>
            </div>
            <span class="dot">•</span>
            <span>{{ $article->created_at->format('d F Y') }}</span>
        </div>
    </header>

    {{-- Hero Image --}}
    @if($article->image)
    <div class="article-hero">
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
    </div>
    @endif

    {{-- Content --}}
    <div class="article-body">
        {!! nl2br(e($article->content)) !!}
    </div>

</article>
@endsection
