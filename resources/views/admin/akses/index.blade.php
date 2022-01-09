@extends('template.admin')
@section('title',$title)
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Akses</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Akses</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <button type="button" id="tambah" class="btn btn-primary mb-3">Tambah Data</button>
                <div class="table-responsive">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                @foreach ($th as $t)
                                    <th>{{ $t }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="data">
                            @php
                                $i=1;
                            @endphp
                            @foreach ($role as $r)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $r->role }}</td>
                                    @php
                                        $menu = \App\Models\AksesMenu::join('menu','akses_menu.menu_id','=','menu.id')->where('akses_menu.role_id',$r->id)->get();
                                    @endphp
                                    <td>
                                        <ol>
                                            @foreach ($menu as $m)
                                                <li>{{ $m->title }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <a href="{{ route('akses.edit',$r->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection

