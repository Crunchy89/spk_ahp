@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Manual</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Manual</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h3>User Manual</h3>
                <hr>
                <h3 class="text-center">Cara Penggunaan Aplikasi</h3>
                <ul>
                    <li><a href="#user">Dashboard</a></li>
                    <li>Menu Admin
                        <ol>
                            <li>
                                <a href="#role">Manajemen Role</a>
                            </li>
                            <li>
                                <a href="#pengguna">Manajemen Pengguna</a>
                            </li>
                            <li>
                                <a href="#menu">Manajemen Menu</a>
                            </li>
                            <li>
                                <a href="#akses">Manajemen Akses</a>
                            </li>
                        </ol>
                    </li>
                    <li>SPK Menu
                        <ol>
                            <li>
                                <a href="#kriteria">Kriteria</a>
                            </li>
                            <li>
                                <a href="#alternatif">Alternatif</a>
                            </li>
                            <li>
                                <a href="#ahp">Perhitungan AHP</a>
                            </li>
                            <li>
                                <a href="#nilai">Nilai Alternatif</a>
                            </li>
                            <li>
                                <a href="#rangking">Perangkingan</a>
                            </li>
                        </ol>
                    </li>
                    <li>Informasi Aplikasi
                        <ol>
                            <li>
                                <a href="#manual">User Manual</a>
                            </li>
                            <li>
                                <a href="#profil">Profil Aplikasi</a>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <a href="#cetak">Cetak Laporan</a>
                    </li>
                    <li>
                        <a href="#logout">Logout</a>
                    </li>
                </ul>
                <section id="dashboard">
                    <h3 class="text-center">Dashboard</h3>
                    <p align='justice'>
                        Halaman ini adalah halaman awal dari aplikasi yang menampilkan jumlah role, user, kriteria, dan alternatif yang digunakan sebagai perhitungan AHP untuk mendapatkan penunjang keputusan nantinya
                    </p>
                </section>
                <h3 class="text-center">Menu Admin</h3>
                <section id="role">
                    <h4>Manajemen Role</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan, menambah, mengedit,menghapus role yang berfungsi sebagai level untuk membatasi pengguna nantinya, sehingga bisa di filter pengguna tersebut bisa mengkases menu apa saja.
                        untuk menambah role tinggal klik tombol tambah yang ada di halaman lalu isi field sesuai dengan yang tertera. Jika sudah selesai silahkan klik tombol tambah untuk batal klik tombol tutup <br>
                        untuk mengedit role klik tombol warna kuning lalu ganti field yang diinginkan setelah selesai klik tombol simpan untuk membatalkan klik tombol tutup. <br>
                        untuk menghapus role klik tombol merah pada role yang ingin di hapus. klik tombol hapus pada modal jika ingin menghapus data jika ingin membatalkan klik tombol tutup.
                    </p>
                </section>
                <section id="pengguna">
                    <h4>Manajemen Pengguna</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan akun pengguna. sehingga akun tersebut bisa digunakan untuk masuk ke dalam aplikasi
                        untuk menambah pengguna tinggal klik tombol tambah yang ada di halaman lalu isi field sesuai dengan yang tertera. Jika sudah selesai silahkan klik tombol tambah untuk batal klik tombol tutup <br>
                        untuk mengedit pengguna klik tombol warna kuning pada data lalu ganti field yang diinginkan setelah selesai klik tombol simpan untuk membatalkan klik tombol tutup. <br>
                        untuk menghapus pengguna klik tombol merah pada role yang ingin di hapus. klik tombol hapus pada modal jika ingin menghapus data jika ingin membatalkan klik tombol tutup.
                    </p>
                </section>
                <section id="menu">
                    <h4>Manajemen Menu</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan menu dan submenu yang ada di aplikasi. <br>
                        untuk menambah menu tinggal klik tombol tambah yang ada di halaman lalu isi field sesuai dengan yang tertera. Jika sudah selesai silahkan klik tombol tambah untuk batal klik tombol tutup <br>
                        untuk mengedit menu klik tombol warna kuning pada data lalu ganti field yang diinginkan setelah selesai klik tombol simpan untuk membatalkan klik tombol tutup. <br>
                        untuk menghapus menu klik tombol merah pada role yang ingin di hapus. klik tombol hapus pada modal jika ingin menghapus data jika ingin membatalkan klik tombol tutup. <br>
                        jika hanya ingin membuat menu submenu jangan di isi, jika ingin membuat submenu silahkan klik tombol submenu dan isi submenu yang anda inginkan.
                    </p>
                </section>
                <section id="akses">
                    <h4>Manajemen Akses</h4>
                    <p align='justice'>
                        Halaman ini berfungsi untuk menampilkan role atau level dan menu mana yang bisa diakses oleh masing-masing role. <br>
                        untuk menambah menu yang bisa diakses oleh role, silahkan klik tombol warna kuning lalu centang menu yang ingin di tambahkan.
                    </p>
                </section>
                <h3 class="text-center">SPK Menu</h3>
                <section id="kriteria">
                    <h4>Kriteria</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan, menambah, mengedit,atau menghapus kriteria yang digunakan sebagai perhitungan AHP nantinya. <br>
                        untuk menambah kriteria tinggal klik tombol tambah yang ada di halaman lalu isi field sesuai dengan yang tertera. Jika sudah selesai silahkan klik tombol tambah untuk batal klik tombol tutup <br>
                        untuk mengedit kriteria klik tombol warna kuning lalu ganti field yang diinginkan setelah selesai klik tombol simpan untuk membatalkan klik tombol tutup. <br>
                        untuk menghapus kriteria klik tombol merah pada role yang ingin di hapus. klik tombol hapus pada modal jika ingin menghapus data jika ingin membatalkan klik tombol tutup.
                    </p>
                </section>
                <section id="alternatif">
                    <h4>Kriteria</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan, menambah, mengedit,atau menghapus alternatif yang digunakan sebagai perhitungan nantinya. <br>
                        untuk menambah alternatif tinggal klik tombol tambah yang ada di halaman lalu isi field sesuai dengan yang tertera. Jika sudah selesai silahkan klik tombol tambah untuk batal klik tombol tutup <br>
                        untuk mengedit alternatif klik tombol warna kuning lalu ganti field yang diinginkan setelah selesai klik tombol simpan untuk membatalkan klik tombol tutup. <br>
                        untuk menghapus alternatif klik tombol merah pada role yang ingin di hapus. klik tombol hapus pada modal jika ingin menghapus data jika ingin membatalkan klik tombol tutup.
                    </p>
                </section>
                <section id="ahp">
                    <h4>Perhitungan AHP</h4>
                    <p align='justice'>
                        Halaman ini berfungsi untuk menampilkan perhitungan AHP menggunakan kriteria yang sudah diisi. <br>
                        silahkan isi nilai perbandingan sehingga bisa diketahui hasil perhitungan nantinya konsisten atau tidak.
                    </p>
                </section>
                <section id="nilai">
                    <h4>Nilai Alternatif</h4>
                    <p align='justice'>
                        Halaman ini berfungsi untuk menampilkan nilai alternatif dan perbandingan alternatif sesuai dengan kriteria kriteria yang sudah diisi yang akan digunakan untuk perangkingnan nantinya. <br>
                        silahkan isi nilai alternatif dan perbandingan dengan masing-masing kriteria untuk menentukan rangking alternatif nantinya.
                    </p>
                </section>
                <section id="rangking">
                    <h4>Perhitungan AHP</h4>
                    <p align='justice'>
                        Halaman ini menampilkan rangking dari hasil perhitungan AHP dan perbandingan alternatif.
                    </p>
                </section>
                <h3 class="text-center">Informasi Aplikasi</h3>
                <section id="manual">
                    <h4>User Manual</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan bagaimana cara penggunaan aplikasi
                    </p>
                </section>
                <section id="profil">
                    <h4>Profil Aplikasi</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan Profil Aplikasi
                    </p>
                </section>
                <h3 class="text-center">Cetak</h3>
                <section id="cetak">
                    <h4>Cetak Laporan</h4>
                    <p align='justice'>
                        Halaman ini digunakan untuk menampilkan hasil perhitungan dan perangkingan. <br>
                        untuk mencetaknya menjadi laporan silahkan klik tombol cetak.
                    </p>
                </section>
                <h3 class="text-center">Logout</h3>
                <section id="logout">
                    <h4>Logout</h4>
                    <p align='justice'>
                        Menu ini digunakan unutk keluar dari aplikasi
                    </p>
                </section>

            </div>
        </div>

    </div>
</section>
@endsection

