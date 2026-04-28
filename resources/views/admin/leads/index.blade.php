<x-app-layout>
    <div x-data="{ open: false }">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight text-on-surface">Inbox Lead</h2>
                <p class="text-sm text-secondary">Rekap permintaan jangkauan dari calon pelanggan</p>
            </div>
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
                <table id="leads-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">No</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Koordinat</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Status</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Masuk Pada</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#leads-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.leads.index') }}",
                layout: {
                    topStart: 'search',
                    topEnd: 'pageLength',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-[11px] font-black text-secondary/40 uppercase tracking-widest text-center' },
                    { 
                        data: 'latitude', 
                        render: function(data, type, row) {
                            const coords = row.latitude + ', ' + row.longitude;
                            return `
                                <div>
                                    <p class="font-bold text-on-surface text-sm">${coords}</p>
                                    <a href="https://www.google.com/maps?q=${coords}" target="_blank" class="text-[10px] text-primary hover:underline font-bold uppercase tracking-widest">Buka di Maps</a>
                                </div>
                            `;
                        },
                        className: 'text-left' 
                    },
                    { data: 'status', name: 'status', className: 'text-left' },
                    { 
                        data: 'created_at', 
                        render: function(data) {
                            return new Date(data).toLocaleString('id-ID');
                        },
                        className: 'text-left font-medium text-xs' 
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari lead...",
                    lengthMenu: "Tampilkan _MENU_",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Data tidak ditemukan",
                    zeroRecords: "Tidak ada data yang cocok",
                    paginate: {
                        previous: "Prev",
                        next: "Next"
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
