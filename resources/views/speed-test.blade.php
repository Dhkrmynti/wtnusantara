@extends('layouts.main')

@section('title', 'Speed Test | WTNusantara')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .gauge-container {
        width: 100%;
        max-width: 220px;
        aspect-ratio: 1/1;
        position: relative;
    }
    
    .gauge-svg {
        transform: rotate(135deg); /* Start at 7 o'clock */
    }
    
    .gauge-circle-bg {
        fill: none;
        stroke: #f1f5f9;
        stroke-width: 8;
        stroke-dasharray: 330 440; /* 270 degree arc */
        stroke-linecap: round;
    }
    
    .gauge-circle {
        fill: none;
        stroke: var(--primary);
        stroke-width: 8;
        stroke-dasharray: 330 440;
        stroke-dashoffset: 330; /* Start empty */
        stroke-linecap: round;
        transition: stroke-dashoffset 0.3s ease-out;
    }

    /* footer { display: none !important; } */
</style>
@endpush

@section('content')
    <!-- Speed Test Hero -->
    <main class="min-h-[calc(100vh-90px)] flex flex-col items-center justify-center pt-32 pb-20 px-5 lg:px-[5%] bg-slate-50 text-center relative overflow-hidden">
        <div class="container mx-auto max-w-xl">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--primary)] mb-1 block">Engine Room</span>
            <h1 class="font-primary text-2xl md:text-3xl font-black tracking-tighter text-[var(--text-dark)] mb-4" style="font-family: 'Outfit', sans-serif;">
                Uji Kecepatan <span class="text-[var(--primary)]">Sekarang</span>
            </h1>

            <!-- Gauge UI -->
            <div class="bg-white p-6 rounded-[32px] shadow-2xl shadow-sky-500/5 flex flex-col items-center mb-6 border border-slate-100">
                <div class="gauge-container mb-4">
                    <svg class="gauge-svg w-full h-full" viewBox="0 0 160 160">
                        <circle class="gauge-circle-bg" cx="80" cy="80" r="70"></circle>
                        <circle id="speedGauge" class="gauge-circle" cx="80" cy="80" r="70"></circle>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pt-2">
                        <span id="speedValue" class="text-5xl font-black text-[var(--text-dark)]" style="font-family: 'Outfit', sans-serif;">0</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[var(--secondary)]">Mbps</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 md:gap-6 w-full max-w-md mb-6">
                    <div class="text-center">
                        <span class="block text-[8px] md:text-[9px] font-bold uppercase tracking-widest text-[var(--secondary)] mb-1">Ping</span>
                        <span id="pingValue" class="text-sm md:text-lg font-bold text-[var(--text-dark)]" style="font-family: 'Outfit', sans-serif;">-- ms</span>
                    </div>
                    <div class="text-center border-l border-r border-slate-100">
                        <span class="block text-[8px] md:text-[9px] font-bold uppercase tracking-widest text-[var(--secondary)] mb-1">Upload</span>
                        <span id="uploadValue" class="text-sm md:text-lg font-bold text-[var(--text-dark)]" style="font-family: 'Outfit', sans-serif;">-- Mbps</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-[8px] md:text-[9px] font-bold uppercase tracking-widest text-[var(--secondary)] mb-1">Download</span>
                        <span id="downloadValueSmall" class="text-sm md:text-lg font-bold text-[var(--primary)]" style="font-family: 'Outfit', sans-serif;">-- Mbps</span>
                    </div>
                </div>

                <button onclick="startTest()" id="startBtn" class="font-primary bg-[var(--primary)] text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-sky-600 hover:scale-105 transition-all duration-300 shadow-lg shadow-sky-500/20" style="font-family: 'Outfit', sans-serif;">
                    Mulai Tes Sekarang
                </button>
            </div>

            <p class="text-[var(--secondary)] text-[10px] leading-relaxed max-w-xs mx-auto">
                <span class="opacity-50 block mb-2">Note: Hasil dikalibrasi untuk akurasi throughput dunia nyata.</span>
                Terhubung ke jaringan <b class="text-[var(--primary)]">WTNusantara</b> untuk hasil optimal.
            </p>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    async function startTest() {
        const btn = document.getElementById('startBtn');
        const gauge = document.getElementById('speedGauge');
        const speedText = document.getElementById('speedValue');
        const pingLabel = document.getElementById('pingValue');
        const uploadLabel = document.getElementById('uploadValue');
        const downloadLabelSmall = document.getElementById('downloadValueSmall');
        
        const isLocal = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
        const OVERHEAD_FACTOR = 0.85; // Real-world TCP calibration

        btn.disabled = true;
        btn.classList.add('opacity-50');
        
        // Reset Labels
        pingLabel.innerText = "Lari...";
        uploadLabel.innerText = "Lari...";
        downloadLabelSmall.innerText = "Lari...";
        speedText.innerText = "0";
        gauge.style.strokeDashoffset = 330;

        try {
            // 1. PING TEST
            btn.innerHTML = 'Testing Ping...';
            const ping = await measurePing();
            pingLabel.innerText = ping + " ms";

            // 2. UPLOAD TEST
            btn.innerHTML = 'Testing Upload...';
            const uploadSpeed = await measureUpload((progressSpeed) => {
                const calibratedUpload = (progressSpeed * OVERHEAD_FACTOR).toFixed(1);
                uploadLabel.innerText = (isLocal ? progressSpeed : calibratedUpload) + " Mbps";
            });
            uploadLabel.innerText = (isLocal ? uploadSpeed : (uploadSpeed * OVERHEAD_FACTOR).toFixed(1)) + " Mbps";

            // 3. DOWNLOAD TEST
            btn.innerHTML = 'Testing Download...';
            const testFile = 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=4000&q=100'; 
            const startTime = performance.now();
            let lastUpdate = startTime;
            let smoothSpeed = 0;
            const TEST_DURATION_MS = 12000; // Max 12 seconds
            
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), TEST_DURATION_MS);

            try {
                const response = await fetch(testFile, { 
                    cache: 'no-store',
                    signal: controller.signal 
                });
                
                if (!response.ok) throw new Error('Network error');
                
                const reader = response.body.getReader();
                const contentLength = +response.headers.get('Content-Length') || 15000000; // Assume 15MB if unknown
                let receivedBytes = 0;

                while(true) {
                    const {done, value} = await reader.read();
                    const currentTime = performance.now();
                    const elapsed = currentTime - startTime;

                    if (done || elapsed >= TEST_DURATION_MS) {
                        if (elapsed >= TEST_DURATION_MS) await reader.cancel();
                        break;
                    }
                    
                    receivedBytes += value.length;
                    
                    // Update UI every 100ms for smoothness
                    if (currentTime - lastUpdate > 100) {
                        const durationInSeconds = elapsed / 1000;
                        const bitsLoaded = receivedBytes * 8;
                        const currentMbps = (bitsLoaded / (durationInSeconds * 1000000)) * OVERHEAD_FACTOR;
                        
                        // Weighted moving average for "smooth" feel
                        smoothSpeed = smoothSpeed === 0 ? currentMbps : (smoothSpeed * 0.8) + (currentMbps * 0.2);
                        
                        const displaySpeed = smoothSpeed.toFixed(1);
                        speedText.innerText = Math.floor(smoothSpeed);
                        downloadLabelSmall.innerText = displaySpeed + " Mbps";
                        
                        const offset = 330 - (Math.min(smoothSpeed, 500) / 500) * 330;
                        gauge.style.strokeDashoffset = offset;
                        
                        const percent = Math.min(Math.floor((receivedBytes/contentLength)*100), 99);
                        btn.innerHTML = `Downloading... ${percent}% (${Math.ceil((TEST_DURATION_MS - elapsed)/1000)}s)`;
                        lastUpdate = currentTime;
                    }
                }
            } catch (error) {
                if (error.name === 'AbortError') {
                    console.log('Download finished due to timeout');
                } else {
                    throw error;
                }
            } finally {
                clearTimeout(timeoutId);
            }

            btn.innerText = "Semua Selesai";
            btn.classList.remove('opacity-50');
            btn.disabled = false;
            
            setTimeout(() => {
                btn.innerText = "Tes Lagi";
            }, 3000);

        } catch (err) {
            console.error(err);
            btn.innerText = "Error: " + err.message;
            btn.disabled = false;
            btn.classList.remove('opacity-50');
        }
    }

    async function measurePing() {
        const url = window.location.origin + "/favicon.ico?t=" + Date.now();
        let total = 0;
        const count = 3;
        for(let i=0; i<count; i++) {
            const t1 = performance.now();
            await fetch(url, { mode: 'no-cors' });
            total += (performance.now() - t1);
        }
        return Math.floor(total / count);
    }

    function measureUpload(onProgress) {
        return new Promise((resolve, reject) => {
            const data = new Uint8Array(1024 * 1024 * 5); // 5MB payload
            const startTime = performance.now();
            const xhr = new XMLHttpRequest();
            
            xhr.upload.onprogress = (e) => {
                if (e.lengthComputable) {
                    const duration = (performance.now() - startTime) / 1000;
                    if (duration > 0) {
                        const mbps = ((e.loaded * 8) / (duration * 1024 * 1024)).toFixed(1);
                        onProgress(mbps);
                    }
                }
            };

            xhr.onload = () => {
                const totalDuration = (performance.now() - startTime) / 1000;
                resolve(((data.length * 8) / (totalDuration * 1024 * 1024)).toFixed(1));
            };

            xhr.onerror = () => reject(new Error('Upload failed'));

            xhr.open('POST', '/speed-test/upload');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(data);
        });
    }
</script>
@endpush
