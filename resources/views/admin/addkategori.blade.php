@extends('template')

@section('main')
@include('_partial.flash_message')
<br>
    <legend><center><h2>Tambah Kategori</h2></center></legend>

<form method="post" action="{{url('simpankategori')}}">
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="form-group">
		<input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" required>
</div>
</div>
</div>

<button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
<div class="clearfix"></div>
</form>
@stop

@section('footer')
    @include('footer')
@stop



