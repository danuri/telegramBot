<?php

namespace App\Controllers;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class Casn extends BaseController
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        
        $config = [
			"telegram" => [
				"token" => "1907474116:AAEfRBZPDuqDRgMKwmJP0v5WUwQJR2P8Vps"
			]
		];

        // Load the driver(s) you want to use
		DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

		// Create an instance
		$botman = BotManFactory::create($config);

		$botman->hears('#coba', function (BotMan $bot, $kode) {
			$bot->reply('Username tidak terdaftar!');
		});

		$botman->hears('/lokasi', function (BotMan $bot) {
			$bot->reply('Lokasi belum ditentukan. Bisa di Satuan Kerja terdekat (UIN) atau di Kanreg sesuai domisili. Sedang dibahas terkait Pandemi.');
		});

		$botman->hears('/suratlamaran', function (BotMan $bot) {
			$bot->reply('Surat Lamaran:
- Ditulis tangan dengan tinta hitam.
- Ditujukan kepada Menteri Agama.
- Tanggal surat lamaran 30 Juni s.d 21 Juli 2021.
- Ditandatangani di atas materai 10.000 (atau sesuai ketentuan)');
		});

		$botman->hears('/akreditasi', function (BotMan $bot) {
			$bot->reply('Akreditasi:
- Untuk Umum, bisa menggunakan Prodi dan/atau Perguruan Tinggi. untuk kolom isian, bisa diupload dikeduanya.
- Jika di Ijazah sudah tertulis bukti akreditasi, maka dapat dinyatakan terakreditasi.
- Jika tidak dilampirkan bukti akreditasi, selama pada ijazah ada tertulis akreditasi, maka ijazah dapat dinyatakan juga sebagai bukti akreditasi.
- Untuk Lulusan Terbaik, tetap harus keduanya dengan predikat A.
			');
		});

		$botman->hears('/buktiakreditasi', function (BotMan $bot) {
			$bot->reply('Bukti Akreditasi:
- Sertifikat/SK Penetapan yang dikeluarkan Ban-PT/Pusat Pendidikan Tenaga Kesehatan/Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan.
- Screenshot dari laman Ban-PT/Forlap Dikti yang menerangkan akreditasinya.
- Untuk lulusan Luar Negeri, bukti akreditasi berupa surat penyetaraan ijazah dari instansi yang berwenang  dapat dijadikan bukti akreditasi
			');
		});
		// Start listening
		$botman->listen();
    }
}
