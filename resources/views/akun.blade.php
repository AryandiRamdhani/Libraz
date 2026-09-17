@extends('layout')
@section('title', 'Akun - Libraz')
@section('page_title', 'Akun')

@push('styles')
<style>
    .akun-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Profile Header */
    .profile-header {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .avatar-wrapper {
        position: relative;
    }
    .avatar-img {
        width: 60px; height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .verified-badge {
        position: absolute;
        bottom: 0; right: 0;
        background: #10b981;
        color: white;
        width: 20px; height: 20px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.6rem;
        border: 2px solid white;
    }
    .profile-info {
        flex: 1;
    }
    .profile-name {
        font-size: 1.15rem;
        font-weight: 800;
        margin-bottom: 2px;
    }
    .profile-details {
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-bottom: 4px;
    }
    .profile-school {
        font-size: 0.65rem;
        font-weight: 800;
        color: var(--primary);
        letter-spacing: 0.5px;
    }
    .profile-actions {
        display: flex;
        gap: 8px;
    }
    .action-btn {
        width: 36px; height: 36px;
        border-radius: 50%;
        border: 1px solid var(--border-color);
        background: white;
        display: flex; align-items: center; justify-content: center;
        color: var(--text-muted);
        font-size: 0.9rem;
        cursor: pointer;
    }

    /* Digital Card */
    .digital-card {
        background: linear-gradient(135deg, #5916f2 0%, #3730a3 100%);
        border-radius: var(--radius-xl);
        padding: 24px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(89, 22, 242, 0.4);
    }
    .card-bg-icon {
        position: absolute;
        right: -20px;
        bottom: -20px;
        font-size: 10rem;
        opacity: 0.1;
        transform: rotate(-15deg);
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .card-title {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 1px;
        display: flex; align-items: center; gap: 6px;
    }
    .master-badge {
        background: rgba(255,255,255,0.2);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 800;
        backdrop-filter: blur(4px);
    }
    
    .card-number-label {
        font-size: 0.65rem;
        font-weight: 800;
        opacity: 0.8;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .card-number {
        font-size: 1.6rem;
        font-weight: 800;
        letter-spacing: 2px;
        font-family: monospace;
        margin-bottom: 12px;
    }
    
    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        font-size: 0.75rem;
        opacity: 0.9;
    }
    .rfid-icon {
        width: 36px; height: 36px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        backdrop-filter: blur(4px);
    }
    
    .btn-show-qr {
        background: white;
        color: var(--primary);
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        border: none;
        font-weight: 800;
        font-size: 0.9rem;
        margin-top: 20px;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        cursor: pointer;
        position: relative;
        z-index: 2;
    }

    /* Literacy Level */
    .level-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
    }
    .level-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }
    .medal-icon {
        width: 48px; height: 48px;
        background: #f4f2ff;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        color: var(--primary);
    }
    .level-title {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .level-name {
        font-size: 1.1rem;
        font-weight: 800;
        margin-top: 2px;
    }
    .top-badge {
        background: #f3f4f6;
        padding: 6px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 800;
        text-align: center;
        margin-left: auto;
    }
    
    .xp-info {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .xp-bar-bg {
        height: 10px;
        background: #f3f4f6;
        border-radius: 5px;
        overflow: hidden;
    }
    .xp-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, #5916f2 0%, #34d399 100%);
        width: 95%;
        border-radius: 5px;
    }

    /* Streak & Grid */
    .streak-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .streak-fire {
        font-size: 2rem;
        color: #f97316;
    }
    .streak-info {
        flex: 1;
    }
    .streak-title {
        font-size: 1rem;
        font-weight: 800;
    }
    .streak-desc {
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-top: 2px;
    }
    .days-row {
        display: flex;
        gap: 6px;
    }
    .day-circle {
        width: 24px; height: 24px;
        border-radius: 50%;
        background: #f3f4f6;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.6rem;
        font-weight: 800;
        color: var(--text-muted);
    }
    .day-circle.done { background: #dcfce7; color: #166534; }
    .day-circle.today { background: var(--primary); color: white; }

    /* Small Stats Grid */
    .small-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .small-stat-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .small-stat-icon {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem;
    }
    .bg-green-light { background: #dcfce7; color: #166534; }
    .bg-purple-light { background: #f4f2ff; color: var(--primary); }
    .bg-yellow-light { background: #fef3c7; color: #b45309; }
    .bg-red-light { background: #fee2e2; color: #991b1b; }
    
    .small-stat-val { font-size: 1.1rem; font-weight: 800; line-height: 1.1; }
    .small-stat-label { font-size: 0.7rem; color: var(--text-muted); }

    /* Section Title */
    .section-title {
        font-size: 1.15rem;
        font-weight: 800;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>
@endpush

@section('content')
<div class="akun-container">

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="avatar-wrapper">
            <img src="https://i.pravatar.cc/150?img=5" alt="{{ $user->name }}" class="avatar-img">
            <div class="verified-badge"><i class="fa-solid fa-check"></i></div>
        </div>
        <div class="profile-info">
            <div class="profile-name">{{ $user->name }}</div>
            <div class="profile-details">NIS: {{ $user->nis }} • {{ $user->role }}</div>
            <div class="profile-school">{{ $user->school_name }}</div>
        </div>
        <div class="profile-actions">
            <!-- Form to logout securely -->
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="action-btn" title="Logout" style="color: #ef4444;"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
            <div class="action-btn"><i class="fa-solid fa-sliders"></i></div>
        </div>
    </div>

    <!-- Digital Card -->
    <div class="digital-card">
        <i class="fa-solid fa-id-badge card-bg-icon"></i>
        
        <div class="card-header">
            <div class="card-title"><i class="fa-solid fa-bolt"></i> BIBLIOZ PASS • 2024/2025</div>
            <div class="master-badge">{{ $user->level > 10 ? 'Master Reader ⚡' : 'Reader' }}</div>
        </div>
        
        <div class="card-number-label">NOMOR ANGGOTA DIGITAL</div>
        <div class="card-number">BZ-{{ substr($user->nis, 0, 4) }}-{{ substr($user->nis, 4) }}-01</div>
        
        <div class="card-footer">
            <div>Berlaku s/d Juni 2025 • Gerbang RFID Aktif</div>
            <div class="rfid-icon"><i class="fa-solid fa-volume-high"></i></div>
        </div>
        
        <button class="btn-show-qr">
            <i class="fa-solid fa-qrcode"></i> Tampilkan Barcode & QR Masuk Kilat
        </button>
    </div>

    <!-- Literacy Level -->
    <div class="level-card">
        <div class="level-header">
            <div class="medal-icon"><i class="fa-solid fa-award"></i></div>
            <div style="flex: 1;">
                <div class="level-title">PERINGKAT LITERASI</div>
                <div class="level-name">Level {{ $user->level }} • {{ $user->level_name }}</div>
            </div>
            <div class="top-badge">
                Top<br><span style="font-size: 1rem;">2%</span>
            </div>
        </div>
        
        @php
            $percentage = ($user->xp / $user->max_xp) * 100;
            $xp_left = $user->max_xp - $user->xp;
        @endphp
        <div class="xp-info">
            <span>{{ number_format($user->xp, 0, ',', '.') }} / {{ number_format($user->max_xp, 0, ',', '.') }} XP</span>
            <span style="color: var(--primary);">+{{ $xp_left }} XP ke Level {{ $user->level + 1 }}</span>
        </div>
        <div class="xp-bar-bg">
            <div class="xp-bar-fill" style="width: {{ $percentage }}%;"></div>
        </div>
    </div>

    <!-- Streak -->
    <div class="streak-card">
        <div class="streak-fire"><i class="fa-solid fa-fire"></i></div>
        <div class="streak-info">
            <div class="streak-title">{{ $user->streak }} Hari<br>Streak Membaca!</div>
            <div class="streak-desc">Target harian 20 menit terpenuhi</div>
        </div>
        <div class="days-row">
            <div class="day-circle done">S</div>
            <div class="day-circle done">S</div>
            <div class="day-circle done">R</div>
            <div class="day-circle done">K</div>
            <div class="day-circle today">J</div>
            <div class="day-circle">S</div>
            <div class="day-circle">M</div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="small-stats">
        <div class="small-stat-card">
            <div class="small-stat-icon bg-green-light"><i class="fa-solid fa-book-open"></i></div>
            <div>
                <div class="small-stat-val">{{ $user->books_read }}</div>
                <div class="small-stat-label">Buku Selesai</div>
            </div>
        </div>
        
        <div class="small-stat-card">
            <div class="small-stat-icon bg-purple-light"><i class="fa-regular fa-clock"></i></div>
            <div>
                <div class="small-stat-val">{{ $user->total_hours_read }} Jam</div>
                <div class="small-stat-label">Total Membaca</div>
            </div>
        </div>

        <div class="small-stat-card">
            <div class="small-stat-icon bg-yellow-light"><i class="fa-solid fa-star"></i></div>
            <div>
                <div class="small-stat-val">4.9 / 5</div>
                <div class="small-stat-label">Rating Ulasan</div>
            </div>
        </div>

        <div class="small-stat-card">
            <div class="small-stat-icon bg-red-light"><i class="fa-solid fa-heart"></i></div>
            <div>
                <div class="small-stat-val">12 Item</div>
                <div class="small-stat-label">Koleksi Favorit</div>
            </div>
        </div>
    </div>

    <div class="section-title">
        Lencana Prestasi <i class="fa-solid fa-gem" style="color: #fbbf24; font-size: 1rem;"></i>
    </div>
    
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qrBtn = document.querySelector('.btn-show-qr');
        if(qrBtn) {
            qrBtn.addEventListener('click', function() {
                alert('Menampilkan Barcode & QR Code Digital Anda...');
            });
        }
        
        const actionBtns = document.querySelectorAll('.action-btn');
        actionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Membuka menu pengaturan...');
            });
        });
    });
</script>
@endpush
@endsection
