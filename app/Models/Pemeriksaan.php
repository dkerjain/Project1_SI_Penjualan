<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pemeriksaan
 * 
 * @property string $id_pemeriksaan
 * @property Carbon|null $tanggal_pemeriksaan
 * @property string|null $hasil_pemeriksaan
 * 
 * @property Collection|Pemesanan[] $pemesanans
 *
 * @package App\Models
 */
class Pemeriksaan extends Model
{
	protected $table = 'pemeriksaan';
	protected $primaryKey = 'id_pemeriksaan';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'tanggal_pemeriksaan'
	];

	protected $fillable = [
		'tanggal_pemeriksaan',
		'hasil_pemeriksaan'
	];

	public function pemesanans()
	{
		return $this->hasMany(Pemesanan::class, 'id_pemeriksaan');
	}
}
