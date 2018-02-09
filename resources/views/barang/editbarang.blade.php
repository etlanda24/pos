@extends('template')

@section('main')
@include('_partial.flash_message')
<br>
    <legend><center><h2>Update data Barang</h2></center></legend>

<form method="post" action="{{route('barang.update',$barang->id)}}">
{{ csrf_field() }}
{{method_field('put')}}
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>Kode Barang</label>
		<input type="text" name="kode_barang" class="form-control" placeholder="Nama Suplier" value="{{$barang->kode_barang}}" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label></label>
		<input type="text" class="form-control" name="kategori_barang" value="{{$barang->kategori_barang}}" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">

            {!! Form::label('supplier_id', 'Nama Supplier') !!}
                            {!! Form::select('supplier_id', $supplier ,null , array('class' => 'form-control')) !!}
            
</div>
        </div>
    </div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}">
            </div>
        </div>
</div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">
                <input type="text" name="jumlah_barang" class="form-control" value="{{$barang->jumlah_barang}}">
            </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="harga_barang" value="{{$barang->harga_barang}}">
            </div>
        </div>
        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id}}">
        </div>
<button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
<div class="clearfix"></div>
</form>
@stop

@section('footer')
    @include('footer')
@stop



