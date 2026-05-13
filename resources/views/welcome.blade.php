<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoWir - Minimalist E-Commerce</title>
    <!-- Menggunakan font Inter untuk tampilan minimalis yang sempurna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Feather Icons untuk icon minimalis pengganti emoji -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        :root {
            --bg-color: #ffffff;
            --text-main: #171717;
            --text-muted: #737373;
            --border-color: #e5e5e5;
            --black: #000000;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            cursor: none; /* Sembunyikan kursor default untuk layar besar */
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background: var(--bg-color); 
            color: var(--text-main); 
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* --- Custom Cursor --- */
        .cursor-dot, .cursor-outline {
            position: fixed;
            top: 0;
            left: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 9999;
            pointer-events: none;
        }
        .cursor-dot {
            width: 6px;
            height: 6px;
            background-color: var(--black);
        }
        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            transition: width 0.2s, height 0.2s, background-color 0.2s;
        }
        a:hover ~ .cursor-outline, button:hover ~ .cursor-outline {
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.05);
            border-color: rgba(0, 0, 0, 0.3);
        }

        /* --- Navbar --- */
        nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-color);
        }
        .logo { 
            font-size: 20px; 
            font-weight: 700; 
            color: var(--black);
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-links a {
            margin-left: 24px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-login { 
            color: var(--text-muted); 
        }
        .btn-login:hover {
            color: var(--black);
        }
        .btn-register { 
            background: var(--black); 
            color: white; 
            padding: 10px 20px;
            border-radius: 4px;
        }
        .btn-register:hover { 
            background: #333; 
        }

        /* --- Hero Section --- */
        .hero {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: var(--bg-color);
            position: relative;
            padding: 20px;
        }
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            animation: fadeInUp 1s ease-out;
        }
        .hero h1 { 
            font-size: 64px; 
            font-weight: 700; 
            margin-bottom: 24px; 
            letter-spacing: -2px;
            line-height: 1.1;
            color: var(--black);
        }
        .hero p { 
            font-size: 18px; 
            color: var(--text-muted);
            margin-bottom: 48px; 
            font-weight: 400;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .hero-buttons a {
            display: inline-block;
            padding: 14px 32px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            margin: 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .btn-black { 
            background: var(--black); 
            color: white; 
            border: 1px solid var(--black);
        }
        .btn-black:hover {
            background: white;
            color: var(--black);
        }
        .btn-outline { 
            border: 1px solid var(--border-color); 
            color: var(--text-main); 
            background: white;
        }
        .btn-outline:hover { 
            border-color: var(--black);
        }

        /* --- Features Section --- */
        .features {
            padding: 100px 5%;
            background: #fafafa;
            border-top: 1px solid var(--border-color);
        }
        .features-header {
            text-align: center;
            margin-bottom: 80px;
        }
        .features h2 { 
            font-size: 32px; 
            font-weight: 600; 
            margin-bottom: 16px; 
            letter-spacing: -1px;
        }
        .features > p { 
            color: var(--text-muted); 
            font-size: 16px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 40px 30px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            border-color: var(--black);
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        }
        .card .icon-wrapper {
            margin-bottom: 24px;
            color: var(--black);
        }
        .card h3 { 
            font-size: 18px; 
            font-weight: 600; 
            margin-bottom: 12px; 
        }
        .card p { 
            font-size: 14px; 
            color: var(--text-muted); 
        }

        /* --- Footer --- */
        footer {
            background: var(--bg-color);
            color: var(--text-muted);
            text-align: center;
            padding: 40px 20px;
            font-size: 14px;
            border-top: 1px solid var(--border-color);
        }

        /* --- Animations --- */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            * { cursor: auto; }
            .cursor-dot, .cursor-outline { display: none; }
            .hero h1 { font-size: 42px; }
            .hero p { font-size: 16px; }
            nav { padding: 16px 20px; }
            .nav-links a { padding: 8px 12px; font-size: 13px; margin-left: 0; }
            .btn-register { padding: 8px 16px; }
        }
    </style>
</head>
<body>

    <!-- Elemen Custom Cursor -->
    <div class="cursor-dot" data-cursor></div>
    <div class="cursor-outline" data-cursor></div>

    {{-- Navbar --}}
    <nav>
        <div class="logo">
            <i data-feather="hexagon"></i> TokoWir
        </div>
        <div class="nav-links">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-register">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-register">Daftar</a>
            @endauth
        </div>
    </nav>

    {{-- Hero --}}
    <div class="hero">
        <div class="hero-content">
            <h1>Manajemen toko, <br>tanpa kerumitan.</h1>
            <p>Platform minimalis yang dirancang untuk fokus pada apa yang penting: mengembangkan bisnis Anda.</p>
            <div class="hero-buttons">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-black">Masuk ke Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn-black">Mulai Sekarang</a>
                    <a href="{{ route('login') }}" class="btn-outline">Pelajari Sistem</a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Fitur --}}
    <div class="features">
        <div class="features-header">
            <h2>Esensi dalam kesederhanaan.</h2>
            <p>Alat canggih yang dibalut dalam antarmuka yang bersih.</p>
        </div>
        <div class="cards">
            <div class="card">
                <div class="icon-wrapper">
                    <i data-feather="box" width="32" height="32"></i>
                </div>
                <h3>Kelola Produk</h3>
                <p>Antarmuka yang terfokus untuk menambah dan mengatur inventaris produk Anda.</p>
            </div>
            <div class="card">
                <div class="icon-wrapper">
                    <i data-feather="shield" width="32" height="32"></i>
                </div>
                <h3>Sistem Terpusat</h3>
                <p>Keamanan yang dijamin oleh kerangka kerja Laravel yang tangguh.</p>
            </div>
            <div class="card">
                <div class="icon-wrapper">
                    <i data-feather="bar-chart-2" width="32" height="32"></i>
                </div>
                <h3>Data Akurat</h3>
                <p>Pantau metrik penjualan Anda tanpa gangguan visual yang tidak perlu.</p>
            </div>
            <div class="card">
                <div class="icon-wrapper">
                    <i data-feather="zap" width="32" height="32"></i>
                </div>
                <h3>Akses Cepat</h3>
                <p>Desain ringan yang memastikan waktu muat super cepat untuk produktivitas maksimal.</p>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer>
        <p>© {{ date('Y') }} TokoWir. Didesain dengan presisi.</p>
    </footer>

    <!-- Script Render Icons & Custom Cursor -->
    <script>
        // Render ikon dari Feather Icons
        feather.replace();

        // Logika Custom Cursor
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorOutline = document.querySelector('.cursor-outline');

        let mouseX = 0;
        let mouseY = 0;
        let outlineX = 0;
        let outlineY = 0;

        window.addEventListener('mousemove', function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            cursorDot.style.left = `${mouseX}px`;
            cursorDot.style.top = `${mouseY}px`;
        });

        function animateCursor() {
            let distX = mouseX - outlineX;
            let distY = mouseY - outlineY;
            
            outlineX += distX * 0.15;
            outlineY += distY * 0.15;
            
            cursorOutline.style.left = `${outlineX}px`;
            cursorOutline.style.top = `${outlineY}px`;
            
            requestAnimationFrame(animateCursor);
        }

        animateCursor();

        document.addEventListener('mouseleave', () => {
            cursorDot.style.opacity = 0;
            cursorOutline.style.opacity = 0;
        });
        
        document.addEventListener('mouseenter', () => {
            cursorDot.style.opacity = 1;
            cursorOutline.style.opacity = 1;
        });

        const hoverElements = document.querySelectorAll('a, button');
        hoverElements.forEach(el => {
            el.addEventListener('mouseover', () => {
                cursorOutline.style.width = '60px';
                cursorOutline.style.height = '60px';
                cursorOutline.style.backgroundColor = 'rgba(0, 0, 0, 0.05)';
            });
            el.addEventListener('mouseleave', () => {
                cursorOutline.style.width = '40px';
                cursorOutline.style.height = '40px';
                cursorOutline.style.backgroundColor = 'transparent';
            });
        });
    </script>
</body>
</html>