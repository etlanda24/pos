@extends('template')
@section('main')
@if (Auth::check() && Auth::user()->level == 'admin')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Barang</h4>
                                <a href="{{ url('tambahkategori') }}"">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Kategori</p>
                                </a>
                                <br>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Id</th>
                                    	<th>Nama Kategori</th>
                                    	
                                    </thead>
                                    <tbody>
                                    @foreach ($kategori as $key)
                                        <tr>
            <td>{{$key->id}}</td>
            <td>{{$key->kategori}}</td>
            

            
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