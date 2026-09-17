@extends('layout')
@section('title', 'Katalog - Libraz')
@section('page_title', 'Katalog Buku')

@push('styles')
<style>
    .katalog-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Auto-hold alert */
    .alert-banner {
        background: #34d399; /* Green */
        border-radius: var(--radius-md);
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #064e3b;
        position: relative;
        box-shadow: 0 4px 10px rgba(52, 211, 153, 0.3);
    }
    .alert-icon {
        background: white;
        width: 32px; height: 32px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        color: #059669;
    }
    .alert-close {
        position: absolute;
        right: 12px; top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.3);
        width: 24px; height: 24px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
    }

    /* Search Bar */
    .search-bar {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 12px;
        padding: 6px 6px 6px 16px;
        border: 1px solid var(--border-color);
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .search-input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 0.95rem;
        background: transparent;
        padding-left: 8px;
    }
    .search-qr-btn {
        background: #ede9fe;
        color: var(--primary);
        width: 40px; height: 40px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem;
        border: none;
    }

    /* Filter Chips */
    .chips-container {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        padding-bottom: 4px;
        scrollbar-width: none; /* Firefox */
    }
    .chips-container::-webkit-scrollbar { display: none; }
    
    .chip {
        white-space: nowrap;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        background: white;
        border: 1px solid var(--border-color);
        color: var(--text-main);
        cursor: pointer;
    }
    .chip.active {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        box-shadow: 0 2px 8px rgba(89, 22, 242, 0.3);
    }

    /* Section Title */
    .section-title-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }
    .section-title {
        font-size: 1.1rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title::before {
        content: '';
        display: inline-block;
        width: 12px; height: 12px;
        background: #a7f3d0;
        border-radius: 50%;
    }

    /* Book Cards */
    .book-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        position: relative;
    }
    .book-info {
        display: flex;
        gap: 16px;
    }
    .book-cover-wrap {
        position: relative;
        flex-shrink: 0;
    }
    .book-cover {
        width: 80px;
        height: 120px;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .book-rating {
        position: absolute;
        top: 4px; left: 4px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(4px);
        padding: 2px 6px;
        border-radius: 8px;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex; align-items: center; gap: 4px;
    }
    
    .book-details {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .book-category {
        font-size: 0.7rem;
        color: var(--text-muted);
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .book-title {
        font-size: 1.05rem;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 4px;
    }
    .book-author {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-bottom: 12px;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
        width: fit-content;
    }
    .status-available { background: #dcfce7; color: #166534; }
    .status-borrowed { background: #fef3c7; color: #b45309; }
    
    .floor-badge {
        background: #f3f4f6;
        color: var(--text-muted);
        font-size: 0.7rem;
        padding: 4px 8px;
        border-radius: 8px;
        margin-left: 8px;
        font-weight: 600;
    }

    .bookmark-btn {
        position: absolute;
        top: 16px; right: 16px;
        color: var(--text-muted);
        background: none; border: none; font-size: 1.2rem; cursor: pointer;
    }

    /* Card Actions */
    .card-actions {
        display: flex;
        gap: 12px;
        margin-top: 16px;
    }
    .btn-card {
        flex: 1;
        padding: 10px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: 700;
        display: flex; justify-content: center; align-items: center; gap: 6px;
        border: none;
    }
    .btn-borrow { background: var(--primary); color: white; }
    .btn-read { background: #34d399; color: #064e3b; }
    .btn-reserve { background: #9f1239; color: white; } /* Dark Red */
    
</style>
@endpush

@section('content')
<div class="katalog-container">
    
    <!-- Auto Hold Alert -->
    <div class="alert-banner">
        <div class="alert-icon"><i class="fa-solid fa-bolt"></i></div>
        <div>
            <div style="font-size: 0.65rem; font-weight: 800; letter-spacing: 0.5px;">AUTO-HOLD ALERT</div>
            <div style="font-size: 0.85rem; font-weight: 600;">Buku incaranmu disimpan 24 jam di Loker Smart saat giliranmu tiba!</div>
        </div>
        <div class="alert-close"><i class="fa-solid fa-xmark text-xs"></i></div>
    </div>

    <!-- Search -->
    <div class="search-bar">
        <i class="fa-solid fa-magnifying-glass text-muted"></i>
        <input type="text" class="search-input" placeholder="Cari judul, penulis, ISBN, atau mapel">
        <button class="search-qr-btn"><i class="fa-solid fa-barcode"></i></button>
    </div>
    
    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.75rem; font-weight: 600; color: var(--text-muted);">
        <span>Koleksi Terupdate: 16,820 Eksemplar</span>
        <span class="text-primary"><i class="fa-solid fa-sliders"></i> Filter Lanjutan</span>
    </div>

    <!-- Chips -->
    <div class="chips-container">
        <div class="chip active">🔥 Paling Hype</div>
        <div class="chip">Kurikulum Merdeka</div>
        <div class="chip">Fiksi & Novel</div>
        <div class="chip">Sains</div>
    </div>

    <!-- Title -->
    <div class="section-title-wrap">
        <h2 class="section-title">Katalog Pilihan Siswa</h2>
        <span style="background: #f3f4f6; padding: 4px 8px; border-radius: 12px; font-size: 0.75rem; font-weight: 600; color: var(--text-muted);">{{ count($books) }} Menampilkan</span>
    </div>

    @foreach($books as $book)
    <div class="book-card">
        <button class="bookmark-btn"><i class="fa-regular fa-bookmark"></i></button>
        <div class="book-info">
            <div class="book-cover-wrap">
                <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="book-cover">
                <div class="book-rating">
                    <i class="fa-solid fa-star" style="color: #fbbf24;"></i> {{ $book->rating }}
                </div>
            </div>
            <div class="book-details">
                <div class="book-category">{{ $book->category }}</div>
                <div class="book-title">{{ $book->title }}</div>
                <div class="book-author">{{ $book->author }}</div>
                
                <div style="margin-top: auto; display: flex; align-items: center; gap: 8px;">
                    @if($book->stock > 0)
                    <div class="status-badge status-available">
                        <span style="width: 6px; height: 6px; background: #166534; border-radius: 50%;"></span>
                        Tersedia ({{ $book->stock }} Eks.)
                    </div>
                    @else
                    <div class="status-badge status-borrowed">
                        <span style="width: 6px; height: 6px; background: #b45309; border-radius: 50%;"></span>
                        Dipinjam
                    </div>
                    @endif
                    <div class="floor-badge">{{ $book->rack }}</div>
                </div>
            </div>
        </div>
        <div class="card-actions">
            @if($book->stock > 0)
                <button class="btn-card btn-borrow"><i class="fa-solid fa-hand-holding-heart"></i> Pinjam Mandiri</button>
                <button class="btn-card btn-read"><i class="fa-solid fa-book-open"></i> Baca E-Book</button>
            @else
                <button class="btn-card btn-reserve" style="width: 100%;"><i class="fa-solid fa-ticket"></i> Reservasi Mandiri (Ikut Antre)</button>
            @endif
        </div>
    </div>
    @endforeach

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Alert Close
        const alertClose = document.querySelector('.alert-close');
        if(alertClose) {
            alertClose.addEventListener('click', function() {
                this.closest('.alert-banner').style.display = 'none';
            });
        }

        // Filter Chips
        const chips = document.querySelectorAll('.chip');
        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
            });
        });

        // Bookmarks Toggle
        const bookmarks = document.querySelectorAll('.bookmark-btn');
        bookmarks.forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if(icon.classList.contains('fa-regular')) {
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid');
                    icon.style.color = 'var(--primary)';
                } else {
                    icon.classList.remove('fa-solid');
                    icon.classList.add('fa-regular');
                    icon.style.color = 'var(--text-muted)';
                }
            });
        });

        // Mock action buttons
        const actionBtns = document.querySelectorAll('.btn-card');
        actionBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                alert('Fungsi ini akan terhubung ke sistem backend nanti!');
            });
        });
    });
</script>
@endpush
@endsection
