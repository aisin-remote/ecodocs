<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $guarded = ['id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function details()
    {
        return $this->hasMany(Details::class, 'report_id');
    }
public function approver()
    {
        return $this->belongsTo(User::class, 'approve_id');
    }
}
