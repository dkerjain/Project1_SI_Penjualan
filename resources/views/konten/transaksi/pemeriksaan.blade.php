@extends('layout/index')

@section('css')
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                    <h3 class="card-title mt-3"><b>Data Pemeriksaan</b></h3>
                </div>
                <div class="col-2">
                    <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Pemeriksaan</button>
                </div>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID Pemeriksaan</th>
                <th> Nama Pelanggan </th>
                <th> Alamat Pelanggan </th>
                <th> No Telfon </th>
                <th>Tanggal Pemeriksaan</th>
                <th>Hasil</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($pemeriksaan as $p)
                  <tr>
                      <!-- Code Menampilkan Data -->
                      <td>{{$p->id_pemeriksaan}}</td>
                      <td>{{$p->nama_pelanggan}}</td>
                      <td> {{$p->alamat_pelanggan}}</td>
                      <td> {{$p->no_telfon}}</td>
                      <td>{{\Carbon\Carbon::parse($p->tanggal_pemeriksaan)->translatedFormat('l, d F Y')}}</td>
                      <td>{{$p->hasil_pemeriksaan}}</td>
                      <td style="text-align:center">
                        <i class="nav-icon fas fa-edit" data-toggle="modal" data-target=".editpemeriksaan{{$p->id_pemeriksaan}}"></i>
                        <a href="/inputPemesanan/{{$p->id_pemeriksaan}}"><i class="nav-icon fas fa-shopping-cart"></i></a>
                      </td>
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
</section>

      <!-- /.modal Input-->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pemeriksaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- form start -->
              <form action="/pemeriksaan/insert" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                {{ @csrf_field() }}
                <div class="modal-body">  
                  <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Pemeriksaan</label>
                      <input type="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" id="tgl_pemeriksaan" name="tgl_pemeriksaan">
                  </div> 
                  <div class="form-group">
                      <label for="exampleInputPassword1">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pelanggan">
                  </div> 
                  <div class="form-group">
                      <label for="exampleInputPassword1">Alamat Pelanggan</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Pelanggan">
                  </div> 
                  <div class="form-group">
                      <label for="exampleInputPassword1">No Telfon Pelanggan</label>
                      <input type="number" class="form-control" id="no_telfon" name="no_telfon" min="10" placeholder="085 xxx xxx xxx">
                  </div> 
                  <div class="form-group">
                      <label for="exampleInputPassword1">Hasil Pemeriksaan</label>
                      <textarea type="text" class="form-control" id="hasil_pemeriksaan" name="hasil_pemeriksaan"></textarea>
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
        @foreach ($pemeriksaan as $p)
          <div class="modal fade editpemeriksaan{{$p->id_pemeriksaan}}">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Edit Data Pemeriksaan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <!-- form start -->
                  <form action="/pemeriksaan/edit" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="modal-body">
                    {{ @csrf_field() }}  
                      <input type="hidden" id="id_pemeriksaan" name="id_pemeriksaan" value="{{$p->id_pemeriksaan}}" class="form-control col-md-7 col-xs-12">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Pemeriksaan</label>
                          <input type="date" class="form-control" readonly value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" id="tgl_pemeriksaan" name="tgl_pemeriksaan">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pelanggan</label>
                            <input type="text" class="form-control" readonly value="{{$p->nama_pelanggan}}" id="nama" name="nama">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat Pelanggan</label>
                            <input type="text" class="form-control" readonly value="{{$p->alamat_pelanggan}}" id="alamat" name="alamat">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Telfon Pelanggan</label>
                            <input type="number" class="form-control" readonly id="no_telfon" name="no_telfon" min="10" value="{{$p->no_telfon}}">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hasil Pemeriksaan</label>
                          <textarea type="text" class="form-control" id="hasil_pemeriksaa" name="hasil_pemeriksaan" value="{{$p->hasil_pemeriksaan}}"></textarea>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
          title: 'Data Pemeriksaan Berhasil Disimpan',
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
          title: 'Data Pemeriksaan Berhasil Diupdate',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif

@endsection
