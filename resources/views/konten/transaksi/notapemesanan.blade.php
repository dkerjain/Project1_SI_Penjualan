<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pemesanan {{ $id }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <style>
        @page {
            margin: 10px !important;
            padding: 5px !important;
        }
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:12;
        }
        .container{
            margin:5px ;
            margin-top:0px;
            padding:0px;
            height:auto;
            border:1px solid #333;
            background-color:#fff;
        }
        caption{
            font-size:16px;
            margin-bottom:15px;
        }
        table{
            margin:0px;
            width: 100%;
        }
        tr, th{
            padding-right:3px;
            padding:5px;
            width: 50px;
        }
        .border{
            border:1px solid #333;
        }
        th{
            background-color: #E5E4E2;
            font-size:11px;
            width: 98%;
            margin:10px;
        }
        .gambar{
            width: auto; 
            height: auto;
        }
        .bg{
            background-color: #E5E4E2;
        }
        span{
            margin:5px;
            font-size:10px;
        }
        h4,p{
            margin:0px;
            font-size:12px;
        }
        td{
            padding-left:3px;
            padding-right:3px;
            padding:5px;
            font-size:10px;
        }
        p.mix {
			border-style: dotted dashed solid double;
		}
        b{            
            margin:6px;
            margin-bottom:15px;
        }
    </style>
</head>
    @foreach($pemesanan as $p)
        @if ($id == $p->id_pemesanan)
        <body>
            <div class="container ">
            
                <table >
                    
                    <thead>
                        <tr>
                            <th colspan="4">Invoice Pemesanan <strong># {{ $p-> id_pemesanan }}</strong></th>
                            <th colspan="2">{{\Carbon\Carbon::parse($p->tanggal_pemesanan)->translatedFormat('l, d F Y')}}</th>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <h4>Store : </h4>
                                <p>Rumah Optik Sukodono<br>
                                    Jl. Yani No. 25 Karangnongko-Sukodono-Sidoarjo<br>
                                    085733518686
                                </p>
                            </td>
                            @foreach($pemeriksaan as $pk)                         
                                 @if (($p->id_pemeriksaan) == ($pk->id_pemeriksaan))
                                    <td colspan="2">
                                        <h4>Pembeli : </h4>
                                        <p> {{ $pk->nama_pelanggan}} <br><br><br>
                                        </p>
                                    </td>
                                    @endif
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($pegawai as $peg)                         
                                 @if (($p->id_pegawai) == ($peg->id_pegawai))
                                    <th colspan="5">Pegawai <strong> : {{ $peg->nama_pegawai }}</strong></th>
                                    <th colspan="1">#{{ $peg->id_pegawai }}</th>
                                    @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    <th>Barang</th>
                                    <th>Ukuran Lensa</th>
                                    <th>Jenis Lensa</th>                                 
                                    <th>Jumlah</th> 
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>
                    @foreach ($detail_pemesanan as $dp)
                        @foreach($barang as $b)
                            @if ( ($p->id_pemesanan) == ($dp->id_pemesanan) )
                                @if ( ($dp->id_barang) == ($b->id_barang) )
                                <tr>
                                    <td border="2px">{{ $b->nama_barang}}</td>    
                                    <td border="2px">{{ $dp->ukuran_lensa}}</td>    
                                    <td border="2px">{{ $dp->jenis_lensa}}</td>    
                                    <td border="2px" align="center">{{ $dp->jumlah_pemesanan}}</td>
                                    <td border="2px" align="right">Rp.{{ number_format($b->harga_barang,0,',','.')}}</td>
                                    <td border="2px" align="right">Rp.{{ number_format($dp->harga_kacamata,0,',','.')}}</td>
                                </tr>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">TOTAL</th>
                            <td class="bg" align="right">Rp.{{ number_format($p->total_biaya,0,',','.')}}</td>
                        </tr>
                    </tfoot>
                </table>
                
                <span>Terimakasih Telah Berbelanja,</span><br>
                <span><b> *Nota ini harap dibawah ketika pengambilan barang </b></span>
                <table >
                    <tr  align="center">
                        <td>Penerima
                            <br><br><br>(.....................)<br>
                        </td>
                        <td>Hormat Kami
                            <br><br><br>(.....................)<br>
                            </td>
                    </tr>
                </table>
            </div>
        </body>
        @endif
    @endforeach

</html>