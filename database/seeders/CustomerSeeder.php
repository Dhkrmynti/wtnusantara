<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = Package::all();
        
        if ($packages->isEmpty()) return;

        $names = [
            'Budi Santoso', 'Siti Aminah', 'Agus Prayitno', 'Dewi Lestari', 'Eko Saputra',
            'Rina Wijaya', 'Andi Hermawan', 'Maya Sari', 'Rully Hidayat', 'Linda Permata',
            'Hendi Pratama', 'Siska Amelia', 'Dedi Kurniawan', 'Riana Putri', 'Fandi Ahmad',
            'Gita Savitri', 'Irfan Hakim', 'Nina Kartika', 'Yudiantara', 'Zahra Aulia'
        ];

        foreach ($names as $index => $name) {
            Customer::create([
                'package_id' => $packages->random()->id,
                'customer_code' => 'CUST-' . (1001 + $index),
                'username' => strtolower(str_replace(' ', '', $name)) . rand(10, 99),
                'full_name' => $name,
                'whatsapp_number' => '0812' . rand(10000000, 99999999),
                'email' => strtolower(explode(' ', $name)[0]) . '@example.com',
                'password_ppoe' => Str::random(8),
                'password_ppoe_plan' => '',
                'address' => 'Jl. Merdeka No. ' . rand(1, 100) . ', Jakarta Pusat',
                'active_since' => now()->subMonths(rand(1, 12))->format('Y-m-d'),
                'billing_cycle' => rand(1, 28)
            ]);
        }
    }
}
