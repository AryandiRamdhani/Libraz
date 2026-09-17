<!DOCTYPE html>

<html lang="id"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport"/><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;family=Space+Grotesk:wght@700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{width:100vw;margin:0;padding:0;}body{overscroll-behavior:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-primary-fixed": "#1e0060", "on-primary-fixed-variant": "#4c00d3", "surface-container-highest": "#e5e1e8", "on-error": "#ffffff", "on-error-container": "#93000a", "surface-container": "#f1ecf4", "surface-container-high": "#ebe6ee", "on-tertiary-fixed": "#40000f", "on-secondary-fixed": "#002112", "secondary-fixed": "#4dffb2", "on-tertiary": "#ffffff", "on-surface": "#1c1b20", "surface-variant": "#e5e1e8", "surface-container-low": "#f7f2f9", "on-primary-container": "#cfc1ff", "on-surface-variant": "#484456", "background": "#fdf8ff", "inverse-primary": "#ccbeff", "inverse-on-surface": "#f4eff6", "tertiary-container": "#ac0036", "error-container": "#ffdad6", "primary": "#4300bb", "on-secondary-container": "#007149", "surface-tint": "#6531f0", "secondary-fixed-dim": "#00e296", "secondary": "#006c46", "surface-dim": "#ddd8e0", "tertiary-fixed-dim": "#ffb2b8", "tertiary-fixed": "#ffdadb", "on-background": "#1c1b20", "secondary-container": "#43fcae", "tertiary": "#800026", "inverse-surface": "#313035", "primary-fixed-dim": "#ccbeff", "primary-fixed": "#e7deff", "on-secondary": "#ffffff", "error": "#ba1a1a", "surface-container-lowest": "#ffffff", "primary-container": "#5b21e6", "surface": "#fdf8ff", "outline": "#797488", "surface-bright": "#fdf8ff", "on-secondary-fixed-variant": "#005234", "on-primary": "#ffffff", "on-tertiary-fixed-variant": "#91002c", "outline-variant": "#cac3d9", "on-tertiary-container": "#ffb7bc" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "space-xs": "0.25rem", "gutter-sm": "0.75rem", "space-lg": "1.25rem", "margin": "1.25rem", "gutter": "1rem", "margin-desktop": "2.5rem", "space-md": "0.875rem", "space-sm": "0.5rem", "space-xl": "2rem" }, "fontFamily": { "title-md": ["Plus Jakarta Sans"], "headline-lg-mobile": ["Plus Jakarta Sans"], "headline-md": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "body-sm": ["Plus Jakarta Sans"], "label-sm": ["Space Grotesk"], "headline-sm": ["Plus Jakarta Sans"], "headline-lg": ["Plus Jakarta Sans"], "label-lg": ["Space Grotesk"], "body-lg": ["Plus Jakarta Sans"], "body-md": ["Plus Jakarta Sans"], "label-md": ["Space Grotesk"] }, "fontSize": { "title-md": ["16px", {"lineHeight": "22px", "fontWeight": "700"}], "headline-lg-mobile": ["26px", {"lineHeight": "32px", "fontWeight": "800"}], "headline-md": ["22px", {"lineHeight": "28px", "fontWeight": "700"}], "display-lg": ["38px", {"lineHeight": "44px", "fontWeight": "800"}], "body-sm": ["12px", {"lineHeight": "18px", "fontWeight": "400"}], "label-sm": ["10px", {"lineHeight": "12px", "fontWeight": "700"}], "headline-sm": ["18px", {"lineHeight": "24px", "fontWeight": "700"}], "headline-lg": ["30px", {"lineHeight": "36px", "fontWeight": "800"}], "label-lg": ["13px", {"lineHeight": "16px", "fontWeight": "700"}], "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "500"}], "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}], "label-md": ["11px", {"lineHeight": "14px", "fontWeight": "700"}] } } } }</script></head><body class="bg-background font-body-md text-body-md text-on-surface flex flex-col min-h-screen"><header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-margin flex items-center justify-between gap-space-sm"><div class="flex items-center gap-space-sm min-w-0"><a aria-label="Kembali ke Akun" class="w-11 h-11 -ml-space-xs rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors focus:outline-none flex-shrink-0" data-path="akun" href="{{ route('akun') }}"><span class="material-symbols-outlined text-[24px]">arrow_back</span></a><div class="flex flex-col min-w-0"><span class="font-label-sm text-label-sm text-primary tracking-wider uppercase truncate">Akun &amp; Pengaturan</span><span class="font-title-md text-title-md text-on-surface truncate">Edit Profil &amp; Pengaturan Akun</span></div></div><div class="flex items-center gap-space-xs flex-shrink-0"><button aria-label="Bantuan" class="w-11 h-11 rounded-full flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors focus:outline-none"><span class="material-symbols-outlined text-[22px]">help_outline</span></button></div></div></header><main class="flex flex-col relative w-full pt-16 pb-24 bg-surface min-h-screen"><div class="flex flex-col w-full px-margin space-y-space-lg pb-space-xl">
<!-- Header Intro Card -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col gap-space-sm relative overflow-hidden">
<div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-primary/5 blur-xl pointer-events-none"></div>
<div class="flex items-center gap-space-xs">
<span class="px-space-sm py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm uppercase tracking-wider font-bold">Akun Terverifikasi</span>
<span class="px-space-sm py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-bold">SMAN 1 Garudapura</span>
</div>
<div>
<h1 class="font-headline-md text-headline-md text-on-surface tracking-tight">Pengaturan &amp; Edit Profil</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Kelola akun siswa, minat baca, dan preferensi aplikasi</p>
</div>
</div>
<!-- Avatar Management Section -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col items-center text-center relative">
<div class="relative group cursor-pointer mb-space-sm">
<div class="w-24 h-24 rounded-full p-1 bg-gradient-to-tr from-primary via-primary-container to-secondary-container shadow-md">
<img alt="Nadia Amanda Putri Avatar" class="w-full h-full rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1W_HPwkc87OKpwQaeF0eeJubnlWQPhTSPnD1rZZPK41OSTbmjD3DCj9VMaFv5iI89642M9ArfJhXsP-j8xnT1QK6eEIXp1wgW97HuOAIfaZlXq7y637TAJRgOjJp7-Ifi3zFqL_Z_0iWsU5b5MFhMfCSTEuLUZKyNd0_UcyXG9_kfHDRBFNjfY1iTOWa-Vf5FOWxjuuElrYWWYbCQmiKIMk_6Yrghz0-cjordSutrRV49P_tnGnc18p4YQ"/>
</div>
<button aria-label="Ganti Foto Profil" class="absolute bottom-0 right-0 w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md active:scale-95 transition-transform" type="button">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
</div>
<div class="flex flex-wrap items-center justify-center gap-space-xs mb-space-md">
<span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm shadow-sm">
<span>⚡</span> Master Reader
      </span>
