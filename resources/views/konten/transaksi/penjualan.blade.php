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
                        <h3 class="card-title mt-3"><b>Data Penjualan</b></h3>
                    </div>
                    <div class="col-2">
                        <a href="/inputPenjualan"><button  class="btn btn-primary btn-block">Tambah Penjualan</button></a>
                    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID Penjualan</th>
                      <th>Tanggal Penjualan</th>
                      <th>Pegawai</th>
                      <th>Total Penjualan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($penjualan as $p)
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>{{ $p->id_penjualan }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_penjualan)->translatedFormat('d M Y ') }}</td>
                        @foreach($pegawai as $peg)
                          @if($p->id_pegawai == $peg->id_pegawai)
                            <td>{{ $peg->nama_pegawai }}</td>
                          @endif
                        @endforeach
                        <td>Rp. {{number_format($p->total_harga)}}</td>
                        <td style="text-align:center">
                          <a href="" data-toggle="modal" data-target="#modal-edit{{ $p->id_penjualan }}" style="margin:5px;"><i class="nav-icon fas fa-bars" ></i></a>
                          <a href="/notaPenjualan/{{ $p->id_penjualan }}" target="_blank" ><i class="nav-icon fas fa-print" ></i></a>
                          <!-- /.modal Edit-->
                          <div class="modal fade" id="modal-edit{{ $p->id_penjualan }}">
                          <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Detail Data Penjualan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label>ID Penjualan</label>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" class="form-control" placeholder="{{ $p->id_penjualan}}" disabled>
                                          </div>
                                        </div>

                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label>Total</label>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Rp. {{ number_format($p->total_harga,2,',','.') }}" disabled>
                                          </div>
                                        </div>
                                    </div>

                                    <table id="example2" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($detail_penjualan as $dp)
                                          @if($p->id_penjualan == $dp->id_penjualan)
                                          <tr>
                                              <!-- Code Menampilkan Data -->
                                              @foreach($barang as $b)
                                                @if($b->id_barang == $dp->id_barang)
                                                <td>{{ $b->nama_barang }}</td>
                                                @endif
                                              @endforeach
                                              <td>{{ $dp->jumlah_pembelian}}</td>
                                              <td>Rp. {{ number_format($dp->sub_total_harga) }}</td>
                                          </tr>
                                          @endif
                                        @endforeach
                                      </tbody>
                                    </table>
                                    
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                          <!-- /.modal -->
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
          title: 'Data Penjualan Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
@endsection
