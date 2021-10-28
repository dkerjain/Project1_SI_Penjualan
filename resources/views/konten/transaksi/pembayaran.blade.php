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
                        <h3 class="card-title mt-3"><b>Data Pembayaran</b></h3>
                    </div>
                    <div class="col-2">
                        <a href="/pemesanan"><button  class="btn btn-primary btn-block">Tambah Pembayaran</button></a>
                    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Penjualan</th>
                    <th>ID Pemesanan</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Pegawai</th>
                    <th>Jumlah Bayar</th>
                    <th>Total Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pembayaran as $pb)
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>{{ $pb->id_pembayaran }}</td>
                        @if($pb->id_penjualan != null)
                          <td>{{ $pb->id_penjualan }}</td>
                        @else
                          <td>-</td>
                        @endif
                        @if($pb->id_pemesanan != null)
                          <td>{{ $pb->id_pemesanan }}</td>
                        @else
                          <td>-</td>
                        @endif
                        <td>{{ \Carbon\Carbon::parse($pb->tanggal_pembayaran)->translatedFormat('d M Y') }}</td>
                        @foreach($pegawai as $peg)
                          @if($pb->id_pegawai == $peg->id_pegawai)
                            <td>{{ $peg->nama_pegawai }}</td>
                          @endif
                        @endforeach
                        <td>Rp {{ number_format($pb->jumlah_bayar,2,',','.') }}</td>
                        <td>
                        Rp {{ number_format($pb->total_bayar,2,',','.') }}
                        </td>
                    </tr>
                    @endforeach
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

@endsection
