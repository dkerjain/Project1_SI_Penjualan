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
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h2 class="card-title">Edit Profile</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/editProfile" method="POST">   
                                    {{ csrf_field() }}      
                                    @foreach($pegawai as $p)   
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Nama</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="{{ $p->nama_pegawai }}" placeholder="Masukkan Nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Alamat</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" value="{{ $p->alamat_pegawai }}" placeholder="Masukkan Alamat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Jenis Kelamin</label>
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
                                            </div>                                  
                                            <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">No. Telp</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="no" value="{{ $p->no_tlp }}" placeholder="Masukkan No. Telp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Username</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="username" value="{{ $p->username }}" placeholder="Masukkan Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="pasword" value="{{ $p->pasword }}" placeholder="Masukkan Password">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="modal-footer justify-content-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
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

@endsection
