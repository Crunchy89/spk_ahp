@extends('template.admin')
@section('title',$title)
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Submenu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></li>
                    <li class="breadcrumb-item active">submenu</li>
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
                <a href="{{ route('menu') }}" class="btn btn-info mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

{{-- modal --}}

<div class="modal" tabindex="-1" id="modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form">
            <div class="modal-body">
                <input type="hidden" name="aksi" id="aksi">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_parent" id="id_parent" value="{{ $id_parent }}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Masukkan Title" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" placeholder="Masukkan link" name="link" id="link" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btn" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>


{{-- end modal --}}
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    let table;
    const form=$('#modal').find('.modal-body').html();
    $(function () {
    table = $('.table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ $urlDatatable }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'title', name: 'title'},
              {data: 'link', name: 'link'},
              {data: 'urutan', name: 'urutan'},
              {data: 'action',name: 'action',orderable: true,searchable: true
              },
          ]
      });
    });
    $('#tambah').click(()=>{
        $('#modal').find('.modal-title').html('Tambah Data');
        $('#modal').find('.modal-body').html(form);
        $('#modal').find('#aksi').val('tambah');
        $('#modal').find('#btn').html('Tambah');
        $('#modal').modal('show')
    });
    $('#data').on('click','.edit',function(){
        $('#modal').find('.modal-title').html('Edit Data');
        $('#modal').find('.modal-body').html(form);
        $('#modal').find('#aksi').val('edit');
        $('#modal').find('#id').val($(this).data('id'));
        $('#modal').find('#title').val($(this).data('title'));
        $('#modal').find('#link').val($(this).data('link'));
        $('#modal').find('#btn').html('Simpan');
        $('#modal').modal('show')
    })
    $('#data').on('click','.hapus',function(){
        $('#modal').find('.modal-body').html(`
        <input type="hidden" name="aksi" value="hapus" />
        <input type="hidden" name="id" value="${$(this).data('id')}"/>
        <h3>Apakah anda yakin ?</h3>
        `);
        $('#modal').find('.modal-title').html('Hapus Data');
        $('#modal').find('#btn').html('Hapus');
        $('#modal').modal('show')
    })
    $('#form').submit(function(e){
        e.preventDefault()
        let data = new FormData(this)
        axios.post(`{{ $aksi }}`,data)
        .then(res=>{
            toastr[res.data.status](res.data.pesan)
            $('#modal').modal('hide')
            table.ajax.reload()
        })
    })

})
  </script>
  @endsection
