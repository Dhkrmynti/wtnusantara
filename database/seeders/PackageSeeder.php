<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Paket Hemat 10 Mbps',
                'profile' => '10mbps_unlimited',
                'monthly_price' => 150000,
                'installation_fee' => 100000,
                'description' => 'Paket internet hemat untuk kebutuhan browsing ringan dan media sosial.',
                'badge' => 'Hemat',
                'is_active' => true,
                'is_featured' => false
            ],
            [
                'name' => 'Paket Home 30 Mbps',
                'profile' => '30mbps_home',
                'monthly_price' => 275000,
                'installation_fee' => 150000,
                'description' => 'Paket internet kencang untuk streaming 4K dan kerja dari rumah.',
                'badge' => 'Terlaris',
                'is_active' => true,
                'is_featured' => true
            ],
            [
                'name' => 'Paket Family 50 Mbps',
                'profile' => '50mbps_family',
                'monthly_price' => 450000,
                'installation_fee' => 200000,
                'description' => 'Paket keluarga besar, bebas hambatan untuk banyak perangkat.',
                'badge' => 'Rekomendasi',
                'is_active' => true,
                'is_featured' => false
            ],
            [
                'name' => 'Paket Gaming 100 Mbps',
                'profile' => '100mbps_gaming',
                'monthly_price' => 750000,
                'installation_fee' => 0,
                'description' => 'Latency rendah untuk pengalaman gaming pro dan download super cepat.',
                'badge' => 'Pro Gamer',
                'is_active' => true,
                'is_featured' => false
            ],
        ];

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }
}
