@extends('layout/index')

@section('css')
<link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                        <input type="date" class="form-control datetimepicker-input disabled" data-target="#reservationdate"/>
                    </div>
                        
                </div>
            </div>

            <div class="col-md-6">
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Pegawai</h3>
                </div>

                <div class="card-body">
                    <input type="text" class="form-control" readonly value="Admin"/>
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
                        <select class="form-control select2" style="width: 100%;">
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                                <div class="pt-5">
                                <button  class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Barang</button>
                                </div>              
                        </div>

                        
                    </div>
                    
                    <div class="p-3">
                    <table id="example2" class="table table-bordered table-hover">
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
                        <tr>
                            <!-- Code Menampilkan Data -->
                            <td>Kacamata</td>
                            <td>Rp. 250.000</td>
                            <td><input type="text" class="form-control"  value="L: -2 ; R: -1"/></td>
                            <td><input type="text" class="form-control"  value="Mika"/></td>
                            <td><input type="Number" class="form-control"  value="2"/></td>
                            <td><input type="text" class="form-control"  value="Rp. 100.000"/></td>
                            <td>Rp. 450.000</td>
                        </tr>
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
      <div class="modal fade" id="modal-lg">
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
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>1</td>
                        <td>Lensa</td>
                        <td>Photocromic</td>
                        <td>Rp. 250.000</td>
                        <td>10</td>
                        <td><button class="btn btn-primary btn-block">Add</button></td>
                    </tr>
                    <tr>
                        <!-- Code Menampilkan Data -->
                        <td>2</td>
                        <td>Frame</td>
                        <td>Kacamata Hitam</td>
                        <td>Rp. 250.000</td>
                        <td>5</td>
                        <td><button class="btn btn-primary btn-block">Add</button></td>
                    </tr>
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

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
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

