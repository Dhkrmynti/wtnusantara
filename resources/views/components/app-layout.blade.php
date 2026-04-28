<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'wtnusantara - Admin Panel' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('wtnusantara-logo.png') }}">

    <!-- Dark Mode Persistence Script -->
    <script>
        (function() {
            const darkMode = localStorage.getItem('darkMode');
            if (darkMode === 'true' || (!(darkMode) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                document.documentElement.style.colorScheme = 'dark';
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.style.colorScheme = 'light';
            }
        })();
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true',
          sidebarOpen: true,
          toggleDarkMode() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('darkMode', this.darkMode);
              this.updateTheme();
          },
          updateTheme() {
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
                  document.documentElement.style.colorScheme = 'dark';
              } else {
                  document.documentElement.classList.remove('dark');
                  document.documentElement.style.colorScheme = 'light';
              }
          }
      }"
      x-init="updateTheme()"
      x-cloak
      class="bg-background text-on-surface antialiased transition-colors duration-300">
    <div class="flex min-h-screen">
        <x-sidebar />

        <div class="flex-1 flex flex-col transition-all duration-300" :class="{ 'ml-64': sidebarOpen, 'ml-0': !sidebarOpen }">
            <x-topbar />

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
