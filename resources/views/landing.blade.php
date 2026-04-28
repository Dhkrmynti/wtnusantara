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
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-xl bg-blue-50 text-blue-600 mb-8 border border-blue-100/50 shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white scale-75 shadow-lg shadow-blue-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest">Premium Internet Provider</span>
                </div>

                <h1 class="text-3xl md:text-4xl xl:text-5xl leading-[1.2] font-black tracking-tight text-slate-900 mb-8 font-primary">
                    Reliable <span class="text-blue-600">Internet,</span> <br>
                    Anytime, Anywhere
                </h1>

                <p class="text-sm md:text-base text-slate-500 font-medium leading-relaxed mb-10 max-w-lg">
                    Hadirkan kecepatan dan keandalan internet kelas dunia di rumah dan bisnis Anda. Bersama WTNusantara, jelajahi era digital tanpa hambatan.
                </p>

                <div class="flex flex-wrap items-center gap-6">
                    <a href="/produk" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-black text-xs uppercase tracking-widest transition-all hover:scale-105 hover:shadow-2xl hover:shadow-blue-200 active:scale-95">
                        Lihat Paket
                    </a>
                </div>
            </div>

            <!-- Visual Content (Anchored to Bottom) -->
            <div class="lg:col-span-6 xl:col-span-7 relative flex justify-center lg:justify-end self-end">
                <div class="relative w-full max-w-[650px] flex items-end">
                    <!-- Pricing Badge Floating -->
                    <div class="absolute top-20 -left-10 md:-left-20 z-10 pricing-badge-float p-6 rounded-[32px] shadow-2xl border border-white/50 backdrop-blur-xl transform hover:-translate-y-2 transition-transform duration-500">
                        <div class="flex items-end gap-3 text-left">
                            <h4 class="text-4xl font-black text-slate-900 leading-none tracking-tighter">64<span class="text-2xl font-bold text-blue-600">$</span></h4>
                            <div class="text-left pb-1">
                                <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest leading-none mb-1">Mulai Dari</p>
                                <p class="text-xs font-bold text-slate-400">per bulan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Image Re-anchored to absolute bottom -->
                    <div class="relative z-20 w-full transform hover:scale-[1.01] transition-transform duration-1000 origin-bottom">
                        <img src="{{ asset('orang_hero.png') }}" alt="WTNusantara Hero" class="w-full h-auto object-contain rounded-t-[60px] drop-shadow-[0_-20px_50px_rgba(59,130,246,0.1)] block">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- COVERAGE SECTION -->
<section id="peta-jangkauan" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black tracking-tight text-slate-900 sm:text-5xl mb-4">Cek Jangkauan</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto font-medium">Cek kesediaan layanan kami di lokasi Anda. Kami menjangkau area dengan presisi tinggi melalui jaringan fiber optik andal.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-10 rounded-[32px] shadow-sm border border-slate-100">
                    <h3 class="text-xl font-black mb-8">Deteksi Jangkauan</h3>
                    
                    <div class="space-y-6 mb-10">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">Langkah 1</p>
                                <p class="text-sm font-bold text-slate-700 leading-tight">Tekan tombol deteksi di bawah</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">Langkah 2</p>
                                <p class="text-sm font-bold text-slate-700 leading-tight">Berikan izin browser untuk tahu lokasi Anda</p>
                            </div>
                        </div>
                    </div>

                    <div id="checkResult" class="hidden mb-8 p-6 bg-slate-50 rounded-2xl border border-slate-100 animate-fade-in"></div>

                    <button id="detectBtn" onclick="detectUserLocation()" class="w-full py-5 bg-blue-600 text-white rounded-[24px] font-black text-base shadow-xl shadow-blue-100 hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
                        Deteksi Lokasi Saya
                    </button>
                </div>
            </div>

            <!-- Map View -->
            <div class="lg:col-span-2 relative">
                <div class="bg-white p-3 rounded-[40px] shadow-2xl shadow-slate-200 border border-slate-100 h-[650px] overflow-hidden">
                    <div id="coverageMap" class="w-full h-full rounded-[30px] z-10 transition-all"></div>
                </div>
                
                <!-- Map Legend -->
                <div class="absolute bottom-10 left-10 z-20 bg-white/90 backdrop-blur-md p-5 rounded-2xl border border-slate-200 shadow-xl flex flex-col gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-4 h-4 rounded-full bg-blue-600 shadow-lg shadow-blue-200 animate-pulse"></div>
                        <span class="text-[10px] font-black uppercase text-slate-700 tracking-widest">Wilayah Tercover</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

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
                    ? `<a href="https://wa.me/6281234567890" target="_blank" class="mt-6 block w-full py-4 bg-green-600 hover:bg-green-700 text-white rounded-xl text-center text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-green-100">Daftar Sekarang</a>`
                    : `<a href="https://wa.me/6281234567890" target="_blank" class="mt-6 block w-full py-4 bg-orange-600 hover:bg-orange-700 text-white rounded-xl text-center text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-orange-100">Request Jaringan</a>`
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