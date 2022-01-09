@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Perhitungan AHP</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Perhitungan AHP</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h3>Data Inputan</h3>
                <hr>
                <div class="table-responsive">
                <form action="{{ route('ahp.simpan') }}" method="post">
                    @csrf
                <ul type="none">
                    @php
                        $index=0;
                    @endphp
                    @foreach ($input as $i)
                                @php
                                    $cek1=\App\Models\Ahp::whereKriteria1_id($i['id_1'])->whereKriteria2_id($i['id_2'])->first();
                                    $cek2=\App\Models\Ahp::whereKriteria1_id($i['id_2'])->whereKriteria2_id($i['id_1'])->first();
                                @endphp
                            <input type="hidden" name="id1[]" value="{{$i['id_1']}}">
                            <input type="hidden" name="id2[]" value="{{$i['id_2']}}">
                        <li>
                            <div class="form-group row w-100">
                                <div class="col-sm-2">
                                    {{$i['kriteria_1']}}
                                </div>
                                <div class="col-sm-8">
                                    <div>
                                        <div class="d-flex justify-content-around w-100">
                                            @php
                                                $j=9;
                                            @endphp
                                            @while($j > 1)
                                            @if ($cek1 && $cek1->nilai == $j)
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" checked name="nilai[{{$index}}]" value="{{$j}}">
                                                {{$j}}
                                            </div>
                                            @else
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" name="nilai[{{$index}}]" value="{{$j}}">
                                                {{$j}}
                                            </div>
                                            @endif
                                            @php
                                                $j--;
                                                @endphp
                                            @endwhile
                                            @if ((!$cek1 && !$cek2)|| $cek1->nilai == 1 )
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" checked name="nilai[{{$index}}]" value="1">
                                                1
                                            </div>
                                            @else
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" name="nilai[{{$index}}]" value="1">
                                                1
                                            </div>
                                            @endif
                                            @php
                                                $j=2;
                                            @endphp
                                            @while($j <= 9)
                                            @if ($cek2 && $cek2->nilai == $j)
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" name="nilai[{{$index}}]" checked value="{{$j}}0">
                                                {{$j}}
                                            </div>
                                            @else
                                            <div class="d-flex flex-column justify-content-center align-items-center m-1">
                                                <input type="radio" name="nilai[{{$index}}]" value="{{$j}}0">
                                                {{$j}}
                                            </div>
                                            @endif
                                            @php
                                                $j++;
                                            @endphp
                                            @endwhile
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    {{$i['kriteria_2']}}
                                </div>
                            </div>
                        </li>
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </ul>
                <hr>
                <div class="form-group">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Matrix Perbandingan Berpasangan</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>/</th>
                                @foreach ($kriteria as $k)
                                <th>{{ $k->kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k)
                            <tr>
                                @foreach ($k as $d)
                                <td>{{ $d }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td>Jumlah</td>
                                @foreach ($jumlah as $j)
                                    <td>{{$j}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Matrix nilai kriteria</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>/</th>
                                @foreach ($kriteria as $k)
                                <th>{{ $k->kriteria }}</th>
                                @endforeach
                                <th>Jumlah</th>
                                <th>Bobot Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i=0;$i<count($bobot);$i++)
                            <tr>
                                <td>{{ $kriteria[$i]->kriteria }}</td>
                                @for ($j=0;$j<count($bobot[$i]);$j++)
                                    <td>{{ $bobot[$i][$j] }}</td>
                                @endfor
                                <td>{{$bobotBaris[$i]}}</td>
                                <td>{{$prioritas[$i]->bobot}}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Matrix penjumlahan setiap baris</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>/</th>
                                @foreach ($kriteria as $k)
                                <th>{{ $k->kriteria }}</th>
                                @endforeach
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i=0;$i<count($nilai);$i++)
                            <tr>
                                <td>{{ $kriteria[$i]->kriteria }}</td>
                                @for ($j=0;$j<count($nilai[$i]);$j++)
                                    <td>{{ round($nilai[$i][$j]*$kriteria[$j]->bobot,4) }}</td>
                                @endfor
                                <td>{{ $sumBaris[$i] }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Perhitungan rasio konsistensi</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Jumlah</th>
                                <th>Bobot P</th>
                                <th>CM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i=0;$i<count($kriteria);$i++)
                                <tr>
                                    <td>{{ $kriteria[$i]->kriteria }}</td>
                                    <td>{{ $sumBaris[$i] }}</td>
                                    <td>{{ $kriteria[$i]->bobot }}</td>
                                    <td>{{ $konsistensi[$i] }}</td>
                                </tr>
                            @endfor
                            <tr>
                                <td>&Sigma;</td>
                                <td></td>
                                <td>{{ round(array_sum(array_column($kriteria->toArray(),'bobot')),3) }}</td>
                                <td>{{ round(array_sum($konsistensi),2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Hasil</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>CI</th>
                                <th>IR</th>
                                <th>CR</th>
                                <th>Konsisten</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = round(round(array_sum($konsistensi),2) / count($kriteria),3);
                                $ci = round(($total-count($kriteria))/(count($kriteria)-1),3);
                                $cr = round($ci/$ir,4)
                            @endphp
                            <td>{{ $total }}</td>
                            <td>{{ $ci }}</td>
                            <td>{{ $ir }}</td>
                            <td>{{ round($ci/$ir,3) }}</td>
                            <td>
                                @if ($cr < 0.1)
                                    Konsisten
                                @else
                                    Tidak Konsisten
                                @endif
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

