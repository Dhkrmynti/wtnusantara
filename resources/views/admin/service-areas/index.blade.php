<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #area-map { height: 500px; border-radius: 24px; z-index: 10; cursor: crosshair; }
        .map-card { position: relative; overflow: hidden; }
        .map-overlay-info {
            position: absolute;
            top: 24px;
            left: 24px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            padding: 16px;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
            pointer-events: none; /* Ignore clicks on info box labels */
        }
        .coord-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: #f1f5f9;
            border-radius: 100px;
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 4px;
            margin-right: 4px;
            font-family: monospace;
        }
    </style>
    @endpush

    <div id="service-area-manager">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight text-on-surface">Wilayah Jangkauan</h2>
                <p class="text-sm font-medium text-on-surface-variant">Klik bebas pada peta untuk menggambar wilayah jangkauan.</p>
            </div>
            <button onclick="openAreaDrawer('create')" class="flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-2xl font-bold transition-all cursor-pointer hover:scale-105 hover:shadow-lg active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Buat Wilayah
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-surface border border-outline-variant/30 rounded-[32px] shadow-sm map-card overflow-hidden">
                <div class="map-overlay-info">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-xl bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-secondary/60">Mode Gambar</p>
                            <p class="text-sm font-bold text-on-surface">Klik bebas di peta untuk menambah titik</p>
                        </div>
                    </div>
                </div>
                <div id="area-map"></div>
            </div>

            <div class="bg-surface border border-outline-variant/30 rounded-[32px] shadow-sm overflow-hidden flex flex-col h-[500px]">
                <div class="p-6 border-b border-outline-variant/20 bg-surface-container-low">
                    <h3 class="font-black text-sm uppercase tracking-[0.2em] text-secondary">Daftar Wilayah</h3>
                </div>
                <div class="flex-1 overflow-y-auto p-4 scrollbar-thin">
                    <table id="areas-table" class="w-full">
                        <thead class="hidden"><tr><th>Data</th><th>Action</th></tr></thead>
                        <tbody class="divide-y divide-outline-variant/10"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="area-drawer" class="fixed inset-0 z-[100] hidden pointer-events-none flex">
            <div id="drawer-panel" class="absolute inset-y-0 right-0 w-full max-w-md bg-surface shadow-2xl flex flex-col overflow-hidden translate-x-full border-l border-outline-variant/30 transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] pointer-events-auto">
                <div class="p-8 border-b border-outline-variant/20 flex justify-between items-center bg-surface-container-low">
                    <div>
                        <h3 id="drawer-title" class="text-xl font-black tracking-tight">Buat Wilayah</h3>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mt-1">Drawing Interface</p>
                    </div>
                    <button onclick="closeAreaDrawer()" class="p-2 rounded-xl border border-outline-variant/30 hover:bg-surface-container-high transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </button>
                </div>

                <form id="area-form" method="POST" class="flex-1 flex flex-col p-8 overflow-y-auto space-y-6">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-secondary/60 mb-2 ml-1">Nama Wilayah</label>
                        <input type="text" name="name" id="field-name" required placeholder="Contoh: Area Puri Indah"
                               class="w-full px-5 py-4 bg-surface-container rounded-2xl border border-outline-variant/30 focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all font-bold">
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-secondary/60 ml-1">Titik Koordinat (Min. 3)</label>
                            <div class="flex gap-2">
                                <button type="button" onclick="undoLastVertex()" class="text-[9px] font-black uppercase bg-surface-container-high px-2 py-1 rounded-lg cursor-pointer hover:bg-surface-container hover:shadow-sm">Undo</button>
                                <button type="button" onclick="resetVertices()" class="text-[9px] font-black uppercase bg-error/10 text-error px-2 py-1 rounded-lg cursor-pointer hover:bg-error hover:text-white transition-all">Reset</button>
                            </div>
                        </div>
                        <div class="bg-surface-container rounded-2xl p-4 border border-outline-variant/30 min-h-[100px]">
                            <div id="coords-list" class="flex flex-wrap gap-1"></div>
                            <input type="hidden" name="coordinates" id="field-coordinates" value="[]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-secondary/60 mb-2 ml-1">Warna Wilayah</label>
                        <div class="flex items-center gap-4">
                            <input type="color" name="color" id="field-color" value="#3b82f6" oninput="updatePolygonPreview()">
                            <span id="color-hex" class="text-sm font-bold opacity-50">#3b82f6</span>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" id="btn-submit" disabled 
                                class="w-full py-5 bg-primary text-white rounded-[24px] font-black text-base transition-all flex items-center justify-center gap-3 opacity-50 cursor-pointer">
                            <span id="submit-text">Simpan Wilayah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        window.areaMap = null;
        window.areaLayers = null;
        window.previewPolygon = null;
        window.previewMarkers = [];
        window.drawingCoordinates = [];

        function initServiceAreaMap() {
            if (window.areaMap) return;

            window.areaMap = L.map('area-map', { zoomControl: false }).setView([-7.1510, 112.4410], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(window.areaMap);
            L.control.zoom({ position: 'bottomright' }).addTo(window.areaMap);
            window.areaLayers = L.layerGroup().addTo(window.areaMap);

            window.areaMap.on('click', function(e) {
                const drawer = document.getElementById('area-drawer');
                if (!drawer.classList.contains('open')) {
                    openAreaDrawer('create', false); // Open without resetting potential first click
                }
                addVertex(e.latlng.lat, e.latlng.lng);
            });

            // Init DataTable
            const table = $('#areas-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.service-areas.index') }}",
                dom: 't',
                columns: [
                    { 
                        data: 'name', 
                        render: function(data, type, row) {
                            const coords = typeof row.coordinates === 'string' ? JSON.parse(row.coordinates) : row.coordinates;
                            return `
                                <div class="px-2 py-4 hover:bg-primary/5 transition-all rounded-2xl cursor-pointer mb-2" onclick="flyToArea(${row.id})">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white" style="background: ${row.color}">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M21 16.5c0 .38-.21.73-.55.9l-8 4c-.28.14-.62.14-.9 0l-8-4c-.34-.17-.55-.52-.55-.9V7.5c0-.38.21-.73.55-.9l8-4c.28-.14.62-.14.9 0l8 4c.34.17.55.52.55.9v9z"/></svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-bold">${data}</p>
                                            <p class="text-[10px] font-black uppercase text-secondary/60">${coords.length} Titik</p>
                                        </div>
                                    </div>
                                </div>`;
                        }
                    },
                    { 
                        data: 'action',
                        render: function(data, type, row) {
                            // Avoid JSON string in HTML attribute to prevent crash with quotes
                            return `<div class="flex gap-2">
                                <button onclick="handleEditClick(${row.id})" class="p-2 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                                <form action="/admin/service-areas/${row.id}" method="POST" onsubmit="return confirm('Hapus?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-error/10 text-error"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                                </form>
                            </div>`;
                        }
                    }
                ],
                drawCallback: function(settings) { redrawAllAreas(settings.json.data); }
            });
            setTimeout(() => { window.areaMap.invalidateSize(); }, 500);
        }

        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            initServiceAreaMap();
        } else {
            document.addEventListener('DOMContentLoaded', initServiceAreaMap);
        }

        function openAreaDrawer(mode, shouldReset = true) {
            const drawer = document.getElementById('area-drawer');
            const panel = document.getElementById('drawer-panel');
            
            drawer.classList.remove('hidden');
            // Allow browser paint cycle before translating to trigger animation
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    panel.classList.remove('translate-x-full');
                    panel.classList.add('translate-x-0');
                });
            });

            document.getElementById('drawer-title').innerText = mode === 'create' ? 'Buat Wilayah' : 'Edit Wilayah';
            if (mode === 'create') {
                document.getElementById('area-form').action = "{{ route('admin.service-areas.store') }}";
                document.getElementById('form-method').value = "POST";
                document.getElementById('field-name').value = "";
                document.getElementById('field-color').value = "#3b82f6";
                if (shouldReset) resetVertices();
            }
        }

        function closeAreaDrawer() {
            const drawer = document.getElementById('area-drawer');
            const panel = document.getElementById('drawer-panel');
            
            panel.classList.remove('translate-x-0');
            panel.classList.add('translate-x-full');
            
            setTimeout(() => {
                drawer.classList.add('hidden');
            }, 500);
        }

        function handleEditClick(id) {
            const table = $('#areas-table').DataTable();
            const row = table.rows().data().toArray().find(r => r.id == id);
            if (row) {
                openAreaDrawer('edit');
                document.getElementById('area-form').action = "/admin/service-areas/" + row.id;
                document.getElementById('form-method').value = "PUT";
                document.getElementById('field-name').value = row.name;
                document.getElementById('field-color').value = row.color;
                window.drawingCoordinates = typeof row.coordinates === 'string' ? JSON.parse(row.coordinates) : row.coordinates;
                updateUI();
                updatePolygonPreview();
                if (window.drawingCoordinates.length > 0) {
                    window.areaMap.fitBounds(L.latLngBounds(window.drawingCoordinates), { padding: [50, 50] });
                }
            }
        }

        function addVertex(lat, lng) {
            window.drawingCoordinates.push([lat, lng]);
            updateUI();
            updatePolygonPreview();
        }

        function undoLastVertex() {
            window.drawingCoordinates.pop();
            updateUI();
            updatePolygonPreview();
        }

        function resetVertices() {
            window.drawingCoordinates = [];
            updateUI();
            updatePolygonPreview();
        }

        function updateUI() {
            const list = document.getElementById('coords-list');
            const field = document.getElementById('field-coordinates');
            const btn = document.getElementById('btn-submit');
            field.value = JSON.stringify(window.drawingCoordinates);
            if (window.drawingCoordinates.length === 0) {
                list.innerHTML = '<p class="text-xs italic opacity-50">Klik peta untuk menambah titik.</p>';
            } else {
                list.innerHTML = window.drawingCoordinates.map(c => `<div class="coord-badge">${c[0].toFixed(4)}, ${c[1].toFixed(4)}</div>`).join('');
            }
            if (window.drawingCoordinates.length >= 3) {
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
                btn.classList.add('hover:scale-[1.02]', 'hover:shadow-xl', 'active:scale-95');
            } else {
                btn.disabled = true;
                btn.classList.add('opacity-50', 'cursor-not-allowed');
                btn.classList.remove('hover:scale-[1.02]', 'hover:shadow-xl', 'active:scale-95');
            }
        }

        function updatePolygonPreview() {
            if (window.previewPolygon) window.areaMap.removeLayer(window.previewPolygon);
            window.previewMarkers.forEach(m => window.areaMap.removeLayer(m));
            window.previewMarkers = [];
            const color = document.getElementById('field-color').value;
            if (window.drawingCoordinates.length > 0) {
                window.drawingCoordinates.forEach(c => {
                    const m = L.circleMarker(c, { radius: 5, color: '#fff', fillColor: color, fillOpacity: 1, weight: 2, interactive: false }).addTo(window.areaMap);
                    window.previewMarkers.push(m);
                });
                if (window.drawingCoordinates.length >= 2) {
                    window.previewPolygon = L.polygon(window.drawingCoordinates, { color: color, fillColor: color, fillOpacity: 0.4, dashArray: '10, 10', weight: 3 }).addTo(window.areaMap);
                }
            }
        }

        function redrawAllAreas(areas) {
            if (!areas || !window.areaLayers) return;
            window.areaLayers.clearLayers();
            areas.forEach(area => {
                const coords = typeof area.coordinates === 'string' ? JSON.parse(area.coordinates) : area.coordinates;
                if (coords.length >= 3) {
                    L.polygon(coords, { color: area.color, fillColor: area.color, fillOpacity: 0.2, weight: 2 }).addTo(window.areaLayers).bindPopup(`<b>${area.name}</b>`);
                }
            });
        }

        function flyToArea(id) {
            const row = $('#areas-table').DataTable().rows().data().toArray().find(r => r.id == id);
            if (row) {
                const coords = typeof row.coordinates === 'string' ? JSON.parse(row.coordinates) : row.coordinates;
                if (coords.length > 0) window.areaMap.fitBounds(L.latLngBounds(coords), { padding: [50, 50], maxZoom: 15 });
            }
        }
    </script>
    @endpush
</x-app-layout>