<span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-secondary text-on-secondary font-label-sm text-label-sm shadow-sm">
<span>🏆</span> Top 2% Literasi
      </span>
<span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
<span>📚</span> 42 Buku
      </span>
</div>
<!-- Quick Action Pill Buttons -->
<div class="grid grid-cols-3 gap-space-xs w-full pt-space-xs">
<button class="flex flex-col items-center justify-center py-space-sm px-space-xs rounded-xl bg-surface-container-low hover:bg-surface-container active:scale-98 transition-all text-on-surface" type="button">
<span class="material-symbols-outlined text-primary text-[20px] mb-1">image</span>
<span class="font-label-sm text-label-sm truncate w-full">Pilih Galeri</span>
</button>
<button class="flex flex-col items-center justify-center py-space-sm px-space-xs rounded-xl bg-surface-container-low hover:bg-surface-container active:scale-98 transition-all text-on-surface" type="button">
<span class="material-symbols-outlined text-secondary text-[20px] mb-1">sentiment_very_satisfied</span>
<span class="font-label-sm text-label-sm truncate w-full">Avatar 3D</span>
</button>
<button class="flex flex-col items-center justify-center py-space-sm px-space-xs rounded-xl bg-error-container/40 hover:bg-error-container active:scale-98 transition-all text-on-error-container" type="button">
<span class="material-symbols-outlined text-[20px] mb-1">delete</span>
<span class="font-label-sm text-label-sm truncate w-full">Hapus Foto</span>
</button>
</div>
</div>
<!-- Form Edit: Informasi Pribadi & Sekolah -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col space-y-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]">badge</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Data Diri &amp; Sekolah</h2>
</div>
<span class="px-space-sm py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">Dapodik Aktif</span>
</div>
<!-- Field: Nama Lengkap -->
<div class="flex flex-col space-y-1">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider" for="student-name">Nama Lengkap Siswa</label>
<div class="relative flex items-center">
<input class="w-full bg-surface-container-low rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-colors" id="student-name" type="text" value="Nadia Amanda Putri"/>
<span class="material-symbols-outlined text-primary absolute right-space-md text-[18px]">edit</span>
</div>
</div>
<!-- Field: NISN & Kelas (Locked) -->
<div class="flex flex-col space-y-1">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider" for="student-nisn">NISN &amp; Rombel Kelas</label>
<span class="flex items-center gap-0.5 text-secondary font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">verified</span> Terverifikasi
        </span>
