@extends('template')
@section('main')
@include('_partial.flash_message')

<legend><center>
        <h2>Tambah barang</h2>
        </center>
</legend>
        
<form method="post" action="{{route('barang.store')}}">
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
            <div class="form-group">
                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
            </div>
        </div>
</div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">
            <select class="form-control" name="kategori_barang">
            <option>--Pilih Kategori--</option>
            @foreach($kategori as $value)
            <option value="{{$value->id}}">{{$value->kategori}}</option>
            @endforeach
            </select>    
            </div>
        </div>
    </div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">
            <select class="form-control" name="supplier_id">
            <option>--Pilih Supplier--</option>
            @foreach($list_supplier as $value)
            <option value="{{$value->id}}">{{$value->nama_supplier}}</option>
            @endforeach
            </select>    
            </div>
        </div>
    </div>
    <div class="row">
<div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
            </div>
        </div></div>
        <div class="row">
<div class="col-md-12">
            <div class="form-group">
                <input type="text" name="jumlah_barang" class="form-control" placeholder="jumlah barang">
            </div>
        </div></div>
        <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="harga_barang" placeholder="harga barang">
            </div>
        </div>
        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id}}">
        </div>
<div class="col-md-4 pull-right">
<button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
</div>
<div class="clearfix"></div>
</form>
@stop

@section('footer')
    @include('footer')
@stop