@php
    $title = 'Daftar Paket Internet';
@endphp

<x-app-layout :title="$title">
    <div x-data="{ 
        drawerOpen: false, 
        editMode: false,
        formData: {
            id: '',
            name: '',
            profile: '',
            monthly_price: '',
            installation_fee: '',
            description: '',
            badge: '',
            is_active: true,
            is_featured: false
        },
        openDrawer(mode = 'create', data = null) {
            this.editMode = mode === 'edit';
            if (this.editMode && data) {
                this.formData = { ...data };
            } else {
                this.formData = {
                    id: '',
                    name: '',
                    profile: '',
                    monthly_price: '',
                    installation_fee: '',
                    description: '',
                    badge: '',
                    is_active: true,
                    is_featured: false
                };
            }
            this.drawerOpen = true;
        }
    }">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight text-on-surface">Paket Internet</h2>
                <p class="text-sm text-secondary">Kelola daftar paket dan layanan internet wtnusantara</p>
            </div>
            <button @click="openDrawer('create')" class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Tambah Paket
            </button>
        </div>

        <!-- Table Card -->
        <div class="bg-surface border border-outline-variant/30 rounded-2xl overflow-visible shadow-sm p-4">
            <div class="overflow-visible">
                <table id="packages-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">No</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Nama Paket</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Profile Mikrotik</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Harga</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Status</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                    </tbody>
                </table>
            </div>
        </div>

        @push('scripts')
        <script>
            $(document).ready(function() {
                $('#packages-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.packages.index') }}",
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-[11px] font-black text-secondary/40 uppercase tracking-widest text-center' },
                        { data: 'name', name: 'name', className: 'font-bold text-on-surface text-left' },
                        { data: 'profile', name: 'profile', render: function(data) {
                            return '<code class="px-2 bg-surface-container-high rounded text-primary text-[10px] font-bold">' + data + '</code>';
                        }, className: 'text-left' },
                        { data: 'monthly_price', name: 'monthly_price', render: function(data) {
                            return '<span class="font-bold text-on-surface">Rp ' + new Intl.NumberFormat('id-ID').format(data) + '</span>';
                        }, className: 'text-sm text-left' },
                        { data: 'is_active', name: 'is_active', render: function(data) {
                            if(data) return '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-black bg-green-500/10 text-green-600 uppercase tracking-wider"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>Active</span>';
                            return '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-black bg-red-500/10 text-red-600 uppercase tracking-wider"><span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>Inactive</span>';
                        }, className: 'text-left' },
                        { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' },
                    ],
                    language: {
                        search: "",
                        searchPlaceholder: "Cari data paket...",
                        lengthMenu: "Tampilkan _MENU_",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Data tidak ditemukan",
                        zeroRecords: "Tidak ada data yang cocok",
                        paginate: {
                            previous: "Prev",
                            next: "Next"
                        }
                    },
                    drawCallback: function() {
                        // Re-initialize Alpine logic for dynamic buttons in DataTables
                        if (window.Alpine) {
                            window.Alpine.initTree(document.getElementById('packages-table'));
                        }
                    }
                });
            });
        </script>
        @endpush

        <!-- Slide-over Drawer -->
        <div x-show="drawerOpen" 
             class="fixed inset-0 z-[60] overflow-hidden" 
             style="display: none;">
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" 
                 x-show="drawerOpen"
                 x-transition:enter="ease-in-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in-out duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="drawerOpen = false"></div>

            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto w-screen max-w-md transform transition ease-in-out duration-500 sm:duration-700"
                     x-show="drawerOpen"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full">
                    
                    <div class="flex h-full flex-col overflow-y-scroll bg-surface shadow-2xl border-l border-outline-variant/30">
                        <div class="px-6 py-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low/50">
                            <div>
                                <h2 class="text-lg font-black tracking-tight text-on-surface" x-text="editMode ? 'Edit Paket Internet' : 'Tambah Paket Baru'"></h2>
                                <p class="text-xs text-secondary">Lengkapi informasi paket di bawah ini</p>
                            </div>
                            <button @click="drawerOpen = false" class="text-secondary hover:text-on-surface transition-colors p-2 rounded-lg hover:bg-surface-container-high">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M6 18L18 6M6 6l18 18" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="relative flex-1 px-6 py-6">
                            <form :action="editMode ? '/admin/packages/' + formData.id : '{{ route('admin.packages.store') }}'" method="POST">
                                @csrf
                                <template x-if="editMode">
                                    <input type="hidden" name="_method" value="PUT">
                                </template>

                                <div class="space-y-5">
                                    <div class="space-y-1.5">
                                        <label for="name" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Nama Paket</label>
                                        <input type="text" name="name" x-model="formData.name" required class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface placeholder:text-secondary/40" placeholder="Contoh: Paket Home 20 Mbps">
                                    </div>

                                    <div class="space-y-1.5">
                                        <label for="profile" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Profile Mikrotik</label>
                                        <input type="text" name="profile" x-model="formData.profile" required class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface placeholder:text-secondary/40" placeholder="Contoh: profile_20mbps">
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="space-y-1.5">
                                            <label for="monthly_price" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Harga Bulanan</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-bold text-secondary/50">Rp</span>
                                                <input type="number" name="monthly_price" x-model="formData.monthly_price" required class="w-full pl-10 pr-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm text-on-surface" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="space-y-1.5">
                                            <label for="installation_fee" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Biaya Pasang</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-bold text-secondary/50">Rp</span>
                                                <input type="number" name="installation_fee" x-model="formData.installation_fee" required class="w-full pl-10 pr-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm text-on-surface" placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-1.5">
                                        <label for="badge" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Badge (Opsional)</label>
                                        <input type="text" name="badge" x-model="formData.badge" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="Contoh: Terlaris / Promo">
                                    </div>

                                    <div class="space-y-1.5">
                                        <label for="description" class="text-[11px] font-black uppercase tracking-widest text-secondary/70 ml-1">Deskripsi</label>
                                        <textarea name="description" x-model="formData.description" rows="3" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/50 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm text-on-surface" placeholder="Keterangan mengenai paket ini..."></textarea>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-2xl border border-outline-variant/30">
                                        <div>
                                            <div class="text-sm font-bold text-on-surface">Paket Aktif</div>
                                            <div class="text-[10px] text-secondary">Tampilkan paket di pilihan pendaftaran</div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="is_active" value="1" x-model="formData.is_active" class="sr-only peer">
                                            <div class="w-11 h-6 bg-outline-variant/30 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-2xl border border-outline-variant/30">
                                        <div>
                                            <div class="text-sm font-bold text-on-surface">Unggulan (Featured)</div>
                                            <div class="text-[10px] text-secondary">Tandai sebagai paket rekomendasi</div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="is_featured" value="1" x-model="formData.is_featured" class="sr-only peer">
                                            <div class="w-11 h-6 bg-outline-variant/30 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-10 flex gap-3">
                                    <button type="button" @click="drawerOpen = false" class="flex-1 px-4 py-3 border border-outline-variant text-secondary rounded-xl font-bold text-sm hover:bg-surface-container-high transition-all">Batal</button>
                                    <button type="submit" class="flex-1 px-4 py-3 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">Simpan Paket</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
