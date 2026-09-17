<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioZ | Perpustakaan SMAN 1 Garudapura</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f0ff 0%, #ede7ff 30%, #f6f1ff 100%);
        }
        .glass {
            background: rgba(255,255,255,0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(116, 89, 177, 0.12);
        }
        .card-shadow { box-shadow: 0 18px 40px rgba(61, 32, 113, 0.12); }
    </style>
</head>
<body class="min-h-screen text-slate-800">
    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        <header class="mb-8 flex items-center justify-between rounded-[26px] glass card-shadow px-5 py-4">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-violet-700 to-indigo-500 text-lg font-black text-white shadow-lg shadow-violet-300/60">B</div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-violet-600">Perpustakaan</p>
                    <h1 class="text-xl font-extrabold text-slate-900">BiblioZ</h1>
                </div>
            </div>
            <nav class="hidden items-center gap-7 text-sm font-semibold text-slate-600 md:flex">
                <a href="#katalog" class="transition hover:text-violet-700">Katalog</a>
                <a href="#sirkulasi" class="transition hover:text-violet-700">Sirkulasi</a>
                <a href="#statistik" class="transition hover:text-violet-700">Statistik</a>
                <a href="#akun" class="transition hover:text-violet-700">Akun</a>
            </nav>
            <button class="rounded-full bg-slate-900 px-4 py-2 text-sm font-bold text-white shadow-lg shadow-slate-300/60 transition hover:-translate-y-0.5 hover:bg-violet-700">Masuk</button>
        </header>

        <main class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
            <section class="rounded-[30px] glass card-shadow p-6 sm:p-8">
                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <p class="mb-2 text-xs font-bold uppercase tracking-[0.24em] text-violet-600">Smart Library</p>
                        <h2 class="text-3xl font-extrabold leading-tight text-slate-900 sm:text-4xl">Sistem perpustakaan digital untuk sekolah modern</h2>
                    </div>
                    <div class="hidden rounded-2xl bg-violet-100 px-3 py-2 text-right sm:block">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-violet-700">Live</p>
                        <p class="text-lg font-extrabold text-violet-800">24/7</p>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-violet-100">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-slate-500">Buku</p>
                        <p class="mt-3 text-3xl font-extrabold text-slate-900">4.8K</p>
                        <p class="mt-1 text-sm text-emerald-600">+12% bulan ini</p>
                    </div>
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-violet-100">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-slate-500">Peminjam</p>
                        <p class="mt-3 text-3xl font-extrabold text-slate-900">1.2K</p>
                        <p class="mt-1 text-sm text-violet-600">94% aktif</p>
                    </div>
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-violet-100">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-slate-500">Denda</p>
                        <p class="mt-3 text-3xl font-extrabold text-slate-900">Rp 1.4J</p>
                        <p class="mt-1 text-sm text-amber-600">10 hari tertunggak</p>
                    </div>
                </div>

                <div id="katalog" class="mt-8 rounded-[28px] bg-slate-900 p-5 text-white shadow-2xl shadow-slate-400/10">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.24em] text-violet-300">Katalog</p>
                            <h3 class="mt-1 text-2xl font-extrabold">Buku pilihan siswa</h3>
                        </div>
                        <span class="rounded-full bg-violet-500/20 px-3 py-1 text-xs font-bold text-violet-200">Top Rated</span>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.22em] text-slate-300">Fiksi</p>
                            <h4 class="mt-3 text-lg font-bold">Laskar Pelangi</h4>
                            <p class="mt-1 text-sm text-slate-300">Andrea Hirata</p>
                            <p class="mt-4 text-sm font-semibold text-violet-200">4.95/5 • Ready</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.22em] text-slate-300">Sains</p>
                            <h4 class="mt-3 text-lg font-bold">Fisika Kuantum</h4>
                            <p class="mt-1 text-sm text-slate-300">Prof. Aris Danuarta</p>
                            <p class="mt-4 text-sm font-semibold text-violet-200">4.9/5 • E-book</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.22em] text-slate-300">Kurikulum</p>
                            <h4 class="mt-3 text-lg font-bold">Matematika XI</h4>
                            <p class="mt-1 text-sm text-slate-300">Kemendikbud</p>
                            <p class="mt-4 text-sm font-semibold text-violet-200">4.6/5 • Baru</p>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="space-y-6">
                <div id="sirkulasi" class="rounded-[30px] glass card-shadow p-5">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.22em] text-violet-600">Sirkulasi</p>
                            <h3 class="mt-1 text-2xl font-extrabold text-slate-900">Pinjaman aktif</h3>
                        </div>
                        <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-bold text-emerald-700">3 buku</span>
                    </div>

                    <div class="space-y-3">
                        <div class="rounded-2xl bg-white p-3 shadow-sm ring-1 ring-slate-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-slate-900">Kimia Dasar Farmasi</p>
                                    <p class="text-xs text-slate-500">Jatuh tempo: 18 Nov 2024</p>
                                </div>
                                <span class="rounded-full bg-amber-100 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.16em] text-amber-700">2 hari</span>
                            </div>
                        </div>
                        <div class="rounded-2xl bg-white p-3 shadow-sm ring-1 ring-slate-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-slate-900">Filosofi Teras</p>
                                    <p class="text-xs text-slate-500">Terlambat 3 hari • Rp 3.000</p>
                                </div>
                                <span class="rounded-full bg-red-100 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.16em] text-red-700">Denda</span>
                            </div>
                        </div>
                        <div class="rounded-2xl bg-white p-3 shadow-sm ring-1 ring-slate-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-slate-900">English Grammar</p>
                                    <p class="text-xs text-slate-500">Jatuh tempo: 26 Nov 2024</p>
                                </div>
                                <span class="rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.16em] text-emerald-700">Aman</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="statistik" class="rounded-[30px] glass card-shadow p-5">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-violet-600">Statistik</p>
                    <h3 class="mt-1 text-2xl font-extrabold text-slate-900">Kinerja harian</h3>
                    <div class="mt-5 space-y-4">
                        <div>
                            <div class="mb-1 flex items-center justify-between text-sm font-semibold text-slate-600">
                                <span>Pengunjung hari ini</span>
                                <span>342</span>
                            </div>
                            <div class="h-2.5 rounded-full bg-violet-100">
                                <div class="h-2.5 w-[72%] rounded-full bg-gradient-to-r from-violet-600 to-indigo-500"></div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 flex items-center justify-between text-sm font-semibold text-slate-600">
                                <span>Transaksi sirkulasi</span>
                                <span>128</span>
                            </div>
                            <div class="h-2.5 rounded-full bg-violet-100">
                                <div class="h-2.5 w-[86%] rounded-full bg-gradient-to-r from-violet-600 to-indigo-500"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="akun" class="rounded-[30px] glass card-shadow p-5">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-violet-600">Akun</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-fuchsia-500 to-violet-600 text-lg font-black text-white">N</div>
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900">Nadia Amanda</h3>
                            <p class="text-sm text-slate-500">NIS 2024108827</p>
                        </div>
                    </div>
                    <button class="mt-5 w-full rounded-2xl bg-violet-700 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-violet-200 transition hover:bg-violet-800">Lihat profil</button>
                </div>
            </aside>
        </main>
    </div>
</body>
</html>
