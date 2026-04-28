<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Activity::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function($row) {
                    return '<img src="/storage/' . $row->image . '" class="w-12 h-12 object-cover rounded-lg border border-outline-variant/30">';
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="flex items-center justify-center gap-2" x-data="{ open: false }">';
                    $btn .= '    <div class="relative">';
                    $btn .= '        <button @click="open = !open" @click.away="open = false" class="p-1.5 text-secondary hover:text-primary transition-colors rounded-lg hover:bg-surface-container-high">';
                    $btn .= '            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '        </button>';
                    $btn .= '        <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-surface rounded-xl shadow-2xl border border-outline-variant/30 z-50 py-2 overflow-hidden">';
                    $btn .= '            <button @click="openDrawer(\'edit\', ' . htmlspecialchars(json_encode($row)) . '); open = false" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-secondary hover:bg-primary/5 hover:text-primary transition-all text-left">';
                    $btn .= '                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '                Edit Activity';
                    $btn .= '            </button>';
                    $btn .= '            <form action="' . route('admin.activities.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus aktivitas ini?\')">';
                    $btn .= '                ' . csrf_field();
                    $btn .= '                ' . method_field('DELETE');
                    $btn .= '                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-500/5 transition-all text-left">';
                    $btn .= '                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '                    Hapus Aktivitas';
                    $btn .= '                </button>';
                    $btn .= '            </form>';
                    $btn .= '        </div>';
                    $btn .= '    </div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.activities.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activity_date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        Activity::create($validated);

        return redirect()->back()->with('success', 'Aktivitas berhasil ditambahkan');
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activity_date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($activity->image) Storage::disk('public')->delete($activity->image);
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        $activity->update($validated);

        return redirect()->back()->with('success', 'Aktivitas berhasil diperbarui');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->image) Storage::disk('public')->delete($activity->image);
        $activity->delete();
        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus');
    }
}
