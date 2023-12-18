<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			 'name' => 'Administrator',
			 'email' => 'admin@mail.com',
			 'password' => Hash::make('admin123'),
			 'created_at' => date('Y-m-d H:i:s'),
			 'isAdmin' => True,
		]);

		DB::table('users')->insert([
			 'name' => 'Operator',
			 'email' => 'op@mail.com',
			 'password' => Hash::make('op123'),
			 'created_at' => date('Y-m-d H:i:s'),
			 'isAdmin' => False,
		]);

        DB::table('headers')->insert([
            'linefirst' => 'BAPENDA',
            'linesecondw' => 'KABUPATEN',
            'linesecondr' => 'NGANJUK',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('visis')->insert([
            'textfirst' => 'Mewujudkan',
            'textalternative' => 'Surakarta',
            'textsecond' => 'sebagai Kota Budaya yang',
            'textanimation' => 'Modern,Tangguh,Gesit,Kreatif,Sejahtera',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('misis')->insert([
            'periode' => '2022 - 2027',
            'description' => '<div style="text-align: justify;">
                                1. asdjlaskldjasd salkdjaslkd jlaks jdlasj dlksaj dlasj dlaksjdlaskjd.
                              </div>
                              <div style="text-align: justify;">
                                2. lasjdlasjdlasjdljsa dasj dlkjsa dkljsalkdjsalkjdsalkj dsalkj dslkjd as.
                              </div>',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('kegiatans')->insert([
            'title' => 'Kegiatan Sosialisasi Sapu Bersih Pungutan Liar',
            'content' => '<div style="text-align: justify;">
                            Melaksanakan kegiatan Sosialisasi Sapu Bersih Pungutan Liar (Minggu, 12/06/2022).Kegiatan sosialisasi berkolaborasi dengan Penyuluh Anti Korupsi ( PAK) Provinsi Jawa Tengah.
                           </div>',
            'publish_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('pelayanans')->insert([[
            'icon' => 'fas fa-building',
            'title' => 'E-BPHTB',
            'deskripsi_singkat' => 'Aplikasi Pelayanan Bea Perolehan atas Tanah dan Bangunan (BPHTB)',
            'link' => 'https://bapenda.nganjukkab.go.id/bphtb/',
            'created_at' => date('Y-m-d H:i:s'),

            ],
            [
            'icon' => 'fas fa-clipboard-check',
            'title' => 'E-SPTPD',
            'deskripsi_singkat' => 'Aplikasi Pelayanan Pajak Daerah',
            'link' => 'https://bapenda.nganjukkab.go.id/esptpd/',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'icon' => 'fas fa-city',
            'title' => 'E-SPPT',
            'deskripsi_singkat' => 'Aplikasi Cek Tagihan Online PBB-P2 serta Manajemen PBB-P2',
            'link' => 'https://bapenda.nganjukkab.go.id/esppt/',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            ['icon' => 'fas fa-user-check',
            'title' => 'E-KSWP',
            'deskripsi_singkat' => 'Aplikasi untuk cek Status Konfirmasi Wajib Pajak',
            'link' => 'https://bapenda.nganjukkab.go.id/simkswp/',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            ['icon' => 'fas fa-desktop',
            'title' => 'E-DASHBOARD',
            'deskripsi_singkat' => 'Aplikasi untuk memonitor Pendapatan Pajak Daerah secara Real-Time',
            'link' => 'https://bapenda.nganjukkab.go.id/dashboard/',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            ['icon' => 'fas fa-hand-holding-usd',
            'title' => 'E-SETORAN',
            'deskripsi_singkat' => 'Aplikasi untuk transaksi Setoran dari OPD Penghasil',
            'link' => 'https://bapenda.nganjukkab.go.id/esetoran/',
            'created_at' => date('Y-m-d H:i:s'),
            ]],
            );

        DB::table('ppids')->insert([
            'group' => 'Informasi Dikecualikan',
            'title' => 'Informasi Dikecualikan',
            'description' => 'Informasi yang tidak dapat diakses Pemohon Informasi Publik sesuai Undang-Undang Nomor 14 Tahun 2008 Tentang Keterbukaan Informasi Publik',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('terkaits')->insert([
            'brand' => 'Lapor!',
            'caption' => 'Layanan Aspirasi dan Pengaduan Online Masyarakat',
            'link' => 'https://surakarta.lapor.go.id/',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('socials')->insert([
            'title' => 'Facebook',
            'icon' => 'fab fa-facebook-f',
            'url' => 'https://facebook.com/',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('runningtexts')->insert([
            'title' => 'Layanan',
            'description' => 'Lapor! (Layanan Aspirasi dan Pengaduan Online Masyarakat)',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('masterbroadcasts')->insert([
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'title' => 'Apa itu Bapenda?',
            'deskripsi' => '<div style="text-align: justify;">
            Badan Pendapatan Daerah mempunyai tugas membantu Gubernur dalam melaksanakan kewenangan desentralisasi dan dekonsentrasi di bidang Pendapatan Daerah, sesuai dengan kebijaksanaan yang ditetapkan berdasarkan peraturan perundang-undangan yang berlaku
                           </div>',
            'publish_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('kepala_badans')->insert([
            'periode' => '2024-2029',
            'nama' => 'Sumarto',
            'description' => '<div style="text-align: justify;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie, purus eget placerat viverra, nisi odio gravida sapien, congue tincidunt nisl ante nec tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.
                            </div>',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
