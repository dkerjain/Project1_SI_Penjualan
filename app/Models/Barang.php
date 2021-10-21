<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Barang
 * 
 * @property string $id_barang
 * @property string|null $id_kategori
 * @property string|null $nama_barang
 * @property int|null $harga_barang
 * @property int|null $stok_barang
 * @property string|null $foto_barang
 * @property string|null $deskripsi_barang
 * 
 * @property Kategori|null $kategori
 * @property Collection|DetailPemesanan[] $detail_pemesanans
 * @property Collection|DetailPenjualan[] $detail_penjualans
 *
 * @package App\Models
 */
class Barang extends Model
{
	protected $table = 'barang';
	protected $primaryKey = 'id_barang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'harga_barang' => 'int',
		'stok_barang' => 'int'
	];

	protected $fillable = [
		'id_kategori',
		'nama_barang',
		'harga_barang',
		'stok_barang',
		'foto_barang',
		'deskripsi_barang'
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori');
	}

	public function detail_pemesanans()
	{
		return $this->hasMany(DetailPemesanan::class, 'id_barang');
	}

	public function detail_penjualans()
	{
		return $this->hasMany(DetailPenjualan::class, 'id_barang');
	}
}
