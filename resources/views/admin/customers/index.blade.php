<x-app-layout>
    <div x-data="{ 
        open: false, 
        mode: 'create', 
        customer: {
            id: '',
            package_id: '',
            customer_code: '',
            username: '',
            full_name: '',
            whatsapp_number: '',
            email: '',
            password_ppoe: '',
            address: '',
            active_since: '{{ date('Y-m-d') }}',
            billing_cycle: '1'
        },
        openDrawer(mode, data = null) {
            this.mode = mode;
            if (mode === 'edit' && data) {
                this.customer = { ...data };
            } else {
                this.customer = {
                    id: '',
                    package_id: '',
                    customer_code: 'CUST-' + Math.floor(1000 + Math.random() * 9000),
                    username: '',
                    full_name: '',
                    whatsapp_number: '',
                    email: '',
                    password_ppoe: '',
                    address: '',
                    active_since: '{{ date('Y-m-d') }}',
                    billing_cycle: '1'
                };
            }
            this.open = true;
        }
    }">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight text-on-surface">Data Pelanggan</h2>
                <p class="text-sm text-secondary">Kelola daftar pelanggan dan koneksi PPPOE</p>
            </div>
            
            <button @click="openDrawer('create')" class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:scale-105 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Tambah Pelanggan
            </button>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-600 rounded-2xl font-bold text-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-surface border border-outline-variant/30 rounded-2xl overflow-visible shadow-sm p-4">
            <div class="overflow-visible">
                <table id="customers-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">No</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Kode</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Nama Lengkap</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">WhatsApp</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Paket</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">PPPOE</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- Slide-over Drawer -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 overflow-hidden" 
             style="display: none;">
            
            <div class="absolute inset-0 bg-black/20 backdrop-blur-sm" @click="open = false"></div>
            
            <div class="absolute inset-y-0 right-0 max-w-xl w-full">
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="h-full bg-surface shadow-2xl flex flex-col">
                    
                    <!-- Header -->
                    <div class="px-8 py-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low">
                        <div>
                            <h2 class="text-2xl font-black text-on-surface" x-text="mode === 'create' ? 'Tambah Pelanggan' : 'Edit Pelanggan'"></h2>
                            <p class="text-xs font-bold text-secondary uppercase tracking-widest mt-1">Data CRM & PPPOE</p>
                        </div>
                        <button @click="open = false" class="p-2 hover:bg-surface-container-high rounded-xl transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </button>
                    </div>

                    <!-- Form Content -->
                    <div class="flex-1 overflow-y-auto p-8">
                        <form :action="mode === 'create' ? '{{ route('admin.customers.store') }}' : '{{ url('admin/customers') }}/' + customer.id" 
                              method="POST" 
                              class="space-y-6">
                            @csrf
                            <template x-if="mode === 'edit'">
                                <input type="hidden" name="_method" value="PUT">
                            </template>

                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-1">
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Kode Pelanggan</label>
                                    <input type="text" name="customer_code" x-model="customer.customer_code" required readonly class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Username PPPOE</label>
                                    <input type="text" name="username" x-model="customer.username" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Nama Lengkap</label>
                                <input type="text" name="full_name" x-model="customer.full_name" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">No. WhatsApp</label>
                                    <input type="text" name="whatsapp_number" x-model="customer.whatsapp_number" required placeholder="08123456789" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Email (Opsional)</label>
                                    <input type="email" name="email" x-model="customer.email" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Paket Internet</label>
                                    <select name="package_id" x-model="customer.package_id" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                        <option value="">Pilih Paket</option>
                                        @foreach($packages as $pkg)
                                            <option value="{{ $pkg->id }}">{{ $pkg->name }} (Rp {{ number_format($pkg->monthly_price, 0, ',', '.') }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Password PPPOE</label>
                                    <input type="text" name="password_ppoe" x-model="customer.password_ppoe" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Alamat Lengkap</label>
                                <textarea name="address" x-model="customer.address" required rows="3" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium resize-none"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Aktif Sejak</label>
                                    <input type="date" name="active_since" x-model="customer.active_since" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Siklus Tagihan (Tgl)</label>
                                    <input type="number" name="billing_cycle" x-model="customer.billing_cycle" required min="1" max="31" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                            </div>

                            <div class="pt-6 border-t border-outline-variant/30 flex gap-4">
                                <button type="button" @click="open = false" class="flex-1 px-6 py-4 bg-surface-container-high text-secondary rounded-2xl font-bold hover:bg-surface-container-highest transition-all">Batal</button>
                                <button type="submit" class="flex-1 px-6 py-4 bg-primary text-white rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-all">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#customers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.customers.index') }}",
                layout: {
                    topStart: 'search',
                    topEnd: 'pageLength',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-[11px] font-black text-secondary/40 uppercase tracking-widest text-center' },
                    { data: 'customer_code', name: 'customer_code', className: 'font-bold text-on-surface text-left' },
                    { data: 'full_name', name: 'full_name', className: 'font-bold text-on-surface text-left text-sm' },
                    { data: 'whatsapp_number', name: 'whatsapp_number', className: 'text-left font-medium' },
                    { data: 'package_name', name: 'package.name', className: 'text-left' },
                    { data: 'username', name: 'username', className: 'text-left font-mono text-xs text-primary' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari data pelanggan...",
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
                    if (window.Alpine) {
                        window.Alpine.initTree(document.getElementById('customers-table'));
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