</div>
<div class="relative flex items-center">
<input class="w-full bg-surface-container-high/60 rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface cursor-not-allowed" disabled="" id="student-nisn" type="text" value="2024108827 • XII MIPA 2"/>
<span class="material-symbols-outlined text-on-surface-variant absolute right-space-md text-[18px]">lock</span>
</div>
<span class="font-body-sm text-body-sm text-outline flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[13px]">info</span> Terkunci otomatis via Dapodik Sekolah
      </span>
</div>
<!-- Field: Bio Siswa -->
<div class="flex flex-col space-y-1">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider" for="student-bio">Bio &amp; Status Literasi</label>
<textarea class="w-full bg-surface-container-low rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-colors resize-none" id="student-bio" rows="2">Curious reader 🌌 Fisika, Sci-Fi &amp; Filosofi enthusiast ✨</textarea>
</div>
<!-- Field: Email Siswa -->
<div class="flex flex-col space-y-1">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider" for="student-email">Email Akun Sekolah</label>
<div class="flex items-center bg-surface-container-high/60 rounded-xl px-space-md py-space-sm justify-between">
<div class="flex items-center gap-space-xs truncate">
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">mail</span>
<span class="font-body-md text-body-md text-on-surface truncate">nadia.amanda@garudapura.sch.id</span>
</div>
<span class="px-space-xs py-0.5 rounded bg-secondary text-on-secondary font-label-sm text-label-sm font-bold flex-shrink-0">Aktif</span>
</div>
</div>
<!-- Field: WhatsApp / Kontak -->
<div class="flex flex-col space-y-1">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider" for="student-wa">No. WhatsApp (Pengingat Tenggat)</label>
<div class="relative flex items-center">
<div class="absolute left-space-md flex items-center gap-1 pointer-events-none">
<span class="font-label-md text-label-md text-on-surface-variant">+62</span>
</div>
<input class="w-full bg-surface-container-low rounded-xl pl-12 pr-space-md py-space-sm font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-colors" id="student-wa" type="tel" value="812-8890-4421"/>
<span class="material-symbols-outlined text-secondary absolute right-space-md text-[18px]">sms</span>
</div>
</div>
</div>
<!-- Kategori Minat Baca & Feed AI -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col space-y-space-md">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">psychology</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Minat Baca &amp; Personalisasi</h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pilih genre favorit untuk kurasi rekomendasi AI &amp; rak koleksi personal</p>
</div>
<!-- Selected Tags -->
<div class="flex flex-col space-y-space-xs">
<span class="font-label-sm text-label-sm uppercase text-primary font-bold tracking-wide">Genre Terpilih (Aktif)</span>
<div class="flex flex-wrap gap-space-xs">
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md active:scale-95 transition-all shadow-sm" type="button">
<span>🚀</span> Sains &amp; Astronomi
          <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md active:scale-95 transition-all shadow-sm" type="button">
<span>💡</span> Filosofi &amp; Psikologi
          <span class="material-symbols-outlined text-[14px]">check</span>
</button>
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-primary-container text-on-primary font-label-md text-label-md active:scale-95 transition-all shadow-sm" type="button">
<span>📖</span> Sastra &amp; Fiksi
          <span class="material-symbols-outlined text-[14px]">check</span>
</button>
</div>
</div>
<!-- Unselected Tags -->
<div class="flex flex-col space-y-space-xs pt-space-xs">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-bold tracking-wide">Tambahkan Genre Lainnya</span>
<div class="flex flex-wrap gap-space-xs">
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high active:scale-95 transition-all" type="button">
<span>🤖</span> Teknologi &amp; AI
          <span class="material-symbols-outlined text-[14px] text-outline">add</span>
