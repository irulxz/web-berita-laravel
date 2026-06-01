<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }}</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5">

    <!-- Judul -->
    <h1 class="mb-3 font-weight-bold">{{ $article->title }}</h1>

    <!-- Kategori -->
    <span class="badge badge-primary mb-3">
        {{ $article->category->name }}
    </span>

    <!-- Tags -->
    <div class="mb-3">
        @foreach($article->tags as $tag)
            <span class="badge badge-secondary">#{{ $tag->name }}</span>
        @endforeach
    </div>

    <!-- Gambar -->
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}"
             class="img-fluid rounded mb-4"
             alt="Gambar">
    @endif

    <!-- Konten -->
    <div class="mb-5" style="line-height: 1.8;">
        {!! nl2br(e($article->content)) !!}
    </div>

    <hr>

    <!-- PROFIL PENULIS -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="font-weight-bold mb-3">Profil Penulis</h5>

            <p><strong>Nama:</strong> {{ $article->user->name }}</p>

            <p><strong>No HP:</strong>
                {{ $article->user->profile->phone ?? '-' }}
            </p>

            <p><strong>Bio:</strong><br>
                {{ $article->user->profile->bio ?? 'Belum ada bio' }}
            </p>
        </div>
    </div>

</div>

</body>
</html>