<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khuyenmais extends Model
{
    protected $table="khuyenmais";

    protected $primaryKey = "id";
    protected $fillable = ['ten','noidung'];
}
