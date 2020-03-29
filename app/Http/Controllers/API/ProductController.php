<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
//use App\Http\Controllers\API\ResponseFormater;


class ProductController extends Controller
{
    public function all(Request $request)
    {
        //parameter untuk mengambil produk
        $id= $request->input('id');
        $limit= $request->input('limit',6);//membatasi jumlah data
        $name= $request->input('name');
        $slug= $request->input('slug');
        $type= $request->input('type');
        $price_from= $request->input('price_from');
        $price_to= $request->input('price_to');
        
        if($id){
            $product= Product::with('galleries')->find($id);
            //jika produk ditemukan
            if($product)
                return ResponFormater::success($product,'Data Product Berhasil Di ambil');
            else
                return ResponFormater::error(null,'Data Produk Tidak Di Temukan',404);
        }
    }
}
