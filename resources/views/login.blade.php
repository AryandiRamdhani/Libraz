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
                <h1 class="text-xl font-bold text-primary" style="margin: 0; letter-spacing: 1px;">LIBRAZ</h1>
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
    });
</script>
@endpush
@endsection
