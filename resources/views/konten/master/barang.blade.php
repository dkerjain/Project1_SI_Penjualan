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
                        <h3 class="card-title mt-3"><b>Data Barang</b></h3>
                    </div>
                    <div class="col-2">
                        <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Data</button>
                    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Barang</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th >Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>BR01</td>
                        <td>Kacamata</td>
                        <td>Dior Eyeglasses</td>
                        <td>Rp. 1.599.000</td>
                        <td>10</td>
                        <td>"Gambar"</td>
                        <td>Kacamata kelas papan atas</td>
                        <td style="text-align:center"><a href="" data-toggle="modal" data-target="#modal-edit"><i class="nav-icon fas fa-edit" ></i></a></td>
                    </tr>
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
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <!-- form start -->
                <form>
                        <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder=",-">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Input Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <textarea type="textarea" class="form-control" id="exampleInputPassword1" >...</textarea>
                    </div>

                    
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->

      <!-- /.modal Edit-->
      <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <!-- form start -->
                <form>
                        <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder=",-">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Input Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <textarea type="textarea" class="form-control" id="exampleInputPassword1" >...</textarea>
                    </div>

                    
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
@endsection
