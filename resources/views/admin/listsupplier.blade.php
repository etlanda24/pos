@if (Auth::check() && Auth::user()->level == 'admin')
@extends('template')
@section('main')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Supplier</h4>
                                <a href="{{route('supplier.create')}}">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Supplier</p>
                                </a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nama Supplier</th>
                                    	<th>Alamat</th>
                                    	<th>No Hp</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($supplier as $tampil)
                                        <tr>
            <td>{{$tampil->nama_supplier}}</td>
            <td>{{$tampil->alamat}}</td>
            <td>{{$tampil->no_hp}}</td>
            <td><a href="{{route('supplier.edit',$tampil->id)}}"><span class="pe-7s-note"></span></a> |
                <a href="#" onclick="event.preventDefault();      
                document.getElementById('delete-form{{$tampil->id}}').submit();"><span class="pe-7s-trash"></span></a>
                <form id="delete-form{{$tampil->id}}" action="{{route('supplier.destroy',$tampil->id)}}" method="POST" style="display: none;">
                     {{ csrf_field()}}
                     {{method_field('delete')}}
                </form>  
            </td>

        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        <div class="paging pull-right">
                        {{$supplier->links()}}
                        </div>
            </div>
                    </div>
@stop
@section('footer')
    @include('footer')
@stop
@else
<h1> Error 404 </h1>
@endif