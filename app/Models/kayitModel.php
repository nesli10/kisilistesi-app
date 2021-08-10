<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kayitModel extends Model
{
    use HasFactory;

    protected $table = 'kayit';
    protected $primaryKey = 'tc';
    public $timestamps = false;
    protected $guarded = [];
    public $incrementing = false;
}
