@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">📰 Berita Terkini</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @foreach ($news as $item)
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden h-100">
                    <img src="{{ asset('storage/news/' . $item->gambar) }}" 
                        class="card-img-top"
                        alt="{{ $item->judul }}"
                        style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                        <p class="text-muted small mb-2">
                            Oleh: {{ $item->wartawan->nama ?? 'Anonim' }} <br>
                            <span class="text-secondary">{{ $item->created_at->format('d M Y') }}</span>
                        </p>
                        <p class="card-text">{{ Str::limit($item->ringkasan, 120) }}</p>
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary rounded-pill px-4">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection