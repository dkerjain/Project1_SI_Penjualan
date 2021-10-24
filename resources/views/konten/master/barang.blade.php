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
                                                <th>Deskripsi</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $b)
                                                <tr>
                                                    <td>{{ $b->id_barang }}</td>
                                                    <td>{{ $b->jenis_kategori }}</td>
                                                    <td>{{ $b->nama_barang }}</td>
                                                    <td>{{ $b->harga_barang }}</td>
                                                    <td>{{ $b->stok_barang }}</td>
                                                    <td>{{ $b->deskripsi_barang }}</td>
                                                    <td style="text-align:center">
                                                        <a href="#edit{{ $b->id_barang }}" data-toggle="modal" style="margin:5px;"><i class="nav-icon fas fa-edit" ></i></a>
                                                        <a href="#foto{{ $b->id_barang }}" data-toggle="modal" style="margin:5px;"><i class="nav-icon fas fa-image" ></i></a>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
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
                <!-- /.container-fluid -->
            </div>
        </section>

    <!-- Modal Foto -->
    @foreach($barang as $b)
        <div class="modal fade" id="foto{{ $b->id_barang }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Foto Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="item form-group" style="text-align:center;">
                            @if($b->foto_barang != null)
                                <img src="{{ asset($b->foto_barang) }}" style="width:250px; height:250px;">
                            @else
                                <h3>Tidak ada foto</h3>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
                    <form action="/tambahBarang" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}         
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" required name="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id_kategori }}">{{ $k->jenis_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Barang</label>
                                <input type="text" class="form-control" required id="exampleInputPassword1" name="nama" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="harga" required placeholder="Masukkan Harga">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Stok</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="stok" required placeholder="Masukkan Stok">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Input Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpg, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi" placeholder="Masukkan Deskripsi">
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
        @foreach($barang as $b)
            <div class="modal fade" id="edit{{ $b->id_barang }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/editBarang/{{ $b->id_barang }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}         
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" required name="kategori">
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id_kategori }}"
                                                @if($k->id_kategori === $b->id_kategori) 
                                                    selected
                                                @endif >{{ $k->jenis_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Barang</label>
                                    <input type="text" class="form-control" value="{{ $b->nama_barang }}" required id="exampleInputPassword1" name="nama" placeholder="Masukkan Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="number" class="form-control" value="{{ $b->harga_barang }}" id="exampleInputPassword1" name="harga" required placeholder="Masukkan Harga">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Stok</label>
                                    <input type="number" class="form-control" value="{{ $b->stok_barang }}" id="exampleInputPassword1" name="stok" required placeholder="Masukkan Stok">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Input Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto" id="exampleInputFile" accept="image/png, image/jpg, image/jpeg">
                                            <input type="hidden" value="{{ $b->foto_barang }}" name="foto2">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <input type="text" class="form-control" value="{{ $b->deskripsi_barang }}" id="exampleInputPassword1" name="deskripsi" placeholder="Masukkan Deskripsi">
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
@endsection
