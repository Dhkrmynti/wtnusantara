<x-app-layout>
    <x-slot name="title">Dashboard - wtnusantara</x-slot>

    <div class="mb-8">
        <h2 class="font-display text-[24px] font-black tracking-tight text-on-surface">Admin Dashboard</h2>
        <p class="text-[14px] text-secondary">Monitoring performa bisnis dan operasional jaringan wtnusantara.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8">
        <div class="bg-surface-container-lowest p-6 rounded-3xl border border-outline-variant/30 shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Total Pelanggan</div>
            <div class="text-3xl font-black text-on-surface">{{ number_format($stats['total_customers']) }}</div>
            <div class="text-[10px] text-green-600 mt-2 font-bold uppercase tracking-tighter flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Growth +12%
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-3xl border border-outline-variant/30 shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Paket Aktif</div>
            <div class="text-3xl font-black text-on-surface">{{ $stats['total_packages'] }}</div>
            <div class="text-[10px] text-secondary mt-2 font-bold uppercase tracking-tighter">Layanan Internet</div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-3xl border border-outline-variant/30 shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Piutang (Unpaid)</div>
            <div class="text-3xl font-black text-orange-600">Rp {{ number_format($stats['total_unpaid'], 0, ',', '.') }}</div>
            <div class="text-[10px] text-secondary mt-2 font-bold uppercase tracking-tighter italic">Total Tagihan Berjalan</div>
        </div>
        <div class="bg-primary/5 p-6 rounded-3xl border border-primary/20 shadow-sm relative overflow-hidden">
            <div class="relative z-10">
                <div class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">Omset Lunas</div>
                <div class="text-2xl font-black text-primary">Rp {{ number_format($stats['total_paid_month'], 0, ',', '.') }}</div>
                <div class="text-[10px] text-primary/60 mt-2 font-bold uppercase tracking-tighter">Bulan Ini</div>
            </div>
            <svg class="absolute -right-4 -bottom-4 w-24 h-24 text-primary/5 -rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm1 14h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Revenue Trend -->
        <div class="lg:col-span-2 bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/30 shadow-sm">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-lg font-black tracking-tight text-on-surface leading-tight">Tren Pendapatan</h3>
                    <p class="text-xs text-secondary mt-1">Akumulasi pembayaran lunas 6 bulan terakhir</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-primary"></span>
                    <span class="text-[10px] font-black text-secondary uppercase tracking-widest">Pendapatan</span>
                </div>
            </div>
            <div class="h-[300px]">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Package Distribution -->
        <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/30 shadow-sm"
             x-data='{ 
                chartLabels: {!! json_encode($package_dist['labels']) !!}, 
                chartData: {!! json_encode($package_dist['data']) !!},
                chartColors: ["#2563eb", "#3b82f6", "#60a5fa", "#93c5fd", "#bfdbfe"]
             }'>
            <h3 class="text-lg font-black tracking-tight text-on-surface leading-tight mb-1">Populasi Paket</h3>
            <p class="text-xs text-secondary mb-8">Distribusi pelanggan per paket internet</p>
            <div class="h-[250px] flex items-center justify-center">
                <canvas id="packageChart"></canvas>
            </div>
            <div class="mt-8 space-y-3">
                <template x-for="(label, index) in chartLabels" :key="index">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full" :style="'background-color: ' + chartColors[index]"></span>
                            <span class="text-xs font-bold text-secondary" x-text="label"></span>
                        </div>
                        <span class="text-xs font-black text-on-surface" x-text="chartData[index] + ' User'"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Trend Chart
            const revCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueGradient = revCtx.createLinearGradient(0, 0, 0, 400);
            revenueGradient.addColorStop(0, 'rgba(37, 99, 235, 0.2)'); // Hardcoded blue for stability
            revenueGradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

            new Chart(revCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($revenue_trend['labels']) !!},
                    datasets: [{
                        label: 'Pendapatan',
                        data: {!! json_encode($revenue_trend['data']) !!},
                        borderColor: '#2563eb', // Matches a primary blue
                        borderWidth: 4,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#2563eb',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        tension: 0.4,
                        fill: true,
                        backgroundColor: revenueGradient
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            titleFont: { size: 12, weight: 'bold' },
                            bodyFont: { size: 13 },
                            callbacks: {
                                label: function(context) {
                                    return ' Rp ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { display: false },
                            ticks: {
                                color: '#94a3b8',
                                font: { size: 10, weight: '600' },
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000) + 'jt';
                                }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#94a3b8',
                                font: { size: 10, weight: '600' }
                            }
                        }
                    }
                }
            });

            // Package Distribution Chart
            const pkgCtx = document.getElementById('packageChart').getContext('2d');
            new Chart(pkgCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($package_dist['labels']) !!},
                    datasets: [{
                        data: {!! json_encode($package_dist['data']) !!},
                        backgroundColor: [
                            '#2563eb', '#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe'
                        ],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
