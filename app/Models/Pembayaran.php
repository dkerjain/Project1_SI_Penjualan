<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembayaran
 * 
 * @property string $id_pembayaran
 * @property string|null $id_pegawai
 * @property string|null $id_pemesanan
 * @property string|null $id_penjualan
 * @property Carbon|null $tanggal_pembayaran
 * @property int|null $total_bayar
 * @property int|null $jumlah_bayar
 * 
 * @property Pegawai|null $pegawai
 * @property Pemesanan|null $pemesanan
 * @property Penjualan|null $penjualan
 *
 * @package App\Models
 */
class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'id_pembayaran';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_bayar' => 'int',
		'jumlah_bayar' => 'int'
	];

	protected $dates = [
		'tanggal_pembayaran'
	];

	protected $fillable = [
		'id_pegawai',
		'id_pemesanan',
		'id_penjualan',
		'tanggal_pembayaran',
		'total_bayar',
		'jumlah_bayar'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function pemesanan()
	{
		return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
	}

	public function penjualan()
	{
		return $this->belongsTo(Penjualan::class, 'id_penjualan');
	}
}
