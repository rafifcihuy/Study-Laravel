@extends('layouts.app')

@section('content')
<section class="page-section mt-5">
    <div class="container mt-5">

        <h2>Semua Artikel oleh {{ $author->name }}</h2>
        <hr>
         {{-- <a href="{{ url('/blog') }}" class="btn btn-secondary mt-4">Kembali ke Blog</a>  --}}
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm mb-3">
            &larr; Kembali
        </a>
        <div class="row mt-4">
            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                oleh {{ $blog->author->name }}
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $blog->created_at->format('d M Y') }}
                            </h6>
                            <p class="card-text">{{ Str::limit($blog->body, 100) }}</p>
                            <a href="{{ url('/blog/' . $blog->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Penulis ini belum menulis artikel.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection