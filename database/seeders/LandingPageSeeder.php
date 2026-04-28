<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Activity;
use Illuminate\Support\Str;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Posts
        $posts = [
            [
                'title' => 'WTNusantara Menghadirkan Fiber Optik Kecepatan Tinggi di Gresik',
                'slug' => 'wtnusantara-fiber-optik-gresik',
                'content' => 'Kami secara resmi memperluas jaringan fiber optik kami ke wilayah Gresik untuk mendukung transformasi digital UMKM.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Tips Memilih Paket Internet yang Sesuai untuk Work From Home',
                'slug' => 'tips-memilih-paket-internet-wfh',
                'content' => 'WFH membutuhkan koneksi yang stabil. Pelajari cara menghitung kebutuhan bandwidth Anda di artikel ini.',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Teknologi Fiber Optik vs Kabel Biasa: Mana yang Lebih Cepat?',
                'slug' => 'fiber-optik-vs-kabel-biasa',
                'content' => 'Banyak yang belum tahu keunggulan nyata fiber optik. Simak perbandingannya dari sisi latensi dan durabilitas.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // Seed Activities
        $activities = [
            [
                'image' => 'activities/dummy1.jpg',
                'description' => 'Pemasangan ODP baru di wilayah perumahan GKB untuk meningkatkan stabilitas jaringan.',
                'activity_date' => now()->subDays(1),
            ],
            [
                'image' => 'activities/dummy2.jpg',
                'description' => 'Tim teknis melakukan maintenance rutin pada core dcn pusat untuk menjamin uptime 99.9%.',
                'activity_date' => now()->subDays(3),
            ],
            [
                'image' => 'activities/dummy3.jpg',
                'description' => 'Sosialisasi penggunaan internet sehat di sekolah menengah pertama wilayah Lamongan.',
                'activity_date' => now()->subDays(7),
            ],
            [
                'image' => 'activities/dummy4.jpg',
                'description' => 'Penyambungan kabel fiber optik jalur utama lintas kabupaten.',
                'activity_date' => now()->subDays(10),
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
