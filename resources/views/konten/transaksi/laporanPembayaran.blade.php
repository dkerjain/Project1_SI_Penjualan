@extends('layout/index')

@section('css')
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.css') }}">
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
                    <div class="col-6">
                        <h3 class="card-title mt-3"><b>Laporan Pembayaran</b></h3>
                    </div>
                    <div class="col-2">
                        <h3 class="card-title mt-3"><b>Filter Laporan</b></h3>
                    </div>
                    <div class="col-4 mt-2 ">
                        <!-- Date and time range -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                </div>
                                <form action="/laporan/reportPembayaran" method="get">
                                  <div class="input-prepend input-group">
                                    <input type="text" name="date" class="form-control float-right" id="reservation">
                                    <button class="btn btn-secondary" type="submit">Filter</button>
                                  </div>
                                </form>
                            </div>
                        </div>

                        
                    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Pemesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Total Pemesanan</th>
                    <th>Tanggal DP</th>
                    <th>Total DP</th>
                    <th>Tanggal Pelunasan</th>
                    <th>Total Pelunasan</th>
                    <th>Jumlah Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $total=0;
                    @endphp
                    @foreach($pemesanan as $p)
                      @if($p->status_pembayaran == 0)
                      <tr>
                          <td>{{ $p->id_pemesanan }}</td>
                          <td>{{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->translatedFormat('d M Y ') }}</td>
                          <td>Rp {{ number_format($p->total_biaya,2,',','.')}}</td>
                          @foreach($pembayaran1 as $pb1)
                          @if($pb1->id_pemesanan == $p->id_pemesanan)
                            <td>{{ \Carbon\Carbon::parse($pb1->tanggal_pembayaran)->translatedFormat('d M Y h:i:s') }}</td>
                            <td>Rp {{ number_format($pb1->jumlah_bayar,2,',','.')}}</td>
                          @endif
                          @endforeach

                          @foreach($pembayaran2 as $pb2)
                          @if($pb2->id_pemesanan == $p->id_pemesanan)
                            <td>{{ \Carbon\Carbon::parse($pb2->tanggal_pembayaran)->translatedFormat('d M Y h:i:s') }}</td>
                          @endif
                          @endforeach

                          @foreach($pembayaran1 as $pb1)
                          @if($pb1->id_pemesanan == $p->id_pemesanan)
                            <td>Rp {{ number_format($pb1->sisa,2,',','.')}}</td>
                          @endif
                          @endforeach
                          <td>Rp {{ number_format($p->total_biaya,2,',','.')}}</td>
                          @php
                            $total=$total+$p->total_biaya;
                          @endphp
                      </tr>
                      @elseif($p->status_pembayaran == 1)
                      <tr>
                          <td>{{ $p->id_pemesanan }}</td>
                          <td>{{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->translatedFormat('d M Y ') }}</td>
                          <td>Rp {{ number_format($p->total_biaya,2,',','.')}}</td>
                          @foreach($pembayaran1 as $pb)
                          @if($pb->id_pemesanan == $p->id_pemesanan)
                            <td>{{ \Carbon\Carbon::parse($pb->tanggal_pembayaran)->translatedFormat('d M Y h:i:s') }}</td>
                            <td>Rp {{ number_format($pb->jumlah_bayar,2,',','.')}}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Rp {{ number_format($pb->jumlah_bayar,2,',','.')}}</td>
                            @php
                              $total=$total+$pb->jumlah_bayar;
                            @endphp
                          @endif
                          @endforeach
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                        <th colspan="7">TOTAL BAYAR</th>
                        <th>Rp {{ number_format($total,2,',','.')}}</th>
                      </tr>
                  </tfoot>
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
<script src="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
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
<!-- InputMask -->
<script src="{{ asset('../../asset/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('../../asset/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.js') }}"></script>

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

<script type="text/javascript">
  $(document).ready(function() {
      let start = moment().startOf('month')
      let end = moment().endOf('month')
      
      
      $('#reservation').daterangepicker({
          startDate: start,
          endDate: end
        }, function(first, last) {
            })
  })
</script>



@endsection
