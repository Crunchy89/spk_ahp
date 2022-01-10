@extends('template.template')
@section('title',$title)
@section('body')
<body>
<h3 class="text-center">Hasil Perhitungan Pemilihan Lokasi Pembangunan Perumahan Metode AHP</h3>
<hr>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 h-100">
                <div class="card">
                    <div class="card-body">
                        <h3>Kriteria</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($kriteria as $k)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $k->kriteria }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 h-100">
                <div class="card">
                    <div class="card-body">
                        <h3>Alternatif</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($alternatif as $k)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $k->alternatif }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Hasil perhitungan</h3>
                <hr>
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
                            <th>Persentase</th>
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
                            <td>{{ round(($value*100)/array_sum($sortRangking),4) }}%</td>
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

@section('script')
<script>
    window.print()
</script>
@endsection
