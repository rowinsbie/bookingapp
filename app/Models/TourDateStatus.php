<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDateStatus extends Model
{
    use HasFactory;

    public function TourDate()
    {
        return $this->hasMany(TourDate::class,'status_id','id');
    }
}
