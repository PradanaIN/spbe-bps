<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pic;
use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use App\Models\Angket;
use App\Models\Usulan;
use App\Models\Kabkota;
use App\Models\Laporan;
use App\Models\Progress;
use App\Models\Provinsi;
use App\Models\Pengelolaan;
use App\Models\Perencanaan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                // automatically
                // User::factory(2)->create();

                Usulan::factory(10)->create();

                Angket::create([
                    'link' => 'https://forms.gle/z51XHjLr2ktXWQBf8'
                ]);

                // Create User
                User::create([
                    'nama_user' => 'Developer',
                    'slug_user' => 'developer',
                    'email' => 'develops@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 0
                ]);

                User::create([
                    'nama_user' => 'Pimpinan',
                    'slug_user' => 'pimpinan',
                    'email' => 'pimpinan@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 4
                ]);

                User::create([
                    'nama_user' => 'Admin Pusat',
                    'slug_user' => 'admin-pusat',
                    'email' => 'pusat@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 5
                ]);

                User::create([
                    'nama_user' => 'Kebijakan Internal Tata Kelola SPBE',
                    'slug_user' => 'kitkspbe',
                    'email' => 'kitkspbe@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 1,
                    'pic_id' => 1,
                    'area_id' => 1
                ]);

                User::create([
                    'nama_user' => 'DKI Jakarta',
                    'slug_user' => 'dki-jakarta',
                    'email' => 'dkijakarta@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 2,
                    'pic_id' => 2,
                    'provinsi_id' => 21
                ]);

                User::create([
                    'nama_user' => 'Jakarta Barat',
                    'slug_user' => 'jakarta-barat',
                    'email' => 'jakartabarat@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role_id' => 3,
                    'provinsi_id' => 21,
                    'kabkota_id' => 3
                ]);

                // Create 8 Area Perubahan
                Role::create([
                    'nama_role' => 'Tim SPBE',
                ]);

                Role::create([
                    'nama_role' => 'Admin Provinsi',
                ]);

                Role::create([
                    'nama_role' => 'Admin Kabupaten/Kota',
                ]);

                Role::create([
                    'nama_role' => 'Pimpinan',
                ]);

                // Create 8 Area Perubahan
                Area::create([
                    'nama_area' => 'Kebijakan Internal Tata Kelola SPBE',
                    'slug_area' => 'kebijakan-internal-tata-kelola-spbe'
                ]);

                Area::create([
                    'nama_area' => 'Perancangan Strategis SPBE',
                    'slug_area' => 'perancangan-strategis-spbe'
                ]);

                Area::create([
                    'nama_area' => 'Teknologi Informasi dan Komunikasi',
                    'slug_area' => 'teknologi-informasi-dan-komunikasi'
                ]);


                Area::create([
                    'nama_area' => 'Penyelenggaraan SPBE',
                    'slug_area' => 'penyelenggaraan-spbe'
                ]);

                Area::create([
                    'nama_area' => 'Penerapan Manajemen SPBE',
                    'slug_area' => 'penerapan-manajemen-spbe'
                ]);

                Area::create([
                    'nama_area' => 'Pelaksanaan Audit TIK',
                    'slug_area' => 'pelaksanaan-audit-tik'
                ]);

                Area::create([
                    'nama_area' => 'Layanan Administrasi Pemerintahan Berbasis Elektronik',
                    'slug_area' => 'layanan-administrasi-pemerintahan-berbasis-elektronik'
                ]);

                Area::create([
                    'nama_area' => 'Layanan Publik Berbasis Elektronik',
                    'slug_area' => 'layanan-publik-berbasis-elektronik'
                ]);

                // Create PIC
                Pic::create([
                    'nama_pic' => 'Tim SPBE',
                    'slug_pic' => 'tim-spbe'
                ]);

                Pic::create([
                    'nama_pic' => 'Admin Provinsi',
                    'slug_pic' => 'admin-provinsi'
                ]);

                Pic::create([
                    'nama_pic' => 'Admin Kabupaten/Kota',
                    'slug_pic' => 'admin-kabkota'
                ]);

                // Create Provinsi
                Provinsi::create([
                    'id' => '21',
                    'nama_provinsi' => 'DKI Jakarta',
                    'slug_provinsi' => 'dki-jakarta'
                ]);

                Provinsi::create([
                    'id' => '22',
                    'nama_provinsi' => 'Jawa Tengah',
                    'slug_provinsi' => 'jawa-tengah'
                ]);

                // Create Kabkota
                Kabkota::create([
                    'nama_kabkota' => 'Jakarta Timur',
                    'slug_kabkota' => 'jakarta-timur',
                    'provinsi_id' => '21'
                ]);

                Kabkota::create([
                    'nama_kabkota' => 'Jakarta Pusat',
                    'slug_kabkota' => 'jakarta-Pusat',
                    'provinsi_id' => '21'
                ]);

                Kabkota::create([
                    'nama_kabkota' => 'Jakarta Barat',
                    'slug_kabkota' => 'jakarta-barat',
                    'provinsi_id' => '21'
                ]);

                Kabkota::create([
                    'nama_kabkota' => 'Semarang',
                    'slug_kabkota' => 'semarang',
                    'provinsi_id' => '22'
                ]);

                Kabkota::create([
                    'nama_kabkota' => 'Solo',
                    'slug_kabkota' => 'solo',
                    'provinsi_id' => '22'
                ]);

                Kabkota::create([
                    'nama_kabkota' => 'Jepara',
                    'slug_kabkota' => 'jepara',
                    'provinsi_id' => '22'
                ]);
    }
}
