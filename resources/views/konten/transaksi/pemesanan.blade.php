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
                        <h3 class="card-title mt-3"><b>Data Pemesanan</b></h3>
                    </div>
                    <div class="col-2">
                        <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Pemesanan</button>
                    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Pemesanan</th>
                    <th>ID Pemeriksaan</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Selesai</th>
                    <th>Pegawai</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Biaya</th>
                    <th>Status Pemesanan</th>
                    <th>Status Pembayaran</th>
                    <th>Action</th>
                    <th>Alamat Pelanggan</th>
                    <th>No Telp Pelanggan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>211021001</td>
                        <td>211021001</td>
                        <td>21 Oktober 2021</td>
                        <td>23 Oktober 2021</td>
                        <td>Admin</td>
                        <td>Niskenandi</td>
                        <td>Rp. 250.000</td>
                        <td>Proses</td>
                        <td>Belum Lunas</td>
                        <td style="text-align:center"><a href="" data-toggle="modal" data-target="#modal-edit"><i class="nav-icon fas fa-bars" ></i></a></td>
                        <td>Surabaya</td>
                        <td>081234550801</td>
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


      <!-- /.modal Edit-->
      <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Detail Data Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>ID Pemesanan</label>
                        <input type="text" class="form-control" placeholder="211021001" disabled>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" placeholder="Rp. 250.000" disabled>
                        </div>
                    </div>
                </div>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Ukuran Lensa</th>
                    <th>Jenis Lensa</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>1</td>
                        <td>Kaca</td>
                        <td>L: -2 ; R: -1</td>
                        <td>Radiasi</td>
                        <td>Dior</td>
                        <td>Rp. 250.000</td>
                        <td>1</td>
                    </tr>
                    
                </table>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Jumlah Bayar</label>
                        <input type="text" class="form-control" placeholder="0" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Sisa Bayar</label>
                        <input type="text" class="form-control" placeholder="0" >
                        </div>
                    </div>

                </div>
                
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
