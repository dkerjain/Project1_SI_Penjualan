@extends('layout/index')

@section('css')
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('konten')
  <br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10">
                  <h3 class="card-title mt-3"><b>Data Ketgori Barang</b></h3>
                </div>
                <div class="col-2">
                  <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Data</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID Kategori</th>
                      <th>Nama Kategori</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($kategori as $k)
                      <tr>
                        <td>{{ $k->id_kategori }}</td>
                        <td>{{ $k->jenis_kategori }}</td>
                        <td style="text-align:center"><a href="#edit{{ $k->id_kategori }}" data-toggle="modal"><i class="nav-icon fas fa-edit" ></i></a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </section>

  <!-- /.modal Input-->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/tambahKategori" method="POST">   
            {{ csrf_field() }}         
            <div class="modal-body">
              <!-- form start -->
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Kategori</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Masukkan Nama Kategori">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <!-- /.modal -->

  <!-- /.modal Edit-->
    @foreach($kategori as $k)
      <div class="modal fade" id="edit{{ $k->id_kategori }}">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/editKategori/{{ $k->id_kategori }}" method="POST">
              {{ csrf_field() }}         
              <div class="modal-body">
                <!-- form start -->          
                <div class="form-group">
                  <label for="exampleInputPassword1">ID Kategori</label>
                  <input type="text" class="form-control" value="{{ $k->id_kategori }}" disabled id="exampleInputPassword1" placeholder="ID">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kategori</label>
                  <input type="text" class="form-control" value="{{ $k->jenis_kategori }}" id="exampleInputPassword1" required name="nama" placeholder="Nama Kategori">
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endforeach
  <!-- /.modal -->


@endsection

@section('script')
<script src="{{ asset('../../asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@if (session('success'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Kategori Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
@if (session('update'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Kategori Berhasil Diupdate',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
@endsection
