@extends('layouts.master')

@section('title', 'Hubungi Kami - Desa Hargorojo')

@section('content')

{{-- NAVBAR --}}
@include('layouts.navbar')


<!-- ===================================================== -->
<!-- HERO SECTION -->
<!-- ===================================================== -->
<section class="
    relative

    py-32
    lg:py-29

    px-4

    text-center

    overflow-hidden
"
style="
    background-image: url('{{ asset('/images/assets foto/hero section_kontak.png') }}');
    background-size: cover;
    background-position: center;
">

    <!-- OVERLAY -->
    <div class="
        absolute
        inset-0

        bg-gradient-to-r
        from-black/50
        via-[#173121]/70
        to-black/50
    "></div>

    <!-- LOGIN ADMIN -->
    <div class="
        absolute

        top-25
        right-1

        md:top-28
        md:right-8

        z-20
    ">

        <a href="{{ route('login') }}"
            class="
                group

                inline-flex
                items-center
                gap-3

                px-3
                py-2.5

                rounded-full

                bg-black/30
                backdrop-blur-md

                border
                border-white/10

                shadow-[0_8px_25px_rgba(0,0,0,0.25)]

                hover:bg-[#173121]/70
                hover:border-[#d4b254]/40
                hover:-translate-y-0.5

                transition-all
                duration-300
            "
        >

            <!-- ICON -->
            <div class="
                w-9
                h-9

                rounded-full

                bg-[#d4b254]/15

                flex
                items-center
                justify-center

                transition-all
                duration-300

                group-hover:bg-[#d4b254]/25
            ">

                <i class="
                    fa-solid
                    fa-user-shield

                    text-[#d4b254]
                "></i>

            </div>

            <!-- TEXT -->
            <div class="
                hidden
                sm:block

                text-left
            ">

                <span class="
                    block

                    text-[10px]

                    uppercase
                    tracking-[0.15em]

                    text-white/50
                ">
                    Portal
                </span>

                <span class="
                    block

                    text-sm
                    font-semibold

                    text-white
                ">
                    Login Admin
                </span>

            </div>

        </a>

    </div>

    

    <!-- CONTENT -->
    <div class="
        relative
        z-10

        max-w-3xl
        mx-auto
    ">

        <!-- TITLE -->
        <h1 class="
            font-lora

            text-white

            text-[42px]
            md:text-[60px]

            font-bold

            leading-tight

            mb-1
        ">

            Hubungi

            <span class="
                text-[#d4b254]
            ">
                Kami
            </span>

        </h1>

        <!-- DESCRIPTION -->
        <p class="
            text-white/80
            font-lora

            text-[16px]
            md:text-[19px]

            leading-relaxed

            max-w-3xl
            mx-auto
        ">

            Tertarik berkunjung atau ingin memesan produk
            gula kelapa asli Hargorojo?

            <br>

            Jangan ragu untuk menghubungi kami.
            Kami siap melayani Anda dengan sepenuh hati.

        </p>

    </div>

</section>

<!-- ===================================================== -->
<!-- INFORMASI KONTAK -->
<!-- ===================================================== -->
<section class="
    py-16
    lg:py-20

    bg-white
">

    <div class="
        max-w-[1350px]
        mx-auto

        px-4
        md:px-6
        lg:px-8
    ">

        <div class="
            grid
            lg:grid-cols-[0.9fr_1fr]

            gap-7
            lg:gap-8
        ">

            <!-- ====================================== -->
            <!-- LEFT -->
            <!-- ====================================== -->
            <div class="space-y-6">

                <!-- WHATSAPP -->
                <a href="https://wa.me/6281286427780"
                    target="_blank"
                    class="
                        group

                        block

                        p-6

                        rounded-[25px]

                        bg-[#173121]

                        shadow-[0_15px_40px_rgba(0,0,0,0.08)]

                        hover:-translate-y-1

                        transition-all
                        duration-300
                    "
                >

                    <div class="
                        flex
                        items-start
                        gap-5
                    ">

                        <div class="
                            w-13
                            h-13

                            rounded-full

                            bg-white/10

                            flex
                            items-center
                            justify-center

                            shrink-0
                        ">

                            <i class="
                                fa-brands
                                fa-whatsapp

                                text-[#d4b254]
                                text-4xl
                            "></i>

                        </div>

                        <div>

                            <h3 class="
                                text-white

                                font-bold

                                text-lg

                            ">
                                WhatsApp
                            </h3>

                            <p class="
                                text-white/80

                                text-md

                                leading-relaxed

                                mb-2
                            ">
                                Respon cepat untuk reservasi
                                dan pertanyaan seputar Hargorojo.
                            </p>

                            <span class="
                                text-[#d4b254]

                                font-semibold
                            ">
                                +62 812-8642-7780
                            </span>

                        </div>

                    </div>

                </a>

                <!-- CONTACT GRID -->
                <div class="
                    grid
                    sm:grid-cols-2

                    gap-6
                ">

                    <!-- EMAIL -->
                    <div class="
                        p-6

                        rounded-[20px]

                        border
                        border-[#dfe5e1]

                        hover:shadow-lg

                        transition-all
                        duration-300
                    ">

                        <i class="
                            fa-solid
                            fa-envelope

                            text-[#d4b254]

                            text-2xl

                            mb-2
                        "></i>

                        <h4 class="
                            font-bold

                            text-[#173121]

                            mb-2
                        ">
                            Email
                        </h4>

                        <p class="
                            text-[#717773]

                            text-md
                        ">
                            info@hargorojo.id
                        </p>

                    </div>

                    <!-- INSTAGRAM -->
                    <div class="
                        p-6

                        rounded-[25px]

                        border
                        border-[#dfe5e1]

                        hover:shadow-lg

                        transition-all
                        duration-300
                    ">

                        <i class="
                            fa-brands
                            fa-instagram

                            text-[#d4b254]

                            text-2xl

                            mb-2
                        "></i>

                        <h4 class="
                            font-bold

                            text-[#173121]

                            mb-2
                        ">
                            Instagram
                        </h4>

                        <p class="
                            text-[#717773]

                            text-md
                        ">
                            @desahargorojo
                        </p>

                    </div>

                    <!-- JAM -->
                    <div class="
                        sm:col-span-2

                        p-6

                        rounded-[25px]

                        border
                        border-[#dfe5e1]

                        hover:shadow-lg

                        transition-all
                        duration-300
                    ">

                        <div class="
                            flex
                            items-center
                            gap-4
                        ">

                            <div class="
                                w-12
                                h-12

                                rounded-full

                                bg-[#d4b254]/20

                                flex
                                items-center
                                justify-center
                            ">

                                <i class="
                                    text-2xl
                                    fa-solid
                                    fa-clock

                                    text-[#d4b254]
                                "></i>

                            </div>

                            <div>

                                <h4 class="
                                    font-bold

                                    text-[#173121]
                                ">
                                    Jam Kunjungan
                                </h4>

                                <p class="
                                    text-[#717773]

                                    text-sm
                                ">
                                    Senin – Minggu • 08.00 – 17.00 WIB
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- MAPS -->
                <div class="
                    overflow-hidden

                    rounded-[25px]

                    border
                    border-[#dfe5e1]
                ">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.0530874443425!2d110.04034548116041!3d-7.815595778079431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7ae73c8ad22021%3A0x3f38846f3c7c85a4!2sKantor%20Balai%20Desa%20Hargorojo!5e1!3m2!1sen!2sid!4v1781547009835!5m2!1sen!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="p-6">

                        <h4 class="
                            font-bold
                            font-lora
                            text-[17px]

                            text-[#173121]

                            mb-2
                        ">
                            Lokasi Kami
                        </h4>

                        <p class="
                            text-[#717773]

                            text-md

                            leading-relaxed

                            mb-4
                        ">
                            Hargorojo, Kecamatan Bagelen, 
                            Kabupaten Purworejo, 
                            Jawa Tengah, Indonesia.
                        </p>

                        <a href="https://maps.app.goo.gl/6LBBxyF7zEw3X1uV7"
                            target="_blank"
                            class="
                                inline-flex
                                items-center
                                gap-3

                                px-5
                                py-3

                                rounded-full

                                bg-[#173121]

                                text-white

                                hover:bg-[#224430]

                                transition-all
                                duration-300
                            "
                        >

                            <i class="
                                fa-solid
                                fa-location-dot
                            "></i>

                            Buka di Google Maps

                        </a>

                    </div>

                </div>

            </div>

            <!-- ====================================== -->
            <!-- FORM -->
            <!-- ====================================== -->
            <div class="
                p-6
                md:p-8

                rounded-[30px]

                bg-white

                border
                border-[#dfe5e1]

                shadow-[0_20px_70px_rgba(0,0,0,0.05)]
            ">

                <div class="mb-8">

                    

                    <h2 class="
                        font-lora

                        text-[#173121]

                        text-[32px]

                        font-bold

                        
                    ">
                        Kirim Pesan
                    </h2>

                    <p class="
                        text-[#717773]

                        leading-relaxed
                    ">
                        Isi formulir berikut dan kami akan
                        merespon pesan Anda secepat mungkin.
                    </p>

                </div>

                <form
                    action="#"
                    method="POST"

                    class="space-y-5"
                >

                    @csrf

                    <div>
                        <label
                        for="nama"
                        class="
                        block
                        mb-2
                        text-[#173121]
                        font-semibold
                        "
                        >

            Nama Lengkap

        </label>
                    <input
                        type="text"
                        name="nama"

                        placeholder="Nama Lengkap"

                        class="
                            w-full

                            px-5
                            py-4

                            rounded-2xl

                            border
                            border-[#dfe5e1]

                            focus:border-[#173121]
                            focus:ring-0
                        "
                    >
                    </div>

                    <div>

    <label
        for="email"

        class="
            block

            mb-2

            text-[#173121]

            font-semibold
        "
    >

        Alamat Email

        <span class="text-red-500">*</span>

    </label>

    <input
        type="email"
        id="email"
        name="email"

        placeholder="contoh@email.com"

        class="
            w-full

            px-5
            py-4

            rounded-2xl

            border
            border-[#dfe5e1]

            placeholder:text-[#a3a3a3]

            focus:border-[#173121]
            focus:ring-4
            focus:ring-[#173121]/5
            focus:outline-none

            transition-all
            duration-300
        "
    >

</div>

                    <div>

    <label
        for="whatsapp"

        class="
            block

            mb-2

            text-[#173121]

            font-semibold
        "
    >

        Nomor WhatsApp

        <span class="text-red-500">*</span>

    </label>

    <input
        type="tel"
        id="whatsapp"
        name="whatsapp"

        placeholder="Contoh: 0812 3456 7890"

        class="
            w-full

            px-5
            py-4

            rounded-2xl

            border
            border-[#dfe5e1]

            placeholder:text-[#a3a3a3]

            focus:border-[#173121]
            focus:ring-4
            focus:ring-[#173121]/5
            focus:outline-none

            transition-all
            duration-300
        "
    >

</div>

                    <div>

    <label
        for="subjek"

        class="
            block

            mb-2

            text-[#173121]

            font-semibold
        "
    >

        Kategori Pesan

    </label>

    <div class="relative">

        <select
            id="subjek"
            name="subjek"

            class="
                w-full

                px-5
                py-4
                pr-12

                rounded-2xl

                border
                border-[#dfe5e1]

                bg-white

                text-[#173121]

                appearance-none

                focus:border-[#173121]
                focus:ring-4
                focus:ring-[#173121]/5
                focus:outline-none

                transition-all
                duration-300
            "
        >

            <option value="" selected disabled>
                Pilih kategori pesan
            </option>

            <option value="Pertanyaan Umum">
                Pertanyaan Umum
            </option>

            <option value="Tentang Produk">
                Tentang Produk
            </option>

            <option value="Reservasi">
                Reservasi Kunjungan
            </option>

            <option value="Pemesanan Grosir">
                Pemesanan Grosir
            </option>

            <option value="Kerjasama">
                Kerjasama
            </option>

        </select>

        <!-- CUSTOM ARROW -->
        <div class="
            pointer-events-none

            absolute
            inset-y-0
            right-5

            flex
            items-center
        ">

            <i class="
                fa-solid
                fa-chevron-down

                text-[#717773]

                text-sm
            "></i>

        </div>

    </div>

</div>

                    <div>

    <label
        for="pesan"

        class="
            block

            mb-2

            text-[#173121]

            font-semibold
        "
    >

        Pesan

        <span class="text-red-500">*</span>

    </label>

    <textarea
        id="pesan"
        name="pesan"

        rows="6"

        placeholder="Tuliskan kebutuhan, pertanyaan, atau pesan Anda..."

        class="
            w-full

            px-5
            py-4

            rounded-2xl

            border
            border-[#dfe5e1]

            placeholder:text-[#a3a3a3]

            resize-none

            focus:border-[#173121]
            focus:ring-4
            focus:ring-[#173121]/5
            focus:outline-none

            transition-all
            duration-300
        "
    ></textarea>

    <p class="
        mt-2

        text-sm

        text-[#717773]
    ">

        Ceritakan kebutuhan Anda secara singkat agar kami dapat membantu dengan lebih baik.

    </p>

</div>

                    <button
                        type="submit"

                        class="
                            inline-flex
                            items-center
                            gap-3

                            px-8
                            py-4

                            rounded-full

                            bg-[#173121]

                            text-white
                            font-semibold

                            hover:bg-[#224430]

                            transition-all
                            duration-300
                        "
                    >

                        Kirim Pesan

                        <i class="
                            fa-solid
                            fa-paper-plane
                        "></i>

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- FAQ -->
<!-- ===================================================== -->
<section class="
    relative
    py-15
    bg-[#f8f6f1]
">

    <!-- CONTAINER -->
    <div class="
        max-w-4xl
        mx-auto
        px-6
        lg:px-10
    ">
    
    {{-- Small Label --}}
    <div class="
    flex 
    items-center 
    justify-center 
    gap-3 
    
    ">
        <div class="
        w-14 h-[2px] 
        bg-yellow-500 
        rounded-full">
    </div>
        <span class="
        uppercase 
        tracking-[0.2em] 
        text-[14px] 
        font-semibold 
        text-[#b89b5e]">
            Informasi Tambahan
        </span>

        <div class="
        w-14 h-[2px] 
        bg-yellow-500 
        rounded-full">
    </div>
    
    </div>

        <!-- TITLE -->
        <h2 class="
            text-center

            font-lora

            text-[40px]
            md:text-[45px]

            leading-[1]

            font-bold

            text-[#173121]

            mb-2
        ">

            Pertanyaan yang Sering diajukan

        </h2>

        <!-- DESC -->
        <p class="
            max-w-2xl
            mx-auto
            text-[#52605a]
            text-[15px]
            md:text-[18px]
            text-center
            leading-[1.4]
            font-light
            mb-10
        ">
            Berikut adalah beberapa pertanyaan yang sering diajukan
            oleh pelanggan kami. Temukan jawabannya di bawah ini.
        </p>

        <!-- FAQ LIST -->
        <div class="space-y-3">

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white

                    rounded-[20px]

                    border
                    border-[#ece6da]

                    overflow-hidden

                    shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                "
            >

                <!-- QUESTION -->
                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between
                        px-6
                        py-5
                        text-left
                    "
                >

                    <div class="
                        flex
                        items-center
                        gap-2
                    ">

                        <span class="
                            text-[#173121]
                            font-semibold
                            text-[18px]
                            font-lora
                        ">
                            Bagaimana cara melakukan reservasi kunjungan?
                        </span>

                    </div>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <!-- ANSWER -->
                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >
                    Anda dapat melakukan reservasi melalui formulir kontak di halaman ini atau menghubungi kami secara langsung melalui WhatsApp. Tim kami akan membantu mengatur jadwal kunjungan sesuai kebutuhan Anda.

                    
                </div>
            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white

                    rounded-[20px]

                    border
                    border-[#ece6da]

                    overflow-hidden

                    shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                "
            >

                <!-- QUESTION -->
                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between
                        px-6
                        py-5
                        text-left
                    "
                >

                    <div class="
                        flex
                        items-center
                        gap-2
                    ">

                        <span class="
                            text-[#173121]
                            font-semibold
                            text-[18px]
                            font-lora
                        ">
                            Apakah kunjungan tersedia untuk rombongan sekolah atau instansi?
                        </span>

                    </div>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <!-- ANSWER -->
                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >
                    Ya. Desa Wisata Hargorojo menerima kunjungan rombongan, baik dari sekolah, komunitas, maupun instansi. Silakan hubungi kami untuk informasi lebih lanjut mengenai paket edukasi dan kapasitas peserta.
                    
                </div>
            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white

                    rounded-[20px]

                    border
                    border-[#ece6da]

                    overflow-hidden

                    shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                "
            >

                <!-- QUESTION -->
                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between
                        px-6
                        py-5
                        text-left
                    "
                >

                    <div class="
                        flex
                        items-center
                        gap-2
                    ">

                        <span class="
                            text-[#173121]
                            font-semibold
                            text-[18px]
                            font-lora
                        ">
                            Apakah produk gula kelapa dapat dipesan secara grosir?
                        </span>

                    </div>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <!-- ANSWER -->
                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >
                    Tentu. Kami melayani pemesanan produk gula kelapa dalam jumlah besar untuk kebutuhan usaha, reseller, maupun kerja sama distribusi.
                    
                </div>
            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white

                    rounded-[20px]

                    border
                    border-[#ece6da]

                    overflow-hidden

                    shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                "
            >

                <!-- QUESTION -->
                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between
                        px-6
                        py-5
                        text-left
                    "
                >

                    <div class="
                        flex
                        items-center
                        gap-2
                    ">

                        <span class="
                            text-[#173121]
                            font-semibold
                            text-[18px]
                            font-lora
                        ">
                            Bagaimana cara menuju Desa Hargorojo?
                        </span>

                    </div>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <!-- ANSWER -->
                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >
                    Lokasi Desa Hargorojo dapat diakses menggunakan kendaraan roda dua maupun roda empat. Anda dapat menggunakan Google Maps yang tersedia pada halaman ini untuk mempermudah perjalanan.
                    
                </div>
            </div>

        <!-- BOTTOM CTA -->
        <div class="
            mt-12

            bg-white

            rounded-[28px]

            border
            border-[#ece6da]

            p-6
            lg:p-8

            flex
            flex-col
            lg:flex-row

            items-center
            justify-between

            gap-6
        ">

            <div>

                <h3 class="
                    font-lora
                    text-[#173121]
                    font-bold
                    text-2xl
                    mb-2
                ">
                    Masih ada pertanyaan lain?
                </h3>

                <p class="
                    text-[#6b736d]
                    font-lora
                    text-light
                    italic
                ">
                    Jangan ragu untuk menghubungi admin kami.
                </p>

            </div>

            <a href="#"
                class="
                    inline-flex
                    items-center
                    gap-3

                    px-7
                    py-4

                    rounded-2xl

                    bg-[#173121]

                    text-white

                    font-medium

                    hover:bg-[#204732]

                    transition-all
                "
            >

                <i class="fa-brands fa-whatsapp"></i>

                Hubungi Admin via WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection