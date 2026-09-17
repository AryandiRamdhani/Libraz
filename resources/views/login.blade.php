@extends('layout')
@section('title', 'Login - Libraz')

@php
    $hideHeader = true;
    $hideNav = true;
@endphp

@push('styles')
<style>
    .login-container {
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    /* Top Banner */
    .top-banner {
        background: linear-gradient(135deg, #e0f2fe 0%, #ede9fe 100%);
        border-radius: var(--radius-lg);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .top-banner .icon-box {
        width: 48px;
        height: 48px;
        background: var(--primary);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        box-shadow: 0 4px 12px rgba(89, 22, 242, 0.4);
    }
    
    /* Tabs */
    .tab-container {
        display: flex;
        background: white;
        border-radius: var(--radius-md);
        padding: 4px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .tab-btn {
        flex: 1;
        text-align: center;
        padding: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 8px;
        color: var(--text-muted);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: 0.3s;
    }
    .tab-btn.active {
        background: #f4f2ff;
        color: var(--primary);
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    
    /* Role Switcher */
    .role-switcher {
        display: flex;
        align-items: center;
        background: white;
        padding: 8px 12px;
        border-radius: var(--radius-md);
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: var(--shadow-sm);
        gap: 12px;
    }
    .role-toggles {
        display: flex;
        background: #f3f4f6;
        border-radius: 20px;
        padding: 4px;
        flex: 1;
    }
    .role-toggle {
        flex: 1;
        text-align: center;
        padding: 6px 12px;
        border-radius: 16px;
        color: var(--text-muted);
    }
    .role-toggle.active {
        background: var(--primary);
        color: white;
    }

    /* Scanner Card */
    .scanner-card {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        border-radius: var(--radius-xl);
        padding: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .scanner-badge {
        background: #34d399;
        color: #064e3b;
        font-size: 0.7rem;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 12px;
    }
    
    .scanner-box {
        background: rgba(0,0,0,0.3);
        border-radius: 12px;
        padding: 24px 16px;
        margin-top: 20px;
        position: relative;
        text-align: center;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .scanner-corners {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        pointer-events: none;
    }
    .corner {
        position: absolute;
        width: 20px; height: 20px;
        border: 2px solid #34d399;
        border-radius: 4px;
    }
    .corner.tl { top: 16px; left: 16px; border-right: none; border-bottom: none; }
    .corner.tr { top: 16px; right: 16px; border-left: none; border-bottom: none; }
    .corner.bl { bottom: 16px; left: 16px; border-right: none; border-top: none; }
    .corner.br { bottom: 16px; right: 16px; border-left: none; border-top: none; }
    
    .scan-line {
        position: absolute;
        left: 10%; right: 10%;
        height: 2px;
        background: #34d399;
        box-shadow: 0 0 10px #34d399;
        top: 30%;
        animation: scanAnim 2s infinite ease-in-out alternate;
    }

    @keyframes scanAnim {
        0% { top: 20%; opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { top: 80%; opacity: 0; }
    }

    .qr-icon {
        font-size: 2rem;
        opacity: 0.5;
        margin-bottom: 8px;
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: var(--text-muted);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .divider::before, .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid var(--border-color);
    }
    .divider:not(:empty)::before { margin-right: .25em; }
    .divider:not(:empty)::after { margin-left: .25em; }

    /* Inputs */
    .input-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .input-label {
        font-size: 0.85rem;
        font-weight: 700;
        display: flex;
        justify-content: space-between;
    }
    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    .input-icon {
        position: absolute;
        left: 16px;
        color: var(--text-muted);
    }
    .input-field {
        width: 100%;
        padding: 14px 16px 14px 44px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        background: #f9fafb;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
    }
    .input-field:focus {
        border-color: var(--primary);
        background: white;
    }
    .input-right-icon {
        position: absolute;
        right: 16px;
        color: var(--primary);
        font-size: 1.2rem;
    }

    /* Footer Stats */
    .footer-stats {
        display: flex;
        align-items: center;
        background: white;
        padding: 12px;
        border-radius: var(--radius-md);
        gap: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    }
    .avatar-group {
        display: flex;
    }
    .avatar-group img {
        width: 28px; height: 28px;
        border-radius: 50%;
        border: 2px solid white;
        margin-left: -10px;
    }
    .avatar-group img:first-child { margin-left: 0; }

    /* Interactive Scanner Card */
    .scanner-card {
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        user-select: none;
    }
    .scanner-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
    }
    .scanner-card:active {
        transform: scale(0.98);
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
    #qr-reader__scan_region {
        background: transparent !important;
    }
    #qr-reader__dashboard {
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
<div class="login-container">
    <!-- Top Banner -->
    <div class="top-banner">
        <div class="icon-box">
            <i class="fa-solid fa-bolt"></i>
        </div>
        <div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <h1 class="text-xl font-bold text-primary" style="margin: 0; letter-spacing: 1px;">BiblioZ</h1>
                <span style="background: #22c55e; color: white; font-size: 0.6rem; padding: 2px 6px; border-radius: 8px; font-weight: bold;">v2.4</span>
            </div>
            <p class="text-sm text-muted" style="margin: 4px 0 0 0;">Level up your reading game ⚡ 📚</p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tab-container">
        <div class="tab-btn active" id="tab-masuk">
            <i class="fa-solid fa-right-to-bracket"></i> Masuk Akun
        </div>
        <div class="tab-btn" id="tab-daftar">
            <i class="fa-solid fa-user-plus"></i> Daftar Baru
        </div>
    </div>

    <!-- Role Switcher -->
    <div class="role-switcher">
        <div style="display: flex; align-items: center; gap: 6px;">
            <i class="fa-solid fa-id-card-clip text-primary"></i> Masuk Sebagai:
        </div>
        <div class="role-toggles">
            <div class="role-toggle active">Siswa / Siswi</div>
            <div class="role-toggle">Pendidik</div>
        </div>
    </div>

    <!-- Scanner Card -->
    <div class="scanner-card">
        <div style="position: absolute; top: 16px; right: 16px; background: rgba(255,255,255,0.2); width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
            <i class="fa-solid fa-qrcode"></i>
        </div>
        
        <div class="scanner-badge">
            <i class="fa-solid fa-bolt"></i> FAST PASS
        </div>
        <h2 class="text-lg font-bold" style="margin-bottom: 4px;">Scan Kartu Pelajar</h2>
        <p style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 0;">Otomatis deteksi Barcode / QR ID<br>Perpustakaan kamu.</p>
        
        <div class="scanner-box">
            <div class="scanner-corners">
                <div class="corner tl"></div>
                <div class="corner tr"></div>
                <div class="corner bl"></div>
                <div class="corner br"></div>
            </div>
            <div class="scan-line"></div>
            <div class="qr-icon"><i class="fa-solid fa-qrcode"></i></div>
            <p style="font-size: 0.65rem; font-weight: 800; letter-spacing: 0.5px; color: #34d399; margin: 0;">KETUK UNTUK BUKA KAMERA</p>
        </div>
    </div>

    <div class="divider">ATAU MANUAL ID</div>

    <!-- Login Form -->
    <form id="login-form" action="{{ route('login.post') }}" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
        @csrf
        
        @if (session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 600;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any() && !old('is_register'))
            <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 600;">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <div class="input-group">
            <div class="input-label">
                <span>Nomor Induk Siswa (NIS)</span>
                <span class="text-primary text-xs" style="cursor: pointer;"><i class="fa-regular fa-circle-question"></i> Cek NIS Online</span>
            </div>
            <div class="input-wrapper">
                <i class="fa-solid fa-id-card input-icon"></i>
                <input type="text" name="nis" class="input-field" placeholder="Contoh: 2024108827" value="{{ old('nis', '2024108827') }}">
                <i class="fa-solid fa-barcode input-right-icon"></i>
            </div>
        </div>

        <div class="input-group">
            <div class="input-label">
                <span>Kata Sandi / PIN</span>
                <span class="text-primary text-xs" style="cursor: pointer;">Lupa PIN?</span>
            </div>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="password" class="input-field password-login" placeholder="••••••••" value="password123">
                <i class="fa-regular fa-eye eye-login input-right-icon" style="color: var(--text-muted); cursor: pointer; pointer-events: auto;"></i>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--text-muted);">
                <input type="checkbox" checked style="accent-color: var(--primary); width: 16px; height: 16px;">
                Ingat perangkat ini di perpustakaan
            </label>
            <div style="color: #059669; font-weight: 600; display: flex; align-items: center; gap: 4px;">
                <i class="fa-solid fa-shield-halved"></i> Aman
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px; font-size: 1rem; border-radius: 16px; margin-top: 8px;">
            Masuk ke Perpustakaan &nbsp; <i class="fa-solid fa-arrow-right"></i>
        </button>
    </form>

    <!-- Register Form -->
    <form id="register-form" action="{{ route('register.post') }}" method="POST" style="display: none; flex-direction: column; gap: 16px;">
        @csrf
        <input type="hidden" name="is_register" value="1">
        
        @if ($errors->any() && old('is_register'))
            <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 600;">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <div class="input-group">
            <div class="input-label"><span>Nama Lengkap</span></div>
            <div class="input-wrapper">
                <i class="fa-solid fa-user input-icon"></i>
                <input type="text" name="name" class="input-field" placeholder="Nama Anda" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-label"><span>Nomor Induk Siswa (NIS)</span></div>
            <div class="input-wrapper">
                <i class="fa-solid fa-id-card input-icon"></i>
                <input type="text" name="nis" class="input-field" placeholder="Contoh: 2024108827" value="{{ old('nis') }}" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-label"><span>Asal Sekolah</span></div>
            <div class="input-wrapper">
                <i class="fa-solid fa-building-columns input-icon"></i>
                <input type="text" name="school_name" class="input-field" placeholder="Contoh: SMAN 1 GARUDAPURA" value="{{ old('school_name') }}" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-label"><span>Kata Sandi / PIN</span></div>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="password" class="input-field password-register" placeholder="Minimal 6 karakter" required>
                <i class="fa-regular fa-eye eye-register input-right-icon" style="color: var(--text-muted); cursor: pointer; pointer-events: auto;"></i>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px; font-size: 1rem; border-radius: 16px; margin-top: 8px;">
            Daftar Akun Baru &nbsp; <i class="fa-solid fa-user-plus"></i>
        </button>
    </form>

    <!-- Footer Stats -->
    <div class="footer-stats">
        <div class="avatar-group">
            <img src="https://i.pravatar.cc/100?img=1" alt="Student">
            <img src="https://i.pravatar.cc/100?img=2" alt="Student">
            <img src="https://i.pravatar.cc/100?img=3" alt="Student">
        </div>
        <div style="flex: 1;">
            <div class="text-xs font-bold">1,240+ Siswa Membaca Hari Ini</div>
            <div class="text-xs text-muted">Bergabung dengan teman-temanmu!</div>
        </div>
        <div style="color: #10b981; font-size: 1.2rem;">
            <i class="fa-solid fa-chart-line"></i>
        </div>
    </div>

    <!-- Scanner Modal -->
    <div id="qr-modal" class="scanner-modal-backdrop" style="display: none;">
        <div class="scanner-modal-card">
            <div class="scanner-modal-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="modal-icon-badge"><i class="fa-solid fa-qrcode"></i></div>
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin: 0; color: #1e1b4b;">Fast Pass Scanner</h3>
                        <p style="font-size: 0.72rem; color: #6b7280; margin: 0;">Arahkan kamera ke QR / Barcode kartu</p>
                    </div>
                </div>
                <button type="button" id="btn-close-scanner" class="modal-close-btn">&times;</button>
            </div>

            <div class="scanner-viewport-wrapper">
                <div id="qr-reader" class="qr-reader-box"></div>
                <div class="scanner-target-frame">
                    <div class="target-corner target-tl"></div>
                    <div class="target-corner target-tr"></div>
                    <div class="target-corner target-bl"></div>
                    <div class="target-corner target-br"></div>
                    <div class="laser-scanner"></div>
                </div>
            </div>

            <div id="scanner-status" class="scanner-status-text">
                <i class="fa-solid fa-circle-notch fa-spin"></i> Menyiapkan kamera...
            </div>

            <div id="scanner-alert" class="scanner-alert-box" style="display: none;"></div>

            <div class="scanner-modal-actions">
                <button type="button" id="btn-switch-camera" class="scanner-action-btn">
                    <i class="fa-solid fa-camera-rotate"></i> Ganti Kamera
                </button>
                <label class="scanner-action-btn" style="cursor: pointer; margin: 0;">
                    <i class="fa-solid fa-image"></i> Unggah Gambar
                    <input type="file" id="qr-file-input" accept="image/*" style="display: none;">
                </label>
                <button type="button" id="btn-demo-scan" class="scanner-action-btn demo-btn" title="Uji coba Fast Pass tanpa kamera">
                    <i class="fa-solid fa-bolt"></i> Coba Demo (Nadia)
                </button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Forms & Tabs
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const tabMasuk = document.getElementById('tab-masuk');
        const tabDaftar = document.getElementById('tab-daftar');
        const scannerCard = document.querySelector('.scanner-card');
        const divider = document.querySelector('.divider');

        // Check if there was an error in register form previously
        const isRegister = "{{ old('is_register') }}";
        if(isRegister) {
            switchToRegister();
        }

        tabMasuk.addEventListener('click', () => {
            tabMasuk.classList.add('active');
            tabDaftar.classList.remove('active');
            loginForm.style.display = 'flex';
            registerForm.style.display = 'none';
            scannerCard.style.display = 'block';
            divider.style.display = 'flex';
        });

        tabDaftar.addEventListener('click', switchToRegister);

        function switchToRegister() {
            tabDaftar.classList.add('active');
            tabMasuk.classList.remove('active');
            registerForm.style.display = 'flex';
            loginForm.style.display = 'none';
            scannerCard.style.display = 'none';
            divider.style.display = 'none';
        }

        // Role Switcher
        const roles = document.querySelectorAll('.role-toggle');
        roles.forEach(role => {
            role.addEventListener('click', () => {
                roles.forEach(r => r.classList.remove('active'));
                role.classList.add('active');
            });
        });

        // Password Toggle Login
        const eyeLogin = document.querySelector('.eye-login');
        const passLogin = document.querySelector('.password-login');
        if(eyeLogin && passLogin) {
            eyeLogin.addEventListener('click', () => {
                if(passLogin.type === 'password') {
                    passLogin.type = 'text';
                    eyeLogin.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passLogin.type = 'password';
                    eyeLogin.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }

        // Password Toggle Register
        const eyeReg = document.querySelector('.eye-register');
        const passReg = document.querySelector('.password-register');
        if(eyeReg && passReg) {
            eyeReg.addEventListener('click', () => {
                if(passReg.type === 'password') {
                    passReg.type = 'text';
                    eyeReg.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passReg.type = 'password';
                    eyeReg.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }

        // ================= QR SCANNER FAST PASS LOGIC =================
        const qrModal = document.getElementById('qr-modal');
        const btnCloseScanner = document.getElementById('btn-close-scanner');
        const scannerStatus = document.getElementById('scanner-status');
        const scannerAlert = document.getElementById('scanner-alert');
        const btnSwitchCamera = document.getElementById('btn-switch-camera');
        const qrFileInput = document.getElementById('qr-file-input');
        const btnDemoScan = document.getElementById('btn-demo-scan');
        const nisInputField = document.querySelector('input[name="nis"]');

        let html5QrCode = null;
        let isScannerRunning = false;
        let currentFacingMode = "environment";
        let isProcessingScan = false;

        // Sound Feedback on Scan Success
        function playSuccessSound() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(750, ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(1200, ctx.currentTime + 0.12);
                gain.gain.setValueAtTime(0.2, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.15);
                osc.start();
                osc.stop(ctx.currentTime + 0.15);
            } catch (e) {
                console.warn('Audio context error:', e);
            }
        }

        // Open Scanner
        scannerCard.addEventListener('click', function() {
            openScanner();
        });

        function openScanner() {
            qrModal.style.display = 'flex';
            scannerAlert.style.display = 'none';
            scannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Menghubungkan ke kamera...';
            isProcessingScan = false;

            if (typeof Html5Qrcode === 'undefined') {
                scannerStatus.innerHTML = '<span style="color:#ef4444;"><i class="fa-solid fa-triangle-exclamation"></i> Library QR Scanner sedang dimuat...</span>';
                return;
            }

            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("qr-reader");
            }

            startCamera(currentFacingMode);
        }

        function startCamera(facingMode) {
            const config = {
                fps: 10,
                qrbox: { width: 220, height: 220 },
                aspectRatio: 1.0
            };

            html5QrCode.start(
                { facingMode: facingMode },
                config,
                onScanSuccess,
                onScanFailure
            ).then(() => {
                isScannerRunning = true;
                scannerStatus.innerHTML = '<i class="fa-solid fa-video" style="color: #22d3a3;"></i> Kamera aktif. Arahkan ke barcode / QR ID.';
            }).catch(err => {
                console.warn("Camera start error:", err);
                isScannerRunning = false;
                scannerStatus.innerHTML = '<span style="color:#f59e0b;"><i class="fa-solid fa-camera-slash"></i> Kamera tidak aktif/diizinkan. Coba ganti kamera atau gunakan tombol demo.</span>';
            });
        }

        function stopCamera() {
            if (html5QrCode && isScannerRunning) {
                html5QrCode.stop().then(() => {
                    isScannerRunning = false;
                }).catch(err => {
                    console.warn("Error stopping scanner:", err);
                });
            }
        }

        function closeScannerModal() {
            stopCamera();
            qrModal.style.display = 'none';
            isProcessingScan = false;
        }

        btnCloseScanner.addEventListener('click', closeScannerModal);
        qrModal.addEventListener('click', function(e) {
            if (e.target === qrModal) {
                closeScannerModal();
            }
        });

        // Switch Camera (Front/Back)
        btnSwitchCamera.addEventListener('click', function() {
            if (html5QrCode && isScannerRunning) {
                currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
                html5QrCode.stop().then(() => {
                    isScannerRunning = false;
                    scannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Berganti kamera...';
                    startCamera(currentFacingMode);
                }).catch(err => console.error(err));
            } else {
                currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
                startCamera(currentFacingMode);
            }
        });

        // Upload QR Image
        qrFileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("qr-reader");
            }

            scannerStatus.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Memindai file gambar...';

            html5QrCode.scanFile(file, true)
                .then(decodedText => {
                    onScanSuccess(decodedText);
                })
                .catch(err => {
                    showAlert('Tidak dapat menemukan QR Code atau Barcode pada gambar.', false);
                    scannerStatus.innerHTML = '<span style="color:#ef4444;"><i class="fa-solid fa-circle-xmark"></i> Barcode tidak terbaca di gambar.</span>';
                });
        });

        // Demo Scan (Nadia's ID)
        btnDemoScan.addEventListener('click', function() {
            scannerStatus.innerHTML = '<i class="fa-solid fa-bolt" style="color: #6366f1;"></i> Mensimulasikan scan kartu Nadia...';
            onScanSuccess("2024108827");
        });

        // Scan Callbacks
        function onScanSuccess(decodedText) {
            if (isProcessingScan) return;
            isProcessingScan = true;

            playSuccessSound();
            stopCamera();

            scannerStatus.innerHTML = '<i class="fa-solid fa-circle-check" style="color: #22c55e;"></i> Berhasil terbaca: <b>' + decodedText + '</b>';
            showAlert('Memverifikasi kartu pelajar ke server...', true);

            // Also fill the NIS input in case user switches to manual
            if (nisInputField) {
                let cleanNis = decodedText;
                if(decodedText.includes('BZ-')) {
                    const parts = decodedText.split('-');
                    if(parts.length >= 3) cleanNis = parts[1] + parts[2];
                }
                nisInputField.value = cleanNis;
            }

            // Post to backend
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

            fetch("{{ route('login.qr') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ qr_data: decodedText })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showAlert('✨ ' + data.message + ' Mengalihkan...', true);
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 800);
                } else {
                    showAlert(data.message || 'Kartu tidak valid.', false);
                    isProcessingScan = false;
                    scannerStatus.innerHTML = '<span style="color:#ef4444;"><i class="fa-solid fa-circle-xmark"></i> Kartu ditolak.</span>';
                }
            })
            .catch(err => {
                console.error("Login QR error:", err);
                showAlert('Terjadi gangguan saat menghubungi server perpustakaan.', false);
                isProcessingScan = false;
            });
        }

        function onScanFailure(error) {
            // Continuously scanning, ignore normal per-frame misses
        }

        function showAlert(msg, isSuccess) {
            scannerAlert.style.display = 'block';
            scannerAlert.className = 'scanner-alert-box ' + (isSuccess ? 'scanner-alert-success' : 'scanner-alert-danger');
            scannerAlert.innerHTML = (isSuccess ? '<i class="fa-solid fa-circle-check"></i> ' : '<i class="fa-solid fa-circle-exclamation"></i> ') + msg;
        }
    });
</script>
@endpush
@endsection
