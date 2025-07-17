<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bioskop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .netflix-glow {
            box-shadow: 0 0 30px rgba(147, 51, 234, 0.3);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite alternate;
        }
        
        @keyframes pulseGlow {
            0% { box-shadow: 0 0 20px rgba(147, 51, 234, 0.4); }
            100% { box-shadow: 0 0 40px rgba(147, 51, 234, 0.8); }
        }
        
        .number-counter {
            background: linear-gradient(45deg, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        
        .bg-dark-cinema {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }
        
        .netflix-red-accent {
            background: linear-gradient(45deg, #e50914, #ff6b6b);
        }
        
        .shimmer {
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }
        
        .bg-gradient-netflix {
            background: linear-gradient(135deg, #e50914 0%, #b81d24 25%, #8b0000 50%, #660000 75%, #4d0000 100%);
        }
        
        .text-glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }
        
        .icon-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #a855f7);
            border-radius: 1rem;
            padding: 2px;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            border-radius: inherit;
            opacity: 0.3;
            filter: blur(8px);
            z-index: -1;
        }
        
        .card-inner {
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #ffffff 100%);
            border-radius: 0.875rem;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .card-inner::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .card-hover:hover .card-inner::before {
            left: 100%;
        }
        
        .hero-text {
            background: linear-gradient(45deg, #ffffff, #e0e7ff, #c7d2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
        }
        
        .popcorn-container {
            position: relative;
            display: inline-block;
        }
        
        .popcorn-glow {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: radial-gradient(circle, rgba(147, 51, 234, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            animation: glowPulse 3s ease-in-out infinite;
        }
        
        @keyframes glowPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

            .text-gold-400 {
        color: #FFD700;
    }

    </style>
</head>
<nav class="bg-gray-900 text-gold-400 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center text-xl font-bold text-white">
                    🎬 MovieBooking
                </div>
                <div class="hidden sm:-my-px sm:ml-10 sm:flex space-x-4 items-center">
                    <a href="{{ route('home') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{ route('films.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Film</a>
                    <a href="{{ route('studios.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Studio</a>
                    <a href="{{ route('tikets.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tiket</a>
                    <a href="{{ route('transaksis.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Transaksi</a>
                    <a href="{{ route('penggunas.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pengguna</a>
                    <a href="{{ route('karyawans.index') }}" class="text-gold-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Karyawan</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<body class="bg-dark-cinema min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <!-- Hero Section -->
        <div class="text-center mb-12 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 via-transparent to-purple-600/20 blur-3xl"></div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black hero-text mb-4 relative z-10">
                🎬 Selamat Datang di Sistem Reservasi Bioskop
            </h1>
            <div class="w-32 h-1 bg-gradient-netflix mx-auto rounded-full mb-4"></div>
            <p class="text-purple-200 text-lg md:text-xl font-light relative z-10">
                Pengalaman Cinema Premium dengan Teknologi Terdepan
            </p>
        </div>

        <!-- Stats Dashboard -->
        <div class="stats-grid mb-16">
            <!-- Total Film -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">🎞️</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Film Collection</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $totalFilms }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Total Film</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-3/4 shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Total Studio -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">🏟️</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Cinema Halls</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $totalStudios }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Total Studio</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-2/3 shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Tiket Tersedia -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">🎟️</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Available Now</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $tiketTersedia }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Tiket Tersedia</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-4/5 shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Total Transaksi -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">💰</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Transactions</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $totalTransaksis }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Total Transaksi</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-5/6 shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Total Pengguna -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">👥</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Active Users</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $totalPenggunas }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Pengguna Terdaftar</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-3/5 shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Total Karyawan -->
            <div class="gradient-border card-hover netflix-glow">
                <div class="card-inner p-8 text-white">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-6xl icon-bounce opacity-80">🧑‍💼</div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-purple-200 uppercase tracking-wider">Staff Members</div>
                            <div class="text-5xl font-black number-counter mt-2">{{ $totalKaryawans }}</div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-glow">Total Karyawan</h2>
                    <div class="mt-4 bg-white/10 rounded-full h-2">
                        <div class="bg-gradient-to-r from-white to-purple-200 h-2 rounded-full w-1/2 shimmer"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="text-center">
            <div class="mb-8">
                <p class="text-xl md:text-2xl font-light text-purple-100 italic mb-8">
                    "Nikmati pengalaman nonton terbaik dengan sistem reservasi modern dan cepat!"
                </p>
                <div class="flex justify-center items-center space-x-4">
                    <div class="w-20 h-1 bg-gradient-netflix rounded-full"></div>
                    <div class="text-4xl">🎬</div>
                    <div class="w-20 h-1 bg-gradient-netflix rounded-full"></div>
                </div>
            </div>
            
            <div class="popcorn-container floating-animation">
                <div class="popcorn-glow"></div>
                <img src="{{ asset('images/popcorn.svg') }}" alt="Popcorn" class="w-40 h-40 relative z-10 filter drop-shadow-2xl">
            </div>
            
            <div class="mt-8 text-purple-300">
                <p class="text-sm font-medium">Powered by Modern Cinema Technology</p>
            </div>
        </div>
    </div>

    <script>
        // Add dynamic number counting animation
        document.addEventListener('DOMContentLoaded', function() {
            const numbers = document.querySelectorAll('.number-counter');
            
            numbers.forEach(number => {
                const finalValue = parseInt(number.textContent);
                let currentValue = 0;
                const increment = Math.ceil(finalValue / 100);
                
                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= finalValue) {
                        number.textContent = finalValue;
                        clearInterval(timer);
                    } else {
                        number.textContent = currentValue;
                    }
                }, 30);
            });
        });
    </script>
</body>
</html>