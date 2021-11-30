<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Binhluans extends Model
{
    protected $table="binhluans";

    protected $primaryKey = "id_bl";
   
    protected $fillable = ['id_sp','id','noidung'];

    public function user(){
    	return $this->belongsTo('App\User','id','id');
    }
}
