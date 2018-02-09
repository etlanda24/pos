<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
    
         function proses(){
         var nilai1 = parseInt(document.fform.jumlah_barang.value);
         //var nilai1=document.getElementById("jumlah_barang").value;
         var nilai2=parseInt(document.fform.harga_barang.value);
         
         totalHarga = nilai1*nilai2;    
         document.fform.total_harga.value=eval(totalHarga);

            }
        function proseskembali(){
         var bayar=parseInt(document.fform.bayar.value);
         var thrg=parseInt(document.fform.total_harga.value);
        
         kembali = bayar-thrg;  
         document.fform.kembalian.value=eval(kembali);   
        }
       
</script>
@extends('template')

@section('main')
<legend>
    <center>
    <h2>Transaksi Barang</h2>
    </center>
</legend>        

<a href="{{route('transaksi.index')}}">
 <p class="pull-right"><i class="pe-7s-add-user"></i> List Transaksi</p>
 </a>
 
<form action="{{ url('query') }}" method="GET">
    
 <div class="row">
          <div class="input-field col s12">
           <input type="text" class="form-control" name="q" placeholder="Search ID">
           
          </div>
           </br>
          <center> <button type="submit" class="btn btn-info btn-fill">Search</button> </center>
    </div>

</form>
@include('_partial.flash_message')

@if (count($hasil))

@foreach($hasil as $data)

<form name="fform" method="post" action="{{route('transaksi.store')}}">
    {{ csrf_field() }}
    <div class="row">
<div class="col-md-12">
    <div class="form-group">
    <label>Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}" readonly>
    <input type="hidden" class="form-control" name="barang_id" value="{{ $data->id}}">
    </div>
    </div>
</div>

 <div class="row">
<div class="col-md-12">
    <div class="form-group">
    <label>Kategori Barang</label>
    <input type="text" class="form-control" name="kategori_barang" value="{{ $data->kategori_barang }}" readonly>
    </div>
    </div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="form-group">
    <label>Stok</label>
    <input type="text" class="form-control" name="stok" value="{{ $data->jumlah_barang }}" readonly>
    </div>
    </div>
</div>

 <div class="row">
<div class="col-md-12">
    <div class="form-group">
    <label>Harga Barang</label>
    <input type="text" class="form-control" name="harga_barang1" value="Rp. {{ $data->harga_barang }}" readonly>
    <input onkeyup="proses()" type="hidden" class="form-control" name="harga_barang" value="{{ $data->harga_barang }}" >
    </div>
    </div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="form-group">
    <label>Jumlah Barang</label>
    <input onkeyup="proses()" type="text" class="form-control" name="jumlah_barang" placeholder="Jumlah Beli">
    </div>
    </div>
</div>


</br>
<div class="row">
    <div class="col-md-4 pull-right">
    <div class="form-group">
    <label>Total Harga</label>
    <input type="text" class="form-control" placeholder="Total Harga" readonly="readonly" name="total_harga" readonly>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 pull-right">
    <div class="form-group">

    <input type="text" name="bayar" onkeyup="proseskembali()" class="form-control" placeholder="Uang Bayar">
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 pull-right">
    <div class="form-group">
    <label>Uang Kembalian</label>
    <input readonly="readonly" type="text" class="form-control" name="kembalian" placeholder="Uang Kembalian">
    </div>
    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id}}">
    </div>
    </div>
    <div class="col-md-4 pull-right">
    <button type="submit" class="btn btn-info btn-fill">Cetak <span class="pe-7s-print"></span></button>
    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
    <div class="clearfix"></div>
    </div>
</form>


@endforeach

@else




@endif
<script>
     $('#kode_barang').on('change',function(e){
            console.log(e);
            var cat_id = e.target.value;
            //ajax
            $.get('/ajax-subcat?cat_id=' + cat_id, function(data){

                $('#sub').empty();
                $.each(data, function(create, subcatObj){
                $.('#sub').append('<option value="'+subcatObj.harga_barang+'">'+subcatObj.harga_barang+'</option>');    
                });
            });
        });
</script>
@stop

@section('footer')
    @include('footer')
@stop