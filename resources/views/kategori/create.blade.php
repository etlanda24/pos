@extends('template')

@section('main')
	<legend>
		<center>
        <h2>Tambah Kategori</h2>
        </center>
	</legend>        
<form>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>Nama Kategori</label>
<input type="text" class="form-control bg-warning" placeholder="Nama Kategori">
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