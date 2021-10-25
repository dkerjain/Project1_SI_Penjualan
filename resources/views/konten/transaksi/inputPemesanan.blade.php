@extends('layout/index')

@section('css')
<link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemesanan</h1>
          </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Tanggal dan Pegawai -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tanggal</h3>
                    </div>
                        <div class="input-group date p-3" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input disabled" id="tgl_pemesanan" name="tgl_pemesanan" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" data-target="#reservationdate"/>
                    </div>
                        
                </div>
            </div>

            <div class="col-md-6">
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Pegawai</h3>
                </div>

                <div class="card-body">
                    <input type="text" name="pegawai" id="pegawai" class="form-control" readonly value="{{ Session::get('nama_pegawai') }}"/>
                </div>
                <!-- /.card-body -->
                </div>
            </div>

        </div>
        

        <!-- Tabel -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3">
                                <label>Input Pemeriksaan</label>
                                <select class="form-control select2" name="pemeriksaan" id="pemeriksaan">
                                    <option selected>Pilih ID Pemeriksaan</option>
                                    @foreach($pemeriksaan as $p)
                                    <option value="{{$p->id_pemeriksaan}}">{{$p->id_pemeriksaan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pt-5 p-3">
                                <button  class="btn btn-info btn-block" data-toggle="modal" data-target=".tambahbarang">Tambah Barang</button>
                            </div>              
                        </div>

                        
                    </div>
                    
                    <div class="p-3">
                    <table id="keranjang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Harga Barang</th>
                                <th>Ukuran Lensa</th>
                                <th>Jenis Lensa</th>
                                <th>Jumlah</th>
                                <th>Harga Lensa</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Total -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                </div>                
            </div>

            <div class="col-md-3">
                <div class="card">
                </div>                
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="p-2">
                        <label>Total :</label>
                        <input type="text" class="form-control" readonly value="Rp. 500.000"/>
                    </div>                     
                    <div class="p-2">
                        <label>Bayar :</label>
                        <input type="text" class="form-control"  value="Rp. 500.000"/>
                    </div>                     
                    <div class="p-2">
                        <label>Sisa Bayar :</label>
                        <input type="text" class="form-control" readonly value="Rp. 0"/>
                    </div>          
                    <div class="p-2">
                    <button  class="btn btn-success btn-block">Tambah Penjualan</button>  
                    </div>                    
                    </div> 
                </div>                
            </div>
        </div>

    </div>
</section>

    <!-- /.modal barang-->
        <div class="modal fade tambahbarang" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $b)
                            <tr>
                                <!-- Code Menampilkan Data -->
                                <td>{{$loop->iteration}}</td>
                                <td>{{$b->jenis_kategori}}</td>
                                <td>{{$b->nama_barang}}</td>
                                <td>Rp {{ number_format($p->harga_barang,2,',','.') }}</td>
                                <td>{{$b->stok_barang}}</td>
                                <td><button class="btn btn-primary btn-block">Add</button></td>
                            </tr>
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
@endsection


@section('script')
<script src="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('../../asset/plugins/select2/js/select2.full.min.js') }}"></script>
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
<script src="{{ asset('../../plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('../../plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.select2').select2();
});
  
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });

  
</script>

<script>
    $(function () {

    // //Initialize Select2 Elements
    // $('.select2').select2()

    // //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })
    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()


    //Date range picker
    $('#reservation').daterangepicker()

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
        ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
        },
        function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
});
</script>



@endsection

