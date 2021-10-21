<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPemesanan
 * 
 * @property string $id_barang
 * @property string $id_pemesanan
 * @property string|null $ukuran_lensa
 * @property string|null $jenis_lensa
 * @property string|null $merek_kacamata
 * @property int|null $harga_kacamata
 * @property int|null $jumlah_pemesanan
 * 
 * @property Barang $barang
 * @property Pemesanan $pemesanan
 *
 * @package App\Models
 */
class DetailPemesanan extends Model
{
	protected $table = 'detail_pemesanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'harga_kacamata' => 'int',
		'jumlah_pemesanan' => 'int'
	];

	protected $fillable = [
		'ukuran_lensa',
		'jenis_lensa',
		'merek_kacamata',
		'harga_kacamata',
		'jumlah_pemesanan'
	];

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'id_barang');
	}

	public function pemesanan()
	{
		return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
	}
}
