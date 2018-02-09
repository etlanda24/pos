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