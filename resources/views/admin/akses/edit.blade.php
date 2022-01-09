@extends('template.admin')
@section('title',$title)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('akses') }}">Akses</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h3>Menu</h3>
                <hr>
                <a href="{{ route('akses') }}" class="btn btn-info mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <ul id="data">
                        @foreach ($menu as $m)
                        @if(in_array($m->id,array_column($role->toArray(),'menu_id')))
                            <li><input class="check" type="checkbox" value="{{ $m->id }}" name="menu_id" checked /> &nbsp; {{ $m->title }}</li>
                        @else
                            <li><input class="check" type="checkbox" value="{{ $m->id }}" name="menu_id"/> &nbsp; {{ $m->title }}</li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="d-none d-md-block d-lg-block col-md-6 col-lg-6">
                        <img src="{{ asset('assets/akses.svg') }}" alt="akses" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#data').on('change','input',function(){
            let val=$(this).val();
            axios.post(`{{ route('akses.check',$id) }}`,{menu_id:val})
            .then(res=>{
                toastr[res.data.status](res.data.pesan);
            })
        })
    });
</script>
@endsection

