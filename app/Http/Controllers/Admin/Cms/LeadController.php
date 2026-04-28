<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Lead::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row) {
                    $color = $row->status === 'new' ? 'text-blue-500 bg-blue-500/10' : 'text-slate-500 bg-slate-500/10';
                    return '<span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest ' . $color . '">' . $row->status . '</span>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<form action="' . route('admin.leads.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus lead ini?\')">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button type="submit" class="p-2 text-red-500 hover:bg-red-500/5 rounded-xl transition-all mx-auto block">';
                    $btn .= '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '</button></form>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.leads.index');
    }

    /**
     * Store a lead from the public landing page.
     */
    public function storePublic(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'note' => 'nullable|string|max:500',
        ]);

        Lead::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Terima kasih! Permintaan Anda telah kami catat.'
        ]);
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead berhasil dihapus');
    }
}
