@php
    $title = 'Pengaturan Mikrotik API';
@endphp

<x-app-layout :title="$title">
    <div class="mb-8">
        <h2 class="text-2xl font-black tracking-tight text-on-surface">Mikrotik API Settings</h2>
        <p class="text-sm text-secondary">Konfigurasi koneksi router Mikrotik untuk sinkronasi user dan isolir</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-2xl flex items-center gap-3 text-green-600 text-sm font-bold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-surface border border-outline-variant/30 rounded-3xl overflow-hidden shadow-sm">
                <div class="px-8 py-6 border-b border-outline-variant/30 bg-surface-container-low/30">
                    <h3 class="font-bold text-on-surface">Konfigurasi Router</h3>
                </div>
                <div class="p-8">
                    <form action="{{ route('admin.mikrotik-api.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Label Router</label>
                                <input type="text" name="label" value="{{ old('label', $setting->label) }}" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="Contoh: Router Pusat / Core-01">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">IP Address / Host</label>
                                <input type="text" name="host" value="{{ old('host', $setting->host) }}" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="192.168.1.1 atau my-router.com">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Port API</label>
                                <input type="number" name="port" value="{{ old('port', $setting->port ?? 8728) }}" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Username API</label>
                                <input type="text" name="username" value="{{ old('username', $setting->username) }}" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="admin">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Password API</label>
                                <input type="password" name="password" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="Kosongkan jika tidak berubah">
                            </div>

                            <hr class="md:col-span-2 border-outline-variant/30 my-2">

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Default Profile PPOE</label>
                                <input type="text" name="default_profile" value="{{ old('default_profile', $setting->default_profile) }}" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="default">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Isolir Profile</label>
                                <input type="text" name="isolir_profile" value="{{ old('isolir_profile', $setting->isolir_profile) }}" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="ISOLIR">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Default Service</label>
                                <input type="text" name="default_service" value="{{ old('default_service', $setting->default_service ?? 'pppoe') }}" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/50 rounded-2xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface">
                            </div>

                            <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-2xl border border-outline-variant/30">
                                <div>
                                    <div class="text-sm font-bold text-on-surface">Status Aktif</div>
                                    <div class="text-[10px] text-secondary">Gunakan router ini untuk sinkronasi</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" {{ $setting->is_active ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-11 h-6 bg-outline-variant/30 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                </label>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-outline-variant/30 flex gap-3">
                            <button type="submit" class="flex-1 bg-primary text-white py-3 px-6 rounded-2xl font-bold text-sm shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">
                                Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-8">
            <div class="bg-surface border border-outline-variant/30 rounded-3xl p-6 shadow-sm">
                <h4 class="text-sm font-black uppercase tracking-widest text-secondary mb-4">Status Koneksi</h4>
                
                @if($setting->exists)
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-2xl">
                            <div class="text-xs font-bold text-secondary">Status</div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $setting->is_active ? 'bg-green-500/10 text-green-600' : 'bg-red-500/10 text-red-600' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $setting->is_active ? 'bg-green-600' : 'bg-red-600' }}"></span>
                                {{ $setting->is_active ? 'ENABLED' : 'DISABLED' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-2xl">
                            <div class="text-xs font-bold text-secondary">Terakhir Terhubung</div>
                            <div class="text-xs font-bold text-on-surface">{{ $setting->last_connected_at ? $setting->last_connected_at->diffForHumans() : 'Belum pernah' }}</div>
                        </div>

                        <div x-data="{ loading: false, result: null }">
                            <button @click="loading = true; fetch('{{ route('admin.mikrotik-api.test', $setting->id) }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } }).then(res => res.json()).then(data => { loading = false; result = data; })" 
                                    :disabled="loading"
                                    class="w-full py-3 px-4 bg-surface-container-high hover:bg-primary/10 hover:text-primary rounded-2xl font-bold text-xs transition-all flex items-center justify-center gap-2">
                                <template x-if="!loading">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15.59 14.37a6 6 0 01-5.84 0M2.25 12a9.75 9.75 0 1119.5 0 9.75 9.75 0 01-19.5 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </template>
                                <template x-if="loading">
                                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                                        <path d="M4 12a8 8 0 0 1 8-8" stroke-linecap="round"></path>
                                    </svg>
                                </template>
                                <span x-text="loading ? 'Mengetes...' : 'Tes Koneksi Sekarang'"></span>
                            </button>

                            <div x-show="result" x-transition class="mt-4 p-4 rounded-2xl text-[11px] font-bold" :class="result?.status === 'success' ? 'bg-green-500/10 text-green-600' : 'bg-red-500/10 text-red-600'">
                                <span x-text="result?.message"></span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-8 text-center bg-surface-container-low rounded-2xl border border-dashed border-outline-variant/50">
                        <p class="text-xs text-secondary font-medium italic">Simpan konfigurasi untuk mengetes koneksi.</p>
                    </div>
                @endif
            </div>

            <div class="p-6 bg-primary/5 rounded-3xl border border-primary/10">
                <h4 class="text-xs font-black uppercase tracking-widest text-primary mb-2 italic">Petunjuk Penting</h4>
                <ul class="text-[11px] leading-relaxed text-secondary space-y-2">
                    <li class="flex gap-2">
                        <span class="text-primary font-bold">•</span>
                        Pastikan port API (default 8728) sudah aktif di Mikrotik (IP -> Services).
                    </li>
                    <li class="flex gap-2">
                        <span class="text-primary font-bold">•</span>
                        Gunakan user Mikrotik dengan group 'write' atau 'full'.
                    </li>
                    <li class="flex gap-2">
                        <span class="text-primary font-bold">•</span>
                        Host bisa berupa IP Publik, Local, atau DDNS.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
