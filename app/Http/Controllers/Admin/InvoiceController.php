<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::with('customer.package')->select('invoices.*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('customer_name', function($row){
                    return $row->customer->full_name ?? '-';
                })
                ->editColumn('amount', function($row){
                    return 'Rp ' . number_format($row->amount, 0, ',', '.');
                })
                ->editColumn('status', function($row){
                    if ($row->status === 'paid') {
                        return '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-black bg-green-500/10 text-green-600 uppercase tracking-widest"><span class="w-1 h-1 rounded-full bg-green-600"></span>LUNAS</span>';
                    }
                    
                    if (Carbon::parse($row->due_date)->isPast() && $row->status === 'unpaid') {
                        return '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-black bg-red-500/10 text-red-600 uppercase tracking-widest"><span class="w-1 h-1 rounded-full bg-red-600"></span>OVERDUE</span>';
                    }

                    return '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-black bg-orange-500/10 text-orange-600 uppercase tracking-widest"><span class="w-1 h-1 rounded-full bg-orange-600"></span>UNPAID</span>';
                })
                ->editColumn('due_date', function($row){
                    return Carbon::parse($row->due_date)->format('d M Y');
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="flex items-center justify-center" x-data="{ open: false }">';
                    $btn .= '    <div class="relative">';
                    $btn .= '        <button @click="open = !open" @click.away="open = false" class="p-1.5 text-secondary hover:text-primary transition-colors rounded-lg hover:bg-surface-container-high">';
                    $btn .= '            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '        </button>';
                    $btn .= '        <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-surface rounded-xl shadow-2xl border border-outline-variant/30 z-50 py-1.5 overflow-hidden">';
                    
                    if ($row->status === 'unpaid') {
                        $btn .= '<form action="' . route('admin.invoices.mark-as-paid', $row->id) . '" method="POST">';
                        $btn .= csrf_field();
                        $btn .= '<button type="submit" class="w-full flex items-center gap-2 px-3 py-1.5 text-xs font-bold text-green-600 hover:bg-green-500/5 transition-all">';
                        $btn .= '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                        $btn .= 'Konfirmasi Lunas';
                        $btn .= '</button>';
                        $btn .= '</form>';
                        $btn .= '<div class="h-px bg-outline-variant/30 my-1"></div>';
                    }

                    $btn .= '            <a href="#" class="w-full flex items-center gap-2 px-3 py-1.5 text-xs font-bold text-secondary hover:bg-primary/5 hover:text-primary transition-all opacity-50 cursor-not-allowed">';
                    $btn .= '                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6.72 13.844l9.635-9.635a1.875 1.875 0 012.652 2.652l-10.582 10.582a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897zm0 0L9 15.03" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '                Download PDF';
                    $btn .= '            </a>';
                    
                    $btn .= '            <form action="' . route('admin.invoices.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus invoice ini?\')">';
                    $btn .= '                ' . csrf_field();
                    $btn .= '                ' . method_field('DELETE');
                    $btn .= '                <button type="submit" class="w-full flex items-center gap-2 px-3 py-1.5 text-xs font-bold text-red-500 hover:bg-red-500/5 transition-all">';
                    $btn .= '                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
                    $btn .= '                    Hapus';
                    $btn .= '                </button>';
                    $btn .= '            </form>';
                    $btn .= '        </div>';
                    $btn .= '    </div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        $summary = [
            'unpaid' => Invoice::where('status', 'unpaid')->count(),
            'paid' => Invoice::where('status', 'paid')->count(),
            'overdue' => Invoice::where('status', 'unpaid')->where('due_date', '<', Carbon::now())->count(),
            'total_amount' => Invoice::where('status', 'paid')->whereMonth('created_at', Carbon::now()->month)->sum('amount')
        ];

        return view('admin.invoices.index', compact('summary'));
    }

    /**
     * Generate invoices for all customers for the current month.
     */
    public function generateBatch()
    {
        $customers = Customer::with('package')->get();
        $count = 0;
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        foreach ($customers as $customer) {
            // Check if invoice already exists for this customer/month
            $exists = Invoice::where('customer_id', $customer->id)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->exists();

            if (!$exists) {
                Invoice::create([
                    'customer_id' => $customer->id,
                    'invoice_number' => 'INV/' . $year . '/' . $month . '/' . str_pad($customer->id, 4, '0', STR_PAD_LEFT) . '/' . rand(100, 999),
                    'amount' => $customer->package->monthly_price ?? 0,
                    'due_date' => Carbon::now()->setDay($customer->billing_cycle)->format('Y-m-d'),
                    'status' => 'unpaid'
                ]);
                $count++;
            }
        }

        return redirect()->back()->with('success', $count . ' tagihan baru berhasil dibuat otomatis.');
    }

    /**
     * Mark invoice as paid.
     */
    public function markAsPaid(Invoice $invoice)
    {
        $invoice->update(['status' => 'paid']);
        return redirect()->back()->with('success', 'Tagihan ' . $invoice->invoice_number . ' telah ditandai lunas.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Tagihan berhasil dihapus.');
    }
}
