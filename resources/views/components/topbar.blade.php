<header class="sticky top-0 z-40 w-full flex items-center justify-between px-6 h-14 bg-surface-container-lowest border-b border-outline-variant shadow-sm transition-colors duration-300">
    <div class="flex items-center flex-1 gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors cursor-pointer">
            <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" x-show="!sidebarOpen"></path>
                <path d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" x-show="sidebarOpen"></path>
            </svg>
        </button>
        <div class="relative w-full max-w-md gap-0">
            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <input class="w-full pl-10 pr-4 py-1.5 bg-surface-container-high border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all text-on-surface placeholder:text-secondary/50" placeholder="Search data, reports, or users..." type="text"/>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2">
            <button @click="toggleDarkMode()" class="w-9 h-9 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded-lg transition-all cursor-pointer">
                <template x-if="!darkMode">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </template>
                <template x-if="darkMode">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M3 12h2.25m.386-4.773 1.591-1.591M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </template>
            </button>
            <button class="w-9 h-9 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded-lg transition-all cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </div>
        <div class="h-6 w-px bg-outline-variant mx-1"></div>
        <div class="flex items-center gap-3 cursor-pointer group">
            <span class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors">Admin wtnusantara</span>
            <div class="w-9 h-9 rounded-full bg-surface-container-high border-2 border-outline-variant group-hover:border-primary transition-all flex items-center justify-center">
                <svg class="w-5 h-5 text-on-surface-variant" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
    </div>
</header>
