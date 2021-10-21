<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pegawai
 * 
 * @property string $id_pegawai
 * @property string|null $id_jabatan
 * @property string|null $nama_pegawai
 * @property string|null $alamat_pegawai
 * @property bool|null $jenis_kelamin
 * @property string|null $no_tlp
 * @property string|null $username
 * @property string|null $pasword
 * 
 * @property Jabatan|null $jabatan
 * @property Collection|Pembayaran[] $pembayarans
 * @property Collection|Pemesanan[] $pemesanans
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class Pegawai extends Model
{
	protected $table = 'pegawai';
	protected $primaryKey = 'id_pegawai';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'jenis_kelamin' => 'bool'
	];

	protected $fillable = [
		'id_jabatan',
		'nama_pegawai',
		'alamat_pegawai',
		'jenis_kelamin',
		'no_tlp',
		'username',
		'pasword'
	];

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'id_jabatan');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class, 'id_pegawai');
	}

	public function pemesanans()
	{
		return $this->hasMany(Pemesanan::class, 'id_pegawai');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'id_pegawai');
	}
}
