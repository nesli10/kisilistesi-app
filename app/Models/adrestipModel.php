<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adrestipModel extends Model
{
    use HasFactory;
    protected $table = 'adrestip';
    protected $primaryKey = 'adrestipid';
    public $timestamps = false;
    protected $guarded = [];
}
