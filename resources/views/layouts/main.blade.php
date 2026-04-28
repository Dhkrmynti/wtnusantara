<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('wtnusantara-logo.png') }}">

    <title>@yield('title', 'WTNusantara | Era Baru Konektivitas Digital')</title>

    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #0ea5e9;
            --secondary: #94a3b8;
            --surface: #f8fafc;
            --text-dark: #1e293b;
        }
    </style>
    @stack('styles')
</head>
<body class="font-secondary antialiased bg-white text-[var(--text-dark)] overflow-x-hidden m-0" style="font-family: 'Inter', sans-serif;">

    <!-- Header -->
    <nav class="fixed top-0 left-0 w-full h-[90px] flex items-center justify-between px-5 lg:px-[5%] z-[100] bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="flex items-center gap-3">
            <a href="/"><img src="{{ asset('wtnusantara-logo.png') }}" alt="WTNusantara Logo" class="h-10 w-auto" loading="lazy"></a>
        </div>
        
        <div class="hidden lg:flex gap-12 items-center">
            <a href="/" class="font-primary text-sm font-bold text-slate-700 hover:text-[var(--primary)] transition-colors">Home</a>
            <a href="/produk" class="font-primary text-sm font-bold text-slate-700 hover:text-[var(--primary)] transition-colors">Packages</a>
            <a href="/#peta-jangkauan" class="font-primary text-sm font-bold text-slate-700 hover:text-[var(--primary)] transition-colors">Services</a>
            <a href="/blog" class="font-primary text-sm font-bold text-slate-700 hover:text-[var(--primary)] transition-colors">Pages</a>
            <a href="/#medsos" class="font-primary text-sm font-bold text-slate-700 hover:text-[var(--primary)] transition-colors">Contact us</a>
            
            <a href="/#cta" class="ml-4 font-primary bg-blue-600 text-white px-10 py-4 rounded-xl text-sm font-black transition-all hover:bg-blue-700 hover:-translate-y-0.5 shadow-lg shadow-blue-100" style="font-family: 'Outfit', sans-serif;">Get Started</a>
        </div>

        <!-- Mobile Menu Button (Hamburger) -->
        <button id="mobile-menu-btn" class="lg:hidden p-2 text-[var(--text-dark)] hover:text-[var(--primary)] transition-colors focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 z-[200] bg-white translate-x-full transition-transform duration-500 lg:hidden overflow-y-auto">
        <div class="p-8">
            <div class="flex items-center justify-between mb-20">
                <img src="{{ asset('wtnusantara-logo.png') }}" alt="WTNusantara Logo" class="h-10 w-auto">
                <button id="close-menu-btn" class="p-2 text-[var(--text-dark)] hover:text-[var(--primary)] transition-colors focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <nav class="flex flex-col gap-8">
                <a href="/produk" class="mobile-nav-link font-primary text-2xl font-bold {{ Request::is('produk') ? 'text-[var(--primary)]' : 'text-[var(--text-dark)]' }} hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">Produk</a>
                <a href="/#peta-jangkauan" class="mobile-nav-link font-primary text-2xl font-bold text-[var(--text-dark)] hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">Jaringan</a>
                <a href="/speed-test" class="mobile-nav-link font-primary text-2xl font-bold {{ Request::is('speed-test') ? 'text-[var(--primary)]' : 'text-[var(--text-dark)]' }} hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">Speed Test</a>
                <a href="/#blog" class="mobile-nav-link font-primary text-2xl font-bold text-[var(--text-dark)] hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">Blog</a>
                <a href="/#medsos" class="mobile-nav-link font-primary text-2xl font-bold text-[var(--text-dark)] hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">Kontak</a>
                
                <a href="/#cta" class="mobile-nav-link mt-12 bg-[var(--primary)] text-white px-10 py-5 rounded-3xl text-center text-sm font-bold uppercase tracking-widest hover:bg-sky-600 transition-all font-primary" style="font-family: 'Outfit', sans-serif;">Hubungi Kami</a>
            </nav>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-slate-50 pt-20 pb-10 px-5 lg:px-[5%] border-t border-slate-200">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Column 1: Branding -->
                <div>
                    <h3 class="font-primary text-2xl font-black text-[var(--primary)] mb-6 flex items-center gap-2" style="font-family: 'Outfit', sans-serif;">
                        WT<span class="text-[var(--text-dark)]">Nusantara</span>
                    </h3>
                    <p class="text-[var(--secondary)] text-sm leading-relaxed mb-6">
                        Penyedia infrastruktur digital terdepan di Indonesia, menghadirkan konektivitas andal untuk masa depan bangsa yang lebih terhubung.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="w-8 h-8 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[var(--primary)] hover:border-[var(--primary)] transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[var(--primary)] hover:border-[var(--primary)] transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[var(--primary)] hover:border-[var(--primary)] transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Layanan -->
                <div>
                    <h4 class="font-primary font-bold text-[var(--text-dark)] mb-6 uppercase tracking-widest text-xs" style="font-family: 'Outfit', sans-serif;">Layanan</h4>
                    <ul class="space-y-4">
                        <li><a href="/produk" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Internet Broadband</a></li>
                        <li><a href="/produk" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Dedicated Fiber</a></li>
                        <li><a href="#" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Network Security</a></li>
                        <li><a href="/speed-test" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Speed Test</a></li>
                    </ul>
                </div>

                <!-- Column 3: Perusahaan -->
                <div>
                    <h4 class="font-primary font-bold text-[var(--text-dark)] mb-6 uppercase tracking-widest text-xs" style="font-family: 'Outfit', sans-serif;">Perusahaan</h4>
                    <ul class="space-y-4">
                        <li><a href="/#mengapa-kami" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Tentang Kami</a></li>
                        <li><a href="/#peta-jangkauan" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Visi & Misi</a></li>
                        <li><a href="#" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Karir</a></li>
                        <li><a href="/#blog" class="text-[var(--secondary)] text-sm hover:text-[var(--primary)] transition-colors">Beritas</a></li>
                    </ul>
                </div>

                <!-- Column 4: Hubungi Kami -->
                <div>
                    <h4 class="font-primary font-bold text-[var(--text-dark)] mb-6 uppercase tracking-widest text-xs" style="font-family: 'Outfit', sans-serif;">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--primary)] mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-[var(--secondary)] text-sm">Jl. Jenderal Sudirman No. 123, Jakarta Selatan, 12190</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[var(--primary)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-[var(--secondary)] text-sm">+62 21 555 1234</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[var(--primary)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-[var(--secondary)] text-sm">info@wtnusantara.co.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-10 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
                <p class="text-[var(--secondary)] text-[10px] font-bold uppercase tracking-[0.2em]">
                    &copy; 2024 WTNusantara. Semua Hak Dilindungi.
                </p>
                <div class="flex items-center gap-8">
                    <a href="#" class="text-[var(--secondary)] text-[10px] font-bold uppercase tracking-[0.2em] hover:text-[var(--primary)] transition-colors">Privacy Policy</a>
                    <a href="#" class="text-[var(--secondary)] text-[10px] font-bold uppercase tracking-[0.2em] hover:text-[var(--primary)] transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

            function toggleMenu() {
                mobileMenu.classList.toggle('translate-x-full');
                document.body.classList.toggle('overflow-hidden');
            }

            if (mobileMenuBtn && closeMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', toggleMenu);
                closeMenuBtn.addEventListener('click', toggleMenu);
                
                mobileNavLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('translate-x-full');
                        document.body.classList.remove('overflow-hidden');
                    });
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
