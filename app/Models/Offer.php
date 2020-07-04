<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'table_offers';
    protected $fillable = ['name','price','discount','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = false;
}
