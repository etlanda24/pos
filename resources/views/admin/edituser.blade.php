@extends('template')
@section('main')
<div class="box box-solid">
	<div class="box-header with-border">

	</div>
	@include('_partial.flash_message')
    <form method="post" action="/user/{{ $user->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    	<div class="box-body">
			<div class="form-group">
				<label>Nama</label>
				<div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Password</label>
				<div class="row">
					<div class="col-md-12">
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Level</label>
				<div class="row">
					<div class="col-md-12">
					<input type="level" class="form-control" name="level" value="{{ old('level', $user->level) }}">
					</div>
				</div>
			</div>
    	</div>
    	<div class="box-footer">
    		<button type="submit" class="btn btn-primary pull-right">Simpan</button>
    	</div>
    </form>
</div>
@stop