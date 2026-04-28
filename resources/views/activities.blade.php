@extends('layouts.main')

@section('title', 'Aktivitas Lapangan | WTNusantara')

@section('content')
    <!-- Header Section -->
    <header class="pt-[140px] pb-16 px-5 lg:px-[5%] bg-white border-b border-slate-100">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <nav class="flex items-center gap-2 mb-6 text-[10px] font-bold uppercase tracking-widest text-[var(--secondary)]">
                        <a href="{{ url('/') }}" class="hover:text-[var(--primary)] transition-colors">Beranda</a>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-[var(--primary)]">Aktivitas</span>
                    </nav>
                    <h1 class="font-primary text-4xl lg:text-5xl font-extrabold text-[var(--text-dark)] mb-6 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                        Langkah <span class="text-[var(--primary)]">Nyata Kami</span>
                    </h3>
                    <p class="text-[var(--secondary)] text-lg leading-relaxed">
                        Dokumentasi kerja keras tim WTNusantara dalam membangun infrastruktur digital di seluruh pelosok negeri.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Activities Grid -->
    <section class="py-20 px-5 lg:px-[5%]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 12; $i++)
                <div class="relative aspect-square border border-slate-200 shadow-2xl shadow-slate-300/40 rounded-2xl overflow-hidden group cursor-pointer lg:hover:rotate-1 transition-all duration-500">
                    <img src="https://picsum.photos/800/800?random={{ $i + 50 }}" alt="Activity {{ $i }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--text-dark)]/90 via-[var(--text-dark)]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                        <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-[10px] font-bold text-[var(--primary)] uppercase tracking-[0.3em] mb-3 block">Infrastruktur & Maintenance</span>
                            <h4 class="text-white font-primary font-bold text-xl leading-snug" style="font-family: 'Outfit', sans-serif;">
                                Pemasangan Fiber Optik di Wilayah Strategis {{ $i }}
                            </h4>
                            <p class="text-slate-300 text-[10px] mt-4 font-bold uppercase tracking-widest flex items-center gap-2">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Lokasi: Area {{ $i * 7 }} - Indonesia
                            </p>
                        </div>
                    </div>
                    <!-- Date Badge -->
                    <div class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-md rounded-lg text-[var(--text-dark)] font-bold text-[10px] tracking-widest shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        12 MEI 2024
                    </div>
                </div>
                @endfor
            </div>

            <!-- Load More Placeholder -->
            <div class="mt-20 text-center">
                <button class="px-12 py-5 border-2 border-slate-200 text-[var(--text-dark)] font-bold uppercase tracking-[0.3em] text-[10px] hover:border-[var(--primary)] hover:text-[var(--primary)] transition-all rounded-2xl group">
                    Muat Lebih Banyak
                    <svg class="w-4 h-4 inline-block ml-2 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Social Connect -->
    <section class="py-20 px-5 lg:px-[5%] bg-[var(--text-dark)] text-white relative overflow-hidden">
        <div class="bg-[var(--primary)]/10 absolute inset-0 -z-10 [clip-path:polygon(0_0,100%_0,100%_100%,20%_100%)]"></div>
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="max-w-xl text-center lg:text-left">
                    <h2 class="font-primary text-3xl lg:text-4xl font-extrabold mb-6 tracking-tight" style="font-family: 'Outfit', sans-serif;">Pantau Aktivitas Harian Kami di Media Sosial</h2>
                    <p class="text-slate-400 text-lg">Ikuti perjalanan kami secara real-time melalui platform media sosial resmi WTNusantara.</p>
                </div>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="#" class="p-6 bg-white/5 border border-white/10 hover:border-[var(--primary)] hover:bg-white/10 transition-all rounded-2xl">
                        <svg class="w-8 h-8 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163..."></path></svg>
                    </a>
                    <a href="#" class="p-6 bg-white/5 border border-white/10 hover:border-[var(--primary)] hover:bg-white/10 transition-all rounded-2xl">
                        <svg class="w-8 h-8 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184..."></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
