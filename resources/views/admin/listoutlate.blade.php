@extends('template')
@section('main')
@if (Auth::check() && Auth::user()->level == 'admin')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List User/Outlet</h4>
                                <a href="{{route('register')}}">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Outlet</p>
                                </a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nama Outlet</th>
                                    	<th>Level</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $key => $tampil)
                                        <tr>
            <td>{{$tampil->name}}</td>
            <td>{{$tampil->level}}</td>
            <td><a href="{{route('user.edit',$tampil->id)}}"><span class="pe-7s-note"></span></a> |
                <a href="#" onclick="event.preventDefault();                                                   
                document.getElementById('delete-form{{$tampil->id}}').submit();"><span class="pe-7s-trash"></span></a>
                <form id="delete-form{{$tampil->id}}" action="{{route('user.destroy',$tampil->id)}}" method="POST" style="display: none;">
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
                        {{$user->links()}}
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