@extends('layouts.main')
@section('title', 'WTNusantara | Reliable Internet, Anytime, Anywhere')

@push('styles')
<style>
    .hero-capsule {
        position: absolute;
        border-radius: 9999px;
        transform: rotate(-45deg);
        z-index: 1;
        opacity: 0.1;
    }
    .c-1 { width: 900px; height: 150px; top: -10%; left: -10%; background: linear-gradient(90deg, #3b82f6, #60a5fa); }
    .c-2 { width: 700px; height: 120px; top: 20%; right: -5%; background: linear-gradient(90deg, #2563eb, #3b82f6); }
    .c-3 { width: 500px; height: 90px; bottom: 10%; left: 5%; background: linear-gradient(90deg, #1d4ed8, #3b82f6); }
    .c-4 { width: 800px; height: 140px; bottom: -5%; right: 15%; background: linear-gradient(90deg, #3b82f6, #93c5fd); }
    
    .pricing-badge-float {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
    }
    .blend-multiply {
        mix-blend-mode: multiply;
    }
    .hero-text-shimmer {
        background: linear-gradient(to right, #0f172a 20%, #3b82f6 40%, #3b82f6 60%, #0f172a 80%);
        background-size: 200% auto;
        color: #000;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 5s linear infinite;
    }
    @keyframes shine {
        to { background-position: 200% center; }
    }
</style>
@endpush

@section('content')

<!-- HERO SECTION (REVERTED TO 50/50) -->
<section class="relative h-screen flex pt-[90px] overflow-hidden bg-white">
    <!-- CSS BASED CAPSULES (Ultra Sharp) -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="hero-capsule c-1"></div>
        <div class="hero-capsule c-2"></div>
        <div class="hero-capsule c-3"></div>
        <div class="hero-capsule c-4"></div>
    </div>

    <div class="container mx-auto px-5 lg:px-[5%] relative z-10 flex h-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 w-full">
            
            <!-- Text Content (Centered Vertically) -->
            <div class="lg:col-span-6 xl:col-span-5 self-center pb-24">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-2xl bg-blue-50 text-blue-600 mb-8 border border-blue-100/50 shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white scale-75 shadow-lg shadow-blue-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest">Premium Internet Provider</span>
                </div>

                <h1 class="text-3xl md:text-4xl xl:text-5xl leading-[1.2] font-black tracking-tight text-slate-900 mb-8 font-primary">
                    Reliable <span class="text-blue-600">Internet,</span> <br>
                    <span class="text-3xl md:text-4xl xl:text-5xl">Anytime, Anywhere</span>
                </h1>

                <p class="text-sm md:text-base text-slate-500 font-medium leading-relaxed mb-10 max-w-lg">
                    Hadirkan kecepatan dan keandalan internet kelas dunia di rumah dan bisnis Anda. Bersama WTNusantara, jelajahi era digital tanpa hambatan.
                </p>

                <div class="flex flex-wrap items-center gap-6">
                    <a href="/produk" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all hover:scale-105 hover:shadow-2xl hover:shadow-blue-200 active:scale-95">
                        Lihat Paket
                    </a>
                </div>
            </div>

            <!-- Visual Content (Anchored to Bottom) -->
            <div class="lg:col-span-6 xl:col-span-7 relative flex justify-center lg:justify-end self-end">
                <div class="relative w-full max-w-[650px] flex items-end">
                    <!-- Pricing Badge Floating -->
                    <div class="absolute -top-18 left-1/2 md:top-20 md:-left-20 z-30 pricing-badge-float p-4 md:p-6 rounded-2xl shadow-2xl border border-white/50 backdrop-blur-xl transform hover:-translate-y-2 transition-transform duration-500">
                        <div class="flex items-end gap-2 md:gap-3 text-left">
                            <h4 class="text-2xl md:text-4xl font-black text-slate-900 leading-none tracking-tighter">64<span class="text-xl md:text-2xl font-bold text-blue-600">$</span></h4>
                            <div class="text-left pb-1">
                                <p class="text-[8px] md:text-[10px] font-black text-blue-600 uppercase tracking-widest leading-none mb-1">Mulai Dari</p>
                                <p class="text-[10px] md:text-xs font-bold text-slate-400">per bulan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Hero Image (Optimized for LCP) -->
                    <div class="relative z-20 w-full transform hover:scale-[1.01] transition-transform duration-1000 origin-bottom">
                        <img src="{{ asset('orang_hero.png') }}" 
                             alt="WTNusantara Hero" 
                             class="w-full h-auto object-contain rounded-t-xl drop-shadow-[0_-20px_50px_rgba(59,130,246,0.1)] block"
                             fetchpriority="high"
                             width="650"
                             height="800">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- BENTO STYLE: WHY CHOOSE US (COMPACT) -->
<section id="why-choose-us" class="py-12 bg-slate-50 relative overflow-hidden">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Header Section (Compact & Centered) -->
        <div class="max-w-2xl mb-12 mx-auto text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-600 mb-4 border border-blue-200 shadow-sm">
                <span class="text-[9px] font-black uppercase tracking-widest leading-none">Why Us?</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight tracking-tight mb-4">
                Definisi Baru <span class="text-blue-600">Kebebasan Digital.</span>
            </h2>
            <p class="text-base text-slate-500 font-medium leading-relaxed">
                Kami memberikan pengalaman konektivitas yang mengubah cara Anda bekerja dan bersantai.
            </p>
        </div>

        <!-- Bento Grid Layout (Compact Height) -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:h-[600px]">
            
            <!-- Tile 1: Fast Speeds -->
            <div class="md:col-span-12 lg:col-span-7 bg-white rounded-2xl p-8 lg:p-12 border border-slate-100 shadow-lg shadow-slate-200/40 relative overflow-hidden group hover:border-blue-200 transition-all">
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl lg:text-4xl font-black text-slate-900 mb-4 leading-tight">Ultra-High <br>Speed Fiber.</h3>
                        <p class="text-slate-500 mb-8 max-w-sm font-medium text-sm leading-relaxed">Kecepatan hingga 1Gbps dengan latensi terendah untuk cloud gaming.</p>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="flex flex-col">
                            <span class="text-4xl font-black text-blue-600">1Gbps</span>
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Max Speed</span>
                        </div>
                        <div class="h-10 w-[1px] bg-slate-100"></div>
                        <div class="flex flex-col">
                            <span class="text-4xl font-black text-slate-900">0.5<span class="font-bold text-xl">ms</span></span>
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Latency</span>
                        </div>
                    </div>
                </div>
                <div class="absolute right-[-5%] top-[-5%] w-48 h-48 bg-blue-50 rounded-full blur-3xl opacity-30"></div>
            </div>

            <!-- Tile 2: Uptime Guarantee -->
            <div class="md:col-span-6 lg:col-span-5 bg-blue-600 rounded-2xl p-8 lg:p-12 text-white shadow-xl shadow-blue-100 relative overflow-hidden group">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-2xl font-black mb-4 leading-tight">99.9% <br>Uptime.</h3>
                        <p class="text-blue-100/80 mb-6 text-sm font-medium">Jaminan koneksi stabil setiap detik untuk produktivitas Anda.</p>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 self-start">
                        <div class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-[9px] font-black uppercase tracking-widest">Live</span>
                    </div>
                </div>
                <div class="absolute -right-8 -bottom-8 w-32 h-32 border-[15px] border-white/5 rounded-full"></div>
            </div>

            <!-- Tile 3: 24/7 Support -->
            <div class="md:col-span-6 lg:col-span-4 bg-slate-900 rounded-2xl p-8 lg:p-12 text-white relative overflow-hidden">
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-black mb-4 leading-tight">24/7 <br>Support.</h3>
                        <p class="text-slate-400 text-sm font-medium">Tim teknisi nyata siap membantu Anda kapan saja.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-blue-500 border-2 border-slate-900"></div>
                            <div class="w-8 h-8 rounded-full bg-slate-700 border-2 border-slate-900"></div>
                        </div>
                        <span class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">Experts</span>
                    </div>
                </div>
            </div>

            <!-- Tile 4: Family Image -->
            <div class="md:col-span-12 lg:col-span-8 bg-white rounded-2xl relative overflow-hidden group shadow-lg shadow-slate-200/30 min-h-[350px]">
                <img src="{{ asset('ayah_dan_anak.png') }}" 
                     alt="WTNusantara Family" 
                     class="absolute inset-0 w-full h-full object-cover"
                     loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/10 to-transparent"></div>
                <div class="absolute bottom-8 left-8 text-white z-10">
                    <h3 class="text-2xl lg:text-3xl font-black mb-2 leading-tight">Kebahagiaan Keluarga.</h3>
                    <p class="text-white/70 text-xs font-medium max-w-xs">Instalasi gratis dan kemudahan akses internet di rumah Anda.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- COVERAGE SECTION -->

<!-- STATISTICS SECTION -->
<section id="stats-jangkauan" class="py-12 bg-white">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Section Header (Centered) -->
        <div class="max-w-2xl mx-auto text-center mb-16 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-600 mb-4 border border-blue-200 shadow-sm">
                <span class="text-[9px] font-black uppercase tracking-widest leading-none">Jangkauan Kami</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight tracking-tight">
                Konektivitas Tanpa Batas <br> <span class="text-blue-600">di Seluruh Nusantara.</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            
            <!-- Stat 1 -->
            <div class="bg-slate-50 p-8 md:p-10 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center text-center transition-all hover:shadow-xl hover:shadow-blue-500/5 group">
                <span class="text-4xl md:text-5xl font-black text-blue-600 mb-3 group-hover:scale-110 transition-transform">34+</span>
                <span class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-widest">Provinsi <br>Terlayani</span>
            </div>

            <!-- Stat 2 -->
            <div class="bg-slate-50 p-8 md:p-10 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center text-center transition-all hover:shadow-xl hover:shadow-blue-500/5 group">
                <span class="text-4xl md:text-5xl font-black text-slate-900 mb-3 group-hover:scale-110 transition-transform">514+</span>
                <span class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-widest">Kota & <br>Kabupaten</span>
            </div>

            <!-- Stat 3 -->
            <div class="bg-slate-50 p-8 md:p-10 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center text-center transition-all hover:shadow-xl hover:shadow-blue-500/5 group">
                <span class="text-4xl md:text-5xl font-black text-blue-600 mb-3 group-hover:scale-110 transition-transform">1.5k+</span>
                <span class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-widest">Titik <br>Jaringan Aktif</span>
            </div>

            <!-- Stat 4 -->
            <div class="bg-slate-50 p-8 md:p-10 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center text-center transition-all hover:shadow-xl hover:shadow-blue-500/5 group">
                <span class="text-4xl md:text-5xl font-black text-slate-900 mb-3 group-hover:scale-110 transition-transform">24/7</span>
                <span class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-widest">Network <br>Monitoring</span>
            </div>

        </div>
    </div>
</section>

<!-- COVERAGE SECTION (MODERN OVERHAUL) -->
<section id="peta-jangkauan" class="py-12 bg-slate-50 relative">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Section Header (Centered - Match Bento Style) -->
        <div class="max-w-2xl mx-auto text-center mb-12 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 mb-6 border border-blue-100 shadow-sm">
                <span class="text-[10px] font-black uppercase tracking-widest leading-none">Cek Jangkauan</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight tracking-tight mb-4">
                Temukan <span class="text-blue-600">Koneksi Terbaik</span> <br class="hidden md:block"> di Lokasi Anda.
            </h2>
            <p class="text-base text-slate-500 font-medium leading-relaxed">
                Gunakan peta interaktif kami untuk melihat ketersediaan layanan fiber optik WTNusantara di area Anda secara real-time.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            <!-- Sidebar: Search & Results (4 Columns) -->
            <div class="lg:col-span-4 flex flex-col">
                <div class="bg-slate-50 p-8 lg:p-10 rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 flex flex-col h-full ring-1 ring-slate-200/50">
                    <h3 class="text-xl font-black text-slate-900 mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                        Status Jangkauan
                    </h3>
                    
                    <!-- Steps -->
                    <div class="space-y-8 mb-12">
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-2xl bg-white text-blue-600 flex items-center justify-center shrink-0 border border-slate-200 shadow-sm group-hover:border-blue-300 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold uppercase text-slate-400 tracking-widest mb-1 leading-none">Step 01</p>
                                <p class="text-sm font-bold text-slate-700 leading-snug">Klik tombol 'Deteksi Lokasi' di bawah ini.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-2xl bg-white text-blue-600 flex items-center justify-center shrink-0 border border-slate-200 shadow-sm group-hover:border-blue-300 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold uppercase text-slate-400 tracking-widest mb-1 leading-none">Step 02</p>
                                <p class="text-sm font-bold text-slate-700 leading-snug">Izinkan browser mengakses lokasi Anda.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Result Card (Dynamic) -->
                    <div id="checkResult" class="hidden mb-8 p-6 bg-white rounded-2xl border border-blue-50 animate-fade-in ring-1 ring-blue-100 shadow-inner"></div>

                    <!-- Button -->
                    <div class="mt-auto">
                        <button id="detectBtn" onclick="detectUserLocation()" class="w-full py-5 bg-blue-600 text-white rounded-2xl font-black text-base shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-1 active:translate-y-0 transition-all flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Deteksi Lokasi Saya
                        </button>
                        <p class="text-[10px] text-center text-slate-400 mt-4 font-medium uppercase tracking-tight">Privasi Anda terjamin. Lokasi hanya digunakan untuk cek coverage.</p>
                    </div>
                </div>
            </div>

            <!-- Map Panel (8 Columns) -->
            <div class="lg:col-span-8 relative">
                <div class="bg-slate-100 p-2 rounded-2xl shadow-2xl shadow-slate-200 border border-slate-200 flex flex-col h-full min-h-[450px] lg:h-[550px] overflow-hidden">
                    <div id="coverageMap" class="w-full h-full rounded-2xl z-10 transition-all cursor-crosshair"></div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- CLIENTS SECTION -->
<section id="klien-kami" class="py-12 bg-white">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Section Header (Centered) -->
        <div class="max-w-2xl mx-auto text-center mb-16 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-500 mb-4 border border-slate-200">
                <span class="text-[9px] font-black uppercase tracking-widest leading-none">Mitra Strategis</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight tracking-tight">
                Dipercaya oleh <span class="text-blue-600">Berbagai Instansi & Perusahaan.</span>
            </h2>
        </div>

        <!-- Logo Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-8 lg:gap-12 items-center opacity-50 grayscale hover:grayscale-0 transition-all duration-700">
            <!-- Client 1 -->
            <div class="flex items-center justify-center p-6 md:p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                <span class="text-base md:text-xl font-black text-slate-400">BRAND 01</span>
            </div>
            <!-- Client 2 -->
            <div class="flex items-center justify-center p-6 md:p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                <span class="text-base md:text-xl font-black text-slate-400">BRAND 02</span>
            </div>
            <!-- Client 3 -->
            <div class="flex items-center justify-center p-6 md:p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                <span class="text-base md:text-xl font-black text-slate-400">BRAND 03</span>
            </div>
            <!-- Client 4 -->
            <div class="flex items-center justify-center p-6 md:p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                <span class="text-base md:text-xl font-black text-slate-400">BRAND 04</span>
            </div>
            <!-- Client 5 -->
            <div class="flex items-center justify-center p-6 md:p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                <span class="text-base md:text-xl font-black text-slate-400">BRAND 05</span>
            </div>
        </div>

    </div>
</section>

<!-- BLOG SECTION -->
<section id="blog" class="py-12 bg-slate-50">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Section Header (Centered) -->
        <div class="max-w-2xl mx-auto text-center mb-16 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-600 mb-4 border border-blue-200">
                <span class="text-[9px] font-black uppercase tracking-widest leading-none">Blog & News</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight tracking-tight mb-4">
                Wawasan & <span class="text-blue-600">Berita Terbaru.</span>
            </h2>
            <p class="text-base text-slate-500 font-medium leading-relaxed">
                Tetap update dengan tren teknologi dan kabar terbaru dari WTNusantara.
            </p>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="group cursor-pointer bg-white border border-slate-200 p-3 shadow-2xl shadow-slate-200/60 rounded-2xl transition-all hover:-translate-y-1">
                <div class="aspect-[16/10] bg-slate-50 rounded-t-xl overflow-hidden mb-6">
                    <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://placehold.co/800x500/2563eb/white?text=Berita+WTN' }}" 
                         alt="{{ $post->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 grayscale hover:grayscale-0">
                </div>
                <div class="px-3 pb-4">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[var(--primary)] mb-3 block">Update Teknologi</span>
                    <h3 class="font-primary text-xl font-bold text-[var(--text-dark)] mb-4 leading-snug group-hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">
                        {{ $post->title }}
                    </h3>
                    <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                    <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                        <div class="flex items-center gap-2 font-primary text-[10px] font-bold uppercase tracking-widest text-[var(--text-dark)]" style="font-family: 'Outfit', sans-serif;">
                            Baca Selengkapnya
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                        <span class="text-[10px] font-bold text-slate-300">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full py-12 text-center text-slate-400 border-2 border-dashed border-slate-100 rounded-2xl">Belum ada postingan terbaru.</div>
            @endforelse
        </div>

        <!-- View All Button -->
        <div class="mt-16 text-center">
            <a href="{{ route('blog') }}" class="inline-flex items-center justify-center px-8 py-4 bg-slate-900 text-white rounded-2xl font-black text-sm hover:bg-black hover:-translate-y-1 transition-all shadow-xl shadow-slate-200">
                Lihat Semua Berita
            </a>
        </div>

    </div>
</section>

<!-- RECENT ACTIVITIES SECTION -->
<section id="aktivitas-terbaru" class="py-12 bg-white relative overflow-hidden">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        
        <!-- Section Header (Centered - Match Other Sections) -->
        <div class="max-w-2xl mx-auto text-center mb-16 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-500 mb-4 border border-slate-200">
                <span class="text-[9px] font-black uppercase tracking-widest leading-none">Our Activity</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight tracking-tight mb-4">
                Jejak <span class="text-blue-600">Langkah Kami.</span>
            </h2>
            <p class="text-base text-slate-500 font-medium leading-relaxed">
                Kami terus bergerak membangun infrastruktur digital dan menjalin kemitraan untuk Indonesia yang lebih terhubung.
            </p>
        </div>

        <!-- Activity List Grid (Centered Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($activities as $activity)
            <div class="relative aspect-square border border-slate-200 shadow-2xl shadow-slate-300/40 rounded-2xl overflow-hidden group cursor-pointer lg:hover:rotate-1 transition-all duration-500">
                <img src="{{ $activity->image ? asset('storage/'.$activity->image) : 'https://placehold.co/800x800/2563eb/white?text=Aktivitas+WTN' }}" 
                     alt="Aktivitas WTNusantara" 
                     class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-[var(--text-dark)]/90 via-[var(--text-dark)]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="text-[10px] font-bold text-[var(--primary)] uppercase tracking-[0.3em] mb-3 block">Infrastruktur & Maintenance</span>
                        <h4 class="text-white font-primary font-bold text-xl leading-snug" style="font-family: 'Outfit', sans-serif;">
                            Dokumentasi Lapangan
                        </h4>
                        <p class="text-slate-300 text-[10px] mt-4 font-bold uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Lokasi: Area Operasional
                        </p>
                    </div>
                </div>

                <!-- Date Badge -->
                <div class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-md rounded-lg text-[var(--text-dark)] font-bold text-[10px] tracking-widest shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    {{ $activity->activity_date ? $activity->activity_date->format('d M Y') : $activity->created_at->format('d M Y') }}
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-slate-400 border-2 border-dashed border-slate-100 rounded-2xl">Belum ada aktivitas terbaru.</div>
            @endforelse
        </div>

        <!-- View All Button (Optional but consistent) -->
        <div class="mt-16 text-center">
            <a href="{{ route('activities') }}" class="group inline-flex items-center gap-3 font-black text-blue-600">
                <span class="w-12 h-[1px] bg-blue-100 group-hover:w-16 transition-all"></span>
                Lihat Seluruh Aktivitas
            </a>
        </div>

    </div>
</section>

<!-- SOCIAL MEDIA SECTION -->
<section id="sosmed" class="py-12 bg-slate-50 relative overflow-hidden">
    <div class="container mx-auto px-5 lg:px-[5%] relative z-10">
        <div class="space-y-24">
            
            <!-- Instagram -->
            <div>
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-600 flex items-center justify-center text-white shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2"></line></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight">@wtnusantara</h3>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Ikuti Kami</p>
                        </div>
                    </div>
                    <a href="#" class="px-6 py-3 bg-white border border-slate-200 text-slate-900 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-slate-900 hover:text-white transition-all shadow-sm">Follow Instagram</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @for($i=1; $i<=5; $i++)
                    <div class="aspect-square rounded-2xl overflow-hidden group relative cursor-pointer shadow-md">
                        <img src="https://placehold.co/400x400/833ab4/white?text=IG+Post+{{$i}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- YouTube -->
            <div>
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-red-600 flex items-center justify-center text-white shadow-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight">WTNusantara TV</h3>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Ikuti Kami</p>
                        </div>
                    </div>
                    <a href="#" class="px-6 py-3 bg-white border border-slate-200 text-slate-900 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all shadow-sm">YouTube Channel</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @for($i=1; $i<=5; $i++)
                    <div class="aspect-video lg:aspect-square rounded-2xl overflow-hidden group relative cursor-pointer shadow-md">
                        <img src="https://placehold.co/600x400/ff0000/white?text=YT+Video+{{$i}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- TikTok -->
            <div>
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-black flex items-center justify-center text-white shadow-lg ring-1 ring-white/10">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.81-.6-4.03-1.37-.01 2.33-.02 4.66-.02 6.99 0 2.21-.68 4.41-2.12 6.13-1.63 1.95-4.11 3.07-6.58 3.07-2.48 0-4.96-1.12-6.59-3.07-1.44-1.72-2.12-3.92-2.12-6.13a9.07 9.07 0 0 1 2.12-6.13C4.4 7.5 6.15 6.3 8.1 5.86c.01 1.4.01 2.8 0 4.2-.7-.01-1.41.13-2.07.4-.73.34-1.35.93-1.69 1.66-.34.73-.34 1.58-.1 2.3.26.83.9 1.57 1.64 1.92.73.34 1.58.34 2.31.1.86-.3 1.6-1.04 1.97-1.87.31-.73.4-1.54.4-2.35V0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight">@wtnusantara.official</h3>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Ikuti Kami</p>
                        </div>
                    </div>
                    <a href="#" class="px-6 py-3 bg-white border border-slate-200 text-slate-900 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-black hover:text-white transition-all shadow-sm">Follow TikTok</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @for($i=1; $i<=5; $i++)
                    <div class="aspect-[9/16] lg:aspect-square rounded-2xl overflow-hidden group relative cursor-pointer shadow-md">
                        <img src="https://placehold.co/400x711/000000/white?text=TikTok+{{$i}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/80 to-transparent">
                            <div class="flex items-center gap-2 text-white">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 5v14l11-7z"/></svg>
                                <span class="text-[10px] font-black tracking-widest uppercase">Play</span>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FLOATING WHATSAPP BUTTON -->
<a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-8 right-8 z-[100] group flex items-center gap-3">
    <!-- Tooltip -->
    <div class="px-5 py-3 bg-white rounded-2xl shadow-2xl border border-slate-100 opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0 transition-all duration-500 pointer-events-none flex flex-col items-end">
        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Butuh Bantuan?</span>
        <span class="text-sm font-black text-slate-900 leading-none">Hubungi Kami Sekarang</span>
    </div>
    
    <!-- Button Container -->
    <div class="relative">
        <!-- Pulse Effect -->
        <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-20 group-hover:opacity-40"></div>
        
        <!-- Main Button -->
        <div class="relative w-16 h-16 rounded-full bg-gradient-to-tr from-green-500 to-green-400 flex items-center justify-center text-white shadow-2xl shadow-green-200 group-hover:scale-110 transition-transform duration-500">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.067 2.877 1.215 3.076.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.396.015 12.035c0 2.123.554 4.197 1.605 6.006L0 24l6.117-1.605a11.803 11.803 0 005.925 1.585h.005c6.637 0 12.032-5.396 12.036-12.035a11.811 11.811 0 00-3.48-8.506"/></svg>
        </div>
    </div>
</a>

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    let map;
    const serviceAreas = {!! \App\Models\ServiceArea::all()->toJson() !!};

    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });

    function initMap() {
        map = L.map('coverageMap', {
            zoomControl: false,
            scrollWheelZoom: false
        }).setView([-7.1510, 112.4410], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; WTNusantara'
        }).addTo(map);

        L.control.zoom({ position: 'topright' }).addTo(map);

        // Render Service Areas (Polygons)
        serviceAreas.forEach(area => {
            const coords = typeof area.coordinates === 'string' ? JSON.parse(area.coordinates) : area.coordinates;
            if (coords && coords.length >= 3) {
                L.polygon(coords, {
                    color: area.color || '#3b82f6',
                    fillColor: area.color || '#3b82f6',
                    fillOpacity: 0.15,
                    weight: 3,
                    dashArray: '5, 10'
                }).addTo(map).bindPopup(`<b class="font-primary">${area.name}</b>`);
            }
        });

        if(serviceAreas.length > 0) {
           // Auto bounds
        }
    }

    function calculateDistance(lat1, lon1, lat2, lon2) {
        const R = 6371; 
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;
        const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                  Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                  Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }

    function isPointInPolygon(point, vs) {
        var x = point[0], y = point[1];
        var inside = false;
        for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
            var xi = vs[i][0], yi = vs[i][1];
            var xj = vs[j][0], yj = vs[j][1];
            var intersect = ((yi > y) != (yj > y)) && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) inside = !inside;
        }
        return inside;
    }

    function detectUserLocation() {
        const btn = document.getElementById('detectBtn');
        const res = document.getElementById('checkResult');
        
        btn.disabled = true;
        btn.innerHTML = 'Mendeteksi...';

        if (!navigator.geolocation) {
            alert("Geolocation is not supported by your browser.");
            btn.disabled = false;
            btn.innerText = "Deteksi Lokasi Saya";
            return;
        }

        navigator.geolocation.getCurrentPosition((position) => {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            map.flyTo([userLat, userLng], 14);
            
            L.circleMarker([userLat, userLng], {
                radius: 10,
                color: '#fff',
                fillColor: '#3b82f6',
                fillOpacity: 1,
                weight: 5
            }).addTo(map).bindPopup("<b>Lokasi Anda</b>").openPopup();

            let isCovered = false;
            let coveredArea = null;

            serviceAreas.forEach(area => {
                const vs = typeof area.coordinates === 'string' ? JSON.parse(area.coordinates) : area.coordinates;
                if (vs && vs.length >= 3 && isPointInPolygon([userLat, userLng], vs)) {
                    isCovered = true;
                    coveredArea = area;
                }
            });

            let minDistance = Infinity;
            serviceAreas.forEach(area => {
                const vs = typeof area.coordinates === 'string' ? JSON.parse(area.coordinates) : area.coordinates;
                vs.forEach(c => {
                    const dist = calculateDistance(userLat, userLng, c[0], c[1]);
                    if (dist < minDistance) minDistance = dist;
                });
            });

            res.innerHTML = `
                <div class="${isCovered ? 'text-green-600' : 'text-orange-600'} flex items-center gap-3 mb-3 font-black text-base">
                    <svg class="w-6 h-6 shadow-sm" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="${isCovered ? 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' : 'M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z'}" clip-rule="evenodd"></path></svg>
                    ${isCovered ? 'Wilayah Tercover!' : 'Belum Tercover'}
                </div>
                <p class="text-slate-600 text-xs font-medium leading-relaxed">
                    ${isCovered 
                        ? `Selamat! Anda berada di dalam wilayah <b>${coveredArea.name}</b>. Silakan ajukan pemasangan sekarang.` 
                        : `Lokasi Anda berada di luar jangkauan terjauh kami (${minDistance.toFixed(1)} km). Anda bisa mengajukan request perluasan jaringan.`}
                </p>
                ${isCovered 
                    ? `<a href="https://wa.me/6281234567890" target="_blank" class="mt-6 block w-full py-4 bg-green-600 hover:bg-green-700 text-white rounded-2xl text-center text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-green-100">Daftar Sekarang</a>`
                    : `<a href="https://wa.me/6281234567890" target="_blank" class="mt-6 block w-full py-4 bg-orange-600 hover:bg-orange-700 text-white rounded-2xl text-center text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-orange-100">Request Jaringan</a>`
                }
            `;
            res.classList.remove('hidden');
            btn.innerHTML = 'Deteksi Selesai';
        }, (err) => {
            alert("Gagal mendeteksi lokasi: " + err.message);
            btn.disabled = false;
            btn.innerText = "Deteksi Lokasi Saya";
        });
    }
</script>
@endpush