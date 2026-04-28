<aside class="flex flex-col h-screen w-64 fixed left-0 top-0 py-4 bg-slate-50 dark:bg-slate-950 border-r border-slate-200 dark:border-slate-800 z-50 transition-transform duration-300" 
       :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
    <div class="px-6 mb-8">
            <div class="flex items-center gap-3">
                <img src="{{ asset('wtnusantara-logo.png') }}" alt="wtnusantara Logo" class="w-10 h-10 object-contain">
                <div>
                    <h1 class="text-xl font-black tracking-tighter text-on-surface uppercase">wtnusantara</h1>
                    <p class="text-[10px] uppercase tracking-widest text-secondary font-bold">Admin Panel</p>
                </div>
            </div>
    </div>
    
    <nav class="flex-1 space-y-6 px-3 overflow-y-auto custom-scrollbar pb-6">
        <!-- Main Section -->
        <div>
            <h5 class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-secondary/40 mb-2">Main</h5>
            <div class="space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->is('admin') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="/admin">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Dashboard
                </a>
            </div>
        </div>

        <!-- CRM & Transaksi Section -->
        <div>
            <h5 class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-secondary/40 mb-2">CRM & Transaksi</h5>
            <div class="space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.customers.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.customers.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Pelanggan
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.invoices.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.invoices.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75m0 3v.75m0 3v.75m0 3v.75m0 3v.75m0 3V18m15 0v.75m0-3.75v.75m0-3v.75m0-3v.75m0-3v.75m0-3V4.5m-15 0h15" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Tagihan
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->is('admin/paket-internet*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="/admin/paket-internet">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Paket Internet
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->is('admin/user-management*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="/admin/user-management">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1-4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    User Management
                </a>
            </div>
        </div>

        <!-- Web Content Section -->
        <div>
            <h5 class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-secondary/40 mb-2">Web Content</h5>
            <div class="space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.posts.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.posts.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Berita & Artikel
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.activities.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.activities.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Galeri Aktivitas
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.service-areas.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.service-areas.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.691.159-1.008 0L9.503 3.246a1.125 1.125 0 00-1.007 0L3.622 5.62c-.38.19-.622.58-.622 1.006v10.742c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.691-.159 1.008 0l4.993 2.497c.317.158.691.158 1.008 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Wilayah Jangkauan
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->routeIs('admin.leads.*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="{{ route('admin.leads.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Inbox Lead
                </a>
            </div>
        </div>

        <!-- System & Network Section -->
        <div>
            <h5 class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-secondary/40 mb-2">System & Network</h5>
            <div class="space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-[13px] font-bold tracking-tight transition-all duration-200 ease-in-out {{ request()->is('admin/mikrotik-api*') ? 'text-primary bg-primary/5 border-r-2 border-primary' : 'text-on-surface-variant hover:bg-surface-container-high' }}" 
                   href="/admin/mikrotik-api">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3V3.75a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3m-13.5 0h13.5m-13.5 0v6.75a3 3 0 0 0 3 3h7.5a3 3 0 0 0 3-3v-6.75m-13.5 0h13.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Mikrotik API
                </a>
            </div>
        </div>
    </nav>

    <div class="px-6 border-t border-outline-variant/30 pt-4 mt-auto">
        <a class="flex items-center gap-3 px-3 py-2 text-error/60 hover:text-error hover:bg-error/5 text-[13px] font-black tracking-tight transition-all rounded-xl" href="#">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Logout
        </a>
    </div>
</aside>
