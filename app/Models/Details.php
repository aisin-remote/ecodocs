<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $table = 'details';
    protected $guarded = ['id'];
    public function limbah()
    {
        return $this->belongsTo(Limbah::class, 'limbah_id');
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
