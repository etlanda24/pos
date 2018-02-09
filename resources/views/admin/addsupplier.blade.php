@extends('template')

@section('main')
@include('_partial.flash_message')
<br>
    <legend><center><h2>Tambah Suplier</h2></center></legend>

<form method="post" action="{{route('supplier.store')}}">
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="form-group">
		<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Suplier" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
		<input type="text" class="form-control" placeholder="Alamat Suplier" name="alamat" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
		<input type="text" class="form-control" placeholder="NoHp Suplier" name="no_hp" required>
</div>
<input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id}}">
</div> 
</div>
<button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
<div class="clearfix"></div>
</form>
@stop

@section('footer')
    @include('footer')
@stop



