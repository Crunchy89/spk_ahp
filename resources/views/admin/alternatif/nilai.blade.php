@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nilai Alternatif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Nilai Alternatif</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h3>Nilai alternatif</h3>
                <hr>
                <form action="{{ route('nilai.simpan') }}" method="post">
                    @csrf
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                <th>{{ $k->kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatif as $a)
                            <tr>
                                <td>{{ $a->alternatif }}</td>
                                @foreach ($kriteria as $k)
                                @php
                                    $cek = \App\Models\NilaiAlternatif::whereAlternatif_id($a->id)->whereKriteria_id($k->id)->first();
                                @endphp
                                    <td>
                                        <input type="hidden" name="alternatif_id[]" value="{{ $a->id }}">
                                        <input type="hidden" name="kriteria_id[]" value="{{ $k->id }}">
                                        @if ($cek)
                                        <input type="number" name="nilai[]" value="{{ $cek->nilai }}">
                                        @else
                                        <input type="number" name="nilai[]">
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-form-group">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Perbandingan masing-masing alternatif</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Perbandingan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $k)
                            @php
                                $cek= \App\Models\PerbandinganAlternatif::whereKriteria_id($k->id)->first();
                            @endphp
                            <tr>
                                <td>{{ $k->kriteria }}</td>
                                <td><a href="{{ route('nilai.perbandingan',$k->id) }}" class="btn btn-info">Isi perbandingan</a></td>
                                <td>
                                    @if ($cek)
                                    <button type="button" class="btn btn-success disable" disabled>Sudah Terisi</button>
                                    @else
                                    <button type="button" class="btn btn-danger disable" disabled>Belum Terisi</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
