@extends('template')
@section('main')
@if (Auth::check() && Auth::user()->level == 'admin')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Barang</h4>
                                <br>
            <form action="{{ url('filteradmin') }}" method="GET">
            <div class="row">
            <div class="col-md-3">
            <div class="form-group">
            <select class="form-control" name="outlet">
            <option value="0">--Pilih Outlet--</option>
            <option value="0">All</option>
            @foreach($list_outlet as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>  
            </div>
            </div>


           
            <div class="col-md-3">
            <div class="form-group">
            <select class="form-control" name="bulan">
            <option value="0">--Pilih Bulan--</option>
            <option value="0">All</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
            
            </select>  
            

            </div>

            </div>
            <div class="col-md-3">
            <button type="submit" value="refresh" class="btn btn-info btn-fill">Refresh</button>
            <button type="submit" value="cetak" class="btn btn-info btn-fill" formaction="{{ url('cetaktadmin') }}">Cetak</button>
            </div>

            </div>  
          
            </form>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Kode Outlet</th>
                                    	<th>Nama Barang</th>
                                        <th>Jumlah Beli</th>
                                        <th>Total Harga</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($listadmin as $key)
                                        <tr>
            <td>{{$key->id}}</td>
            <td>{{$key->user_id}}</td>
            <td>{{$key->nama_barang}}</td>
            <td>{{$key->jumlah_barang}}</td>
            <td>{{$key->total_harga}}</td>

            
        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        
                        </div>
                    </div>
    <div class="row">
    <div class="col-md-4 pull-right">
    <div class="form-group">
    <label>Total Pendapatan</label>
    <input type="text" class="form-control" placeholder="Total Harga" value="{{$totalharga}}" name="total_harga" readonly>
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