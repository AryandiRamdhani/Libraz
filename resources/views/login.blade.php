<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Login - Libraz</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;family=Space+Grotesk:wght@700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com"></script>
<script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-primary-fixed": "#1e0060", "on-primary-fixed-variant": "#4c00d3", "surface-container-highest": "#e5e1e8", "on-error": "#ffffff", "on-error-container": "#93000a", "surface-container": "#f1ecf4", "surface-container-high": "#ebe6ee", "on-tertiary-fixed": "#40000f", "on-secondary-fixed": "#002112", "secondary-fixed": "#4dffb2", "on-tertiary": "#ffffff", "on-surface": "#1c1b20", "surface-variant": "#e5e1e8", "surface-container-low": "#f7f2f9", "on-primary-container": "#cfc1ff", "on-surface-variant": "#484456", "background": "#fdf8ff", "inverse-primary": "#ccbeff", "inverse-on-surface": "#f4eff6", "tertiary-container": "#ac0036", "error-container": "#ffdad6", "primary": "#4300bb", "on-secondary-container": "#007149", "surface-tint": "#6531f0", "secondary-fixed-dim": "#00e296", "secondary": "#006c46", "surface-dim": "#ddd8e0", "tertiary-fixed-dim": "#ffb2b8", "tertiary-fixed": "#ffdadb", "on-background": "#1c1b20", "secondary-container": "#43fcae", "tertiary": "#800026", "inverse-surface": "#313035", "primary-fixed-dim": "#ccbeff", "primary-fixed": "#e7deff", "on-secondary": "#ffffff", "error": "#ba1a1a", "surface-container-lowest": "#ffffff", "primary-container": "#5b21e6", "surface": "#fdf8ff", "outline": "#797488", "surface-bright": "#fdf8ff", "on-secondary-fixed-variant": "#005234", "on-primary": "#ffffff", "on-tertiary-fixed-variant": "#91002c", "outline-variant": "#cac3d9", "on-tertiary-container": "#ffb7bc" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "space-xs": "0.25rem", "gutter-sm": "0.75rem", "space-lg": "1.25rem", "margin": "1.25rem", "gutter": "1rem", "margin-desktop": "2.5rem", "space-md": "0.875rem", "space-sm": "0.5rem", "space-xl": "2rem" }, "fontFamily": { "title-md": ["Plus Jakarta Sans"], "headline-lg-mobile": ["Plus Jakarta Sans"], "headline-md": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "body-sm": ["Plus Jakarta Sans"], "label-sm": ["Space Grotesk"], "headline-sm": ["Plus Jakarta Sans"], "headline-lg": ["Plus Jakarta Sans"], "label-lg": ["Space Grotesk"], "body-lg": ["Plus Jakarta Sans"], "body-md": ["Plus Jakarta Sans"], "label-md": ["Space Grotesk"] }, "fontSize": { "title-md": ["16px", {"lineHeight": "22px", "fontWeight": "700"}], "headline-lg-mobile": ["26px", {"lineHeight": "32px", "fontWeight": "800"}], "headline-md": ["22px", {"lineHeight": "28px", "fontWeight": "700"}], "display-lg": ["38px", {"lineHeight": "44px", "fontWeight": "800"}], "body-sm": ["12px", {"lineHeight": "18px", "fontWeight": "400"}], "label-sm": ["10px", {"lineHeight": "12px", "fontWeight": "700"}], "headline-sm": ["18px", {"lineHeight": "24px", "fontWeight": "700"}], "headline-lg": ["30px", {"lineHeight": "36px", "fontWeight": "800"}], "label-lg": ["13px", {"lineHeight": "16px", "fontWeight": "700"}], "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "500"}], "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}], "label-md": ["11px", {"lineHeight": "14px", "fontWeight": "700"}] } } } }</script>
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<style>
@layer base{html,body{width:100vw;margin:0;padding:0;}body{overscroll-behavior:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}
body { min-height: max(884px, 100dvh); }
/* Scanner Modal CSS */
.scanner-modal-backdrop { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); display: flex; align-items: center; justify-content: center; z-index: 9999; padding: 16px; }
.scanner-modal-card { background: #ffffff; width: 100%; max-width: 400px; border-radius: 24px; padding: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35); display: flex; flex-direction: column; gap: 14px; animation: modalPop 0.25s cubic-bezier(0.16, 1, 0.3, 1); position: relative; }
@keyframes modalPop { from { opacity: 0; transform: scale(0.92) translateY(10px); } to { opacity: 1; transform: scale(1) translateY(0); } }
.scanner-modal-header { display: flex; justify-content: space-between; align-items: center; }
.modal-icon-badge { width: 36px; height: 36px; border-radius: 10px; background: #e0e7ff; color: #4f46e5; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; }
.modal-close-btn { background: #f1f5f9; border: none; width: 34px; height: 34px; border-radius: 50%; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #64748b; transition: all 0.15s; }
.modal-close-btn:hover { background: #e2e8f0; color: #0f172a; }
.scanner-viewport-wrapper { position: relative; width: 100%; aspect-ratio: 1 / 1; max-height: 270px; background: #090d16; border-radius: 18px; overflow: hidden; display: flex; align-items: center; justify-content: center; }
.qr-reader-box { width: 100% !important; height: 100% !important; border: none !important; }
.qr-reader-box video { width: 100% !important; height: 100% !important; object-fit: cover !important; }
#qr-reader__scan_region { background: transparent !important; }
#qr-reader__dashboard { display: none !important; }
.scanner-target-frame { position: absolute; top: 15%; left: 15%; right: 15%; bottom: 15%; pointer-events: none; box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.4); border-radius: 12px; }
.target-corner { position: absolute; width: 20px; height: 20px; border-color: #22d3a3; border-style: solid; }
.target-tl { top: -2px; left: -2px; border-width: 3px 0 0 3px; border-top-left-radius: 8px; }
.target-tr { top: -2px; right: -2px; border-width: 3px 3px 0 0; border-top-right-radius: 8px; }
.target-bl { bottom: -2px; left: -2px; border-width: 0 0 3px 3px; border-bottom-left-radius: 8px; }
.target-br { bottom: -2px; right: -2px; border-width: 0 3px 3px 0; border-bottom-right-radius: 8px; }
.laser-scanner { position: absolute; left: 5%; right: 5%; height: 3px; background: linear-gradient(90deg, transparent, #22d3a3, #38bdf8, #22d3a3, transparent); box-shadow: 0 0 12px #22d3a3, 0 0 6px #38bdf8; animation: laserPulse 1.8s infinite ease-in-out alternate; }
@keyframes laserPulse { 0% { top: 5%; opacity: 0.2; } 50% { opacity: 1; } 100% { top: 95%; opacity: 0.2; } }
.scanner-status-text { font-size: 0.78rem; color: #64748b; text-align: center; font-weight: 600; min-height: 20px; display: flex; align-items: center; justify-content: center; gap: 6px; }
.scanner-alert-box { font-size: 0.8rem; font-weight: 600; padding: 10px 14px; border-radius: 10px; text-align: center; }
.scanner-alert-danger { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
.scanner-alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
.scanner-modal-actions { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; }
.scanner-action-btn { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 8px 6px; font-size: 0.72rem; font-weight: 600; color: #334155; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px; cursor: pointer; transition: all 0.15s; }
.scanner-action-btn:hover { background: #f1f5f9; border-color: #cbd5e1; }
.scanner-action-btn.demo-btn { background: #f5f3ff; border-color: #ddd6fe; color: #6d28d9; }
.scanner-action-btn.demo-btn:hover { background: #ede9fe; }
</style>
</head>
<body class="bg-background font-body-md text-body-md text-on-surface pt-safe pb-safe flex flex-col min-h-screen">
<main class="flex flex-col relative w-full bg-surface min-h-screen">
<div class="flex flex-col w-full px-margin pb-space-xl">
<!-- Brand Mascot & Top Intro Banner -->
<div class="relative w-full overflow-hidden rounded-xl bg-surface-container-low p-space-lg shadow-sm mt-space-sm mb-space-lg">
<div class="absolute -right-6 -bottom-6 w-32 h-32 bg-primary/10 rounded-full blur-2xl pointer-events-none"></div>
<div class="absolute -left-6 -top-6 w-28 h-28 bg-secondary-container/20 rounded-full blur-xl pointer-events-none"></div>
<div class="relative flex items-center justify-between">
<div class="flex items-center gap-space-md">
<div class="w-14 h-14 rounded-xl bg-primary-container flex items-center justify-center shadow-md relative overflow-hidden flex-shrink-0">
<svg class="w-9 h-9 text-secondary-fixed" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M10 38V12C10 9.8 11.8 8 14 8H34C36.2 8 38 9.8 38 12V38" stroke="currentColor" stroke-linecap="round" stroke-width="3"></path>
<path d="M6 40C6 38.9 6.9 38 8 38H40C41.1 38 42 38.9 42 40C42 41.1 41.1 42 40 42H8C6.9 42 6 41.1 6 40Z" fill="currentColor"></path>
<path d="M20 18L16 26H23L20 34L32 22H24L28 18H20Z" fill="#FDF8FF"></path>
</svg>
</div>
<div>
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm text-primary tracking-tight">LIBRAZ</span>
<span class="inline-flex items-center px-1.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm">v2.4</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
            Level up your reading game <span>⚡📚</span>
</p>
</div>
</div>
<div class="hidden sm:flex flex-col items-end">
<span class="inline-flex items-center gap-1 text-secondary font-label-md text-label-md">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-ping"></span> Live Library
        </span>
</div>
</div>
</div>
<!-- Segmented Tab Navigation: Masuk vs Daftar -->
<div class="w-full bg-surface-container rounded-xl p-1.5 flex gap-1 mb-space-lg shadow-sm">
<button class="flex-1 py-2.5 rounded-lg font-title-md text-title-md bg-surface-container-lowest text-primary shadow-sm flex items-center justify-center gap-1.5 transition-all" id="tab-login" type="button">
<span class="material-symbols-outlined text-[18px]">login</span>
<span>Masuk Akun</span>
</button>
<button class="flex-1 py-2.5 rounded-lg font-title-md text-title-md text-on-surface-variant hover:text-on-surface flex items-center justify-center gap-1.5 transition-all" id="tab-register" type="button">
<span class="material-symbols-outlined text-[18px]">person_add</span>
<span>Daftar Baru</span>
</button>
</div>
<!-- Identity Pill Toggle (Role Switcher) -->
<div class="flex items-center justify-between bg-surface-container-low rounded-xl px-space-md py-space-sm mb-space-lg shadow-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">badge</span>
<span class="font-label-lg text-label-lg text-on-surface">Masuk Sebagai:</span>
</div>
<div class="inline-flex bg-surface-container-high rounded-full p-1 shadow-inner" role="group">
<button class="px-3.5 py-1 rounded-full font-label-md text-label-md bg-primary-container text-surface-container-lowest shadow-sm transition-all" id="role-student" type="button">
        Siswa / Siswi
      </button>
<button class="px-3.5 py-1 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" id="role-teacher" type="button">
        Pendidik
      </button>
</div>
</div>
<!-- Interactive Quick Scan Feature Card -->
<div class="relative w-full rounded-xl bg-gradient-to-br from-primary via-primary-container to-surface-tint p-space-lg text-surface-container-lowest shadow-md overflow-hidden mb-space-lg group">
<div class="absolute -right-8 -top-8 w-36 h-36 bg-secondary-fixed/20 rounded-full blur-xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm mb-1.5">
<span class="material-symbols-outlined text-[14px]">bolt</span> FAST PASS
          </span>
<h3 class="font-headline-sm text-headline-sm text-on-primary font-bold">Scan Kartu Pelajar</h3>
<p class="font-body-sm text-body-sm text-on-primary-container">Otomatis deteksi Barcode / QR ID Perpustakaan kamu.</p>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest/15 flex items-center justify-center backdrop-blur-md">
<span class="material-symbols-outlined text-secondary-container text-2xl">document_scanner</span>
</div>
</div>
<!-- Viewfinder Visual Simulation -->
<div class="w-full bg-on-background/40 backdrop-blur-md rounded-xl p-space-md flex flex-col items-center justify-center relative overflow-hidden cursor-pointer transition-all hover:bg-on-background/50" id="scanner-box" onclick="openScanner()">
<div class="w-full h-24 rounded-lg flex items-center justify-center relative overflow-hidden bg-surface-container-lowest/5">
<!-- Laser Beam Scan Animation -->
<div class="absolute left-0 right-0 h-1 bg-secondary-container shadow-[0_0_12px_#43fcae] animate-[bounce_2s_infinite]"></div>
<!-- Crosshair corners -->
<div class="absolute top-2 left-2 w-4 h-4 border-t-2 border-l-2 border-secondary-fixed rounded-tl"></div>
<div class="absolute top-2 right-2 w-4 h-4 border-t-2 border-r-2 border-secondary-fixed rounded-tr"></div>
<div class="absolute bottom-2 left-2 w-4 h-4 border-b-2 border-l-2 border-secondary-fixed rounded-bl"></div>
<div class="absolute bottom-2 right-2 w-4 h-4 border-b-2 border-r-2 border-secondary-fixed rounded-br"></div>
<div class="flex flex-col items-center gap-1">
<span class="material-symbols-outlined text-surface-container-lowest/80 text-3xl">qr_code_scanner</span>
<span class="font-label-sm text-label-sm text-secondary-fixed tracking-wider uppercase">Ketuk untuk Buka Kamera</span>
</div>
</div>
</div>
</div>
</div>
<!-- Divider with subtle text -->
<div class="relative flex items-center justify-center my-space-xs mb-space-lg">
<div class="w-full h-[1px] bg-surface-container-highest"></div>
<span class="absolute bg-surface px-space-md font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Atau Manual ID</span>
</div>
<!-- Authentication Form -->
<form class="flex flex-col gap-space-md" id="auth-form" method="POST" action="{{ route('login.post') }}">
@csrf
<input type="hidden" name="is_register" id="is-register" value="0">
<!-- Dummy school name for registration -->
<input type="hidden" name="school_name" value="Asal Sekolah Default">

@if (session('success'))
<div class="p-3 text-sm rounded-lg" style="background-color: #dcfce7; color: #166534; display: flex; align-items: center; gap: 8px;">
    <span class="material-symbols-outlined text-[18px]">check_circle</span>
    {{ session('success') }}
</div>
@endif
@if ($errors->any())
<div class="p-3 text-sm rounded-lg" style="background-color: #fee2e2; color: #991b1b; display: flex; align-items: center; gap: 8px;">
    <span class="material-symbols-outlined text-[18px]">error</span>
    {{ $errors->first() }}
</div>
@endif

<!-- Identifier Input -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-lg text-label-lg text-on-surface" for="input-identifier" id="label-identifier">
          Nomor Induk Siswa (NIS)
        </label>
<span class="font-label-sm text-label-sm text-primary flex items-center gap-0.5 cursor-pointer">
<span class="material-symbols-outlined text-[13px]">help</span> Cek NIS Online
        </span>
</div>
<div class="relative flex items-center">
<div class="absolute left-3.5 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">badge</span>
</div>
<input class="w-full pl-11 pr-11 py-3 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary shadow-sm transition-all" id="input-identifier" name="nis" inputmode="numeric" placeholder="Contoh: 2024108827" type="text" value="{{ old('nis') }}" required/>
<button class="absolute right-2.5 p-1 rounded-lg hover:bg-surface-container text-primary flex items-center justify-center transition-colors" title="Scan Barcode Kartu" type="button" onclick="openScanner()">
<span class="material-symbols-outlined text-[22px]">barcode_scanner</span>
</button>
</div>
</div>
<!-- Register-only Field: Nama Lengkap (Hidden by default for login) -->
<div class="hidden flex flex-col gap-1.5" id="register-field-name">
<label class="font-label-lg text-label-lg text-on-surface" for="input-fullname">Nama Lengkap Siswa</label>
<div class="relative flex items-center">
<div class="absolute left-3.5 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">person</span>
</div>
<input class="w-full pl-11 pr-4 py-3 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary shadow-sm transition-all" id="input-fullname" name="name" placeholder="Sesuai Akun Dapodik Sekolah" type="text" value="{{ old('name') }}"/>
</div>
</div>
<!-- Password Input -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<label class="font-label-lg text-label-lg text-on-surface" for="input-password">Kata Sandi / PIN</label>
<a class="font-label-sm text-label-sm text-primary hover:underline" href="#forgot">Lupa PIN?</a>
</div>
<div class="relative flex items-center">
<div class="absolute left-3.5 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">lock</span>
</div>
<input class="w-full pl-11 pr-11 py-3 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline/60 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary shadow-sm transition-all" id="input-password" name="password" placeholder="••••••••" type="password" required/>
<button class="absolute right-2.5 p-1 rounded-lg text-on-surface-variant hover:text-on-surface transition-colors" id="toggle-password" type="button">
<span class="material-symbols-outlined text-[20px]" id="pwd-icon">visibility</span>
</button>
</div>
</div>
<!-- Quick Remember Device Toggle -->
<div class="flex items-center justify-between py-1">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="w-4 h-4 rounded bg-surface-container-high text-primary accent-primary focus:ring-0" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant select-none">Ingat perangkat ini di perpustakaan</span>
</label>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-secondary">
<span class="material-symbols-outlined text-[14px]">verified_user</span> Aman
      </span>
</div>
<!-- Primary Action Button -->
<button class="w-full mt-space-xs py-3.5 px-space-lg rounded-xl bg-primary-container text-surface-container-lowest font-title-md text-title-md flex items-center justify-center gap-2 shadow-md hover:opacity-95 active:scale-[0.99] transition-all cursor-pointer" id="submit-button" type="submit">
<span>Masuk ke Perpustakaan</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<!-- Community Activity Preview Pill -->
<div class="mt-space-lg p-space-md rounded-xl bg-surface-container-low flex items-center gap-space-md shadow-sm">
<div class="flex -space-x-2 overflow-hidden flex-shrink-0">
<div class="inline-block h-8 w-8 rounded-full ring-2 ring-surface bg-surface-container-high overflow-hidden">
<img class="h-full w-full object-cover" data-alt="Close up portrait photo of a stylish Gen Z high school student with modern haircut smiling indoors at library with warm ambient light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQzfXmgZSTT16nVgs3zYXeYFVha9UtuO6mX1hp7qvhhOE-vbSoydlwo4BCgdzp3ZKFcieM5LTvOfAx5ISVcxV6G0hl60BOgu0dTdELJcm-1l3q_ZsrRd1WG0ZKWs_AecZL1Lr1gBfh6q6YkdrsfmxhpTd2kJOXSdRLzzIb1E-JZH11c0T97_DAmIu35gv3626jGzMSnSlwuwW1JyiQAcIvmJmMDNw_qh38HyvwEuyrZparVJygqW2n"/>
</div>
<div class="inline-block h-8 w-8 rounded-full ring-2 ring-surface bg-surface-container-high overflow-hidden">
<img class="h-full w-full object-cover" data-alt="Portrait photo of a young female Asian student wearing glasses and school uniform studying cheerfully in library corridor" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2RqW51uX5zJB5LScJQkH85XQGijKWR_BxMeEuKwwQbqOIxnYClK75RTjKc19CI5y2SaD4bfchJcn6TOos3eXNpTAV154WWDRToiIh9C2EvOUjl-iR_JmJxOHVlXLpBLNeCS-wvYLLgq8ZIT-JvsfkYy0sckAjtYlDAHfqESDEGAwSYO7icd651lzi_qfLGE178w159UiOVhmm_1vFLyqKoSsPCVGVhXoRvQOymBq72nnIyA8aKjve"/>
</div>
<div class="inline-block h-8 w-8 rounded-full ring-2 ring-surface bg-surface-container-high overflow-hidden">
<img class="h-full w-full object-cover" data-alt="Portrait of an energetic young Indonesian student reader holding a graphic novel book in modern vibrant library setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCz4SRpw0ZNtsVJIRijssDVH5Ibim9YSI1K_l44QUsStj1MlpSCbSFjAkUBYvsz_oyHo1cS797dibFgBg1iWEiAchwESpB3Mg46DTkdA4IjaIbH5zVQqWdSvRJZR3ADy3Gt8TRtWnRFU8AaLTw1hgojSatls8VOIBo0ZM_siDtLtbrKUBvX2T18M-8hil8YyHZULVxaUG6clDEyyuV3WJDA1HmLVTYZZa8eMHuubbtGZmINMC-t-xQj"/>
</div>
</div>
<div class="min-w-0 flex-1">
<p class="font-label-md text-label-md text-on-surface truncate">1,240+ Siswa Membaca Hari Ini</p>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Trending: "Atomic Habits", "Filosofi Teras"</p>
</div>
<div class="flex items-center text-secondary">
<span class="material-symbols-outlined text-[18px]">trending_up</span>
</div>
</div>
<!-- Social Proof & Security Badges -->
<div class="mt-space-lg flex flex-col gap-2.5">
<div class="flex items-center gap-2 px-space-md py-2.5 rounded-lg bg-surface-container text-on-surface-variant">
<span class="material-symbols-outlined text-secondary text-[20px]">sync_saved_locally</span>
<span class="font-body-sm text-body-sm leading-tight">
        Terhubung otomatis dengan <strong>Dapodik Kemendikbud</strong> &amp; sistem absensi pintar sekolah.
      </span>
</div>
<!-- Help & Support Desk Link -->
<div class="flex items-center justify-center gap-1 pt-space-xs text-center">
<span class="font-body-sm text-body-sm text-on-surface-variant">Butuh bantuan akun?</span>
<button class="font-title-md text-title-md text-primary hover:underline flex items-center gap-0.5" type="button">
<span>Hubungi Pustakawan</span>
<span class="material-symbols-outlined text-[16px]">support_agent</span>
</button>
</div>
</div>
</div>

<!-- Scanner Modal -->
<div id="qr-modal" class="scanner-modal-backdrop" style="display: none;">
    <div class="scanner-modal-card">
        <div class="scanner-modal-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="modal-icon-badge"><span class="material-symbols-outlined">qr_code_scanner</span></div>
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
            <span class="material-symbols-outlined animate-spin text-[16px]">autorenew</span> Menyiapkan kamera...
        </div>

        <div id="scanner-alert" class="scanner-alert-box" style="display: none;"></div>

        <div class="scanner-modal-actions">
            <button type="button" id="btn-switch-camera" class="scanner-action-btn">
                <span class="material-symbols-outlined text-[18px]">flip_camera_ios</span> Ganti Kamera
            </button>
            <label class="scanner-action-btn" style="cursor: pointer; margin: 0;">
                <span class="material-symbols-outlined text-[18px]">image</span> Unggah Gambar
                <input type="file" id="qr-file-input" accept="image/*" style="display: none;">
            </label>
            <button type="button" id="btn-demo-scan" class="scanner-action-btn demo-btn" title="Uji coba Fast Pass tanpa kamera">
                <span class="material-symbols-outlined text-[18px]">bolt</span> Coba Demo (Nadia)
            </button>
        </div>
    </div>
</div>
<script>
  (function() {
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const registerField = document.getElementById('register-field-name');
    const submitBtn = document.getElementById('submit-button');
    const roleStudent = document.getElementById('role-student');
    const roleTeacher = document.getElementById('role-teacher');
    const labelIdentifier = document.getElementById('label-identifier');
    const inputIdentifier = document.getElementById('input-identifier');
    const togglePwd = document.getElementById('toggle-password');
    const inputPwd = document.getElementById('input-password');
    const pwdIcon = document.getElementById('pwd-icon');
    const authForm = document.getElementById('auth-form');
    const isRegisterInput = document.getElementById('is-register');
    const inputFullname = document.getElementById('input-fullname');

    let currentMode = 'login';
    let currentRole = 'student';

    // Route URLs
    const loginUrl = "{{ route('login.post') }}";
    const registerUrl = "{{ route('register.post') }}";

    // Auto switch if there was an error in register mode
    const oldIsRegister = "{{ old('is_register') }}";
    if (oldIsRegister === "1") {
      switchToRegister();
    }

    function switchToLogin() {
      if (currentMode === 'login') return;
      currentMode = 'login';
      tabLogin.className = 'flex-1 py-2.5 rounded-lg font-title-md text-title-md bg-surface-container-lowest text-primary shadow-sm flex items-center justify-center gap-1.5 transition-all';
      tabRegister.className = 'flex-1 py-2.5 rounded-lg font-title-md text-title-md text-on-surface-variant hover:text-on-surface flex items-center justify-center gap-1.5 transition-all';
      registerField.classList.add('hidden');
      inputFullname.removeAttribute('required');
      submitBtn.querySelector('span:first-child').textContent = 'Masuk ke Perpustakaan';
      authForm.action = loginUrl;
      isRegisterInput.value = "0";
    }

    function switchToRegister() {
      if (currentMode === 'register') return;
      currentMode = 'register';
      tabRegister.className = 'flex-1 py-2.5 rounded-lg font-title-md text-title-md bg-surface-container-lowest text-primary shadow-sm flex items-center justify-center gap-1.5 transition-all';
      tabLogin.className = 'flex-1 py-2.5 rounded-lg font-title-md text-title-md text-on-surface-variant hover:text-on-surface flex items-center justify-center gap-1.5 transition-all';
      registerField.classList.remove('hidden');
      inputFullname.setAttribute('required', 'required');
      submitBtn.querySelector('span:first-child').textContent = 'Aktivasi Akun Baru';
      authForm.action = registerUrl;
      isRegisterInput.value = "1";
    }

    // Tab Switcher
    tabLogin.addEventListener('click', switchToLogin);
    tabRegister.addEventListener('click', switchToRegister);

    // Role Switcher
    roleStudent.addEventListener('click', () => {
      if (currentRole === 'student') return;
      currentRole = 'student';
      roleStudent.className = 'px-3.5 py-1 rounded-full font-label-md text-label-md bg-primary-container text-surface-container-lowest shadow-sm transition-all';
      roleTeacher.className = 'px-3.5 py-1 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all';
      labelIdentifier.textContent = 'Nomor Induk Siswa (NIS)';
      inputIdentifier.placeholder = 'Contoh: 2024108827';
    });

    roleTeacher.addEventListener('click', () => {
      if (currentRole === 'teacher') return;
      currentRole = 'teacher';
      roleTeacher.className = 'px-3.5 py-1 rounded-full font-label-md text-label-md bg-primary-container text-surface-container-lowest shadow-sm transition-all';
      roleStudent.className = 'px-3.5 py-1 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all';
      labelIdentifier.textContent = 'Nomor Induk Pegawai (NIP / NUPTK)';
      inputIdentifier.placeholder = 'Contoh: 198503152010011002';
    });

    // Password Toggle
    togglePwd.addEventListener('click', () => {
      const isPassword = inputPwd.type === 'password';
      inputPwd.type = isPassword ? 'text' : 'password';
      pwdIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
    });

    // ================= QR SCANNER FAST PASS LOGIC =================
    const qrModal = document.getElementById('qr-modal');
    const btnCloseScanner = document.getElementById('btn-close-scanner');
    const scannerStatus = document.getElementById('scanner-status');
    const scannerAlert = document.getElementById('scanner-alert');
    const btnSwitchCamera = document.getElementById('btn-switch-camera');
    const qrFileInput = document.getElementById('qr-file-input');
    const btnDemoScan = document.getElementById('btn-demo-scan');

    let html5QrCode = null;
    let isScannerRunning = false;
    let currentFacingMode = "environment";
    let isProcessingScan = false;

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
        } catch (e) { }
    }

    window.openScanner = function() {
        qrModal.style.display = 'flex';
        scannerAlert.style.display = 'none';
        scannerStatus.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">autorenew</span> Menghubungkan ke kamera...';
        isProcessingScan = false;

        if (typeof Html5Qrcode === 'undefined') {
            scannerStatus.innerHTML = '<span style="color:#ef4444;"><span class="material-symbols-outlined text-[16px]">warning</span> Library QR Scanner sedang dimuat...</span>';
            return;
        }

        if (!html5QrCode) {
            html5QrCode = new Html5Qrcode("qr-reader");
        }
        startCamera(currentFacingMode);
    }

    function startCamera(facingMode) {
        html5QrCode.start(
            { facingMode: facingMode },
            { fps: 10, qrbox: { width: 220, height: 220 }, aspectRatio: 1.0 },
            onScanSuccess,
            onScanFailure
        ).then(() => {
            isScannerRunning = true;
            scannerStatus.innerHTML = '<span class="material-symbols-outlined text-[16px] text-green-500">videocam</span> Kamera aktif. Arahkan ke barcode / QR ID.';
        }).catch(err => {
            isScannerRunning = false;
            scannerStatus.innerHTML = '<span style="color:#f59e0b;"><span class="material-symbols-outlined text-[16px]">videocam_off</span> Kamera tidak aktif. Coba ganti kamera.</span>';
        });
    }

    function stopCamera() {
        if (html5QrCode && isScannerRunning) {
            html5QrCode.stop().then(() => { isScannerRunning = false; }).catch(err => {});
        }
    }

    function closeScannerModal() {
        stopCamera();
        qrModal.style.display = 'none';
        isProcessingScan = false;
    }

    btnCloseScanner.addEventListener('click', closeScannerModal);
    qrModal.addEventListener('click', function(e) { if (e.target === qrModal) closeScannerModal(); });

    btnSwitchCamera.addEventListener('click', function() {
        if (html5QrCode && isScannerRunning) {
            currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
            html5QrCode.stop().then(() => {
                isScannerRunning = false;
                scannerStatus.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">autorenew</span> Berganti kamera...';
                startCamera(currentFacingMode);
            }).catch(err => {});
        }
    });

    qrFileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        if (!html5QrCode) html5QrCode = new Html5Qrcode("qr-reader");
        scannerStatus.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">autorenew</span> Memindai file gambar...';
        html5QrCode.scanFile(file, true)
            .then(decodedText => onScanSuccess(decodedText))
            .catch(err => {
                scannerStatus.innerHTML = '<span style="color:#ef4444;"><span class="material-symbols-outlined text-[16px]">cancel</span> Barcode tidak terbaca di gambar.</span>';
            });
    });

    btnDemoScan.addEventListener('click', function() {
        scannerStatus.innerHTML = '<span class="material-symbols-outlined text-[16px] text-indigo-500">bolt</span> Mensimulasikan scan kartu Nadia...';
        onScanSuccess("2024108827");
    });

    function onScanSuccess(decodedText) {
        if (isProcessingScan) return;
        isProcessingScan = true;
        playSuccessSound();
        stopCamera();

        scannerStatus.innerHTML = '<span class="material-symbols-outlined text-[16px] text-green-500">check_circle</span> Berhasil terbaca: <b>' + decodedText + '</b>';
        
        let cleanNis = decodedText;
        if(decodedText.includes('BZ-')) {
            const parts = decodedText.split('-');
            if(parts.length >= 3) cleanNis = parts[1] + parts[2];
        }
        inputIdentifier.value = cleanNis;

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        fetch("{{ route('login.qr') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ qr_data: decodedText })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                window.location.href = data.redirect;
            } else {
                scannerAlert.className = 'scanner-alert-box scanner-alert-danger';
                scannerAlert.innerHTML = '<span class="material-symbols-outlined text-[16px]">error</span> ' + (data.message || 'QR tidak valid.');
                scannerAlert.style.display = 'block';
                isProcessingScan = false;
            }
        })
        .catch(err => {
            scannerAlert.className = 'scanner-alert-box scanner-alert-danger';
            scannerAlert.innerHTML = '<span class="material-symbols-outlined text-[16px]">wifi_off</span> Koneksi ke server terputus.';
            scannerAlert.style.display = 'block';
            isProcessingScan = false;
        });
    }

    function onScanFailure(error) {
        // Handle scan failure silently
    }
  })();
</script>
</main>
</body>
</html>
