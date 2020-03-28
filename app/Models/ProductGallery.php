<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductGallery extends Model
{
    use softDeletes;

    protected $fillable=[
        'products_id','photo','is_default'

    ];
    protected $hidden=[];

    //fk
    public function product(){
        return $this->belongsTo(Product::class,'products_id','id');
    }

    //untuk kebutuhan api(accesor)
    public function getPhotoAttribute($value){

        return url('storage/'.$value);
    }
}