</button>
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high active:scale-95 transition-all" type="button">
<span>🏛️</span> Sejarah Dunia
          <span class="material-symbols-outlined text-[14px] text-outline">add</span>
</button>
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high active:scale-95 transition-all" type="button">
<span>🎨</span> Komik &amp; Webtoon
          <span class="material-symbols-outlined text-[14px] text-outline">add</span>
</button>
<button class="inline-flex items-center gap-1.5 px-space-md py-1.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high active:scale-95 transition-all" type="button">
<span>📈</span> Bisnis &amp; Finansial
          <span class="material-symbols-outlined text-[14px] text-outline">add</span>
</button>
</div>
</div>
</div>
<!-- Pengaturan Notifikasi & Pengingat Sirkulasi -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col space-y-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]">notifications_active</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Notifikasi &amp; Sirkulasi</h2>
</div>
<!-- Toggle 1 -->
<div class="flex items-center justify-between py-1">
<div class="flex flex-col pr-space-sm">
<span class="font-title-md text-title-md text-on-surface">Pengingat H-2 Tenggat Kembali</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Kirim peringatan via Push Notif &amp; WhatsApp</span>
</div>
<button aria-checked="true" class="w-12 h-7 rounded-full bg-primary flex items-center p-0.5 cursor-pointer transition-colors justify-end" role="switch" type="button">
<span class="w-6 h-6 rounded-full bg-on-primary shadow-md transform transition-transform"></span>
</button>
</div>
<!-- Toggle 2 -->
<div class="flex items-center justify-between py-1">
<div class="flex flex-col pr-space-sm">
<span class="font-title-md text-title-md text-on-surface">Auto-Hold Buku Incaran</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Saat antrean reservasi siap di Loker Smart</span>
</div>
<button aria-checked="true" class="w-12 h-7 rounded-full bg-primary flex items-center p-0.5 cursor-pointer transition-colors justify-end" role="switch" type="button">
<span class="w-6 h-6 rounded-full bg-on-primary shadow-md transform transition-transform"></span>
</button>
</div>
<!-- Toggle 3 -->
<div class="flex items-center justify-between py-1">
<div class="flex flex-col pr-space-sm">
<span class="font-title-md text-title-md text-on-surface">Daily Reading Streak</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Pengingat baca harian pukul 19:30 WIB</span>
</div>
<button aria-checked="true" class="w-12 h-7 rounded-full bg-primary flex items-center p-0.5 cursor-pointer transition-colors justify-end" role="switch" type="button">
<span class="w-6 h-6 rounded-full bg-on-primary shadow-md transform transition-transform"></span>
</button>
</div>
<!-- Toggle 4 -->
<div class="flex items-center justify-between py-1">
<div class="flex flex-col pr-space-sm">
<span class="font-title-md text-title-md text-on-surface">Katalog Baru &amp; Rekomendasi</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Buletin berkala kurasi buku mingguan</span>
</div>
<button aria-checked="false" class="w-12 h-7 rounded-full bg-surface-container-high flex items-center p-0.5 cursor-pointer transition-colors justify-start" role="switch" type="button">
<span class="w-6 h-6 rounded-full bg-on-primary shadow-md transform transition-transform"></span>
</button>
</div>
</div>
<!-- Keamanan, Integrasi & Preferensi -->
<div class="rounded-2xl p-space-lg bg-surface-container-lowest shadow-sm flex flex-col space-y-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]">security</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Keamanan &amp; Tampilan</h2>
</div>
<!-- Ubah PIN -->
<button class="w-full flex items-center justify-between py-space-xs text-left active:bg-surface-container-low rounded-xl px-1 transition-colors" type="button">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[20px]">password</span>
</div>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Ubah PIN Masuk / Sandi</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Terakhir diperbarui 24 hari lalu</span>
</div>
</div>
<span class="material-symbols-outlined text-outline text-[20px]">chevron_right</span>
</button>
<!-- Biometric Toggle -->
<div class="flex items-center justify-between py-1">
<div class="flex items-center gap-space-sm pr-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[20px]">fingerprint</span>
</div>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Biometrik &amp; Face Unlock</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Akses instan peminjaman buku</span>
</div>
</div>
<button aria-checked="true" class="w-12 h-7 rounded-full bg-primary flex items-center p-0.5 cursor-pointer transition-colors justify-end" role="switch" type="button">
<span class="w-6 h-6 rounded-full bg-on-primary shadow-md transform transition-transform"></span>
</button>
</div>
<!-- Dapodik Sync Row -->
<div class="flex items-center justify-between py-1">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[20px]">sync</span>
</div>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Sinkronisasi Absensi</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Portal Satu Data Garudapura</span>
</div>
</div>
<span class="px-space-sm py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Terhubung
      </span>
