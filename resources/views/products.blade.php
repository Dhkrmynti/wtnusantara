@extends('layouts.main')

@section('title', 'Produk & Layanan | WTNusantara')

@section('content')
    <!-- Products Hero -->
    <section class="pt-40 pb-20 px-5 lg:px-[5%] bg-slate-50/50 text-center">
        <div class="container mx-auto max-w-4xl">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[var(--primary)] mb-4 block">Produk & Layanan</span>
            <h1 class="font-primary text-5xl md:text-6xl font-black tracking-tighter text-[var(--text-dark)] mb-6" style="font-family: 'Outfit', sans-serif;">
                Solusi Digital <span class="text-[var(--primary)]">Tanpa Batas</span>
            </h1>
            <p class="text-[var(--secondary)] text-lg md:text-xl leading-relaxed">
                Pilih paket yang sesuai dengan kebutuhan konektivitas Anda, mulai dari penggunaan rumahan hingga skala korporasi besar.
            </p>
        </div>
    </section>

    <!-- Product Grid -->
    <section class="py-20 px-5 lg:px-[5%]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Package 1: Residential -->
                <div class="bg-white border border-slate-100 p-10 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-500/5 transition-all group rounded-[32px]">
                    <div class="w-12 h-12 bg-sky-50 flex items-center justify-center rounded-xl text-[var(--primary)] mb-8">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="font-primary text-2xl font-bold mb-2" style="font-family: 'Outfit', sans-serif;">Home Broadband</h3>
                    <p class="text-[var(--secondary)] text-sm mb-8 leading-relaxed">Internet cepat dan stabil untuk kebutuhan streaming, gaming, dan work from home.</p>
                    <div class="text-4xl font-black text-[var(--text-dark)] mb-8" style="font-family: 'Outfit', sans-serif;">
                        <span class="text-xs uppercase tracking-widest text-[var(--secondary)] font-normal">Mulai Dari</span><br>
                        Rp 299k<span class="text-sm font-normal text-[var(--secondary)]">/bulan</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Hingga 50 Mbps</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Unlimited Quota</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Gratis Router Wi-Fi</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-slate-900 text-white font-bold uppercase tracking-widest text-[10px] hover:bg-[var(--primary)] transition-all rounded-full">Pilih Paket</a>
                </div>

                <!-- Package 2: Business (Featured) -->
                <div class="bg-white border-2 border-[var(--primary)] p-10 shadow-2xl shadow-sky-500/10 relative overflow-hidden rounded-[32px]">
                    <div class="absolute top-5 right-[-35px] bg-[var(--primary)] text-white text-[9px] font-bold uppercase tracking-widest py-1 px-10 rotate-45">Terpopuler</div>
                    <div class="w-12 h-12 bg-sky-50 flex items-center justify-center rounded-xl text-[var(--primary)] mb-8">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-primary text-2xl font-bold mb-2" style="font-family: 'Outfit', sans-serif;">Business Pro</h3>
                    <p class="text-[var(--secondary)] text-sm mb-8 leading-relaxed">Solusi internet terdedikasi untuk bisnis rintisan (SME) dengan stabilitas tinggi.</p>
                    <div class="text-4xl font-black text-[var(--text-dark)] mb-8" style="font-family: 'Outfit', sans-serif;">
                        <span class="text-xs uppercase tracking-widest text-[var(--secondary)] font-normal">Mulai Dari</span><br>
                        Rp 1.2jt<span class="text-sm font-normal text-[var(--secondary)]">/bulan</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Hingga 200 Mbps</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> 1:1 Symmetric Speed</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> SLA 99.9%</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Technical Support 24/7</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-[var(--primary)] text-white font-bold uppercase tracking-widest text-[10px] hover:bg-sky-600 transition-all rounded-full">Pilih Paket</a>
                </div>

                <!-- Package 3: Enterprise -->
                <div class="bg-white border border-slate-100 p-10 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-500/5 transition-all group rounded-[32px]">
                    <div class="w-12 h-12 bg-sky-50 flex items-center justify-center rounded-xl text-[var(--primary)] mb-8">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h3 class="font-primary text-2xl font-bold mb-2" style="font-family: 'Outfit', sans-serif;">Enterprise Custom</h3>
                    <p class="text-[var(--secondary)] text-sm mb-8 leading-relaxed">Konektivitas bandwidth besar (Gbps) untuk korporasi, gedung, dan pusat data.</p>
                    <div class="text-4xl font-black text-[var(--text-dark)] mb-8" style="font-family: 'Outfit', sans-serif;">
                        <span class="text-xs uppercase tracking-widest text-[var(--secondary)] font-normal">Harga</span><br>
                        Negotiable
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Dedicated Multi-BGP</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Link Redundancy</li>
                        <li class="flex items-center gap-3 text-sm text-slate-600"><svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg> Managed Services</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-slate-900 text-white font-bold uppercase tracking-widest text-[10px] hover:bg-[var(--primary)] transition-all rounded-full">Hubungi Sales</a>
                </div>
            </div>
        </div>
    </section>
@endsection
