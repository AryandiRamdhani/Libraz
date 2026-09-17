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

    /* Scanner Modal */
    .scanner-modal-backdrop {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 16px;
    }
    .scanner-modal-card {
        background: #ffffff;
        width: 100%;
        max-width: 400px;
        border-radius: 24px;
        padding: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
        display: flex;
        flex-direction: column;
        gap: 14px;
        animation: modalPop 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }
    @keyframes modalPop {
        from { opacity: 0; transform: scale(0.92) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .scanner-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .modal-icon-badge {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #e0e7ff;
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }
    .modal-close-btn {
        background: #f1f5f9;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #64748b;
        transition: all 0.15s;
    }
    .modal-close-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
    }
    .scanner-viewport-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        max-height: 270px;
        background: #090d16;
        border-radius: 18px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .qr-reader-box {
        width: 100% !important;
        height: 100% !important;
        border: none !important;
    }
    .qr-reader-box video {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }
    #book-qr-reader__scan_region {
        background: transparent !important;
    }
    #book-qr-reader__dashboard {
        display: none !important;
    }
    .scanner-target-frame {
        position: absolute;
        top: 15%;
        left: 15%;
        right: 15%;
        bottom: 15%;
        pointer-events: none;
        box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.4);
        border-radius: 12px;
    }
    .target-corner {
        position: absolute;
        width: 20px;
        height: 20px;
        border-color: #22d3a3;
        border-style: solid;
    }
    .target-tl { top: -2px; left: -2px; border-width: 3px 0 0 3px; border-top-left-radius: 8px; }
    .target-tr { top: -2px; right: -2px; border-width: 3px 3px 0 0; border-top-right-radius: 8px; }
    .target-bl { bottom: -2px; left: -2px; border-width: 0 0 3px 3px; border-bottom-left-radius: 8px; }
    .target-br { bottom: -2px; right: -2px; border-width: 0 3px 3px 0; border-bottom-right-radius: 8px; }
    .laser-scanner {
        position: absolute;
        left: 5%;
        right: 5%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #22d3a3, #38bdf8, #22d3a3, transparent);
        box-shadow: 0 0 12px #22d3a3, 0 0 6px #38bdf8;
        animation: laserPulse 1.8s infinite ease-in-out alternate;
    }
    @keyframes laserPulse {
        0% { top: 5%; opacity: 0.2; }
        50% { opacity: 1; }
        100% { top: 95%; opacity: 0.2; }
    }
    .scanner-status-text {
        font-size: 0.78rem;
        color: #64748b;
        text-align: center;
        font-weight: 600;
        min-height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .scanner-alert-box {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 10px 14px;
        border-radius: 10px;
        text-align: center;
    }
    .scanner-alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }
    .scanner-alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }
    .scanner-modal-actions {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 8px;
    }
    .scanner-action-btn {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 8px 6px;
        font-size: 0.72rem;
        font-weight: 600;
        color: #334155;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        cursor: pointer;
        transition: all 0.15s;
    }
    .scanner-action-btn:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
    .scanner-action-btn.demo-btn {
        background: #f5f3ff;
        border-color: #ddd6fe;
        color: #6d28d9;
    }
    .scanner-action-btn.demo-btn:hover {
        background: #ede9fe;
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
        
        <button id="btn-scan-book" class="btn btn-primary w-full" style="padding: 14px; border-radius: 12px; font-size: 1rem; cursor: pointer;">
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

    <!-- Book Scanner Modal -->
    <div id="book-scanner-modal" class="scanner-modal-backdrop" style="display: none;">
        <div class="scanner-modal-card">
            <div class="scanner-modal-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="modal-icon-badge"><i class="fa-solid fa-barcode"></i></div>
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin: 0; color: #1e1b4b;">Scan Barcode Buku</h3>
                        <p style="font-size: 0.72rem; color: #6b7280; margin: 0;">Arahkan kamera ke label barcode di punggung buku</p>
                    </div>
                </div>
                <button type="button" id="btn-close-book-scanner" class="modal-close-btn">&times;</button>
            </div>

            <div class="scanner-viewport-wrapper">
                <div id="book-qr-reader" class="qr-reader-box"></div>
                <div class="scanner-target-frame">
                    <div class="target-corner target-tl"></div>
                    <div class="target-corner target-tr"></div>
                    <div class="target-corner target-bl"></div>
                    <div class="target-corner target-br"></div>
                    <div class="laser-scanner"></div>
                </div>
            </div>

            <div id="book-scanner-status" class="scanner-status-text">
                <i class="fa-solid fa-circle-notch fa-spin"></i> Menyiapkan kamera...
            </div>

            <div id="book-scanner-alert" class="scanner-alert-box" style="display: none;"></div>

            <div class="scanner-modal-actions">
                <button type="button" id="btn-switch-book-camera" class="scanner-action-btn">
                    <i class="fa-solid fa-camera-rotate"></i> Ganti Kamera
                </button>
                <label class="scanner-action-btn" style="cursor: pointer; margin: 0;">
                    <i class="fa-solid fa-image"></i> Unggah Barcode
                    <input type="file" id="book-file-input" accept="image/*" style="display: none;">
                </label>
                <button type="button" id="btn-demo-book-scan" class="scanner-action-btn demo-btn" title="Coba pinjam buku Fisika Kuantum">
                    <i class="fa-solid fa-bolt"></i> Test Scan Buku
                </button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Exclude scan button and modal buttons from generic alert
        const buttons = document.querySelectorAll('.btn-renew, .fine-btn');
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Memproses permintaan Anda...');
            });
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

        // ================= BOOK SCANNER LOGIC =================
        const btnScanBook = document.getElementById('btn-scan-book');
        const bookScannerModal = document.getElementById('book-scanner-modal');
        const btnCloseBookScanner = document.getElementById('btn-close-book-scanner');
        const bookScannerStatus = document.getElementById('book-scanner-status');
        const bookScannerAlert = document.getElementById('book-scanner-alert');
        const btnSwitchBookCamera = document.getElementById('btn-switch-book-camera');
        const bookFileInput = document.getElementById('book-file-input');
        const btnDemoBookScan = document.getElementById('btn-demo-book-scan');

        let bookQrScanner = null;
        let isBookScannerRunning = false;
        let bookFacingMode = "environment";
        let isProcessingBookScan = false;

        function playBeep() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(880, ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(1320, ctx.currentTime + 0.12);
                gain.gain.setValueAtTime(0.2, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.15);
                osc.start();
                osc.stop(ctx.currentTime + 0.15);
            } catch (e) {}
        }

        if (btnScanBook) {
            btnScanBook.addEventListener('click', function() {
                openBookScanner();
            });
        }

        function openBookScanner() {
            bookScannerModal.style.display = 'flex';
            bookScannerAlert.style.display = 'none';
            bookScannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Membuka kamera pemindai...';
            isProcessingBookScan = false;

            if (typeof Html5Qrcode === 'undefined') {
                bookScannerStatus.innerHTML = '<span style="color:#ef4444;"><i class="fa-solid fa-triangle-exclamation"></i> Library Scanner sedang dimuat...</span>';
                return;
            }

            if (!bookQrScanner) {
                bookQrScanner = new Html5Qrcode("book-qr-reader");
            }

            startBookCamera(bookFacingMode);
        }

        function startBookCamera(facingMode) {
            const config = {
                fps: 10,
                qrbox: { width: 250, height: 160 },
                aspectRatio: 1.0
            };

            bookQrScanner.start(
                { facingMode: facingMode },
                config,
                onBookScanSuccess,
                onBookScanFailure
            ).then(() => {
                isBookScannerRunning = true;
                bookScannerStatus.innerHTML = '<i class="fa-solid fa-video" style="color: #22d3a3;"></i> Kamera aktif. Dekatkan barcode buku ke garis pemindai.';
            }).catch(err => {
                console.warn("Camera start error:", err);
                isBookScannerRunning = false;
                bookScannerStatus.innerHTML = '<span style="color:#f59e0b;"><i class="fa-solid fa-camera-slash"></i> Izin kamera diperlukan. Gunakan tombol demo di bawah jika di PC.</span>';
            });
        }

        function stopBookCamera() {
            if (bookQrScanner && isBookScannerRunning) {
                bookQrScanner.stop().then(() => {
                    isBookScannerRunning = false;
                }).catch(err => console.warn(err));
            }
        }

        function closeBookScannerModal() {
            stopBookCamera();
            bookScannerModal.style.display = 'none';
            isProcessingBookScan = false;
        }

        if (btnCloseBookScanner) btnCloseBookScanner.addEventListener('click', closeBookScannerModal);
        if (bookScannerModal) {
            bookScannerModal.addEventListener('click', (e) => {
                if(e.target === bookScannerModal) closeBookScannerModal();
            });
        }

        if (btnSwitchBookCamera) {
            btnSwitchBookCamera.addEventListener('click', () => {
                bookFacingMode = (bookFacingMode === "environment") ? "user" : "environment";
                if (bookQrScanner && isBookScannerRunning) {
                    bookQrScanner.stop().then(() => {
                        isBookScannerRunning = false;
                        startBookCamera(bookFacingMode);
                    });
                } else {
                    startBookCamera(bookFacingMode);
                }
            });
        }

        if (bookFileInput) {
            bookFileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;
                if (!bookQrScanner) bookQrScanner = new Html5Qrcode("book-qr-reader");

                bookScannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Membaca barcode dari gambar...';
                bookQrScanner.scanFile(file, true)
                    .then(code => onBookScanSuccess(code))
                    .catch(() => {
                        showBookAlert('Barcode buku tidak terbaca dari foto.', false);
                    });
            });
        }

        if (btnDemoBookScan) {
            btnDemoBookScan.addEventListener('click', () => {
                bookScannerStatus.innerHTML = '<i class="fa-solid fa-bolt" style="color: #6366f1;"></i> Memindai buku "Fisika Kuantum Populer"...';
                onBookScanSuccess("1"); // ID 1 is Fisika Kuantum Populer
            });
        }

        function onBookScanSuccess(decodedText) {
            if (isProcessingBookScan) return;
            isProcessingBookScan = true;

            playBeep();
            stopBookCamera();

            bookScannerStatus.innerHTML = '<i class="fa-solid fa-circle-check" style="color: #22c55e;"></i> Barcode terdeteksi: <b>' + decodedText + '</b>';
            showBookAlert('Memproses peminjaman mandiri...', true);

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

            fetch("{{ route('sirkulasi.scan') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ code: decodedText, action: 'borrow' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showBookAlert('🎉 ' + data.message + ' (Tenggat: ' + data.due_date + ')', true);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
                } else {
                    showBookAlert(data.message || 'Peminjaman tidak dapat diproses.', false);
                    isProcessingBookScan = false;
                }
            })
            .catch(err => {
                console.error("Book scan error:", err);
                showBookAlert('Gagal menghubungi sistem sirkulasi perpus.', false);
                isProcessingBookScan = false;
            });
        }

        function onBookScanFailure(err) {}

        function showBookAlert(msg, isSuccess) {
            bookScannerAlert.style.display = 'block';
            bookScannerAlert.className = 'scanner-alert-box ' + (isSuccess ? 'scanner-alert-success' : 'scanner-alert-danger');
            bookScannerAlert.innerHTML = (isSuccess ? '<i class="fa-solid fa-circle-check"></i> ' : '<i class="fa-solid fa-circle-exclamation"></i> ') + msg;
        }
    });
</script>
@endpush
@endsection
