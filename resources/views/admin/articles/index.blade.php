@extends('admin.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Berita</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tulis Berita
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel Berita Terbit</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Gambar</th>
                        <th>Rincian Berita</th>
                        <th width="15%">Kategori & Tag</th>
                        <th width="15%">Penulis</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>

                        <!-- Gambar -->
                        <td class="text-center align-middle">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}"
                                     class="img-thumbnail rounded"
                                     style="max-width: 100px; max-height: 80px; object-fit: cover;">
                            @else
                                <span class="badge badge-secondary">Tidak ada gambar</span>
                            @endif
                        </td>

                        <!-- Detail -->
                        <td class="align-middle">
                            <h6 class="font-weight-bold mb-1 text-dark">{{ $article->title }}</h6>
                            <small class="text-muted d-block">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ $article->created_at->format('d M Y H:i') }} WIB
                            </small>
                            <small class="text-secondary d-block">
                                <i class="fas fa-link mr-1"></i>
                                {{ $article->slug }}
                            </small>
                        </td>

                        <!-- Kategori & Tag -->
                        <td class="align-middle text-center">
                            <span class="badge badge-info mb-2">
                                {{ $article->category->name ?? '-' }}
                            </span>

                            <div>
                                @forelse($article->tags as $tag)
                                    <span class="badge badge-light border text-dark">
                                        #{{ $tag->name }}
                                    </span>
                                @empty
                                    <small class="text-muted">No tags</small>
                                @endforelse
                            </div>
                        </td>

                        <!-- Penulis -->
                        <td class="align-middle">
                            <strong>{{ $article->user->name ?? '-' }}</strong>

                            @if(optional($article->user->profile)->bio)
                                <small class="d-block text-muted mt-1">
                                    "{{ \Illuminate\Support\Str::limit($article->user->profile->bio, 40) }}"
                                </small>
                            @else
                                <small class="text-muted d-block">(Bio kosong)</small>
                            @endif
                        </td>

                        <!-- Aksi -->
                        <td class="text-center align-middle">
                            <a href="{{ route('articles.edit', $article->id) }}"
                               class="btn btn-warning btn-sm mb-1">
                                Edit
                            </a>

                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data berita
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection