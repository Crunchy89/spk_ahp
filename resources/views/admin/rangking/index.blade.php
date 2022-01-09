@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Perangkingan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Perangkingan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>{{ $k->kriteria }}</th>
                                @endforeach
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <h3>Hasil perhitungan</h3>
                            <hr>
                            <tr>
                                <td>Bobot P</td>
                                @foreach ($kriteria as $k)
                                    <td>{{ $k->bobot }}</td>
                                @endforeach
                                <td></td>
                            </tr>
                            @foreach ($data as $i=>$d)
                            <tr>
                                <td>{{ $alternatif[$i]->alternatif }}</td>
                                @foreach ($d as $nilai)
                                    <td>{{ $nilai }}</td>
                                @endforeach
                                <td>{{ $rangking[$i] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="{{ count($kriteria)+1}}"></td>
                                <td>{{ round(array_sum($rangking),4) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Rangking</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Nilai</th>
                            <th>Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($sortRangking as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                            <td>{{ $i++ }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection

