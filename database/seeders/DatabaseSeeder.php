<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use App\Models\KatalogDesa;
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
        // Seed Products
        $produkData = [
            // --- 4 PRODUK UNGGULAN ---
            [
                'nama' => 'Gula Semut Kelapa Ekspor',
                'deskripsi' => 'Gula kristal (gula semut) murni kualitas ekspor. Mudah larut dan cocok sebagai pengganti gula pasir untuk kopi, teh, dan aneka baking.',
                'manfaat' => 'Indeks glikemik rendah, aman bagi penderita diabetes ringan, serta mengandung potasium.',
                'harga' => 45000,
                'stok' => 50,
                'gambar' => null,
                'is_unggulan' => true
            ],
            [
                'nama' => 'Gula Kelapa Cetak Batok Asli',
                'deskripsi' => 'Dicetak menggunakan batok kelapa alami tanpa bahan kimia pengeras. Memancarkan aroma karamel gurih yang pekat khas nira asli perbukitan.',
                'manfaat' => 'Menambah cita rasa legit pada masakan tradisional dan minuman herbal.',
                'harga' => 25000,
                'stok' => 100,
                'gambar' => null,
                'is_unggulan' => true
            ],
            [
                'nama' => 'Nektar Sirup Nira Kelapa',
                'deskripsi' => 'Pengganti madu (vegan honey) yang dihasilkan dari reduksi nira segar kelapa. Berwarna gelap karamel dengan tekstur kental yang menggugah selera.',
                'manfaat' => 'Kaya antioksidan, zat besi, dan mineral zinc yang baik untuk menangkal kelelahan kronis.',
                'harga' => 55000,
                'stok' => 30,
                'gambar' => null,
                'is_unggulan' => true
            ],
            [
                'nama' => 'Kopi Rempah Gula Kelapa',
                'deskripsi' => 'Racikan biji kopi robusta pegunungan lokal yang telah di-roasting dan dicampur harmonis dengan gula semut asli Hargorojo.',
                'manfaat' => 'Memberikan ekstra tenaga di pagi hari tanpa memicu lonjakan gula darah dadakan.',
                'harga' => 35000,
                'stok' => 80,
                'gambar' => null,
                'is_unggulan' => true
            ],

            // --- 4 PRODUK STANDAR/BIASA ---
            [
                'nama' => 'Gula Kelapa Koin Mini',
                'deskripsi' => 'Gula cetak ukuran mini seukuran kepingan koin. Sangat praktis sebagai pemanis langsung sekali seduh.',
                'manfaat' => 'Praktis, mudah disimpan, dan takaran yang pas untuk satu cangkir minuman.',
                'harga' => 15000,
                'stok' => 150,
                'gambar' => null,
                'is_unggulan' => false
            ],
            [
                'nama' => 'Wedang Jahe Gula Kelapa',
                'deskripsi' => 'Minuman serbuk instan herbal purworejo. Terbuat dari sari jahe merah pedas mantap yang dipadukan dengan gula semut murni.',
                'manfaat' => 'Sangat ampuh menghangatkan tubuh, melegakan tenggorokan, dan mengurangi masuk angin.',
                'harga' => 20000,
                'stok' => 120,
                'gambar' => null,
                'is_unggulan' => false
            ],
            [
                'nama' => 'Keripik Pisang Karamel Kelapa',
                'deskripsi' => 'Camilan keripik pisang kepok renyah yang dibalut dengan lelehan gula kelapa organik yang manis gurih tanpa MSG.',
                'manfaat' => 'Alternatif camilan sehat rendah natrium dan kaya karbohidrat murni pengganjal perut.',
                'harga' => 12000,
                'stok' => 200,
                'gambar' => null,
                'is_unggulan' => false
            ],
            [
                'nama' => 'Gula Kelapa Eceran Dapur',
                'deskripsi' => 'Gula kelapa standar tanpa cetakan (pecahan). Paling disukai oleh kaum ibu-ibu untuk bumbu masakan harian seperti gulai dan bacem.',
                'manfaat' => 'Memberikan warna coklat kemerahan alami yang cantik dan gurih pada masakan nusantara.',
                'harga' => 8000,
                'stok' => 300,
                'gambar' => null,
                'is_unggulan' => false
            ]
        ];

        foreach ($produkData as $prod) {
            Produk::create($prod);
        }

        // Seed Katalog Desa (News/Articles and Photos)
        $katalogData = [
            ['kategori' => 'Berita', 'judul' => 'Inovasi Gula Semut: Dari Dapur Tradisional ke...', 'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['kategori' => 'Berita', 'judul' => 'Edukasi Gula Kelapa Jadi Daya Tarik Wisata...', 'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['kategori' => 'Berita', 'judul' => 'Produk Desa Hargorojo Kian Berkembang Lewat...', 'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['kategori' => 'Berita', 'judul' => 'Menjaga Tradisi, Menghasilkan Kualitas...', 'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['kategori' => 'Foto', 'judul' => 'Foto 1', 'deskripsi' => 'Koleksi foto desa'],
            ['kategori' => 'Foto', 'judul' => 'Foto 2', 'deskripsi' => 'Koleksi foto desa'],
            ['kategori' => 'Foto', 'judul' => 'Foto 3', 'deskripsi' => 'Koleksi foto desa'],
            ['kategori' => 'UMKM', 'judul' => 'Anyaman Bambu Khas Purworejo', 'deskripsi' => 'Produk UMKM Anyaman Bambu'],
            ['kategori' => 'UMKM', 'judul' => 'Keripik Singkong Balado', 'deskripsi' => 'Produk UMKM Keripik'],
            ['kategori' => 'UMKM', 'judul' => 'Gula Kacang Semut', 'deskripsi' => 'Produk UMKM Gula Kacang'],
        ];

        foreach ($katalogData as $katalog) {
            KatalogDesa::create([
                'kategori' => $katalog['kategori'],
                'judul' => $katalog['judul'],
                'deskripsi' => $katalog['deskripsi'],
                'gambar' => null
            ]);
        }

        // Seed Agroeduwisata
        $agroData = [
            // DEKLARASI 4 MENU UTAMA (SEBAGAI INDUK/HEADER)
            ['kategori' => 'Menu Utama', 'judul' => 'Proses Pembuatan Gula', 'deskripsi' => 'Mari selami perjalanan manis pembuatan Gula Kelapa khas Desa Hargorojo, mulai dari tetes nira pertama hingga menjadi butiran emas kaya manfaat.'],
            ['kategori' => 'Menu Utama', 'judul' => 'Edukasi Pertanian Kelapa', 'deskripsi' => 'Pelajari kearifan lokal warga desa dalam menjaga harmoni alam melalui sistem tani kelapa organik yang berkelanjutan dan ramah lingkungan.'],
            ['kategori' => 'Menu Utama', 'judul' => 'Wisata Alam', 'deskripsi' => 'Lepaskan penat Anda dengan mengeksplorasi spot-spot alam memukau yang tersembunyi di balik perbukitan hijau dan rindangnya hutan kelapa Menoreh.'],
            ['kategori' => 'Menu Utama', 'judul' => 'Budaya Desa', 'deskripsi' => 'Saksikan dan jadilah bagian dari kekayaan tradisi luhur, seni pertunjukan, dan kehangatan interaksi masyarakat agraris Hargorojo.'],

            // KATEGORI 1: Proses Pembuatan Gula
            ['kategori' => 'Proses Pembuatan Gula', 'judul' => 'Tahap 1 - Penderesan Nira Kelapa', 'deskripsi' => 'Perjalanan manis berawal dari sini. Petani lokal dengan teknik kearifan tradisional memanjat pohon kelapa di pagi buta untuk menyadap nektar murni (nira) menggunakan bumbung bambu higienis.'],
            ['kategori' => 'Proses Pembuatan Gula', 'judul' => 'Tahap 2 - Penyaringan Nira Murni', 'deskripsi' => 'Cairan nira emas yang baru dipanen kemudian disaring menggunakan alat tradisional untuk memastikan kualitas dan kebersihannya terjaga sebelum memasuki tungku panas.'],
            ['kategori' => 'Proses Pembuatan Gula', 'judul' => 'Tahap 3 - Pemasakan & Karamelisasi', 'deskripsi' => 'Selama berjam-jam, nira direbus di atas tungku kayu bakar khusus. Aroma karamel khas pedesaan akan menyeruak seiring adonan yang mengental secara alami tanpa bahan pengawet.'],
            ['kategori' => 'Proses Pembuatan Gula', 'judul' => 'Tahap 4 - Pencetakan Gula Klasik', 'deskripsi' => 'Di tahap akhir, adonan gula panas dituangkan dengan hati-hati ke dalam cetakan alami dari batok kelapa atau bilah bambu, menciptakan bentuk otentik Gula Kelapa Hargorojo.'],

            // KATEGORI 2: Edukasi Pertanian Kelapa
            ['kategori' => 'Edukasi Pertanian Kelapa', 'judul' => 'Edukasi 1 - Seleksi Bibit Unggul', 'deskripsi' => 'Pengunjung akan diajarkan cara masyarakat Hargorojo menyeleksi tunas bunga manggar dan bibit pohon kelapa penderes yang paling berkualitas.'],
            ['kategori' => 'Edukasi Pertanian Kelapa', 'judul' => 'Edukasi 2 - Perawatan Pohon Organik', 'deskripsi' => 'Menyelami teknik warisan leluhur dalam merawat pohon kelapa menggunakan pupuk kompos murni agar harmoni alam tetap terjaga tanpa pestisida kimia.'],
            ['kategori' => 'Edukasi Pertanian Kelapa', 'judul' => 'Edukasi 3 - Tanam Tumpang Sari', 'deskripsi' => 'Belajar ekologi cerdas khas desa, di mana warga memanfaatkan luasan lahan di bawah pohon kelapa untuk menanam rempah dan sayuran demi ketahanan pangan ganda.'],
            ['kategori' => 'Edukasi Pertanian Kelapa', 'judul' => 'Edukasi 4 - Panen Berkelanjutan', 'deskripsi' => 'Simulasi panen yang ramah lingkungan. Melihat bagaimana keseluruhan pohon kelapa dimanfaatkan: dari buah, cangkang, hingga lidi, tidak ada yang terbuang sia-sia.'],

            // KATEGORI 3: Wisata Alam
            ['kategori' => 'Wisata Alam', 'judul' => 'Spot 1 - Trekking Hutan Kelapa', 'deskripsi' => 'Nikmati kesejukan udara pegunungan sembari menyusuri jalan setapak di bawah rindangnya formasi hutan kelapa tropis khas perbukitan Menoreh.'],
            ['kategori' => 'Wisata Alam', 'judul' => 'Spot 2 - Gardu Pandang Eksotis', 'deskripsi' => 'Titik peristirahatan sempurna di ketinggian desa. Sebuah lokasi fotografi memukau dengan panorama hamparan lembah hijau yang membentang sangat luas.'],
            ['kategori' => 'Wisata Alam', 'judul' => 'Spot 3 - Susur Sungai Bening', 'deskripsi' => 'Temukan kedamaian dari gemercik aliran sungai pedesaan murni. Area ini dihiasi bebatuan sungai alami dan pepohonan asri yang memanjakan jiwa.'],
            ['kategori' => 'Wisata Alam', 'judul' => 'Spot 4 - Area Camping Ground', 'deskripsi' => 'Fasilitas rekreasi keluarga untuk berkemah santai. Habiskan malam Anda yang dipenuhi bintang sembari menyeduh minuman hangat dengan gula semut asli desa.'],

            // KATEGORI 4: Budaya Desa
            ['kategori' => 'Budaya Desa', 'judul' => 'Tradisi 1 - Kesenian Jathilan Sura', 'deskripsi' => 'Atraksi seni pertunjukan kuda lumping (Jathilan) tradisional yang menggambarkan semangat ksatria, diturunkan dari generasi ke generasi di Hargorojo.'],
            ['kategori' => 'Budaya Desa', 'judul' => 'Tradisi 2 - Selamatan Wiwit', 'deskripsi' => 'Saksikan kearifan nilai spiritual masyarakat agraris melalui ritual doa adat ungkapan rasa syukur kepada Sang Pencipta setiap kali musim panen tiba.'],
            ['kategori' => 'Budaya Desa', 'judul' => 'Tradisi 3 - Kerajinan Tangan Bambu', 'deskripsi' => 'Tidak hanya sekadar melihat, wisatawan diajak berinteraksi dan mencoba langsung membuat keranjang serta anyaman estetis dari bambu bersama seniman lokal.'],
            ['kategori' => 'Budaya Desa', 'judul' => 'Tradisi 4 - Pasar Kaget Jajanan', 'deskripsi' => 'Interaksi warga paling murni terjadi di pasar tradisional. Jadilah bagian dari mereka, dan cicipi jajanan lokal yang manisnya melegenda hingga turun temurun.'],
        ];

        foreach ($agroData as $agro) {
            Agroeduwisata::create([
                'kategori' => $agro['kategori'],
                'judul' => $agro['judul'],
                'deskripsi' => $agro['deskripsi'],
                'gambar' => null
            ]);
        }
    }
}
