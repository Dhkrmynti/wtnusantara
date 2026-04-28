@extends('layouts.main')

@section('title', 'Berita & Wawasan | WTNusantara')

@section('content')
    <!-- Header Section -->
    <header class="pt-[140px] pb-16 px-5 lg:px-[5%] bg-white border-b border-slate-100">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <nav class="flex items-center gap-2 mb-6 text-[10px] font-bold uppercase tracking-widest text-[var(--secondary)]">
                        <a href="{{ url('/') }}" class="hover:text-[var(--primary)] transition-colors">Beranda</a>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-[var(--primary)]">Berita</span>
                    </nav>
                    <h1 class="font-primary text-4xl lg:text-5xl font-extrabold text-[var(--text-dark)] mb-6 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                        Wawasan & <span class="text-[var(--primary)]">Berita Terbaru</span>
                    </h1>
                    <p class="text-[var(--secondary)] text-lg leading-relaxed">
                        Ikuti perkembangan teknologi jaringan, infrastruktur digital, dan inovasi terbaru dari tim WTNusantara.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Blog Grid -->
    <section class="py-20 px-5 lg:px-[5%]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @for ($i = 1; $i <= 9; $i++)
                <article class="group cursor-pointer bg-white border border-slate-200 p-3 shadow-2xl shadow-slate-200/60 rounded-2xl transition-all hover:-translate-y-1">
                    <div class="aspect-[16/10] bg-slate-50 rounded-t-xl overflow-hidden mb-6">
                        <img src="https://picsum.photos/800/500?random={{ $i + 10 }}" alt="News {{ $i }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 grayscale hover:grayscale-0" loading="lazy">
                    </div>
                    <div class="px-3 pb-4">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[var(--primary)] mb-3 block">Update Teknologi</span>
                        <h3 class="font-primary text-xl font-bold text-[var(--text-dark)] mb-4 leading-snug group-hover:text-[var(--primary)] transition-colors" style="font-family: 'Outfit', sans-serif;">
                            Inovasi Jaringan {{ $i }}: Masa Depan Konektivitas Indonesia
                        </h3>
                        <p class="text-[var(--secondary)] text-sm mb-6 line-clamp-2 leading-relaxed">
                            Mempelajari bagaimana implementasi teknologi terbaru kami dapat meningkatkan efisiensi bisnis dan kualitas hidup masyarakat di era digital.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                            <div class="flex items-center gap-2 font-primary text-[10px] font-bold uppercase tracking-widest text-[var(--text-dark)]" style="font-family: 'Outfit', sans-serif;">
                                Baca Selengkapnya
                                <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </div>
                            <span class="text-[10px] font-bold text-slate-300">24 APR 2024</span>
                        </div>
                    </div>
                </article>
                @endfor
            </div>

            <!-- Pagination Placeholder -->
            <div class="mt-20 flex justify-center items-center gap-2">
                <button class="w-10 h-10 border border-[var(--primary)] bg-[var(--primary)] text-white font-bold rounded-lg">1</button>
                <button class="w-10 h-10 border border-slate-200 hover:border-[var(--primary)] text-[var(--text-dark)] font-bold rounded-lg transition-colors">2</button>
                <button class="w-10 h-10 border border-slate-200 hover:border-[var(--primary)] text-[var(--text-dark)] font-bold rounded-lg transition-colors">3</button>
                <div class="mx-2 text-slate-300">...</div>
                <button class="w-10 h-10 border border-slate-200 hover:border-[var(--primary)] text-[var(--text-dark)] font-bold rounded-lg transition-colors">
                    <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="py-20 px-5 lg:px-[5%] bg-slate-50 border-t border-slate-200">
        <div class="container mx-auto text-center">
            <h2 class="font-primary text-3xl font-extrabold text-[var(--text-dark)] mb-8" style="font-family: 'Outfit', sans-serif;">Ingin Mendapatkan Update Langsung?</h2>
            <p class="text-[var(--secondary)] mb-10 max-w-xl mx-auto">Berlangganan newsletter kami untuk mendapatkan berita teknologi terbaru langsung di inbox Anda.</p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Email Anda" class="w-full px-6 py-4 border border-slate-200 focus:border-[var(--primary)] outline-none transition-all">
                <button class="w-full md:w-auto px-10 py-4 bg-[var(--text-dark)] text-white font-bold uppercase tracking-widest text-xs hover:bg-[var(--primary)] transition-all">Subscribe</button>
            </div>
        </div>
    </section>
@endsection
