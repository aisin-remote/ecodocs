<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $guarded = ['id'];
    public function reports()
    {
        return $this->hasMany(Report::class, 'destination_id');
    }
}
