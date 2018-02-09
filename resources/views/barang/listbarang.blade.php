@extends('template')
@section('main')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Barang</h4>
                                <a href="{{route('barang.create')}}">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Barang</p>
                                </a>

                            </div>
                            </br>
                              <div class="col-md-3">
           <a href="{{ url('cetakbarang') }}"> <button type="submit" value="refresh" class="btn btn-info btn-fill">Cetak</button></a>   
            </div>
                      
                                <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Kode</th>
                                    	<th>Kategori</th>
                                    	<th>Nama Barang</th>
                                        <th>Jumlah / stok</th>
                                        <th>Harga</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($barang as $tampil)
                                        <tr>
            <td>{{$tampil->kode_barang}}</td>
            <td>{{$tampil->kategori_barang}}</td>
            <td>{{$tampil->nama_barang}}</td>
            <td>{{$tampil->jumlah_barang}}</td>
            <td>{{$tampil->harga_barang}}</td>
            <td><a href="{{route('barang.edit',$tampil->id)}}"><span class="pe-7s-note"></span></a> |
                <a href="#" onclick="event.preventDefault();      
                document.getElementById('delete-form{{$tampil->id}}').submit();"><span class="pe-7s-trash"></span></a>
                <form id="delete-form{{$tampil->id}}" action="{{route('barang.destroy',$tampil->id)}}" method="POST" style="display: none;">
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
                        
                        </div>
            </div>
                    </div>
@stop
@section('footer')
    @include('footer')
@stop
