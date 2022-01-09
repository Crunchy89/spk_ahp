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
                        </ol>
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
            </div>
        </div>

    </div>
</section>
@endsection

