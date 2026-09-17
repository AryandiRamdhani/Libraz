@extends('layout')
@section('title', 'Statistik - Libraz')
@section('page_title', 'Petugas Statistik')

@push('styles')
<style>
    .statistik-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Top Panel */
    .school-panel {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
    }
    .shield-icon {
        background: #f4f2ff;
        color: var(--primary);
        width: 44px; height: 44px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem;
    }
    .accreditation-badge {
        background: #dcfce7;
        color: #166534;
        font-size: 0.75rem;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 12px;
        margin-left: auto;
    }

    /* Sync Banner */
    .sync-banner {
        background: linear-gradient(135deg, #5916f2 0%, #7c3aed 100%);
        border-radius: var(--radius-lg);
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        box-shadow: 0 6px 16px rgba(89, 22, 242, 0.3);
    }
    .sync-icon {
        background: rgba(255,255,255,0.2);
        width: 36px; height: 36px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
    }
    .sync-btn {
        background: #34d399;
        color: #064e3b;
        border: none;
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 800;
        margin-left: auto;
        display: flex; align-items: center; gap: 4px;
        cursor: pointer;
    }

    /* Metrics Header */
    .metrics-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }
    .metrics-title {
        font-size: 1.1rem;
        font-weight: 800;
    }
    .live-badge {
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        display: flex; align-items: center; gap: 4px;
    }
    .live-dot {
        width: 6px; height: 6px;
        background: #ef4444;
        border-radius: 50%;
        animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
    }

    /* Grid Stats */
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .stat-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        display: flex;
        flex-direction: column;
        gap: 8px;
        position: relative;
    }
    .stat-icon-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .stat-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
    }
    .icon-green { background: #dcfce7; color: #166534; }
    .icon-purple { background: #f4f2ff; color: var(--primary); }
    .icon-red { background: #fee2e2; color: #991b1b; }
    .icon-gray { background: #f3f4f6; color: #4b5563; }
    
    .stat-trend {
        font-size: 0.75rem;
        font-weight: 700;
    }
    .trend-up { color: #10b981; }
    .trend-purple { color: var(--primary); font-size: 0.65rem; }
    
    .stat-badge {
        font-size: 0.6rem;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 8px;
    }
    .badge-action { background: #fee2e2; color: #991b1b; }
    .badge-ready { background: #dcfce7; color: #166534; }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 800;
        line-height: 1.1;
    }
    .stat-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        font-weight: 600;
    }
    .stat-line {
        height: 4px;
        border-radius: 2px;
        margin-top: 4px;
        background: #f3f4f6;
        width: 100%;
        overflow: hidden;
    }
    .stat-line-fill { height: 100%; border-radius: 2px; }
    .fill-green { background: #10b981; width: 70%; }
    .fill-purple { background: var(--primary); width: 85%; }
    .fill-red { background: #ef4444; width: 30%; }
    .fill-full { background: var(--primary); width: 100%; }

    /* Popular Books List */
    .popular-list {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .popular-item {
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid #f3f4f6;
        padding-bottom: 12px;
    }
    .popular-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .rank-circle {
        width: 40px; height: 40px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .rank-1 { background: #dcfce7; color: #166534; }
    .rank-2 { background: #f4f2ff; color: var(--primary); }
    .rank-3 { background: #f3f4f6; color: #4b5563; }
    
    .book-thumb {
        width: 40px; height: 60px;
        border-radius: 4px;
        object-fit: cover;
    }
    .popular-details {
        flex: 1;
    }
    .popular-title {
        font-size: 0.95rem;
        font-weight: 800;
        margin-bottom: 2px;
    }
    .popular-author {
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-bottom: 6px;
    }
    .rack-tag {
        font-size: 0.65rem;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 6px;
    }
    .tag-purple { background: #ede9fe; color: var(--primary); }
    .tag-green { background: #dcfce7; color: #166534; }
    .tag-red { background: #fee2e2; color: #991b1b; }
    
    .popular-count {
        text-align: right;
    }
    .count-val {
        font-size: 1.1rem;
        font-weight: 800;
    }
    .count-label {
        font-size: 0.7rem;
        color: var(--text-muted);
    }
</style>
@endpush

@section('content')
<div class="statistik-container">

    <!-- Top Panel -->
    <div class="school-panel">
        <div class="shield-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <div>
            <div style="font-size: 0.65rem; font-weight: 800; color: var(--text-muted);">PANEL PETUGAS & STATISTIK</div>
            <div style="font-size: 1.1rem; font-weight: 800;">SMAN 1 Garudapu...</div>
        </div>
        <div class="accreditation-badge"><i class="fa-solid fa-circle" style="font-size: 0.4rem; vertical-align: middle;"></i> Akreditasi A</div>
    </div>

    <!-- Sync Banner -->
    <div class="sync-banner">
        <div class="sync-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
        <div>
            <div style="font-size: 0.95rem; font-weight: 800; letter-spacing: 0.5px;">Sinkron Dapodik & Perp...</div>
            <div style="font-size: 0.75rem; opacity: 0.9;">Sinkronisasi terakhir: Hari ini, 08:3...</div>
        </div>
        <button class="sync-btn"><i class="fa-solid fa-rotate"></i> Sync</button>
    </div>

    <!-- Metrics Header -->
    <div class="metrics-header">
        <div class="metrics-title">Metrik Harian Perpustakaan</div>
        <div class="live-badge">
            LIVE MONITOR <div class="live-dot"></div>
        </div>
    </div>

    <!-- Grid -->
    <div class="stats-grid">
        <!-- Stat 1 -->
        <div class="stat-card">
            <div class="stat-icon-wrap">
                <div class="stat-icon icon-green"><i class="fa-solid fa-user-group"></i></div>
                <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-up"></i> 18%</div>
            </div>
            <div class="stat-value">342</div>
            <div class="stat-label">Kunjungan Hari Ini</div>
            <div class="stat-line"><div class="stat-line-fill fill-green"></div></div>
        </div>
        
        <!-- Stat 2 -->
        <div class="stat-card">
            <div class="stat-icon-wrap">
                <div class="stat-icon icon-purple"><i class="fa-solid fa-book-open"></i></div>
                <div class="stat-trend trend-purple">Aktif</div>
            </div>
            <div class="stat-value">128</div>
            <div class="stat-label">Buku Terpinjam</div>
            <div class="stat-line"><div class="stat-line-fill fill-purple"></div></div>
        </div>

        <!-- Stat 3 -->
        <div class="stat-card">
            <div class="stat-icon-wrap">
                <div class="stat-icon icon-red"><i class="fa-solid fa-bell-slash"></i></div>
                <div class="stat-badge badge-action">Perlu Aksi</div>
            </div>
            <div class="stat-value text-danger" style="color: #ef4444;">14</div>
            <div class="stat-label">Terlambat Kembali</div>
            <div class="stat-line"><div class="stat-line-fill fill-red"></div></div>
        </div>

        <!-- Stat 4 -->
        <div class="stat-card">
            <div class="stat-icon-wrap">
                <div class="stat-icon icon-gray"><i class="fa-solid fa-box-archive"></i></div>
                <div class="stat-badge badge-ready">Ready</div>
            </div>
            <div class="stat-value">4,850</div>
            <div class="stat-label">Stok Koleksi Siap</div>
            <div class="stat-line"><div class="stat-line-fill fill-full"></div></div>
        </div>
    </div>

    <!-- Popular Header -->
    <div class="metrics-header" style="margin-top: 16px;">
        <div class="metrics-title" style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-fire text-danger" style="color: #ef4444;"></i> Buku Terpopuler Minggu Ini
        </div>
        <div style="font-size: 0.75rem; font-weight: 800; color: var(--primary);">Top 3 Siswa</div>
    </div>

    <!-- Popular List -->
    <div class="popular-list">
        @foreach($popular_books as $index => $book)
        <div class="popular-item">
            <div class="rank-circle rank-{{ $index + 1 }}">#{{ $index + 1 }}</div>
            <img src="{{ $book->cover_image_url }}" alt="Book" class="book-thumb">
            <div class="popular-details">
                <div class="popular-title">{{ $book->title }}</div>
                <div class="popular-author">{{ $book->author }}</div>
                <span class="rack-tag tag-{{ $index === 0 ? 'green' : ($index === 1 ? 'purple' : 'red') }}">{{ $book->rack }}</span>
            </div>
            <div class="popular-count">
                <div class="count-val">{{ $book->popularity_score }}<span style="font-size: 0.8rem;">x</span></div>
                <div class="count-label">Dipinjam</div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const syncBtn = document.querySelector('.sync-btn');
        if(syncBtn) {
            syncBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                icon.classList.add('fa-spin');
                this.innerHTML = '<i class="fa-solid fa-rotate fa-spin"></i> Syncing...';
                
                setTimeout(() => {
                    this.innerHTML = '<i class="fa-solid fa-check"></i> Done';
                    this.style.background = '#10b981';
                    this.style.color = 'white';
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="fa-solid fa-rotate"></i> Sync';
                        this.style.background = '#34d399';
                        this.style.color = '#064e3b';
                    }, 2000);
                }, 1500);
            });
        }
    });
</script>
@endpush
@endsection
