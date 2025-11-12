@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <!-- Kartu Berita -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
                <img src="{{ asset('storage/news/' . $news->gambar) }}"
                     alt="{{ $news->judul }}" 
                     class="card-img-top"
                     style="max-height: 420px; object-fit: cover;">

                <div class="card-body p-4">
                    <h2 class="fw-bold text-primary mb-2">{{ $news->judul }}</h2>
                    <p class="text-muted mb-3">
                        🗓️ {{ $news->created_at->format('d M Y') }} 
                        • ✍️ Oleh: {{ $news->wartawan->nama ?? 'Anonim' }}
                    </p>

                    <p class="fs-5" style="line-height: 1.8;">
                        {{ $news->isi ?? $news->ringkasan }}
                    </p>
                </div>
            </div>

            <!-- Kolom Komentar -->
            <div class="card mt-5 shadow-sm border-0 rounded-4">
                <div class="card-header bg-light">
                    <h5 class="fw-bold mb-0">💬 Komentar</h5>
                </div>
                <div class="card-body">
                    @if ($news->komentar->isEmpty())
                        <p class="text-muted fst-italic">Belum ada komentar.</p>
                    @else
                        @foreach ($news->komentar as $komentar)
                            <div class="border-bottom pb-3 mb-3">
                                <strong>{{ $komentar->nama }}</strong>
                                <p class="mb-1">{{ $komentar->isi }}</p>
                                <small class="text-muted">
                                    🕒 {{ $komentar->created_at->diffForHumans() }}
                                </small>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Form Tambah Komentar -->
            <div class="card mt-4 shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">🖊️ Tambahkan Komentar</h5>
                    <form action="{{ route('komentar.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="news_id" value="{{ $news->id }}">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" name="nama" class="form-control rounded-pill" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Komentar</label>
                            <textarea name="isi" rows="3" class="form-control rounded-3" placeholder="Tuliskan komentar Anda..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-send me-1"></i> Kirim Komentar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="{{ route('news.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                    ← Kembali ke Berita
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
