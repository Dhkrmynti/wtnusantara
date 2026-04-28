<x-app-layout>
    <div x-data="{ 
        open: false, 
        mode: 'create', 
        post: {
            id: '',
            title: '',
            content: '',
            status: 'draft',
            published_at: '{{ date('Y-m-d') }}'
        },
        openDrawer(mode, data = null) {
            this.mode = mode;
            if (mode === 'edit' && data) {
                this.post = { ...data };
                // Format published_at if exists
                if(this.post.published_at) {
                    this.post.published_at = this.post.published_at.split('T')[0];
                }
            } else {
                this.post = {
                    id: '',
                    title: '',
                    content: '',
                    status: 'draft',
                    published_at: '{{ date('Y-m-d') }}'
                };
            }
            this.open = true;
        }
    }">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight text-on-surface">Manajemen Berita</h2>
                <p class="text-sm text-secondary">Kelola artikel dan update terbaru untuk landing page</p>
            </div>
            
            <button @click="openDrawer('create')" class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:scale-105 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Tambah Berita
            </button>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-600 rounded-2xl font-bold text-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-surface border border-outline-variant/30 rounded-2xl overflow-hidden shadow-sm p-4">
            <div class="overflow-x-auto">
                <table id="posts-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-center">No</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Judul</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Status</th>
                            <th class="text-[10px] font-black uppercase tracking-widest text-secondary/70 text-left">Tgl Publish</th>
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
                            <h2 class="text-2xl font-black text-on-surface" x-text="mode === 'create' ? 'Tambah Berita' : 'Edit Berita'"></h2>
                            <p class="text-xs font-bold text-secondary uppercase tracking-widest mt-1">Konten Landing Page</p>
                        </div>
                        <button @click="open = false" class="p-2 hover:bg-surface-container-high rounded-xl transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </button>
                    </div>

                    <!-- Form Content -->
                    <div class="flex-1 overflow-y-auto p-8">
                        <form :action="mode === 'create' ? '{{ route('admin.posts.store') }}' : '{{ url('admin/posts') }}/' + post.id" 
                              method="POST" 
                              enctype="multipart/form-data"
                              class="space-y-6">
                            @csrf
                            <template x-if="mode === 'edit'">
                                <input type="hidden" name="_method" value="PUT">
                            </template>

                            <div>
                                <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Judul Artikel</label>
                                <input type="text" name="title" x-model="post.title" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Content</label>
                                <textarea name="content" x-model="post.content" required rows="10" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium resize-none text-sm"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Status</label>
                                    <select name="status" x-model="post.status" required class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Tanggal Publish</label>
                                    <input type="date" name="published_at" x-model="post.published_at" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-secondary uppercase tracking-widest mb-2">Thumbnail Image</label>
                                <input type="file" name="image" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-medium text-sm">
                                <p class="text-[10px] text-secondary mt-1">Rekomendasi ukuran: 1200x800px. Maks 2MB.</p>
                                <template x-if="post.image">
                                    <div class="mt-2">
                                        <img :src="'/storage/' + post.image" class="w-full h-32 object-cover rounded-xl border border-outline-variant/30">
                                    </div>
                                </template>
                            </div>

                            <div class="pt-6 border-t border-outline-variant/30 flex gap-4">
                                <button type="button" @click="open = false" class="flex-1 px-6 py-4 bg-surface-container-high text-secondary rounded-2xl font-bold hover:bg-surface-container-highest transition-all">Batal</button>
                                <button type="submit" class="flex-1 px-6 py-4 bg-primary text-white rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-all">Simpan Konten</button>
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
            var table = $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.posts.index') }}",
                layout: {
                    topStart: 'search',
                    topEnd: 'pageLength',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-[11px] font-black text-secondary/40 uppercase tracking-widest text-center' },
                    { data: 'title', name: 'title', className: 'font-bold text-on-surface text-left text-sm' },
                    { data: 'status', name: 'status', className: 'text-left' },
                    { data: 'published_at', name: 'published_at', className: 'text-left font-medium text-xs' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari berita...",
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
