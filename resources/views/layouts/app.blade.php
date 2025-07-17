<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Reservasi Bioskop')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-purple: #2c003e;
            --secondary-purple: #4b0082;
            --accent-purple: #6a0dad;
            --light-purple: #e0cfff;
            --netflix-red: #e50914;
            --netflix-dark: #141414;
            --netflix-gray: #564d4d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Rubik', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f3460 50%, #2c003e 75%, #4b0082 100%);
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background Elements */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(147, 51, 234, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(168, 85, 247, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Netflix-Style Navigation */
        .navbar {
            background: linear-gradient(90deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(224, 207, 255, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 800;
            font-size: 1.8rem;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-brand::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--netflix-red), #ff6b6b);
            transition: width 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--light-purple) !important;
            transform: scale(1.05);
        }

        .navbar-brand:hover::after {
            width: 100%;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.8rem 1.2rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link.active {
            background: linear-gradient(45deg, var(--netflix-red), #ff6b6b);
            color: white !important;
            box-shadow: 0 0 20px rgba(229, 9, 20, 0.4);
        }

        /* Home Link Special Styling */
        .home-link {
            color: white !important;
            text-decoration: none;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-right: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .home-link:hover {
            color: var(--light-purple) !important;
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Mobile Toggle Button */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main Content Area */
        main {
            flex-grow: 1;
            padding: 2rem 0;
            position: relative;
        }

        /* Card Enhancements */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-purple), var(--netflix-red));
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Button Styles */
        .btn-purple {
            background: linear-gradient(45deg, var(--accent-purple), var(--secondary-purple));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-purple::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-purple:hover {
            background: linear-gradient(45deg, #8338ec, var(--accent-purple));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(106, 13, 173, 0.4);
        }

        .btn-purple:hover::before {
            left: 100%;
        }

        /* Typography */
        h1, h2, h3, h4, h5 {
            color: var(--primary-purple);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 2.5rem;
            background: linear-gradient(45deg, var(--primary-purple), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Table Styles */
        table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        table th {
            background: linear-gradient(45deg, var(--secondary-purple), var(--accent-purple));
            color: white;
            font-weight: 600;
            padding: 1rem;
            border: none;
            text-align: center;
        }

        table td {
            padding: 1rem;
            border: none;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background: linear-gradient(90deg, #f3eaff, rgba(224, 207, 255, 0.3));
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        /* Footer */
        .footer {
            background: linear-gradient(90deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: auto;
            border-top: 1px solid rgba(224, 207, 255, 0.2);
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--netflix-red), #ff6b6b, var(--netflix-red));
        }

        .footer p {
            margin: 0;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .nav-link {
                margin: 0.2rem 0;
                text-align: center;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            main {
                padding: 1rem 0;
            }
        }

        /* Loading Animation */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .page-loader.active {
            opacity: 1;
            visibility: visible;
        }

        .loader-content {
            text-align: center;
            color: white;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, var(--netflix-red), #ff6b6b);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(229, 9, 20, 0.4);
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(229, 9, 20, 0.6);
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in-left {
            animation: slideInLeft 0.6s ease-in-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-in-right {
            animation: slideInRight 0.6s ease-in-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body class="d-flex flex-column">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <p>Loading BioskopKita...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-film me-2"></i>BioskopKita
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="home-link">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('studios.index') }}" class="nav-link">
                            <i class="fas fa-building me-2"></i>Studio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('films.index') }}" class="nav-link">
                            <i class="fas fa-film me-2"></i>Film
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('karyawans.index') }}" class="nav-link">
                            <i class="fas fa-users me-2"></i>Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penggunas.index') }}" class="nav-link">
                            <i class="fas fa-user-friends me-2"></i>Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tikets.index') }}" class="nav-link">
                            <i class="fas fa-ticket-alt me-2"></i>Tiket
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transaksis.index') }}" class="nav-link">
                            <i class="fas fa-money-bill-wave me-2"></i>Transaksi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4 flex-grow-1 fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} BioskopKita. Semua hak dilindungi.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>Powered by Netflix-Style Technology</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Page Loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('pageLoader');
            setTimeout(() => {
                loader.classList.remove('active');
            }, 500);
        });

        // Scroll to Top Button
        const scrollTopBtn = document.getElementById('scrollTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Active Link Highlighting
        const currentLocation = location.pathname;
        const navLinks = document.querySelectorAll('.nav-link, .home-link');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentLocation) {
                link.classList.add('active');
            }
        });

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Enhanced table hover effects
        const tableRows = document.querySelectorAll('.table-hover tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });

        // Card animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });

        // Mobile menu auto-close
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        document.addEventListener('click', function(event) {
            const isClickInsideNav = navbarCollapse.contains(event.target);
            const isClickOnToggler = navbarToggler.contains(event.target);
            
            if (!isClickInsideNav && !isClickOnToggler && navbarCollapse.classList.contains('show')) {
                navbarToggler.click();
            }
        });
    </script>
</body>
</html>