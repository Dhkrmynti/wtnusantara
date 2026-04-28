<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::with('package')->get();
        if ($customers->isEmpty()) return;

        foreach ($customers as $customer) {
            // Last month invoice (Paid)
            Invoice::create([
                'customer_id' => $customer->id,
                'invoice_number' => 'INV/' . now()->subMonth()->format('Y/m') . '/' . str_pad($customer->id, 4, '0', STR_PAD_LEFT),
                'amount' => $customer->package->monthly_price ?? 0,
                'due_date' => now()->subMonth()->setDay($customer->billing_cycle)->format('Y-m-d'),
                'status' => 'paid',
                'created_at' => now()->subMonth()->startOfMonth()
            ]);

            // Current month invoice (Unpaid)
            $status = rand(0, 1) ? 'paid' : 'unpaid';
            Invoice::create([
                'customer_id' => $customer->id,
                'invoice_number' => 'INV/' . now()->format('Y/m') . '/' . str_pad($customer->id, 4, '0', STR_PAD_LEFT),
                'amount' => $customer->package->monthly_price ?? 0,
                'due_date' => now()->setDay($customer->billing_cycle)->format('Y-m-d'),
                'status' => $status,
                'created_at' => now()->startOfMonth()
            ]);
        }
    }
}
