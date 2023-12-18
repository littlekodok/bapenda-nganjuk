<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidSubgrup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ppid',
        'sub_grup',
    ];
    public function ppid(){
        return $this->belongsTo(Ppid::class,'id_ppid','id');
    }
}
