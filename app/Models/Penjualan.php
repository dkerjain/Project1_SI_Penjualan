<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penjualan
 * 
 * @property string $id_penjualan
 * @property string|null $id_pegawai
 * @property Carbon|null $tanggal_penjualan
 * @property int|null $total_harga
 * 
 * @property Pegawai|null $pegawai
 * @property Collection|DetailPenjualan[] $detail_penjualans
 * @property Collection|Pembayaran[] $pembayarans
 *
 * @package App\Models
 */
class Penjualan extends Model
{
	protected $table = 'penjualan';
	protected $primaryKey = 'id_penjualan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_harga' => 'int'
	];

	protected $dates = [
		'tanggal_penjualan'
	];

	protected $fillable = [
		'id_pegawai',
		'tanggal_penjualan',
		'total_harga'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function detail_penjualans()
	{
		return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class, 'id_penjualan');
	}
}
