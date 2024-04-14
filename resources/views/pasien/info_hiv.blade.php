@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="card">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav"
                        style="display: flex; justify-content: space-between; width: 100%; padding-left: 0;">
                        <li class="nav-item" style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">
                            <a style="display: block; padding: 10px 15px; color: #000; text-decoration: none; text-align: center;"
                                onmouseover="this.style.backgroundColor='#5959ff'; this.style.borderRadius='5px'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.borderRadius=''; this.style.color='#000';"
                                class="nav-link" href="#definisi">A. Definisi HIV AIDS</a>
                        </li>
                        <li class="nav-item" style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">
                            <a style="display: block; padding: 10px 15px; color: #000; text-decoration: none; text-align: center;"
                                onmouseover="this.style.backgroundColor='#5959ff'; this.style.borderRadius='5px'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.borderRadius=''; this.style.color='#000';"
                                class="nav-link" href="#sejarah">B. Sejarah HIV AIDS</a>
                        </li>
                        <li class="nav-item" style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">
                            <a style="display: block; padding: 10px 15px; color: #000; text-decoration: none; text-align: center;"
                                onmouseover="this.style.backgroundColor='#5959ff'; this.style.borderRadius='5px'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.borderRadius=''; this.style.color='#000';"
                                class="nav-link" href="#penularan">C. Penularan HIV AIDS</a>
                        </li>
                        <li class="nav-item" style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">
                            <a style="display: block; padding: 10px 15px; color: #000; text-decoration: none; text-align: center;"
                                onmouseover="this.style.backgroundColor='#5959ff'; this.style.borderRadius='5px'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.borderRadius=''; this.style.color='#000';"
                                class="nav-link" href="#mitos">D. Mitos dan Fakta Tentang HIV</a>
                        </li>
                    </div>
                </div>
            </div>
        </nav>

        <div class="card-body" id="definisi">
            <h5 class="card-title fw-semibold mb-4 text-center">A. DEFINISI HIV AIDS</h5>
            <p class="mb-0 text-center">HIV merupakan penyakit menular yang disebabkan karena terjangkit Human
                Immunodeficiency Virus (HIV) yaitu virus yang menurunkan system kekebalan tubuh. Sedangkan AIDS adalah
                kumpulan dari gejala penyakit yang muncul akibat menurunnya sistem kekebalan tubuh yang disebabkan oleh HIV.
                Infeksi oportunistik adalah infeksi yang umumnya tidak berbahaya pada orang dengan tubuh normal namun dapat
                berakibat fatal pada ODHA karena sistem kekebalan tubuhnya lemah</p>
        </div>

        <div class="card-body" id="sejarah">
            <h5 class="card-title fw-semibold mb-4 text-center">B. SEJARAH HIV AIDS</h5>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            I. Sejarah 1983
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dr. Zubairi Djoerban melaksanakan penelitian terhadap 30 waria di Jakarta. Karena rendahnya
                            tingkat limfosit dan gejala klinis, Dr. Zubairi menyatakan dua di antaranya kemungkinan AIDS.

                            Pada November, Menteri Kesehatan RI, Dr. Soewandjono Soerjaningrat menyatakan pencegahan AIDS
                            terbaik adalah tidak ikut-ikutan jadi homoseks … dan mencegah turis-turis
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            II. Sejarah 1984
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Di Kongres Persatuan Ahli Penyakit Dalam Indonesia (KOPAPDI) VI, pada Juli, dilaporkan bahwa
                            dari 15 orang diperiksa, tiga memenuhi kriteria minimal untuk diagnosis AIDS.

                            Pada November, Kepala Divisi Transfusi Darah PMI, Dr. Masri Rustam menyatakan bahwa masyarakat
                            tidak perlu khawatir AIDS menyerang penerima transfusi darah di sini. Walau skrining membutuhkan
                            biaya besar, pencegahan … dilakukan dengan melarang kaum homoseksual atau waria menjadi donor
                            darah.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            III. Sejarah 1985
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada 1 Agustus, Dr. Zubairi menyatakan bila penyakit AIDS sampai menyerang masyarakat akan sulit
                            dicegah. Pada hari berikut, Menkes membenarkan adanya kemungkinan AIDS sudah masuk ke Indonesia.

                            Dr. Arjatmo Tjokrnegoro PhD, ahli imunologi di FK-UI, menduga mungkin orang Indonesia kebal
                            terhadap AIDS karena aspek rasial. <br> <br>

                            Pada 8 Agustus, RSCM dan FK-UI membentuk satuan tugas untuk mengkaji masalah AIDS.

                            Pada 2 September, Menkes menyatakan sudah ada lima kasus AIDS ditemukan di Bali. Namun Direktur
                            Jenderal Pemberantasan Penyakit Menular dan Penyehatan Lingkungan.

                            Seorang perempuan berusia 25 tahun dengan hemofilia dinyatakan terinfeksi HIV pada September di
                            Rumah Sakit Islam Jakarta (RSIJ). <br> <br>

                            Pada 11 November, Menkes mengatakan bahwa belum pernah ditemukan orang yang betul-betul terkena
                            penyakit AIDS. Menjawab pertanyaan wartawan, Menkes komentar “Kalau kita taqwa pada Tuhan, kita
                            tidak perlu khawatir terjangkit penyakit AIDS.”
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            IV. Sejarah 1986
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Perempuan berusia 25 tahun yang didiagnosis HIV pada September 1985 meninggal dunia di RSIJ, tes
                            darahnya memastikan bahwa dia terinfeksi HTLV-III, dan dengan gejala klinis yang menunjukkan
                            AIDS. Kasus ini tidak dilaporkan oleh Depkes. <br> <br>

                            Pada Januari, tes HIV dapat dilakukan di RSCM dengan biaya Rp 62.500. Hasil positif akan dikirim
                            ke AS untuk penelitian lebih lanjut.

                            Juga pada Januari, FKUI RSCM melakukan penelitian terhadap pasien hemofilia yang menerima produk
                            darah (faktor VIII). Ternyata ditemukan satu di antaranya yang dipastikan.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            V. Sejarah 1987
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Seorang wisatawan asal Belanda meninggal di RS Sanglah, Bali. Kematian pria berusia 44 tahun itu
                            diakui Depkes disebabkan AIDS. Indonesia masuk dalam daftar WHO sebagai negara ke-13 di Asia
                            yang melaporkan kasus AIDS. <br> <br>

                            Pada Oktober, dilakukan Kongres tentang Penyakit Akibat Hubungan Kelamin di Bali sekaligus
                            Konferensi International Union Against Venerial Diseases and Treponematoses untuk kawasan Asia
                            dan Pasifik. Menkes Dr. Soewandjono Soerjaningrat dalam sambutan mengatakan bahwa penyakit yang
                            sebelumnya dikaitkan dengan hubungan seksual yang menyimpang dari tuntutan agama, ternyata dapat
                            menular melalui darah.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            VI. Sejarah 1988
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada 1988, Depkes hanya melaporkan tambahan satu kasus infeksi HIV di Indonesia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            VII. Sejarah 1989
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Tema Hari AIDS Sedunia 1989 adalah “Kaum Muda (Youth).”

                            Pada 1989, Depkes tidak melaporkan satu pun kasus infeksi HIV tambahan di Indonesia. Namun satu
                            kasus HIV dilaporkan berlanjut menjadi AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            VIII. Sejarah 1990
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Tema Hari AIDS Sedunia 1990 adalah “Wanita dan AIDS (Women and AIDS).”

                            Pada 1990, Depkes melaporkan tambahan dua kasus AIDS, sehingga jumlah kasus infeksi HIV di
                            Indonesia menjadi sembilan.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            IX. Sejarah 1991
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            International AIDS Candlelight Memorial pertama diselenggarakan di Indonesia. Peristiwa ini,
                            dikenal sebagai Malam Tirakatan Mengenang Korban-Korban AIDS, diselenggarakan di Surabaya oleh
                            Kelompok Kerja Lesbian & Gay Nusantara (sekarang Gaya Nusantara), dengan bantuan dari Persatuan
                            Waria Kotamadya Surabaya (Perwakos). <br> <br>

                            Pada 29-30 Juli, dilakukan Semiloka Nasional AIDS di Denpasar, Bali, untuk membahas Pengembangan
                            Strategi Penanggulangan AIDS di Indonesia.

                            Tema Hari AIDS Sedunia 1991 adalah “Bersama Kita Hadapi Tantangan (Sharing the Challenge).”

                            Pada 1991, Depkes melaporkan tambahan jumlah kasus infeksi HIV di Indonesia sudah menjadi 18,
                            dengan 12 sudah AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            X. Sejarah 1992
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Tema Hari AIDS Sedunia 1992 adalah “Komitmen Komunitas (Community Commitment).”

                            Pada 1992, Depkes melaporkan tambahan jumlah kasus infeksi HIV di Indonesia sudah menjadi 28,
                            dengan 10 sudah AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingElevent">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseElevent" aria-expanded="false" aria-controls="collapseElevent">
                            XI. Sejarah 1993
                        </button>
                    </h2>
                    <div id="collapseElevent" class="accordion-collapse collapse" aria-labelledby="headingElevent"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Tema Hari AIDS Sedunia 1993 adalah “Waktunya Untuk Bertindak! (Time to Act)”. Di Indonesia,
                            dilaporkan 137 kasus infeksi HIV plus 51 orang dengan AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwleve">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwleve" aria-expanded="false" aria-controls="collapseTwleve">
                            XII. Sejarah 1994
                        </button>
                    </h2>
                    <div id="collapseTwleve" class="accordion-collapse collapse" aria-labelledby="headingTwleve"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            LP3Y bekerja sama dengan Lentera-PKBI DIY dan The Ford Foundation, melakukan Work Shop Penulisan
                            AIDS bagi Wartawan. Sebagai hasil dari kegiatan itu, diterbitkan dua buku kecil, “10 Pakar
                            Bicara AIDS” dan “11 Langkah Memahami AIDS.” <br> <br>

                            Pada 30 Mei, Presiden RI, Suharto, menandatangani Keputusan Presiden Nomor 36/2004 tentang
                            Komisi Penanggulangan AIDS (KPA). Berdasarkan Kepres 36 ini, Menkokesra Ir Azwar Anas
                            mengeluarkan Keputusan tentang Susunan, Tugas dan Fungsi Keanggotaan KPA pada 15 Juni, serta
                            Keputusan tentang Strategi Nasional Penanggulangan AIDS di Indonesia pada 16 Juni. Ketua KPA
                            adalah Menkokesra sendiri, dan sekretaris KPA pertama adalah Dr. Suyono Yayha, MPH. <br> <br>

                            Pada Agustus, sebuah pokja KPA memperkirakan bahwa jumlah kasus infeksi HIV di Indonesia pada
                            2005 akan menjadi antara 600.000 (penularan rendah, intervensi yang efektif) dan 1.990.000
                            (penularan tinggi, tanpa intervensi). <br> <br>

                            Pada akhir tahun ini di Indonesia, secara kumulatif sudah dilaporkan 275 infeksi HIV, dengan 67
                            di antaranya AIDS. 100 di antaranya adalah WNA. 203 adalah laki-laki, 68 perempuan, 4 tidak
                            diketahui. Jalur penularan: 69 homoseks, 160 heteroseks, 2 IDU, 2 transfusi darah, 2 hemofilia
                            dan 40 tidak diketahui.

                            Tema Hari AIDS Sedunia 1994 adalah “AIDS & Keluarga (AIDS and the Family).”
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThirteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                            XIII. Sejarah 1995
                        </button>
                    </h2>
                    <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Edisi perdana majalah Support diterbitkan oleh Yayasan Pelita Ilmu pada Januari. Hingga Mei, 49
                            orang tercatat meninggal karena AIDS di Indonesia.

                            Pusat Media Pelatihan AIDS untuk Wartawan (PMP AIDS) didirikan pada awal tahun oleh LP3Y di
                            Yogyakarta. Newsletter PMP AIDS edisi perdana diterbitkan pada Mei. <br> <b></b>

                            Yayasan Pelita Ilmu (YPI) membuka Sanggar Kerja, yaitu tempat persinggahan (shelter) untuk Odha,
                            di Kebon Baru, Jakarta, dengan dukungan oleh Ford Foundation.

                            Pada Agustus, RS Medistra Jakarta melarang Dr. Samsuridjal Djauzi untuk merawat pasien apa pun,
                            karena beliau bersedia merawat pasien AIDS di RS tersebut. <br> <br>

                            Dikutip oleh harian Kompas pada Mei, Menteri Negara Kependudukan/Kepala BKKBN menyinyalir bahwa
                            “virus AIDS sudah dimanfaatkan sebagai alat tindak kejahatan…”

                            Spiritia didirikan oleh Suzana Murni sebagai organisasi yang mandiri pada November.

                            Tema Hari AIDS Sedunia 1995 adalah “Hak dan Tanggung Jawab Bersama (Shared Rights, Shared
                            Responsibilities).” Kegiatan dikoordinasi oleh BKKBN. <br> <br>

                            Headline pada Suplemen Khusus Harian Surya yang menyambut Hari AIDS Sedunia berbunyi “Tunggu!
                            AIDS mungkin akan mewabah di Indonesia.”

                            Pada akhir tahun ini di Indonesia, secara kumulatif sudah dilaporkan 364 infeksi HIV, dengan 87
                            di antaranya AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                            XIV. Sejarah 1996
                        </button>
                    </h2>
                    <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada pertemuan di Pacet, Jawa Timur, pada 15 Maret, dikeluarkan “Pernyataan Pacet tentang
                            Masalah Etika dan Hak Asasi yang berkaitan dengan Pewabahan dan Upaya Pencegahan HIV/AIDS.” <br>
                            <br>

                            International AIDS Candlelight Memorial diselenggarakan di 31 kota di Indonesia sebagai Malam
                            Renungan AIDS Nusantara (MRAN), dengan tema “Bersama Membangun Harapan,” dikoordinasikan oleh
                            Grup Koordinasi Nasional Mobilisasi AIDS Nusantara (GKNMAN). Menurut harian Kompas, “diiringi
                            lagu ‘Lilin-lilin Kecil’ yang dinyanyikan sendiri oleh penciptanya, James F Sundah, sekitar
                            seribu lilin di tangan para hadirin menyala menerangi Plaza Taman Ismail Marzuki, Jakarta.” <br>
                            <br>

                            Pertemuan Nasional Pencegahan dan Penatalaksanaan HIV/AIDS (Pertemuan Nasional HIV/AIDS I)
                            dilakukan pada Juli di Wisma Kalimanis, Jakarta.

                            Pada pertemuan itu, diputuskan untuk mendirikan tiga organisasi baru: Perhimpunan Dokter Peduli
                            AIDS Indonesia (PDPAI); Forum Komunikasi LSM/Organisasi Peduli AIDS (FKLOPA); dan Masyarakat
                            Peduli AIDS Indonesia (MPAI). <br> <br>

                            Milis AIDS-INA, milis pertama untuk membahas masalah HIV dan AIDS di Indonesia, diluncurkan oleh
                            Dr. Pandu Riono.

                            Logo asli MRAN. Foto tangan Suzana dan ayahnya

                            Tema Hari AIDS Sedunia 1996 adalah “Satu Dunia Satu Harapan (One World One Hope)”.

                            Pada akhir tahun ini di Indonesia, secara kumulatif sudah dilaporkan 501 infeksi HIV, dengan 119
                            di antaranya AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFiveteen" aria-expanded="false" aria-controls="collapseFiveteen">
                            XV. Sejarah 1997
                        </button>
                    </h2>
                    <div id="collapseFiveteen" class="accordion-collapse collapse" aria-labelledby="headingFiveteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada Mei, Ditjen POM mengeluarkan surat resmi kepada Ditjen Bea Cukai yang menerangkan bahwa
                            bila Bea Cukai mendapat kiriman ARV dari luar negeri yang ditujukan pada Pokdisus AIDS, obat
                            tersebut dapat dikeluarkan tanpa harus diuji coba Ditjen POM. <br> <br>

                            Pada Juni, ARV yang berikut tersedia di Indonesia: AZT, ddI, ddC, 3TC, saquinavir dan ritonavir.
                            Namun harganya tidak terjangkau untuk mayoritas Odha.

                            Surveilans yang dilakukan terhadap waria di Jakarta menunjukkan prevalensi HIV 6%, naik dari
                            0,3% pada 1995. <br> <br>

                            Tema Hari AIDS Sedunia 1997 adalah “Anak-anak yang Hidup di Dunia dengan AIDS (Children Living
                            in a World with AIDS)”

                            Pada akhir tahun ini di Indonesia, secara kumulatif sudah dilaporkan 619 infeksi HIV, dengan 153
                            di antaranya AIDS.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSixteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                            XVI. Sejarah 1998
                        </button>
                    </h2>
                    <div id="collapseSixteen" class="accordion-collapse collapse" aria-labelledby="headingSixteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Didi Mirhad, bintang iklan Indonesia, mengungkapkan status dirinya HIV-positif pada media massa.

                            Pertemuan Odha pertama dilakukan oleh Spiritia di Ubud, Bali, dengan menghadirkan 16 Odha dan
                            Ohidha dari seluruh Indonesia.

                            Pada Oktober, RCTI mulai menayangkan sinetron Kupu-Kupu Ungu, disutradarai oleh Nano Riantiarno,
                            dengan bintang Nurul Arifin dan Sandi Nayoan. Sinetron sepanjang 13 episode tersebut
                            menggambarkan beragam masalah medis, sosial, psikologis dan mitos seputar HIV dan AIDS. <br>
                            <br>

                            Tema Hari AIDS Sedunia ditentukan sebagai “Kaum Muda: Semangat Perubahan”. Kegiatan dikoordinasi
                            oleh Departemen Agama.

                            Menjelang Hari AIDS, KPA meluncurkan Kampanye Nasional AIDS, ditandai oleh lambang baru, yaitu
                            pita merah-putih.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeventeen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                            XVII. Sejarah 1999
                        </button>
                    </h2>
                    <div id="collapseSeventeen" class="accordion-collapse collapse" aria-labelledby="headingSeventeen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Didi Mirhad, bintang iklan Indonesia, meninggal dunia karena AIDS pada 25 Agustus.

                            Semiloka Nasional Penggunaan dan Penyalahgunaan NAZA dilakukan selama empat hari di September
                            oleh sekelompok aktivis HIV dan narkoba, dengan melibatkan beberapa pembicara dari Australia dan
                            Malaysia. Pertemuan ini adalah pertama kali konsep Harm Reduction dibahas oleh para pembuat
                            kebijakan dan pengambil keputusan di Indonesia. <br> <br>

                            Tema Hari AIDS Sedunia 1999, ‘Dengar, Simak, Tegar! (Listen, Learn, Live!)’ tetap ditujukan pada
                            orang berusia di bawah 25 tahun. Kegiatan dikoordinasi oleh Departemen Pendidikan.

                            Pada akhir tahun, ARV yang berikut tersedia di Indonesia: AZT, ddI, ddC, 3TC, d4T, saquinavir,
                            ritonavir dan indinavir.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEighteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen">
                            XVIII. Sejarah 2000
                        </button>
                    </h2>
                    <div id="collapseEighteen" class="accordion-collapse collapse" aria-labelledby="headingEighteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pertemuan Nasional HIV/AIDS II dilakukan pada April di Jakarta.

                            Surveilans di antara 67 pengguna narkoba suntikan yang ditahan di Lapas Kerobokan di Bali pada
                            akhir tahun menemukan 35 (56%) terinfeksi HIV. <br> <br>

                            Pada November, sebuah pertemuan yang dilakukan oleh Lentera-Sahaja PKBI DIY di Kaliurang, DIY
                            yang melibatkan beberapa relawan dari kelompok marjinal dibongkar secara ‘brutal dan keji oleh
                            kelompok orang yang bertopeng dan bersembunyi dibalik jubah “agama” ataupun “parpol” tertentu.’
                            <br> <br>

                            Tema Hari AIDS Sedunia 2000 adalah ‘AIDS – Pria Berpengaruh (AIDS – Men Make a Difference)’.
                            Kegiatan dikoordinasi oleh BKKBN.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNineteen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen">
                            XIX. Sejarah 2001
                        </button>
                    </h2>
                    <div id="collapseNineteen" class="accordion-collapse collapse" aria-labelledby="headingNineteen"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dua belas penghuni sebuah pusat pemulihan narkoba di Bali dites HIV. Delapan di antaranya
                            ditemukan terinfeksi.

                            Dengan dukungan dari Ketua Badan POM, berapa jenis ARV generik dari India mulai tersedia di
                            Indonesia, termasuk AZT, 3TC, gabungan AZT+3TC, d4T dan nevirapine. Dengan obat ini, terapi
                            antiretroviral (ART) yang baku mulai tersedia di Indonesia, walau harga masih mahal (lebih dari
                            Rp 1 juta per bulan). <br> <br>

                            Pertemuan Nasional Odha ke-2 dilakukan oleh Spiritia di Kuta, Bali pada September, dihadiri oleh
                            36 Odha dan Ohidha dari seluruh Indonesia. Peserta menyetujui dikeluarkan “Asas-Asas
                            Penanggulangan HIV/AIDS” sebagai suatu hasil dari pertemuan itu. <br> <br>

                            Walau dalam keadaan sakit dan harus memakai kursi roda, Suzana Murni, pendiri Spiritia berpidato
                            pada pembukaan Konferensi Internasional AIDS di Asia Pasifik (ICAAP) ke-6 di Melbourne, pada
                            Oktober, dengan judul ‘Memecah Penghalang’.

                            Tema Hari AIDS Sedunia 2000 adalah ‘Kami peduli. Anda bagaimana? (I care. Do you?)’. Kegiatan
                            dikoordinasi oleh Departemen Kesehatan.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwenty">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                            XX. Sejarah 2002
                        </button>
                    </h2>
                    <div id="collapseTwenty" class="accordion-collapse collapse" aria-labelledby="headingTwenty"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dr. Farid Husein sebagai Sekretaris KPA.

                            Sidang Kabinet Sesi Khusus HIV/AIDS dilakukan pada 28 Maret.

                            Pada 1 April, disusun Komite Pengarah untuk Strategi Nasional Penanggulangan AIDS, untuk
                            mengembangkan rancangan Stranas baru.

                            Permohonan Indonesia untuk dana dari Global Fund Ronde 1 disetujui, dengan dana hampir 16 juta
                            dolar untuk HIV. Fase 1 program, dengan dana hampir 7 juta dolar, mulai diterapkan pada Juli
                            2003. <br> <br>

                            Suzana Murni, pendiri Spiritia, meninggal dunia pas sebelum pembukaan Konferensi AIDS Sedunia
                            ke- 14 di Barcelona, Spanyol pada Juli. Konferensi ini didominasi oleh masalah terkait
                            pengobatan untuk HIV di negara terbatas sumber daya. Penghargaan yang diberikan pada Spiritia
                            oleh Family Health International (FHI) diterima oleh Siradj Okta, adik Suzana. <br> <br>

                            Indonesia menunjukkan betapa mendadak epidemi HIV dapat muncul. Setelah lebih dari sepuluh tahun
                            prevalensi HIV yang rendah, angka meloncat di antara pengguna narkoba suntikan dan pekerja seks,
                            dengan sampai 40% orang di tempat pemulihan narkoba di Jakarta diketahui HIV-positif.

                            Pada Oktober dibentuk Gerakan Nasional Meningkatkan Akses Terapi HIV/AIDS (GN-MATHA), diketuai
                            oleh Dr. Samsuridjal Djauzi, dengan tujuan agar 10.000 Odha di Indonesia mendapatkan ART pada
                            2005. <br> <br>

                            Sebuah International Roundtable: Increasing Access to HIV Treatment in Resource Poor Settings
                            dilakukan di Canberra, Australia pada September. Di antara 85 peserta, dari 18 negara, ada lima
                            dari Indonesia.

                            Tema Hari AIDS Sedunia 2002 ditetapkan oleh BKKBN sebagai ‘Tetap Hidup dengan Tegar’. Tema
                            internasional adalah ‘Live and Let Live’.

                            Dirjen Farmasi Depkes memasukkan AZT, 3TC dan nevirapine dalam Daftar Obat Esensial Nasional
                            (DOEN) untuk semua rumah sakit tipe A dan tipe B se-Indonesia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentyOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne">
                            XXI. Sejarah 2003
                        </button>
                    </h2>
                    <div id="collapseTwentyOne" class="accordion-collapse collapse" aria-labelledby="headingTwentyOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pertemuan Nasional Odha ke-3 dilakukan oleh Spiritia di Cikopo, Puncak pada Februari, dihadiri
                            oleh 50 Odha dan Ohidha dari seluruh Indonesia. Peserta menyetujui dikeluarkannya “Pernyataan
                            Cikopo” sebagai suatu hasil dari pertemuan itu. <br> <br>

                            “Tegak Tegar – Hidup Positif Bersama HIV”, Pameran Foto Karya Rio Helmi, yang didedikasikan
                            untuk Almarhumah Suzana Murni, diluncurkan di Gedung DPR-RI, Senayan, Jakarta pada Februari.
                            Foto dalam pameran menunjukkan beberapa Odha di Indonesia dalam kegiatan sehari-hari. <br> <br>

                            Pada Maret, Menteri Kesehatan RI mengatakan bahwa pemerintah akan memberi subsidi ARV generik
                            sebesar Rp 200.000 per bulan untuk setiap Odha yang membutuhkannya. Beberapa provinsi memutuskan
                            untuk menyediakan ARV secara gratis untuk sejumlah Odha di provinsinya. <br> <br>

                            Pada Juli, penyediaan ART untuk 100 Odha di Indonesia yang didanai oleh Global Fund mulai
                            direncanakan.

                            Program Global Fund Ronde I Fase 1 untuk HIV dimulai di Indonesia pada Juli. Program ini
                            diutamakan untuk memberi ARV pada 100 Odha di lima provinsi. <br> <br>

                            Pada Agustus 2003, Kimia Farma meluncurkan produk ARV-nya. Pada awal disediakan AZT (Reviral),
                            3TC (Hiviral), gabungan AZT+3TC (Duviral), serta nevirapine (Neviral). Namun rencana awal untuk
                            membuat gabungan AZT+3TC+nevirapine dengan nama Triviral tidak berhasil. Harga untuk Duviral dan
                            Neviral ditetapkan sebagai Rp 345.000. <br> <br>

                            Jogjakarta Round Table Meeting, yang dihadiri oleh peserta dari 16 negara dengan tujuan
                            mengevaluasi pelaksanaan akses ART, diselenggarakan pada September. Pertemuan ini adalah
                            lanjutan dari pertemuan serupa yang dilakukan di Canberra pada 2002. <br> <br>

                            Komisi Penanggulangan AIDS (KPA) meluncurkan Strategi Nasional Penanggulangan AIDS 2003-2007.

                            Menyambut Hari AIDS Sedunia, Presiden Republik Indonesia Megawati bertemu dengan beberapa Odha
                            di istana negara.

                            Tema Hari AIDS Sedunia 2003 ditetapkan oleh Departemen Sosial sebagai ‘Stigma dan Diskriminasi’.
                            Pada akhir 2003, diperkirakan 1.100 Odha memakai ART di Indonesia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentyTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo">
                            XXII. Sejarah 2004
                        </button>
                    </h2>
                    <div id="collapseTwentyTwo" class="accordion-collapse collapse" aria-labelledby="headingTwentyTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada 19 Januari, wakil dari pemerintah enam provinsi yang dianggap paling rentan terhadap HIV
                            (Papua, Jawa Barat, Jawa Timur, Bali, DKI Jakarta, dan Riau), pada pertemuan di Papua dengan
                            Ketua KPA Jusuf Kalla dan wakil dari enam departemen serta Ketua Komisi VII DPR-RI, Dr. Sanusi
                            Tambunan, menyatakan Komitmen Sentani. Di antara tujuh pasal dalam komitmen tersebut, para
                            peserta berjanji akan “Mengupayakan pengobatan HIV/AIDS termasuk penggunaan ARV kepada minimum
                            5.000 Odha pada tahun 2004.” <br> <br>

                            Pertemuan Nasional Odha ke-4 dilakukan oleh Spiritia di Tretes, Jawa Timur pada Februari,
                            dihadiri oleh 60 Odha dan Ohidha dari seluruh Indonesia. Peserta menyetujui dikeluarkannya
                            “Pernyataan Tretes” sebagai suatu hasil dari pertemuan itu. <br> <br>

                            Departemen Kesehatan menetapkan 25 rumah sakit di 15 provinsi sebagai Rumah Sakit Rujukan AIDS,
                            tahap pertama. Sedikitnya dua dokter, satu perawat dan satu konselor dari masing-masing rumah
                            sakit diberi pelatihan khusus. <br> <br>

                            Spiritia meluncurkan prakarsa pencegahan untuk Odha yang disebut “HIV Stop di Sini”, yang
                            dimaksudkan membantu memutuskan rantai penularan.

                            Yayasan Spiritia melakukan pelatihan Pendidik Pengobatan pertama di Jakarta, dengan melibatkan
                            45 peserta dari kelompok dukungan sebaya dan komunitas di seluruh Indonesia. <br> <br>

                            Setelah upaya advokasi yang melibatkan kelompok dukungan sebaya dari seluruh Indonesia, Depkes
                            mengubah kebijakan untuk menyediakan ART dengan subsidi penuh pada 4.000 Odha.

                            Dilakukan Pertemuan Nasional KDS ke-2 di Sanur Bali pada November, dihadiri oleh wakil dari 33
                            kelompok dukungan sebaya (KDS) untuk Odha/Ohidha dari 24 kota dan 20 provinsi. Peserta
                            menyetujui dikeluarkan “Pernyataan Bali” sebagai suatu hasil dari pertemuan itu. <br> <br>

                            Tema Hari AIDS Sedunia 2004 ditetapkan oleh Kementerian Pemberdayaan Perempuan sebagai
                            ‘Perempuan, Remaja Putri, HIV dan AIDS’, dengan slogan “Sudahkah Kau Dengar Aku Hari Ini?” Tema
                            internasional adalah ‘Women, Girls, HIV and AIDS’, dengan slogan “Have You Heard Me Today?”.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentyThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentyThree" aria-expanded="false"
                            aria-controls="collapseTwentyThree">
                            XXIII. Sejarah 2005
                        </button>
                    </h2>
                    <div id="collapseTwentyThree" class="accordion-collapse collapse"
                        aria-labelledby="headingTwentyThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Setelah mengevaluasi kinerja penerapan Fase 1 programnya Ronde I di Indonesia, Global Fund
                            memutuskan untuk memotong dana untuk Fase 2 (Juli 2005-Juni 2007) dari 9 juta dolar AS menjadi
                            900.000 dolar. <br> <br>

                            Terkait dengan kunjungan Kofi Annan, Sekretaris-Jenderal PBB ke Indonesia, untuk Konferensi
                            Asia- Afrika, istrinya, Ibu Nane Annan mengunjungi Spiritia. Di kantor Spiritia, Ibu Nane
                            berbincang dengan kurang lebih 20 Odha dari berbagai latar belakang. <br> <br>

                            Pada Mei, Agustina Saweri, meninggal dunia di Jayapura. Odha berusia 26 tahun itu memperoleh
                            embel- embel ‘Buah Merah’ di namanya setelah ia diboyong ke Jakarta pada Oktober 2004 untuk
                            memberi kesaksian tentang khasiat buah tersebut sebagai alternatif pengobatan AIDS. Agustina
                            didesak untuk berhenti penggunaan ART-nya, karena tidak dibutuhkan lagi setelah memakai Buah
                            Merah. <br> <br>

                            International Congress on AIDS in Asia and the Pacific (ICAAP) ke-7 dilakukan di Kobe, Jepang
                            pada Juli, dengan tema ‘Bridging Science and Community (Menjembatani Ilmiah dan Komunitas).’

                            Spiritia melaksanakan Kongres Nasional Odha pertama di Lembang, Jawa Barat, pada September,
                            dihadiri oleh 120 peserta Odha dan Ohidha. Peserta mengeluarkan “Pernyataan Lembang” seusai
                            pertemuan. <br> <br>

                            Tema Hari AIDS Sedunia 2005 ditetapkan oleh Departemen Dalam Negeri sebagai ‘Kepemimpinan dan
                            Penanggulangan HIV/AIDS’. Tema internasional adalah ‘Stop AIDS. Keep the Promise’.

                            KPA Nasional mengeluarkan rencana program akselerasi di 100 Kabupaten/Kota tahun 2005. Rencana
                            ini dicanangkan pada Hari AIDS Sedunia oleh Bapak Wakil Presiden.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentyFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentyFour" aria-expanded="false"
                            aria-controls="collapseTwentyFour">
                            XXIV. Sejarah 2006
                        </button>
                    </h2>
                    <div id="collapseTwentyFour" class="accordion-collapse collapse" aria-labelledby="headingTwentyFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Pada Januari, laboratorium resistansi genotipe HIV mulai diuji coba di Departemen Mikrobiologi
                            FKUI. Lab ini disediakan untuk melakukan surveilans resistansi untuk Depkes.

                            Pada Mei, dilakukan International AIDS Candlelight Memorial (Malam Renungan AIDS) dengan tema
                            internasional “Lighting the Path to a Brighter Future”. Antara lain, kegiatan diadakan di
                            Tangerang, Lombok, Kediri, Malang dan Jogja. <br> <br>

                            Juga pada Mei, diluncurkan buku ‘Dua Sisi dari Satu Sosok’, kumpulan tulisan Suzana Murni. Buku
                            ini, yang disusun oleh Putu Oka Sukanta, mengandung 43 artikel dan puisi karya Suzana, sebagian
                            diterjemahkan dari tulisan asli dalam bahasa Inggris. <br> <br>

                            Peraturan Presiden (PP) RI Nomor 75 Tahun 2006 tentang Komisi Penanggulangan AIDS Nasional
                            ditandatangani oleh Bapak Presiden pada 13 Juli 2006. Antara yang lain, PP ini menetapkan Dr.
                            Nafsiah Ben Mboi sebagai Sekretaris. <br> <br>

                            Situs web Spiritia bangkit kembali pada Juni. di antara fitur yang pada awal tersedia adalah
                            akses pada berbagai dokumen Spiritia (termasuk semua Lembaran Informasi), statistik Depkes dari
                            1995, dan informasi mengenai kelompok dukungan sebaya dalam jaringan se-Indonesia. <br> <br>

                            Pada Agustus diluncurkan situs web www.aids-ina.org yang merupakan langkah awal dari beberapa
                            aktivis dan pemerhati untuk melengkapi forum milis aids-ina. Diharapkan situs web ini bisa
                            menjadi pusat informasi terhadap isu HIV-AIDS di Indonesia.

                            Juga pada Agustus, diumumkan bahwa penyebaran HIV/AIDS di Tanah Papua diperkirakan telah
                            memasuki kelompok masyarakat umum (generalized epidemic).

                            Menteri Koordinator Bidang Kesejahteraan Rakyat/Ketua Komisi Penanggulangan AIDS Nasional pada
                            acara penyerahan AIDS Award 2006 di Hotel Nikko di September. AIDS Award event di anugerahkan
                            kepada 19 perusahaan yang telah menunjukkan prestasi dalam melaksanakan program penanggulangan
                            AIDS di tempat kerja. AIDS Award Event 2006 diselenggarakan oleh KPA Nasional. <br> <br>

                            Ada pertemuan antara Panglima TNI Marsekal Djoko Suyanto dengan sekretaris KPA Nasional Dr.
                            Nafsiah Mboi, SpA, MPH di Markas Besar TNI Cilangkap pada Oktober. Panglima TNI Marsekal Djoko
                            Suyanto mengatakan bahwa upaya pencegahan penularan HIV di lingkungan TNI sangat penting untuk
                            segera ditingkatkan pelaksanaannya di semua jajaran TNI termasuk di komando utama (KOTAMA). <br>
                            <br>

                            Tema Hari AIDS Sedunia 2006 ditetapkan oleh Departemen Kesehatan sebagai ‘STOP AIDS – Tepati
                            Janji’, dengan fokus pada akuntabilitas. Tema internasional tetap ‘Stop AIDS. Keep the Promise’,
                            sama seperti tahun sebelumnya.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentyFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentyFive" aria-expanded="false"
                            aria-controls="collapseTwentyFive">
                            XXV. Sejarah 2007
                        </button>
                    </h2>
                    <div id="collapseTwentyFive" class="accordion-collapse collapse" aria-labelledby="headingTwentyFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Buku Suzana Murni, ‘Lilin Membakar Dirinya’, biografi Suzana oleh Putu Oka Sukanta, diluncurkan
                            pada Januari.

                            Pada Februari, PB IDI (Bidang Penyakit Menular) bersama ASHM (Australasian Society HIV Medicine)
                            mengadakan Kursus Nasional tentang Koinfeksi HIV-Hepatitis Virus selama dua hari yang merupakan
                            kegiatan penting Pra-Pertemuan Nasional HIV/AIDS ke-3. <br> <br>

                            Pertemuan Nasional HIV & AIDS ke-3 dilakukan di Surabaya pada Februari dengan tema “Menyatukan
                            Langkah untuk Memperluas Respons”. Antara lain, Strategi Nasional Penanggulangan AIDS 2007-2010
                            diluncurkan di pertemuan ini. <br> <br>

                            Bantuan Dana Global Fund untuk penanggulangan AIDS, TB, dan Malaria untuk Indonesia dihentikan
                            sementara mulai pertengahan bulan Maret. Alasan utama penghentian aliran dana untuk tiga
                            penyakit menular tersebut karena ditemukan “mismanagement” dalam pengelolaan dana tersebut. <br>
                            <br>

                            Pada Juli, diketahui bahwa Komisi E DPR Provinsi Papua, dalam Rancangan Perdasi (Peraturan
                            Daerah Provinsi) terkait penanggulangan HIV dan AIDS di Papua mengusulkan pemasangan microchip
                            dan anjuran pemeriksaan wajib HIV bagi setiap warga Papua, didorong oleh anggota Dr. John
                            Manangsang. <br> <br>

                            Spiritia melaksanakan Kongres Nasional Odha dan Ohidha ke-II Peningkatan Pemberdayaan dan
                            Keterampilan dalam Menghadapi HIV dan AIDS di Lido 29 Juli-1 Agustus 2007 dengan tema ”Peduli
                            AIDS – Jangan Hanya Slogan”. <br> <br>

                            Pada Agustus, di International Congress on AIDS in Asia and the Pacific (ICAAP) ke-8 di Colombo,
                            Sri Lanka, diumumkan bahwa Indonesia akan menjadi tuan rumah untuk ICAAP ke-9 di Bali pada 2009.

                            Dana Global Fund, yang dibekukan pada Maret 2007, dicairkan lagi pada Oktober.

                            Tema Hari AIDS Sedunia 2007 ditetapkan oleh BKKBN sebagai ‘STOP AIDS – Tepati Janji’, dengan
                            fokus pada kepemimpinan. Tema internasional tetap ‘Stop AIDS. <br> <br>

                            Keep the Promise’, sama seperti dua tahun sebelumnya. Di antara kegiatan terkait dengan Hari
                            AIDS, Presiden Susilo Bambang Yudhoyono melakukan pertemuan di Istana Negara. Puncak acara
                            adalah dialog langsung Presiden SBY dengan Odha dan keluarganya. Dalam dialog yang dipandu
                            langsung oleh Aburizal Bakrie selaku ketua KPA Nasional ini, Presiden berkesempatan mendengarkan
                            langsung hal yang dialami oleh Odha. Tanggapan dan jawaban yang diberikan oleh Presiden dalam
                            dialog tersebut secara nyata dirasakan langsung oleh peserta dialog. seperti yang disampaikan
                            oleh Luh Putu Ikha, perwakilan dari Bali, bahwa peran Odha dalam penanggulangan HIV/AIDS di
                            tanah air perlu didukung oleh pemerintah. <br> <br>

                            Pekan Kondom Nasional (PKN) Pertama dilaksanakan 1-8 Desember 2007 dengan kegiatan yang mencakup
                            pembagian materi edukasi ke berbagai pelosok daerah di Indonesia, pelatihan, talkshow, konser
                            musik, dan lomba karya tulis dan fotografi bagi wartawan dan blogger. Akibat PKN ini, KPA
                            Nasional didemo dua kali, dengan tuduhan “merusak moral bangsa”, dan mereka sama sekali tidak
                            mau dengar penjelasan dari Ibu Nafsiah Mboi, Sekretaris KPA Nasional.

                            Pada akhir 2007, dilaporkan 11.570 Odha pernah mulai ART, dengan 6.653 (58%) masih memakainya.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwentySix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwentySix" aria-expanded="false" aria-controls="collapseTwentySix">
                            XXVI. Sejarah 2008
                        </button>
                    </h2>
                    <div id="collapseTwentySix" class="accordion-collapse collapse" aria-labelledby="headingTwentySix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Komunitas TNI mengumumkan pada Januari bahwa akan melaksanakan proyek percontohan untuk
                            pelayanan terpadu HIV-AIDS di Jatim khususnya bagi masyarakat TNI. <br> <br>

                            Penasihat Khusus Sekjen PBB dan utusan khusus untuk HIV dan AIDS di Asia Pasifik, Nafis Sadik,
                            yang menunjungi Indonesia pada Februari, mengujar bahwa, “Targetnya MDG 2015 tidak akan
                            tercapai, jika keadaan AIDS tidak dapat ditanggulangi secara baik.” Menurutnya, penyebaran
                            epidemi HIV di Indonesia telah mengalami peningkatan. Pertambahan itu menurutnya banyak
                            disebabkan oleh penularan infeksi melalui transmisi seksual. <br> <br>

                            Pertemuan Nasional Harm Reduction dilakukan di Makassar pada Juni. Pada pertemuan tersebut,
                            Asisten Deputi Sekretaris KPA Nasional Inang Winarso mengatakan, dari 3.000 pasien yang
                            mengikuti program Metadon di seluruh Indonesia, 20% di antaranya telah terbebas sebagai pengguna
                            dan pecandu narkoba. Juga pada pertemuan itu, Menteri Koordinator Kesejahteraan Rakyat (Menko
                            Kesra) Aburizal Bakrie juga mengampanyekan penggunaan kondom di kalangan pengguna Napza. <br>
                            <br>

                            Dalam Kongres Anak Indonesia VII 2008, yang dilakukan pada Juli terkait dengan Hari Anak
                            Indonesia (HAN) 2008 di Taman Mini Indonesia Indah (TMII), Jakarta, peserta merumuskan “Suara
                            Anak Indonesia.” Mereka bertekad meningkatkan pemahaman cara hidup sehat, hak kesehatan
                            reproduksi, agar terhindari dari bahaya penyakit menular, HIV/AIDS serta penyalahgunaan
                            narkotika. Presiden Susilo Bambang Yudhoyono memerintahkan jajaran menteri terkait
                            menindaklanjuti hasil kongres tersebut. <br> <br>

                            Melalui Musyawarah Nasional Orang Terinfeksi HIV yang dilakukan secara terbatas dan dihadiri
                            oleh 124 orang terinfeksi HIV berasal dari 27 provinsi pada Juli, telah membentuk sebuah
                            organisasi yang bernama Jaringan Orang Terinfeksi HIV (JOTHI). Dipilih Abdullah Denovan sebagai
                            Koordinator Nasional dengan periode kerja dua tahun. <br> <br>

                            Sekretaris Nasional Komisi Penanggulangan AIDS (KPA) Nasional Nafsiah Mboi memprediksi pada Juli
                            bahwa jumlah kasus HIV dan AIDS pada 2020 akan melonjak menjadi 2 juta kasus. Sekitar 80% di
                            antaranya menimpa kaum laki-laki.

                            Pada pertemuan di IDI di Oktober, diumumkan bahwa estimasi jumlah orang terinfeksi HIV di
                            Indonesia sudah menjadi 277.000. <br> <br>

                            Masyarakat Peduli AIDS Nasional (Mapan) – yang menggabungkan antara lain Jaringan orang
                            terinfeksi HIV (JOTHI) Jakarta, Persatuan korban Napza dan LBH Kesehatan sebagai pendamping –
                            pada November melakukan aksi di depan Kantor Perwakilan PBB di Menara Thamrin, Jakarta. Mereka
                            menuntut Koordinator UNAIDS Indonesia Nancy Fee dipecat dan keluar dari Indonesia. Salah satu
                            yang disuarakan mereka, selama ini UNAIDS tidak memberikan kontribusi nyata bagi penanggulangan
                            AIDS di Indonesia. <br> <br>

                            Akhirnya, pada Desember, pasal di Raperdasi Provinsi Papua mengenai microchip dibatalkan,
                            setelah banyak advokasi oleh orang di seluruh Indonesia.

                            Tema Hari AIDS Sedunia 2008 ditetapkan oleh ???? sebagai ‘Yang Muda Yang Membuat Perubahan’.
                            Tema internasional tetap ‘Stop AIDS. Keep the Promise’ dengan fokus pada kepemimpinan, sama
                            seperti dua tahun sebelumnya. <br> <br>

                            KPAN, Badan Koordinasi Keluarga Berencana Nasional (BKKBN) dan DKT Indonesia menggelar Pekan
                            Kondom Nasional (PKN) ke-2 yang diadakan pada minggu pertama Desember. Kegiatan ini diawali
                            dengan Konferensi Kondom pada 1 Desember 2008 yang dibuka Menkokesra Aburizal Bakrie. Namun
                            kegiatan ini dilawan dengan Kampanye Antikondomisasi, dengan konferensi pers berjudul “Stop
                            Kondomisasi untuk Penyebaran HIV/AIDS” oleh LSM Merc. <br> <br>

                            Pada akhir 2008, dilaporkan 17.880 Odha pernah mulai ART, dengan 10.616 (59%) masih memakainya.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body" id="penularan">
            <h5 class="card-title fw-semibold mb-4 text-center">C. PENULARAN DARI HIV KE AIDS</h5>

            <div class="accordion" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingSixty">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSixty" aria-expanded="false" aria-controls="collapseSixty">
                            I. Tahap 1 (Periode Jendela)
                        </button>
                    </h2>
                    <div id="collapseSixty" class="accordion-collapse collapse" aria-labelledby="headingSixty"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>HIV masuk kedalam tubuh, tidak ada tanda-tanda khusus, ODHA (Orang Dengan HIV AIDS)
                                    tampak sehat dan merasa sehat</li>
                                <li>Tes HIV belum bisa mendeteksi keradaan virus ini</li>
                                <li>Tahap ini disebut periode jendela, umumnya berkisar 2 minggu sampai 3 bulan</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingSixtyOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSixtyOne" aria-expanded="false" aria-controls="collapseSixtyOne">
                            II. Tahap 2 (HIV Positif / Tanpa Gejala)
                        </button>
                    </h2>
                    <div id="collapseSixtyOne" class="accordion-collapse collapse" aria-labelledby="headingSixtyOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>HIV berkembang biak dalam tubuh</li>
                                <li>Tidak ada tanda-tanda khusus, ODHA masih tampak sehat, dan merasa sehat</li>
                                <li>Tes sudah dapat mendeteksi status HIV ODHA</li>
                                <li>Umumnya ODHA dapat terlihat sehat, selama 5 s.d 10 tahun terantung daya tahan tubuh.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingSixtyTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSixtyTwo" aria-expanded="false" aria-controls="collapseSixtyTwo">
                            III. Tahap 3 (HIV Positif / Muncul Gejala)
                        </button>
                    </h2>
                    <div id="collapseSixtyTwo" class="accordion-collapse collapse" aria-labelledby="headingSixtyTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>Sistem kekebalan tubuh semakin menurun</li>
                                <li>Mulai muncul gejala penyakit lainnya, misalnya pembengkakan kelenjar limfa, diare terus
                                    – menerus, flu, dll</li>
                                <li>Umumnya berlangsung lebih dari satu bulan, tergantung daya tahan tubuh.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingSixtyThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSixtyThree" aria-expanded="false"
                            aria-controls="collapseSixtyThree">
                            IV. Tahap 4 (AIDS)
                        </button>
                    </h2>
                    <div id="collapseSixtyThree" class="accordion-collapse collapse" aria-labelledby="headingSixtyThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>Kondisi sisitem kekebalan tubuh sangat lemah.</li>
                                <li>Berbagai penyakit lain (infeksi oportunistik) semakin parah.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingFourty">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFourty" aria-expanded="false" aria-controls="collapseFourty">
                            Hal Hal Yang Menularkan HIV
                        </button>
                    </h2>
                    <div id="collapseFourty" class="accordion-collapse collapse" aria-labelledby="headingFourty"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" scope="col">Media</th>
                                        <th scope="col">Cara Penularan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cairan Kelamin</td>
                                        <td>Hubungan Seksual</td>
                                    </tr>
                                    <tr>
                                        <td>Darah</td>
                                        <td>Penggunaan Jarum Suntikyang bersamaan yang tidak steril diantara pengguna
                                            narkoba Benda tajam alat cukur, jarum akupuntur, alat tindik yang tercemar darah
                                            yang mengandung HIV</td>
                                    </tr>
                                    <tr>
                                        <td>Dari ibu HIV ke bayi</td>
                                        <td>Transfusi darah yang mengandung HIV Selama kehamilan Saat persalinan dan ASI
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingFourtyOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFourtyOne" aria-expanded="false" aria-controls="collapseFourtyOne">
                            Hal Hal Yang Tidak Menularkan HIV
                        </button>
                    </h2>
                    <div id="collapseFourtyOne" class="accordion-collapse collapse" aria-labelledby="headingFourtyOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>Bersenggolan atau menyentuh</li>
                                <li>Berjabat tangan, berpelukan</li>
                                <li>Tinggal serumah dengan orang yang terinfeksi HIV</li>
                                <li>Melalui bersin atau batuk</li>
                                <li>Bertenang bersama</li>
                                <li>Menggunakan toilet/WC yang sama</li>
                                <li>Menggunakan piring/alat makan yang sama</li>
                                <li>Gigitan nyamuk atau serangga yang sama </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingFourtyThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFourtyThree" aria-expanded="false"
                            aria-controls="collapseFourtyThree">
                            Perilaku Beresiko
                        </button>
                    </h2>
                    <div id="collapseFourtyThree" class="accordion-collapse collapse"
                        aria-labelledby="headingFourtyThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol type="1">
                                <li>Abstinence atau tidak melakukan hubungan Seks</li>
                                <li>Be Faithful (setia dengan pasangan sah), sebaiknya lakukan VCT (Voluntary Conseling and
                                    Testing) sebelum menikah untuk mengetahui status HIV jika kita sudah berperilaku
                                    berisiko.</li>
                                <li>Condom, jika setelah VCT tahu salah satu pasangan sah terinfeksi HIV, maka kondom adalah
                                    cara untuk mencegah penularan.</li>
                                <li>Melalui bersin atau batukDrugs, tidak menggunakan Narkoba, apalagio menggunakan jarum
                                    suntik yang tidak steril dan menggunakannya bersama-sama.</li>
                                <li>Education, belajar tentang HIV AIDS dan sebarkan pada orang lain.</li>
                                <li>Equipment: Penggunaan alat/media yang tidak steril, misalnya penggunaan jarum suntik/
                                    jarum untuk membuat tattoo dan tindik yang tidak steril bisa menjadi media penyebaran
                                    HIV.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body" id="mitos">
            <h5 class="card-title fw-semibold mb-4 text-center">D. MITOS DAN FAKTA TENTANG HIV</h5>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header fw-bold" id="headingFivety">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFivety" aria-expanded="false" aria-controls="collapseFivety">
                            Mitos dan Fakta HIV AIDS
                        </button>
                    </h2>
                    <div id="collapseFivety" class="accordion-collapse collapse" aria-labelledby="headingFivety"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%">HIV itu kutukan Tuhan</td>
                                        <td>Semua orang mulai dari bayi, remaja, Ibu rumah tangga bisa tertular HIV jika
                                            tidak tahu cara melindungi diri</td>
                                    </tr>
                                    <tr>
                                        <td>Darah</td>
                                        <td>Penggunaan Jarum Suntikyang bersamaan yang tidak steril diantara pengguna
                                            narkoba Benda tajam alat cukur, jarum akupuntur, alat tindik yang tercemar darah
                                            yang mengandung HIV</td>
                                    </tr>
                                    <tr>
                                        <td>Dari ibu HIV ke bayi</td>
                                        <td>Transfusi darah yang mengandung HIV Selama kehamilan Saat persalinan dan ASI
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
