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
                  <a href="/inputPemesanan"><button  class="btn btn-primary btn-block">Tambah Pemesanan</button></a>
                </div>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID Pemesanan</th>
                  <th>ID Pemeriksaan</th>
                  <th>Tanggal Pesan</th>
                  <th>Pegawai</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat Pelanggan</th>
                  <th>No Telp Pelanggan</th>
                  <th>Total Biaya</th>
                  <th>Status Pemesanan</th>
                  <th>Status Pembayaran</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($pemesanan as $p)
                  <tr>
                    <!-- Code Menampilkan Data -->
                    <td>{{$p->id_pemesanan}}</td>
                    <td>{{$p->id_pemeriksaan}}</td>
                    <td>{{$p->tanggal_pemesanan}}</td>
                    <td>{{$p->nama_pegawai}}</td>
                    @foreach($pemeriksaan as $pe)
                    @if($p->id_pemeriksaan == $pe->id_pemeriksaan)
                    
                    <td>{{$pe->nama_pelanggan}}</td>
                    <td>{{$pe->alamat_pelanggan}}</td>
                    <td>{{$p->no_telfon}}</td>
                    @endif
                    @endforeach
                    
                    <td>{{$p->total_biaya}}</td>
                    <td>
                      @if($p->status_pemesanan == 0)
                        Pemesanan Selesai
                      @else
                        Proses
                      @endif
                    </td>
                    <td>
                      @if($p->status_pembayaran == 0)
                        Lunas
                      @else
                        Belum Lunas
                      @endif
                    </td>
                    <td style="text-align:center"><a href="" data-toggle="modal" data-target=".editpemesanan{{$p->id_pemesanan}}"><i class="nav-icon fas fa-bars" ></i></a></td>
                    
                    
              
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


<!-- /.modal Edit-->
@foreach ($pemesanan as $p)
  <div class="modal fade editpemesanan{{$p->id_pemesanan}}" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detail Data Pemesanan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="/pemesanan/tambahpembayaran" enctype="multipart/form-data" method="post">
            
            <div class="modal-body">
              {{ @csrf_field() }}
                <input type="hidden" id="id_pemesanan" name="id_pemesanan" value="{{$p->id_pemesanan}}" class="form-control col-md-7 col-xs-12">
                
                <input type="hidden" id="total_bayar" name="total_bayar" value="{{$p->total_bayar}}" class="form-control col-md-7 col-xs-12">
                <input type="hidden" id="jumlah" name="jumlah" value="{{$p->sisa}}" class="form-control col-md-7 col-xs-12">
                

              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>ID Pemesanan</label>
                    <input type="text" class="form-control" value="{{ $p->id_pemesanan}}" readonly>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" value="Rp {{ number_format($p->total_biaya,2,',','.') }}" readonly>
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
                    <th>Harga</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($detail as $d)
                    @if($p->id_pemesanan == $d->id_pemesanan)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->nama_barang}}</td>
                        <td>{{$d->ukuran_lensa}}</td>
                        <td>{{$d->jenis_lensa}}</td>
                        <td>{{$d->harga_kacamata}}</td>
                        <td>{{$d->jumlah_pemesanan}}</td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>

              @if($p->status_pembayaran == 1)
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Jumlah Bayar</label>
                    <input type="text" class="form-control" readonly value="Rp {{ number_format($p->jumlah_bayar,2,',','.') }}" >
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Sisa Bayar</label>
                    <input type="text" class="form-control" readonly value="Rp {{ number_format($p->sisa,2,',','.') }}" >
                    </div>
                </div>
              </div>
            </div>
            @else
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                      <label>Jumlah Bayar</label>
                      <input type="text" class="form-control" readonly value="Rp {{ number_format($p->total_bayar,2,',','.') }}" >
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                      <label>Sisa Bayar</label>
                      <input type="text" class="form-control" readonly value="Rp 0,00" >
                      </div>
                  </div>
                </div>
              </div>
            @endif

            <div class="modal-footer justify-content-between">
             
              @if($p->status_pembayaran == 1)
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Pembayaran</button>
              @endif
              @if($p->status_pembayaran == 0)
                
              @endif
            </div>
            
          </form>
        </div>
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
@if (session('update'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Pembayaran Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif

@if (session('success'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Pemesanan Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
@endsection
