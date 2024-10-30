<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Limbah extends Model
{
    use HasFactory;

    protected $table = 'limbahs';

    protected $guarded = ['id'];
    public function details()
    {
        return $this->hasMany(Details::class, 'limbah_id');
    }
}