</div>
<!-- Theme Segmented Control -->
<div class="flex flex-col space-y-1.5 pt-space-xs">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Tema Aplikasi</span>
<div class="grid grid-cols-3 gap-1 bg-surface-container p-1 rounded-xl">
<button class="py-2 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md shadow-sm flex items-center justify-center gap-1 transition-all" type="button">
<span>☀️</span> Terang
        </button>
<button class="py-2 rounded-lg text-on-surface-variant font-label-md text-label-md flex items-center justify-center gap-1 hover:text-on-surface transition-all" type="button">
<span>🌙</span> Gelap
        </button>
<button class="py-2 rounded-lg text-on-surface-variant font-label-md text-label-md flex items-center justify-center gap-1 hover:text-on-surface transition-all" type="button">
<span>⚙️</span> Otomatis
        </button>
</div>
</div>
</div>
<!-- Primary CTA & Action Section -->
<div class="flex flex-col space-y-space-sm pt-space-xs">
<button class="w-full h-14 rounded-2xl bg-gradient-to-r from-primary via-primary-container to-surface-tint text-on-primary font-headline-sm text-headline-sm shadow-md flex items-center justify-center gap-space-xs active:scale-98 transition-transform" type="button">
<span class="material-symbols-outlined text-[22px]">check_circle</span>
<span>Simpan Perubahan</span>
</button>
<button class="w-full h-12 rounded-2xl bg-surface-container-low hover:bg-error-container/20 text-error font-title-md text-title-md flex items-center justify-center gap-space-xs active:scale-98 transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]">logout</span>
<span>Keluar dari Akun (Logout)</span>
</button>
<!-- Version & Identity Footer -->
<div class="pt-space-md text-center">
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
        BiblioZ v2.4 • Platform Perpustakaan SMAN 1 Garudapura
      </p>
<p class="font-body-sm text-body-sm text-outline mt-0.5">
        Terhubung ke Sistem Informasi Literasi Nasional &amp; Kemdikbud
      </p>
</div>
</div>
</div></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/85 backdrop-blur-xl shadow-[0_-2px_12px_rgba(0,0,0,0.05)]" data-active-classes="bg-primary-container text-on-primary font-bold shadow-[3px_3px_0px_#1c1b20]"><div class="flex items-center justify-around h-16 px-space-xs max-w-md mx-auto"><a class="flex flex-col items-center justify-center min-w-[64px] min-h-[44px] px-space-sm py-space-xs rounded-xl text-on-surface-variant transition-all hover:text-primary" data-path="katalog-buku" href="{{ route('katalog') }}"><span class="material-symbols-outlined text-[22px]">menu_book</span><span class="font-label-sm text-label-sm tracking-tight mt-0.5">Katalog</span></a><a class="flex flex-col items-center justify-center min-w-[64px] min-h-[44px] px-space-sm py-space-xs rounded-xl text-on-surface-variant transition-all hover:text-primary" data-path="sirkulasi-peminjaman" href="{{ route('sirkulasi') }}"><span class="material-symbols-outlined text-[22px]">sync_alt</span><span class="font-label-sm text-label-sm tracking-tight mt-0.5">Sirkulasi</span></a><a class="flex flex-col items-center justify-center min-w-[64px] min-h-[44px] px-space-sm py-space-xs rounded-xl text-on-surface-variant transition-all hover:text-primary" data-path="petugas-statistik" href="{{ route('statistik') }}"><span class="material-symbols-outlined text-[22px]">analytics</span><span class="font-label-sm text-label-sm tracking-tight mt-0.5">Statistik</span></a><a class="flex flex-col items-center justify-center min-w-[64px] min-h-[44px] px-space-sm py-space-xs rounded-xl text-on-surface-variant transition-all hover:text-primary" data-path="akun" href="{{ route('akun') }}"><span class="material-symbols-outlined text-[22px]">person</span><span class="font-label-sm text-label-sm tracking-tight mt-0.5">Akun</span></a></div></nav></body></html>
