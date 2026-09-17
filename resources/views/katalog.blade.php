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

    <!-- Katalog Scanner Modal -->
    <div id="katalog-scanner-modal" class="scanner-modal-backdrop" style="display: none;">
        <div class="scanner-modal-card">
            <div class="scanner-modal-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="modal-icon-badge"><i class="fa-solid fa-barcode"></i></div>
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin: 0; color: #1e1b4b;">Cari Buku via Barcode</h3>
                        <p style="font-size: 0.72rem; color: #6b7280; margin: 0;">Scan barcode ISBN atau punggung buku</p>
                    </div>
                </div>
                <button type="button" id="btn-close-katalog-scanner" class="modal-close-btn">&times;</button>
            </div>

            <div class="scanner-viewport-wrapper">
                <div id="katalog-qr-reader" class="qr-reader-box"></div>
                <div class="scanner-target-frame">
                    <div class="target-corner target-tl"></div>
                    <div class="target-corner target-tr"></div>
                    <div class="target-corner target-bl"></div>
                    <div class="target-corner target-br"></div>
                    <div class="laser-scanner"></div>
                </div>
            </div>

            <div id="katalog-scanner-status" class="scanner-status-text">
                <i class="fa-solid fa-circle-notch fa-spin"></i> Menyiapkan kamera...
            </div>

            <div id="katalog-scanner-alert" class="scanner-alert-box" style="display: none;"></div>

            <div class="scanner-modal-actions">
                <button type="button" id="btn-switch-katalog-camera" class="scanner-action-btn">
                    <i class="fa-solid fa-camera-rotate"></i> Ganti Kamera
                </button>
                <label class="scanner-action-btn" style="cursor: pointer; margin: 0;">
                    <i class="fa-solid fa-image"></i> Unggah Gambar
                    <input type="file" id="katalog-file-input" accept="image/*" style="display: none;">
                </label>
                <button type="button" id="btn-demo-katalog-scan" class="scanner-action-btn demo-btn" title="Cari buku Kimia Dasar">
                    <i class="fa-solid fa-bolt"></i> Test Scan (Kimia)
                </button>
            </div>
        </div>
    </div>

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

        // Search & Filter
        const searchInput = document.querySelector('.search-input');
        const bookCards = document.querySelectorAll('.book-card');
        const displayCountBadge = document.querySelector('.section-title-wrap span');

        function filterBooks(query) {
            const term = (query || '').toLowerCase().trim();
            let count = 0;
            bookCards.forEach(card => {
                const title = card.querySelector('.book-title')?.textContent.toLowerCase() || '';
                const author = card.querySelector('.book-author')?.textContent.toLowerCase() || '';
                const cat = card.querySelector('.book-category')?.textContent.toLowerCase() || '';
                if(term === '' || title.includes(term) || author.includes(term) || cat.includes(term)) {
                    card.style.display = 'block';
                    count++;
                } else {
                    card.style.display = 'none';
                }
            });
            if(displayCountBadge) {
                displayCountBadge.textContent = count + ' Menampilkan';
            }
        }

        if(searchInput) {
            searchInput.addEventListener('input', function() {
                filterBooks(this.value);
            });
        }

        // Filter Chips
        const chips = document.querySelectorAll('.chip');
        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
                const text = chip.textContent.replace('🔥', '').trim();
                if(text === 'Paling Hype') {
                    filterBooks('');
                } else {
                    filterBooks(text);
                }
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

        // ================= BARCODE SEARCH SCANNER =================
        const searchQrBtn = document.querySelector('.search-qr-btn');
        const katalogScannerModal = document.getElementById('katalog-scanner-modal');
        const btnCloseKatalogScanner = document.getElementById('btn-close-katalog-scanner');
        const katalogScannerStatus = document.getElementById('katalog-scanner-status');
        const katalogScannerAlert = document.getElementById('katalog-scanner-alert');
        const btnSwitchKatalogCamera = document.getElementById('btn-switch-katalog-camera');
        const katalogFileInput = document.getElementById('katalog-file-input');
        const btnDemoKatalogScan = document.getElementById('btn-demo-katalog-scan');

        let katalogScanner = null;
        let isKatalogScannerRunning = false;
        let katalogFacingMode = "environment";
        let isProcessingKatalogScan = false;

        function playBeep() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(800, ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(1200, ctx.currentTime + 0.12);
                gain.gain.setValueAtTime(0.2, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.15);
                osc.start();
                osc.stop(ctx.currentTime + 0.15);
            } catch (e) {}
        }

        if (searchQrBtn) {
            searchQrBtn.addEventListener('click', function(e) {
                e.preventDefault();
                openKatalogScanner();
            });
        }

        function openKatalogScanner() {
            katalogScannerModal.style.display = 'flex';
            katalogScannerAlert.style.display = 'none';
            katalogScannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Menghubungkan kamera...';
            isProcessingKatalogScan = false;

            if (typeof Html5Qrcode === 'undefined') {
                katalogScannerStatus.innerHTML = '<span style="color:#ef4444;"><i class="fa-solid fa-triangle-exclamation"></i> Library Scanner sedang dimuat...</span>';
                return;
            }

            if (!katalogScanner) {
                katalogScanner = new Html5Qrcode("katalog-qr-reader");
            }

            startKatalogCamera(katalogFacingMode);
        }

        function startKatalogCamera(facingMode) {
            const config = {
                fps: 10,
                qrbox: { width: 240, height: 160 },
                aspectRatio: 1.0
            };

            katalogScanner.start(
                { facingMode: facingMode },
                config,
                onKatalogScanSuccess,
                onKatalogScanFailure
            ).then(() => {
                isKatalogScannerRunning = true;
                katalogScannerStatus.innerHTML = '<i class="fa-solid fa-video" style="color: #22d3a3;"></i> Kamera aktif. Arahkan ke barcode buku.';
            }).catch(err => {
                console.warn("Camera start error:", err);
                isKatalogScannerRunning = false;
                katalogScannerStatus.innerHTML = '<span style="color:#f59e0b;"><i class="fa-solid fa-camera-slash"></i> Kamera tidak aktif. Gunakan tombol demo di bawah.</span>';
            });
        }

        function stopKatalogCamera() {
            if (katalogScanner && isKatalogScannerRunning) {
                katalogScanner.stop().then(() => {
                    isKatalogScannerRunning = false;
                }).catch(err => console.warn(err));
            }
        }

        function closeKatalogScannerModal() {
            stopKatalogCamera();
            katalogScannerModal.style.display = 'none';
            isProcessingKatalogScan = false;
        }

        if (btnCloseKatalogScanner) btnCloseKatalogScanner.addEventListener('click', closeKatalogScannerModal);
        if (katalogScannerModal) {
            katalogScannerModal.addEventListener('click', (e) => {
                if(e.target === katalogScannerModal) closeKatalogScannerModal();
            });
        }

        if (btnSwitchKatalogCamera) {
            btnSwitchKatalogCamera.addEventListener('click', () => {
                katalogFacingMode = (katalogFacingMode === "environment") ? "user" : "environment";
                if (katalogScanner && isKatalogScannerRunning) {
                    katalogScanner.stop().then(() => {
                        isKatalogScannerRunning = false;
                        startKatalogCamera(katalogFacingMode);
                    });
                } else {
                    startKatalogCamera(katalogFacingMode);
                }
            });
        }

        if (katalogFileInput) {
            katalogFileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;
                if (!katalogScanner) katalogScanner = new Html5Qrcode("katalog-qr-reader");

                katalogScannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Memindai file...';
                katalogScanner.scanFile(file, true)
                    .then(code => onKatalogScanSuccess(code))
                    .catch(() => {
                        showKatalogAlert('Barcode tidak terbaca.', false);
                    });
            });
        }

        if (btnDemoKatalogScan) {
            btnDemoKatalogScan.addEventListener('click', () => {
                katalogScannerStatus.innerHTML = '<i class="fa-solid fa-bolt" style="color: #6366f1;"></i> Memindai buku "Kimia"...';
                onKatalogScanSuccess("Kimia");
            });
        }

        function onKatalogScanSuccess(decodedText) {
            if (isProcessingKatalogScan) return;
            isProcessingKatalogScan = true;

            playBeep();
            stopKatalogCamera();

            showKatalogAlert('Barcode berhasil dibaca: ' + decodedText, true);

            setTimeout(() => {
                closeKatalogScannerModal();
                if (searchInput) {
                    searchInput.value = decodedText;
                    filterBooks(decodedText);
                    searchInput.scrollIntoView({ behavior: 'smooth' });
                }
            }, 600);
        }

        function onKatalogScanFailure(err) {}

        function showKatalogAlert(msg, isSuccess) {
            katalogScannerAlert.style.display = 'block';
            katalogScannerAlert.className = 'scanner-alert-box ' + (isSuccess ? 'scanner-alert-success' : 'scanner-alert-danger');
            katalogScannerAlert.innerHTML = (isSuccess ? '<i class="fa-solid fa-circle-check"></i> ' : '<i class="fa-solid fa-circle-exclamation"></i> ') + msg;
        }
    });
</script>
@endpush
@endsection
