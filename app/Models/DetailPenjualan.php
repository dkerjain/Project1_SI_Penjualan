<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPenjualan
 * 
 * @property string $id_penjualan
 * @property string $id_barang
 * @property int|null $jumlah_pembelian
 * @property int|null $sub_total_harga
 * 
 * @property Penjualan $penjualan
 * @property Barang $barang
 *
 * @package App\Models
 */
class DetailPenjualan extends Model
{
	protected $table = 'detail_penjualan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'jumlah_pembelian' => 'int',
		'sub_total_harga' => 'int'
	];

	protected $fillable = [
		'jumlah_pembelian',
		'sub_total_harga'
	];

	public function penjualan()
	{
		return $this->belongsTo(Penjualan::class, 'id_penjualan');
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'id_barang');
	}
}
