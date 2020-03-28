<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductGalleryRequest;



class ProductGalleryController extends Controller
{

    //agar hharus login dulu saat mebuka 
   public function __construct()
   {
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items= ProductGallery::with('product')->get();//'product'== relasi
        return view('pages.product-galleries.index')->with([
            'items'=> $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= Product::all(); //untuk menambahkan gambar maka abil data produk dahulu
        return view('pages.product-galleries.create-gallery')->with([
            'products'=>$products
        ]);
    }

    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo']= $request->file('photo')//sesuai name di form bladenya
        ->store(//untuk simpan
            'assets/product',//foder tujuan
            'public'//akses
        );

        ProductGallery::create($data);
        return redirect()->route('product-galleries.index');
    }

 
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-galleries.index');
    }

   
}
