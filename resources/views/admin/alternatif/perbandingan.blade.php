@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Perbandingan Alternatif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('nilai') }}">Nilai Alternatif</a></li>
                    <li class="breadcrumb-item active">Perbandingan Alternatif</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('nilai') }}" class="btn btn-info mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                <h3>Data Inputan</h3>
                <hr>
                <div class="table-responsive">
                <form action="{{ route('nilai.perbandingan.simpan',$id) }}" method="post">
                    @csrf
                <ul type="none">
                    @php
                        $index=0;
                    @endphp
                    @foreach ($input as $i)
                                @php
                                    $cek1=\App\Models\PerbandinganAlternatif::whereKriteria_id($id)->whereAlternatif1_id($i['id_1'])->whereAlternatif2_id($i['id_2'])->first();
                                    $cek2=\App\Models\PerbandinganAlternatif::whereKriteria_id($id)->whereAlternatif1_id($i['id_2'])->whereAlternatif2_id($i['id_1'])->first();
                                @endphp
                            <input type="hidden" name="id1[]" value="{{$i['id_1']}}">
                            <input type="hidden" name="id2[]" value="{{$i['id_2']}}">
                        <li>
                            <div class="form-group row w-100">
                                <div class="col-sm-2">
                                    {{$i['alternatif_1']}}
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
                                    {{$i['alternatif_2']}}
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
                <h3>Matrix perbandingan berpasangan</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>\</th>
                                @foreach ($alternatif as $a)
                                    <th>{{ $a->alternatif }}</th>
                                    @endforeach
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasangan as $i => $p)
                            <tr>
                                <td>{{ $alternatif[$i]->alternatif }}</td>
                                @foreach ($p as $n)
                                    <td>{{ $n }}</td>
                                @endforeach
                                <td>{{ array_sum($p) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Jumlah</td>
                                @foreach ($jumlah as $j)
                                    <td>{{$j->jumlah}}</td>
                                @endforeach
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Bobot Relatif</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($alternatif as $a)
                                    <th>{{ $a->alternatif }}</th>
                                @endforeach
                                <th>Jumlah Baris</th>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bobotrelatif as $i=>$b)
                            <tr>
                                <td>{{ $alternatif[$i]->alternatif }}</td>
                                @foreach ($b as $nilai)
                                <td>{{ $nilai }}</td>
                                @endforeach
                                <td>{{ round(array_sum($b),4) }}</td>
                                <td>{{ $prioritas[$i] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                @foreach ($alternatif as $a)
                                    <td></td>
                                @endforeach
                                <td></td>
                                <td>{{ round(array_sum($prioritas),3) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Penjumlahan tiap baris</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($alternatif as $a)
                                    <th>{{ $a->alternatif }}</th>
                                @endforeach
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sumBaris as $i=>$s)
                                <tr>
                                    <td>{{ $alternatif[$i]->alternatif }}</td>
                                    @foreach ($s as $nilai)
                                        <td>{{ $nilai }}</td>
                                    @endforeach
                                    <td>{{ round(array_sum($s),4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Jumlah nilai Masing Masing Alternatif</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Jumlah</th>
                                <th>Bobot P</th>
                                <th>CM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cm as $i=>$nilai)
                            <tr>
                                <td>{{ $alternatif[$i]->alternatif }}</td>
                                <td>{{ round(array_sum($sumBaris[$i]),4) }}</td>
                                <td>{{ $prioritas[$i] }}</td>
                                <td>{{ $nilai }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{{ round(array_sum($prioritas),3) }}</td>
                                <td>{{ round(array_sum($cm),3) }}</td>
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
                                <th>
                                    &lambda; Maks
                                </th>
                                <th>CI</th>
                                <th>CR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $lambda = round(round(array_sum($cm),4)/count($alternatif),4);
                                $ci=round(($lambda-count($alternatif))/(count($alternatif)-1),4);
                                $cr=round($ci/$ir,4);
                            @endphp
                            <tr>
                                <td>{{ $lambda }}</td>
                                <td>{{ $ci }}</td>
                                <td>{{ $cr }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

