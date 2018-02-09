@extends('template')
@section('main')
@if (Auth::check() && Auth::user()->level == 'admin')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Barang</h4>
                                <a href="{{route('register')}}">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Outlet</p>
                                </a>
                                <br>
                                <a href="{{ url('cetakbarangadmin') }}"> <button type="submit" value="refresh" class="btn btn-info btn-fill">Cetak</button></a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Kode Outlet</th>
                                    	<th>Kode  Barang</th>
                                    	<th>Kategori Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($barang as $key)
                                        <tr>
            <td>{{$key->user_id}}</td>
            <td>{{$key->kode_barang}}</td>
            <td>{{$key->kategori_barang}}</td>
            <td>{{$key->nama_barang}}</td>
            <td>{{$key->jumlah_barang}}</td>

            
        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        
                        </div>
                    </div>
@else
<p>menu</p>
@endif
@stop
@section('footer')
    @include('footer')
@stop