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
                  <h3 class="card-title mt-3"><b>Data Pegawai</b></h3>
                </div>
                <div class="col-2">
                  <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">Tambah Data</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID Pegawai</th>
                      <th>Jabatan</th>
                      <th>Nama Pegawai</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telp</th>
                      <th>Username</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pegawai as $p)
                      <tr>
                        <td>{{ $p->id_pegawai }}</td>
                        <td>{{ $p->nama_jabatan }}</td>
                        <td>{{ $p->nama_pegawai }}</td>
                        <td>{{ $p->alamat_pegawai }}</td>
                        <td>
                          @if($p->jenis_kelamin == 0)
                            Pria
                          @else
                            Wanita
                          @endif
                        </td>
                        <td>{{ $p->no_tlp }}</td>
                        <td>{{ $p->username }}</td>
                        <td style="text-align:center">
                          <a href="#edit{{ $p->id_pegawai }}" data-toggle="modal"><i class="nav-icon fas fa-edit" ></i></a>
                          <a class="hapus ml-3" href="/hapusPegawai/{{ $p->id_pegawai }}" data-toggle="modal"><i class="nav-icon fas fa-trash" ></i></a>
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
    </div>
  </section>

  <!-- /.modal Input-->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/tambahPegawai" method="POST">
            {{ csrf_field() }}         
            <div class="modal-body">
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan" required>
                  <option value="">-- Pilih Jabatan --</option>
                  @foreach($jabatan as $j)
                    <option value="{{ $j->id_jabatan }}">{{ $j->nama_jabatan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" class="form-control" required name="nama" id="exampleInputPassword1" placeholder="Masukkan Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" required name="alamat" id="exampleInputPassword1" placeholder="Masukkan Alamat">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" required name="jk">
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="0">Pria</option>
                  <option value="1">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">No Telepon</label>
                <input type="number" class="form-control" id="exampleInputPassword1" required name="no" placeholder="Masukkan No Telepon">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" id="exampleInputPassword1" required name="username" placeholder="Masukkan Username">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" required name="pasword" placeholder="Masukkan Password">
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
    @foreach($pegawai as $p)
      <div class="modal fade" id="edit{{ $p->id_pegawai }}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/editPegawai/{{ $p->id_pegawai }}" method="POST">
              {{ csrf_field() }}         
              <div class="modal-body">
                <div class="form-group">
                  <label>Jabatan</label>
                  <select class="form-control" name="jabatan">
                    @foreach($jabatan as $j)
                      <option value="{{ $j->id_jabatan }}"
                        @if($j->id_jabatan === $p->id_jabatan) 
                          selected
                        @endif >{{ $j->nama_jabatan }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" required value="{{ $p->nama_pegawai }}" name="nama" id="exampleInputPassword1" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" required value="{{ $p->alamat_pegawai }}" name="alamat" id="exampleInputPassword1" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" required name="jk">
                    @if($p->jenis_kelamin == 0)
                      <option value="0" selected>Pria</option>
                      <option value="1">Wanita</option>
                    @else
                      <option value="0">Pria</option>
                      <option value="1" selected>Wanita</option>
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No Telepon</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" required value="{{ $p->no_tlp }}" name="no" placeholder="Masukkan No Telepon">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" required value="{{ $p->username }}" name="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" required value="{{ $p->pasword }}" name="pasword" placeholder="Masukkan Password">
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

@if (session('success'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Pegawai Berhasil Disimpan',
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
          title: 'Data Pegawai Berhasil Diupdate',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
@if (session('delete'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Jabatan Berhasil Dihapus',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
@endif
<script>
    $('.hapus').on('click',function(e){

        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menghapus data dari sistem!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!'
        }).then((result) => {
                if (result.value) {
                    document.location.href = href;
            }
        })
    });
</script>
@endsection
