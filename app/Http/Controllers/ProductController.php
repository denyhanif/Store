<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;

//use App\Http\productRequest;
use Illuminate\Support\Str;
use App\Http\Requests\ProductGalleryRequest;
use App\Http\Requests\productRequest;
use App\Http\Requests\produks;



class ProductController extends Controller
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
    //fungsi untuk menampilkan produk
    {
        $items= Product::all();//memanggil semua product dengan model 
        return view('pages.products.index')->with([
            'item'=>$items// parsing data collection yang ada di$items ke variabel barang
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( productRequest $request)
    {
        //ambil semua request (isi forma yang akan di input)
        $data = $request->all();//ambil semua data
        $data['slug']= Str::slug($request->name);//slug untuk merapikan url agar nama produk di url terformat(spasi akan menjadi -)

        Product::create($data);//menginputkan data ketabel produk dengan model product
        return redirect()->route('products.index');//mengarahkan ke tampilan index/produk
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $item = Product::findOrFail($id);
        return view('pages.products.edit')->with([
            'item'=> $item
        ]
        );
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
        //ambil semua request (isi forma yang akan di input)
        $data = $request->all();//ambil semua data
        $data['slug']= Str::slug($request->name);//slug untuk merapikan url agar nama produk di url terformat(spasi akan menjadi -)

        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('products.index');//mengarahkan ke tampilan index/produk
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        //addon
        ProductGallery::where('products_id',$id)->delete();
        
        return redirect()->route('products.index');
    }
     // menampikan galery sesuai produk

     public function gallery( Request $request, $id ){
        $products = Product:: findOrFail($id);// menemukan data berdasarkan id
        $items = ProductGallery::with('product')
                ->where('products_id',$id)
                ->get();//
        
        return view('pages.products.gallery')->with(['product'=>$products,'items'=>$items]);

    }
}
