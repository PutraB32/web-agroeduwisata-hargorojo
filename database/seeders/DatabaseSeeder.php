<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use App\Models\KatalogDesa;
use App\Models\KategoriKatalog;
use Illuminate\Support\Facades\Hash;
use App\Models\Agroeduwisata;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Users First
        $superAdmin = User::create([
            'name' => 'Super Admin Hargorojo',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'super_admin',
        ]);

        $admin = User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Seed Kategori Katalog
        $katPengumuman = KategoriKatalog::create(['nama_kategori' => 'Pengumuman']);
        $katArtikelBerita = KategoriKatalog::create(['nama_kategori' => 'Artikel & Berita']);
        $katPerpustakaan = KategoriKatalog::create(['nama_kategori' => 'Perpustakaan']);
        $katGaleri = KategoriKatalog::create(['nama_kategori' => 'Galeri']);


        // 4. Seed Products
        $produkData = [
            // --- 4 PRODUK UNGGULAN ---
            [
                'nama' => 'Gula Semut Kelapa Ekspor',
                'deskripsi' => 'Gula kristal (gula semut) murni kualitas ekspor. Mudah larut dan cocok sebagai pengganti gula pasir untuk kopi, teh, dan aneka baking.',
                'manfaat' => 'Indeks glikemik rendah, aman bagi penderita diabetes ringan, serta mengandung potasium.',
                'harga' => 45000,
                'stok' => 50,
                'gambar' => null,
                'produk_unggulan' => true,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Gula Kelapa Cetak Batok Asli',
                'deskripsi' => 'Dicetak menggunakan batok kelapa alami tanpa bahan kimia pengeras. Memancarkan aroma karamel gurih yang pekat khas nira asli perbukitan.',
                'manfaat' => 'Menambah cita rasa legit pada masakan tradisional dan minuman herbal.',
                'harga' => 25000,
                'stok' => 100,
                'gambar' => null,
                'produk_unggulan' => true,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Nektar Sirup Nira Kelapa',
                'deskripsi' => 'Pengganti madu (vegan honey) yang dihasilkan dari reduksi nira segar kelapa. Berwarna gelap karamel dengan tekstur kental yang menggugah selera.',
                'manfaat' => 'Kaya antioksidan, zat besi, dan mineral zinc yang baik untuk menangkal kelelahan kronis.',
                'harga' => 55000,
                'stok' => 30,
                'gambar' => null,
                'produk_unggulan' => true,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Kopi Rempah Gula Kelapa',
                'deskripsi' => 'Racikan biji kopi robusta pegunungan lokal yang telah di-roasting dan dicampur harmonis dengan gula semut asli Hargorojo.',
                'manfaat' => 'Memberikan ekstra tenaga di pagi hari tanpa memicu lonjakan gula darah dadakan.',
                'harga' => 35000,
                'stok' => 80,
                'gambar' => null,
                'produk_unggulan' => true,
                'user_id' => $superAdmin->id
            ],

            // --- 4 PRODUK STANDAR/BIASA ---
            [
                'nama' => 'Gula Kelapa Koin Mini',
                'deskripsi' => 'Gula cetak ukuran mini seukuran kepingan koin. Sangat praktis sebagai pemanis langsung sekali seduh.',
                'manfaat' => 'Praktis, mudah disimpan, dan takaran yang pas untuk satu cangkir minuman.',
                'harga' => 15000,
                'stok' => 150,
                'gambar' => null,
                'produk_unggulan' => false,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Wedang Jahe Gula Kelapa',
                'deskripsi' => 'Minuman serbuk instan herbal purworejo. Terbuat dari sari jahe merah pedas mantap yang dipadukan dengan gula semut murni.',
                'manfaat' => 'Sangat ampuh menghangatkan tubuh, melegakan tenggorokan, dan mengurangi masuk angin.',
                'harga' => 20000,
                'stok' => 120,
                'gambar' => null,
                'produk_unggulan' => false,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Keripik Pisang Karamel Kelapa',
                'deskripsi' => 'Camilan keripik pisang kepok renyah yang dibalut dengan lelehan gula kelapa organik yang manis gurih tanpa MSG.',
                'manfaat' => 'Alternatif camilan sehat rendah natrium dan kaya karbohidrat murni pengganjal perut.',
                'harga' => 12000,
                'stok' => 200,
                'gambar' => null,
                'produk_unggulan' => false,
                'user_id' => $superAdmin->id
            ],
            [
                'nama' => 'Gula Kelapa Eceran Dapur',
                'deskripsi' => 'Gula kelapa standar tanpa cetakan (pecahan). Paling disukai oleh kaum ibu-ibu untuk bumbu masakan harian seperti gulai dan bacem.',
                'manfaat' => 'Memberikan warna coklat kemerahan alami yang cantik dan gurih pada masakan nusantara.',
                'harga' => 8000,
                'stok' => 300,
                'gambar' => null,
                'produk_unggulan' => false,
                'user_id' => $superAdmin->id
            ]
        ];

        foreach ($produkData as $prod) {
            Produk::create($prod);
        }

        // 5. Seed Katalog Desa (News/Articles and Photos)
        $katalogData = [
            // Pengumuman
            ['kategori_id' => $katPengumuman->id, 'judul' => 'Jadwal Gotong Royong Warga', 'deskripsi' => 'Diberitahukan kepada seluruh warga Desa Hargorojo bahwa akan diadakan kerja bakti pembersihan jalan utama pada hari Minggu besok.'],
            ['kategori_id' => $katPengumuman->id, 'judul' => 'Penyaluran Bantuan Langsung Tunai (BLT)', 'deskripsi' => 'Penyaluran BLT Dana Desa tahap 3 akan dilaksanakan di Balai Desa Hargorojo pada tanggal 10 bulan ini.'],
            // Artikel & Berita
            ['kategori_id' => $katArtikelBerita->id, 'judul' => 'Inovasi Gula Semut: Dari Dapur Tradisional ke Pasar Modern', 'deskripsi' => 'Perjalanan panjang petani lokal dalam meningkatkan nilai jual gula kelapa menjadi gula semut kualitas ekspor yang diminati pasar internasional.'],
            ['kategori_id' => $katArtikelBerita->id, 'judul' => 'Edukasi Gula Kelapa Jadi Daya Tarik Wisata', 'deskripsi' => 'Masyarakat Hargorojo kini mengubah kebun kelapa menjadi arena edukasi bagi anak sekolah dan wisatawan umum.'],
            ['kategori_id' => $katArtikelBerita->id, 'judul' => 'Menjaga Tradisi, Menghasilkan Kualitas', 'deskripsi' => 'Mengapa gula kelapa cetak batok dari desa kita memiliki rasa yang berbeda? Ini rahasianya.'],
            // Perpustakaan
            ['kategori_id' => $katPerpustakaan->id, 'judul' => 'Buku Panduan Pembuatan Gula Semut Standar SNI', 'deskripsi' => 'Dokumen resmi berisi panduan higienisitas dan standar operasi prosedur dalam memproduksi gula kristal kelapa.', 'Url' => 'https://example.com/buku-gula'],
            ['kategori_id' => $katPerpustakaan->id, 'judul' => 'Profil Desa Hargorojo 2026', 'deskripsi' => 'Buku digital yang memuat statistik kependudukan, potensi demografi, dan pencapaian desa dalam 5 tahun terakhir.', 'Url' => 'https://example.com/profil-desa'],
            ['kategori_id' => $katPerpustakaan->id, 'judul' => 'Modul Pelatihan BUMDes', 'deskripsi' => 'Materi pelatihan untuk anggota BUMDes dalam mengelola unit usaha desa secara profesional dan transparan.', 'Url' => 'https://example.com/modul-bumdes'],
            // Galeri
            ['kategori_id' => $katGaleri->id, 'judul' => 'Pemandangan Bukit Menoreh', 'deskripsi' => 'Lanskap pagi hari di bukit Menoreh dengan kabut tipis.'],
            ['kategori_id' => $katGaleri->id, 'judul' => 'Aktivitas Pasar Pagi', 'deskripsi' => 'Warga saling berinteraksi di pasar tradisional.'],
            ['kategori_id' => $katGaleri->id, 'judul' => 'Proses Penyaringan Nira', 'deskripsi' => 'Dokumentasi petani sedang menyaring nira murni.'],
        ];

        foreach ($katalogData as $katalog) {
            KatalogDesa::create([
                'kategori_id' => $katalog['kategori_id'],
                'user_id' => $superAdmin->id,
                'judul' => $katalog['judul'],
                'deskripsi' => $katalog['deskripsi'],
                'gambar' => null
            ]);
        }

        // 6. Seed Agroeduwisata (Induk)
        $parentProses = Agroeduwisata::create([
            'user_id' => $superAdmin->id, 'parent_id' => null,
            'judul' => 'Proses Pembuatan Gula', 'deskripsi' => 'Mari selami perjalanan manis pembuatan Gula Kelapa khas Desa Hargorojo, mulai dari tetes nira pertama hingga menjadi butiran emas kaya manfaat.', 'gambar' => null
        ]);
        $parentEdukasi = Agroeduwisata::create([
            'user_id' => $superAdmin->id, 'parent_id' => null,
            'judul' => 'Edukasi Pertanian Kelapa', 'deskripsi' => 'Pelajari kearifan lokal warga desa dalam menjaga harmoni alam melalui sistem tani kelapa organik yang berkelanjutan dan ramah lingkungan.', 'gambar' => null
        ]);
        $parentWisata = Agroeduwisata::create([
            'user_id' => $superAdmin->id, 'parent_id' => null,
            'judul' => 'Wisata Alam', 'deskripsi' => 'Lepaskan penat Anda dengan mengeksplorasi spot-spot alam memukau yang tersembunyi di balik perbukitan hijau dan rindangnya hutan kelapa Menoreh.', 'gambar' => null
        ]);
        $parentBudaya = Agroeduwisata::create([
            'user_id' => $superAdmin->id, 'parent_id' => null,
            'judul' => 'Budaya Desa', 'deskripsi' => 'Saksikan dan jadilah bagian dari kekayaan tradisi luhur, seni pertunjukan, dan kehangatan interaksi masyarakat agraris Hargorojo.', 'gambar' => null
        ]);

        // Seed Agroeduwisata (Anak / Tahapan)
        $agroChildrenData = [
            // Tahapan Pembuatan Gula
            ['parent_id' => $parentProses->id, 'judul' => 'Tahap 1 - Penderesan Nira Kelapa', 'deskripsi' => 'Perjalanan manis berawal dari sini. Petani lokal dengan teknik kearifan tradisional memanjat pohon kelapa di pagi buta untuk menyadap nektar murni (nira) menggunakan bumbung bambu higienis.'],
            ['parent_id' => $parentProses->id, 'judul' => 'Tahap 2 - Penyaringan Nira Murni', 'deskripsi' => 'Cairan nira emas yang baru dipanen kemudian disaring menggunakan alat tradisional untuk memastikan kualitas dan kebersihannya terjaga sebelum memasuki tungku panas.'],
            ['parent_id' => $parentProses->id, 'judul' => 'Tahap 3 - Pemasakan & Karamelisasi', 'deskripsi' => 'Selama berjam-jam, nira direbus di atas tungku kayu bakar khusus. Aroma karamel khas pedesaan akan menyeruak seiring adonan yang mengental secara alami tanpa bahan pengawet.'],
            ['parent_id' => $parentProses->id, 'judul' => 'Tahap 4 - Pencetakan Gula Klasik', 'deskripsi' => 'Di tahap akhir, adonan gula panas dituangkan dengan hati-hati ke dalam cetakan alami dari batok kelapa atau bilah bambu, menciptakan bentuk otentik Gula Kelapa Hargorojo.'],

            // Tahapan Edukasi Pertanian Kelapa
            ['parent_id' => $parentEdukasi->id, 'judul' => 'Edukasi 1 - Seleksi Bibit Unggul', 'deskripsi' => 'Pengunjung akan diajarkan cara masyarakat Hargorojo menyeleksi tunas bunga manggar dan bibit pohon kelapa penderes yang paling berkualitas.'],
            ['parent_id' => $parentEdukasi->id, 'judul' => 'Edukasi 2 - Perawatan Pohon Organik', 'deskripsi' => 'Menyelami teknik warisan leluhur dalam merawat pohon kelapa menggunakan pupuk kompos murni agar harmoni alam tetap terjaga tanpa pestisida kimia.'],
            ['parent_id' => $parentEdukasi->id, 'judul' => 'Edukasi 3 - Tanam Tumpang Sari', 'deskripsi' => 'Belajar ekologi cerdas khas desa, di mana warga memanfaatkan luasan lahan di bawah pohon kelapa untuk menanam rempah dan sayuran demi ketahanan pangan ganda.'],
            ['parent_id' => $parentEdukasi->id, 'judul' => 'Edukasi 4 - Panen Berkelanjutan', 'deskripsi' => 'Simulasi panen yang ramah lingkungan. Melihat bagaimana keseluruhan pohon kelapa dimanfaatkan: dari buah, cangkang, hingga lidi, tidak ada yang terbuang sia-sia.'],

            // Tahapan Wisata Alam
            ['parent_id' => $parentWisata->id, 'judul' => 'Spot 1 - Trekking Hutan Kelapa', 'deskripsi' => 'Nikmati kesejukan udara pegunungan sembari menyusuri jalan setapak di bawah rindangnya formasi hutan kelapa tropis khas perbukitan Menoreh.'],
            ['parent_id' => $parentWisata->id, 'judul' => 'Spot 2 - Gardu Pandang Eksotis', 'deskripsi' => 'Titik peristirahatan sempurna di ketinggian desa. Sebuah lokasi fotografi memukau dengan panorama hamparan lembah hijau yang membentang sangat luas.'],
            ['parent_id' => $parentWisata->id, 'judul' => 'Spot 3 - Susur Sungai Bening', 'deskripsi' => 'Temukan kedamaian dari gemercik aliran sungai pedesaan murni. Area ini dihiasi bebatuan sungai alami dan pepohonan asri yang memanjakan jiwa.'],
            ['parent_id' => $parentWisata->id, 'judul' => 'Spot 4 - Area Camping Ground', 'deskripsi' => 'Fasilitas rekreasi keluarga untuk berkemah santai. Habiskan malam Anda yang dipenuhi bintang sembari menyeduh minuman hangat dengan gula semut asli desa.'],

            // Tahapan Budaya Desa
            ['parent_id' => $parentBudaya->id, 'judul' => 'Tradisi 1 - Kesenian Jathilan Sura', 'deskripsi' => 'Atraksi seni pertunjukan kuda lumping (Jathilan) tradisional yang menggambarkan semangat ksatria, diturunkan dari generasi ke generasi di Hargorojo.'],
            ['parent_id' => $parentBudaya->id, 'judul' => 'Tradisi 2 - Selamatan Wiwit', 'deskripsi' => 'Saksikan kearifan nilai spiritual masyarakat agraris melalui ritual doa adat ungkapan rasa syukur kepada Sang Pencipta setiap kali musim panen tiba.'],
            ['parent_id' => $parentBudaya->id, 'judul' => 'Tradisi 3 - Kerajinan Tangan Bambu', 'deskripsi' => 'Tidak hanya sekadar melihat, wisatawan diajak berinteraksi dan mencoba langsung membuat keranjang serta anyaman estetis dari bambu bersama seniman lokal.'],
            ['parent_id' => $parentBudaya->id, 'judul' => 'Tradisi 4 - Pasar Kaget Jajanan', 'deskripsi' => 'Interaksi warga paling murni terjadi di pasar tradisional. Jadilah bagian dari mereka, dan cicipi jajanan lokal yang manisnya melegenda hingga turun temurun.'],
        ];

        foreach ($agroChildrenData as $child) {
            Agroeduwisata::create([
                'user_id' => $superAdmin->id,
                'parent_id' => $child['parent_id'],
                'judul' => $child['judul'],
                'deskripsi' => $child['deskripsi'],
                'gambar' => null
            ]);
        }
    }
}
