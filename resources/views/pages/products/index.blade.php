@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Barang</h4>
                </div>
                <div class="div card-body--">
                    <div  class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>e</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barang as $barang2)
                                <tr>
                                    <td>{{$barang2->id}}</td>
                                    <td>{{$barang2->name}}</td>
                                    <td>{{$barang2->type}}</td>
                                    <td>{{$barang2->price}}</td>
                                    <td>{{$barang2->quantity}}</td>
                                    <td>

                                        <a href="#" class="btn btn-info sm">
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a href="{{route('products.edit',$barang2->id)}}" class="btn btn-primary sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('products.destroy',$barang2->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            <button class="btn btn-danger btn-md">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @endforelse
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection