@extends('layout')
@section('title', 'Sirkulasi - Libraz')
@section('page_title', 'Sirkulasi Peminjaman')

@push('styles')
<style>
    .sirkulasi-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Quota Card */
    .quota-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
    }
    .quota-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }
    .quota-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .quota-icon {
        background: #ede9fe;
        color: var(--primary);
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem;
    }
    .quota-text {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .quota-value {
        font-size: 1.2rem;
        font-weight: 800;
    }
    .quota-count {
        background: #f4f2ff;
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 16px;
        font-weight: 800;
        font-size: 0.9rem;
    }
    
    .progress-bar-container {
        display: flex;
        gap: 4px;
        margin-bottom: 8px;
    }
    .progress-segment {
        height: 8px;
        flex: 1;
        background: #e5e7eb;
        border-radius: 4px;
    }
    .progress-segment.filled {
        background: var(--primary);
    }
    
    .quota-info {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 20px;
    }

    /* Section Title */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }
    .section-title {
        font-size: 1.15rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .badge-count {
        background: var(--primary);
        color: white;
        width: 20px; height: 20px;
        border-radius: 50%;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 0.75rem;
    }
    .sort-btn {
        background: #f3f4f6;
        border: none;
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--text-muted);
        display: flex; align-items: center; gap: 6px;
        cursor: pointer;
    }

    /* Active Borrow Cards */
    .borrow-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .borrow-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .rack-badge {
        background: #f3f4f6;
        color: var(--text-muted);
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 6px;
    }
    .status-pill {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 12px;
        display: flex; align-items: center; gap: 4px;
    }
    .pill-safe { background: #dcfce7; color: #166534; }
    .pill-danger { background: #fee2e2; color: #991b1b; }
    
    .borrow-body {
        display: flex;
        gap: 16px;
    }
    .book-cover {
        width: 70px;
        height: 105px;
        border-radius: 6px;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .book-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .book-title {
        font-size: 1.05rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 4px;
    }
    .book-author {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-bottom: 12px;
    }
    .due-date {
        font-size: 0.8rem;
        font-weight: 600;
        display: flex; align-items: center; gap: 6px;
    }
    .due-date.danger { color: #dc2626; }
    
    /* Actions */
    .borrow-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f9fafb;
        padding: 10px 12px;
        border-radius: 12px;
        margin-top: 4px;
    }
    .renew-info {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-muted);
        display: flex; align-items: center; gap: 4px;
    }
    .btn-renew {
        background: #34d399;
        color: #064e3b;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex; align-items: center; gap: 6px;
    }

    /* Fine Card */
    .fine-card {
        background: #9f1239; /* Dark red */
        color: white;
        border-radius: 12px;
        padding: 16px;
        margin-top: 4px;
        position: relative;
        overflow: hidden;
    }
    .fine-header {
        display: flex;
        justify-content: space-between;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        opacity: 0.9;
        margin-bottom: 8px;
    }
    .fine-amount {
        font-size: 1.6rem;
        font-weight: 800;
    }
    .fine-btn {
        background: white;
        color: #9f1239;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 800;
        display: inline-flex; align-items: center; gap: 6px;
    }
    
    .fine-footer {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 12px;
    }

</style>
@endpush

@section('content')
<div class="sirkulasi-container">
    
    <!-- Quota -->
    <div class="quota-card">
        <div class="quota-header">
            <div class="quota-title">
                <div class="quota-icon"><i class="fa-solid fa-book-journal-whills"></i></div>
                <div>
                    <div class="quota-text">STATUS AKUN SISWA</div>
                    <div class="quota-value">Kuota Peminjaman</div>
                </div>
            </div>
            <div class="quota-count">3 / 5 Buku</div>
        </div>
        
        <div class="progress-bar-container">
            <div class="progress-segment filled"></div>
            <div class="progress-segment filled"></div>
            <div class="progress-segment filled"></div>
            <div class="progress-segment"></div>
            <div class="progress-segment"></div>
        </div>
        
        <div class="quota-info">
            <span>Sisa kapasitas: 2 buku lagi</span>
            <span style="color: #059669;">Maksimal 14 hari/pinjam</span>
        </div>
        
        <button class="btn btn-primary w-full" style="padding: 14px; border-radius: 12px; font-size: 1rem;">
            <i class="fa-solid fa-expand"></i> &nbsp; Scan Barcode Buku Mandiri
        </button>
        <p class="text-center text-muted" style="font-size: 0.7rem; margin-top: 12px; margin-bottom: 0;">
            Dekatkan kamera ke label barcode di punggung buku<br>untuk self-checkout
        </p>
    </div>

    <!-- Title -->
    <div class="section-header">
        <div class="section-title">
            Peminjaman Aktif <span class="badge-count">{{ count($borrowings) }}</span>
        </div>
        <button class="sort-btn">
            <i class="fa-solid fa-arrow-down-wide-short"></i> URUT: TENGGAT
        </button>
    </div>

    @foreach($borrowings as $borrow)
    @php
        $isLate = \Carbon\Carbon::now()->startOfDay()->gt($borrow->due_date);
        $daysDiff = \Carbon\Carbon::now()->startOfDay()->diffInDays($borrow->due_date);
    @endphp
    
    <div class="borrow-card" @if($isLate) style="border-color: #fca5a5;" @endif>
        <div class="borrow-header">
            <span class="rack-badge">{{ $borrow->book->rack }}</span>
            @if($isLate)
                <span class="status-pill pill-danger"><i class="fa-solid fa-triangle-exclamation"></i> Terlambat {{ $daysDiff }} Hari</span>
            @else
                <span class="status-pill pill-safe"><span style="width: 6px; height: 6px; background: #166534; border-radius: 50%;"></span> Tenggat {{ $daysDiff }} Hari Lagi</span>
            @endif
        </div>
        <div class="borrow-body">
            <img src="{{ $borrow->book->cover_image_url }}" alt="{{ $borrow->book->title }}" class="book-cover">
            <div class="book-details">
                <div class="book-title">{{ $borrow->book->title }}</div>
                <div class="book-author">{{ $borrow->book->author }}</div>
                <div class="due-date @if($isLate) danger @endif">
                    @if($isLate)
                        <i class="fa-regular fa-calendar-xmark"></i> Jatuh tempo: <b>{{ $borrow->due_date->format('d M Y') }}</b>
                    @else
                        <i class="fa-regular fa-calendar"></i> Batas kembali: <b>{{ $borrow->due_date->format('d M Y') }}</b>
                    @endif
                </div>
            </div>
        </div>
        
        @if($isLate)
        <div class="fine-card">
            <div class="fine-header">
                <span>KALKULASI DENDA BERJALAN</span>
                <span>Rp 1.000 / hari</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <div style="font-size: 0.75rem; margin-bottom: 2px;">Total Denda ({{ $daysDiff }} hari)</div>
                    <div class="fine-amount">Rp {{ number_format($borrow->fine_amount, 0, ',', '.') }}</div>
                </div>
                <button class="fine-btn"><i class="fa-solid fa-qrcode"></i> Bayar via QRIS</button>
            </div>
        </div>
        
        <div class="fine-footer">
            <span style="color: #991b1b; display: flex; align-items: center; gap: 4px;"><i class="fa-solid fa-lock"></i> Perpanjangan dinonaktifkan</span>
            <span style="color: var(--primary); font-weight: 700; cursor: pointer;">Drop Box 24 Jam <i class="fa-solid fa-arrow-right"></i></span>
        </div>
        @else
        <div class="borrow-actions">
            <div class="renew-info">
                <i class="fa-regular fa-circle-check" style="color: #059669;"></i> Sisa kuota renew: {{ 1 - $borrow->renew_count }}x
            </div>
            <button class="btn-renew">
                <i class="fa-solid fa-rotate-right"></i> Perpanjang 7 Hari
            </button>
        </div>
        @endif
    </div>
    @endforeach

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mock buttons
        const buttons = document.querySelectorAll('button, .fine-btn');
        buttons.forEach(btn => {
            if(!btn.classList.contains('sort-btn')) {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    alert('Memproses permintaan Anda...');
                });
            }
        });
        
        const sortBtn = document.querySelector('.sort-btn');
        if(sortBtn) {
            sortBtn.addEventListener('click', function() {
                if(this.innerHTML.includes('TENGGAT')) {
                    this.innerHTML = '<i class="fa-solid fa-arrow-down-a-z"></i> URUT: NAMA';
                } else {
                    this.innerHTML = '<i class="fa-solid fa-arrow-down-wide-short"></i> URUT: TENGGAT';
                }
            });
        }
    });
</script>
@endpush
@endsection
