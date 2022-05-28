<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function TourDate()
    {
        return $this->hasMany(TourDate::class,'tour_id','id');
    }
}
