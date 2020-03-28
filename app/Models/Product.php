<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use softDeletes;
     protected $fillable = ['name','type','description','price','slug','quantity'];
    //fariabel yang tidak mau di munculkan
     protected $hidden = [];
    // realasi dengan tabel galeri
     public function galleries(){
    return $this->hasMany(ProductGallery::clas,'product_id');
     }
}
