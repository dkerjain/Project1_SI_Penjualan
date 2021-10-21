<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pemesanan
 * 
 * @property string $id_pemesanan
 * @property string|null $id_pegawai
 * @property string|null $id_pemeriksaan
 * @property Carbon|null $tanggal_pemesanan
 * @property Carbon|null $tanggal_selesai_pemesanan
 * @property int|null $total_biaya
 * @property string|null $status_pemesanan
 * @property string|null $status_pembayaran
 * @property string|null $nama_pelanggan
 * @property string|null $alamat_pelanggan
 * @property string|null $no_pelanggan
 * 
 * @property Pegawai|null $pegawai
 * @property Pemeriksaan|null $pemeriksaan
 * @property Collection|DetailPemesanan[] $detail_pemesanans
 * @property Collection|Pembayaran[] $pembayarans
 *
 * @package App\Models
 */
class Pemesanan extends Model
{
	protected $table = 'pemesanan';
	protected $primaryKey = 'id_pemesanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_biaya' => 'int'
	];

	protected $dates = [
		'tanggal_pemesanan',
		'tanggal_selesai_pemesanan'
	];

	protected $fillable = [
		'id_pegawai',
		'id_pemeriksaan',
		'tanggal_pemesanan',
		'tanggal_selesai_pemesanan',
		'total_biaya',
		'status_pemesanan',
		'status_pembayaran',
		'nama_pelanggan',
		'alamat_pelanggan',
		'no_pelanggan'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function pemeriksaan()
	{
		return $this->belongsTo(Pemeriksaan::class, 'id_pemeriksaan');
	}

	public function detail_pemesanans()
	{
		return $this->hasMany(DetailPemesanan::class, 'id_pemesanan');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class, 'id_pemesanan');
	}
}
