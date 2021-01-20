<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	use HasFactory;

	protected $guarded = [];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
