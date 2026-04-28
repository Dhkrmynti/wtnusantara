<x-app-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black tracking-tight text-on-surface">Data Tagihan</h2>
            <p class="text-sm text-secondary">Kelola invoice dan monitoring pembayaran pelanggan</p>
        </div>
        
        <form action="{{ route('admin.invoices.generate-batch') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6v6m0 0v6m0-6h6m-6 0H6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Generate Tagihan Bulanan
            </button>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-surface border border-outline-variant/30 p-6 rounded-3xl shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Belum Bayar</div>
            <div class="text-3xl font-black text-orange-600">{{ $summary['unpaid'] }}</div>
            <div class="text-[10px] text-secondary mt-2 font-bold uppercase tracking-tighter">Tagihan Menunggu</div>
        </div>
        <div class="bg-surface border border-outline-variant/30 p-6 rounded-3xl shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Sudah Lunas</div>
            <div class="text-3xl font-black text-green-600">{{ $summary['paid'] }}</div>
            <div class="text-[10px] text-secondary mt-2 font-bold uppercase tracking-tighter">Bulan Berjalan</div>
        </div>
        <div class="bg-surface border border-outline-variant/30 p-6 rounded-3xl shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-secondary mb-1">Jatuh Tempo</div>
            <div class="text-3xl font-black text-red-600">{{ $summary['overdue'] }}</div>
            <div class="text-[10px] text-secondary mt-2 font-bold uppercase tracking-tighter">Perlu Tindakan</div>
        </div>
        <div class="bg-primary/5 border border-primary/20 p-6 rounded-3xl shadow-sm">
            <div class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">Pendapatan Lunas</div>
            <div class="text-2xl font-black text-primary">Rp {{ number_format($summary['total_amount'], 0, ',', '.') }}</div>
            <div class="text-[10px] text-primary/60 mt-2 font-bold uppercase tracking-tighter">Bulan Ini</div>
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
            <table id="invoices-table" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">No</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">No. Invoice</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Pelanggan</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left text-nowrap">Jatuh Tempo</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Total</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Status</th>
                        <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#invoices-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.invoices.index') }}",
                layout: {
                    topStart: 'search',
                    topEnd: 'pageLength',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-[11px] font-black text-secondary/40 uppercase tracking-widest text-center' },
                    { data: 'invoice_number', name: 'invoice_number', className: 'font-bold text-on-surface text-left text-xs' },
                    { data: 'customer_name', name: 'customer.full_name', className: 'font-bold text-on-surface text-left text-sm' },
                    { data: 'due_date', name: 'due_date', className: 'text-left font-medium' },
                    { data: 'amount', name: 'amount', className: 'text-left font-black text-primary' },
                    { data: 'status', name: 'status', className: 'text-left' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari data invoice...",
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
                        window.Alpine.initTree(document.getElementById('invoices-table'));
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
