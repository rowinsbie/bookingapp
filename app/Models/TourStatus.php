<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourStatus extends Model
{
    use HasFactory;

    public function Tour()
    {
        return $this->hasMany(Tour::class,'status_id','id');
    }
}
