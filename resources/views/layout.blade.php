<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'LIBRAZ')</title>
    <!-- Use Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base styles */
        :root {
            --primary: #5916f2;
            --primary-light: #7c4dff;
            --secondary: #22d3a3;
            --bg-color: #f8f9fc;
            --card-bg: #ffffff;
            --text-main: #1e1b4b;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --danger: #dc2626;
            --warning: #fbbf24;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-xl: 24px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #e2e8f0; /* Gray background outside mobile view */
            color: var(--text-main);
            display: flex;
            justify-content: center;
        }

        .mobile-container {
            width: 100%;
            max-width: 480px;
            min-height: 100vh;
            background-color: var(--bg-color);
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding: 16px;
            padding-bottom: 80px; /* Space for bottom nav */
            overflow-y: auto;
        }

        /* Utilities */
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .gap-4 { gap: 16px; }
        .w-full { width: 100%; }
        .text-center { text-align: center; }
        .font-bold { font-weight: 700; }
        .font-semibold { font-weight: 600; }
        .font-medium { font-weight: 500; }
        .text-xs { font-size: 0.75rem; }
        .text-sm { font-size: 0.875rem; }
        .text-lg { font-size: 1.125rem; }
        .text-xl { font-size: 1.25rem; }
        .text-muted { color: var(--text-muted); }
        .text-primary { color: var(--primary); }
        .bg-white { background-color: var(--card-bg); }
        .rounded-lg { border-radius: var(--radius-lg); }
        .rounded-md { border-radius: var(--radius-md); }
        .shadow-sm { box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .p-4 { padding: 16px; }
        .mt-4 { margin-top: 16px; }
        .mt-2 { margin-top: 8px; }
        .mb-4 { margin-bottom: 16px; }

        /* Bottom Nav */
        .bottom-nav {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-around;
            padding: 12px 0;
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.2s ease;
            padding: 8px 16px;
            border-radius: var(--radius-lg);
        }

        .nav-item i {
            font-size: 1.25rem;
        }

        .nav-item.active {
            color: var(--primary);
            background: rgba(89, 22, 242, 0.1);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: transform 0.1s, box-shadow 0.2s;
            text-decoration: none;
        }
        .btn:active {
            transform: scale(0.97);
        }
        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 10px rgba(89, 22, 242, 0.3);
        }
        
        .btn-outline {
            border: 1px solid var(--border-color);
            background: white;
            color: var(--text-main);
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: var(--radius-lg);
            padding: 16px;
        }
        
        /* Badges */
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 700;
        }
        .badge-success { background: #dcfce7; color: #166534; }
        .badge-primary { background: #e0e7ff; color: #3730a3; }
        
        /* Header */
        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background: white;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .logo-icon {
            background: var(--primary-light);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
    </style>
    @stack('styles')
</head>
<body>
    <div class="mobile-container">
        @if(!isset($hideHeader))
        <header class="app-header">
            <div class="logo-area">
                <div class="logo-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                <div>
                    <div class="text-xs text-primary font-bold">BIBLIOZ</div>
                    <div class="font-bold text-lg">@yield('page_title', 'Katalog Buku')</div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button style="background: none; border: none; font-size: 1.2rem; position: relative;">
                    <i class="fa-regular fa-bell"></i>
                    <span style="position: absolute; top: 0; right: -2px; width: 8px; height: 8px; background: red; border-radius: 50%;"></span>
                </button>
                <img src="https://i.pravatar.cc/100?img=5" alt="User" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover;">
            </div>
        </header>
        @endif

        <main class="content">
            @yield('content')
        </main>

        @if(!isset($hideNav))
        <nav class="bottom-nav">
            <a href="/katalog" class="nav-item {{ request()->is('katalog') ? 'active' : '' }}">
                <i class="fa-solid fa-book"></i>
                <span>Katalog</span>
            </a>
            <a href="/sirkulasi" class="nav-item {{ request()->is('sirkulasi') ? 'active' : '' }}">
                <i class="fa-solid fa-right-left"></i>
                <span>Sirkulasi</span>
            </a>
            <a href="/statistik" class="nav-item {{ request()->is('statistik') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Statistik</span>
            </a>
            <a href="/akun" class="nav-item {{ request()->is('akun') ? 'active' : '' }}">
                <i class="fa-regular fa-user"></i>
                <span>Akun</span>
            </a>
        </nav>
        @endif
    </div>

    @stack('scripts')
</body>
</html>
