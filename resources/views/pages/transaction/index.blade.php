<!-- {{--  {{dd($items)}}  --}} -->
@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Transaksi Masuk</h4>
                </div>
                <div class="div card-body--">
                    <div  class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Nomor</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>{{$item->transaction_total}}</td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                        <span class="badge badge-info">
                                        @elseif($item->transaction_status == 'SUCESS')
                                        <span class="badge badge-success">
                                        @elseif($item->transaction_status == 'FAILED')
                                        <span class="badge badge-danger">
                                            @else 
                                            <span>
                                        @endif
                                            {{$item->transaction_status}}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->transaction_status =='PENDING')
                                            {{--  <a href="{{route('transaction.status',$items->id)}}?status=SUCCESS" 
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                            </a>

                                            <a href="{{route('transaction.status',$items->id)}}?status=FAILED" 
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-times"></i>
                                            </a>
                                              --}}
                                        @endif
                                        
                                        <a href="#mymodal"
                                        data-remote="{{route('transaction.show',$item->id)}}"
                                        data-togle="modal"
                                        data-target="#mymodal"
                                        data-title="Detail Transaksi {{$item->uuid}}"
                                        class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>


                                        <a href="{{route('transaction.edit',$item->id)}}" class="btn btn-primary sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>



                                        <form action="{{route('transaction.destroy',$item->id)}}" 
                                            method="post" class="d-inline">
                                            @csrf
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
                                            Foto tidak tersedia
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