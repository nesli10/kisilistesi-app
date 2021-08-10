<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adresModel extends Model
{
    use HasFactory;
    protected $table = 'adres';
    protected $primaryKey = 'adresid';
    public $timestamps = false;
    protected $guarded = [];
}
