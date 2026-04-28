<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\ServiceArea;
use App\Models\NetworkPoint;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceAreaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ServiceArea::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<div class="flex gap-2">
                                <button onclick="window.dispatchEvent(new CustomEvent(\'open-area-drawer\', { detail: { mode: \'edit\', data: ' . htmlspecialchars(json_encode($row)) . ' } }))" class="p-2 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                                <form action="'.route('admin.service-areas.destroy', $row->id).'" method="POST" onsubmit="return confirm(\'Hapus wilayah ini?\')" class="inline">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="p-2 rounded-lg bg-error/10 text-error hover:bg-error hover:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                                </form>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.service-areas.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coordinates' => 'required|json',
            'color' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['coordinates'] = json_decode($request->coordinates, true);

        ServiceArea::create($data);

        return redirect()->back()->with('success', 'Wilayah jangkauan berhasil ditambahkan.');
    }

    public function update(Request $request, ServiceArea $serviceArea)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coordinates' => 'required|json',
            'color' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['coordinates'] = json_decode($request->coordinates, true);

        $serviceArea->update($data);

        return redirect()->back()->with('success', 'Wilayah jangkauan berhasil diperbarui.');
    }

    public function destroy(ServiceArea $serviceArea)
    {
        $serviceArea->delete();
        return redirect()->back()->with('success', 'Wilayah jangkauan berhasil dihapus.');
    }
}
