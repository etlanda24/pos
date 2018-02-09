<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use App\User;
use App\kategori;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listadmin()
    {   
        $list_outlet = User::where('level','operator')->get();
        $listadmin = DB::table('transaksis')
                    ->orderBy('id', 'asc')
                    ->get();
        $totalharga = $listadmin->sum('total_harga');
         return view('admin.listtransaksi',compact('listadmin','list_outlet','totalharga'));
    }
    public function listadminfilter(Request $request)
    {   
         $bulan = $request->get('bulan');
         $outlet = $request->get('outlet');
         $namaoutlet = User::where('id',$outlet)->get();
if($bulan==0){
    $ketb = "All";
}else if($bulan==1){
    $ketb = "Januari";
}else if($bulan==2){
    $ketb = "Februari";
}else if($bulan==3){
    $ketb = "Maret";
}else if($bulan==4){
    $ketb = "April";
}else if($bulan==5){
    $ketb = "Mei";
}else if($bulan==6){
    $ketb = "Juni";
}else if($bulan==7){
    $ketb = "Juli";
}else if($bulan==8){
    $ketb = "Agustus";
}else if($bulan==9){
    $ketb = "September";
}else if($bulan==10){
    $ketb = "Oktober";
}else if($bulan==11){
    $ketb = "November";
}else if($bulan==12){
    $ketb = "Desember";
}
        $list_outlet = User::where('level','operator')->get();
        
if($outlet==0 && $bulan==0)
{

 $listadmin = DB::table('transaksis')
                    ->orderBy('id', 'asc')
                    ->get();

 $totalharga = $listadmin->sum('total_harga');

}else if($bulan==0)
{
 $listadmin = DB::table('transaksis')->where('user_id',$outlet)
                    ->orderBy('id', 'asc')
                    ->get();
 $totalharga = $listadmin->sum('total_harga');
}else if($outlet==0)
{
  $listadmin = DB::table('transaksis')->whereMonth('created_at',$bulan)
                    ->orderBy('id', 'asc')
                    ->get();   
 $totalharga = $listadmin->sum('total_harga');
}else


        $listadmin = DB::table('transaksis')->where('user_id',$outlet)->whereMonth('created_at',$bulan)
                    ->orderBy('id', 'asc')
                    ->get();
         $totalharga = $listadmin->sum('total_harga');
         return view('admin.listtransaksi_filter',compact('listadmin','list_outlet','outlet','bulan','ketb','namaoutlet','totalharga'));
    }
    public function exporttadmin(Request $request)
    {
          $bulan = $request->get('bulan');
         $outlet = $request->get('outlet');
         $namaoutlet = User::where('id',$outlet)->get();
if($bulan==0){
    $ketb = "All";
}else if($bulan==1){
    $ketb = "Januari";
}else if($bulan==2){
    $ketb = "Februari";
}else if($bulan==3){
    $ketb = "Maret";
}else if($bulan==4){
    $ketb = "April";
}else if($bulan==5){
    $ketb = "Mei";
}else if($bulan==6){
    $ketb = "Juni";
}else if($bulan==7){
    $ketb = "Juli";
}else if($bulan==8){
    $ketb = "Agustus";
}else if($bulan==9){
    $ketb = "September";
}else if($bulan==10){
    $ketb = "Oktober";
}else if($bulan==11){
    $ketb = "November";
}else if($bulan==12){
    $ketb = "Desember";
}
        $list_outlet = User::where('level','operator')->get();
        
if($outlet==0 && $bulan==0)
{

  $cetak = Transaksi::select('id','user_id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi', function($excel)use($cetak)
        {

            $excel->sheet('mySheet', function($sheet) use($cetak)


            {
               
               
                $sheet->cell('H1', function($cell) {
                    $barangs = User::find(Auth::user()->id)->id;
 $total= Transaksi::sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});
           



                 $sheet->fromArray($cetak, null, 'A2', true);

            });

        })->export('xlsx');
}
else if($outlet==0)
{
    $total = DB::table('transaksis')
                    ->whereMonth('created_at', $bulan)->sum('total_harga');
   $cetak = Transaksi::whereMonth('created_at', $bulan)->select('id','user_id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Bulan '.$bulan.'', function($excel)use($cetak,$bulan,$outlet)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$outlet)
            {
                   $sheet->cell('H1', function($cell) use($bulan) {
                   
 $total= Transaksi::whereMonth('created_at', $bulan)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}
else if($bulan==0)
{
      $total = DB::table('transaksis')->where('user_id',$outlet)
                    ->sum('total_harga');
   $cetak = Transaksi::where('user_id',$outlet)->select('id','user_id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Outlet '.$outlet.'', function($excel)use($cetak,$bulan,$outlet)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$outlet)
            {
                   $sheet->cell('H1', function($cell) use($outlet) {
                    
 $total= Transaksi::where('user_id',$outlet)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}else{

 $total = DB::table('transaksis')->where('user_id',$outlet)
                   
                    ->whereMonth('created_at', $bulan)->sum('total_harga');

     $cetak = Transaksi::where('user_id',$outlet)->whereMonth('created_at', $bulan)->select('id','user_id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Outlet '.$outlet.' Bulan '.$ketb.'', function($excel)use($cetak,$bulan,$outlet)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$outlet)
            {
                   $sheet->cell('H1', function($cell) use($bulan,$outlet) {
                    
 $total= Transaksi::where('user_id',$outlet)->whereMonth('created_at',$bulan)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}


    }
    public function index()
    {

    $barangs = User::find(Auth::user()->id)->id;
      $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->sum('total_harga');

      
      $ambil = DB::table('transaksis')->where('user_id',$barangs)->get();
             //   ->whereDate('created_at', '2017-01-01')
             //   ->get();

       //$barang = User::find(Auth::user()->id)->Transaksi;   
       // $jumlah  = count($barang->total_harga);


       //tanggal
       //whereDay('created_at', '=', date('d'));
       return view('transaksi/listtransaksi', compact('total','ambil','barangs')); 

       
       //$listt = DB::table('transaksis')->get();
       //return view ('transaksi/listtransaksi', ['list' => $listt ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('transaksi.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $barang_id = Input::get('barang_id');
        $stok = Input::get('stok');
        $jumlahbeli = Input::get('jumlah_barang');
        $sisastok = $stok - $jumlahbeli;

        Transaksi::create($request->all());
        Session::flash('flash_message', 'Transaksi berhasil ...');


//update stok
        $barang = Barang::where('id' , $barang_id)->first();
        $barang->jumlah_barang = $sisastok;
        $barang->save();

         return back();
         Session::flash('flash_message', 'Transaksi berhasil ...');
        //return view ('transaksi.sini',['sisastok' => $sisastok , 'barang_id' => $barang_id]);
        //return action ('TransaksiController@edit',['sisastok' => $sisastok , 'barang_id' => $barang_id]);
        //return redirect()->route('transaksi.edit',['sisastok' => $sisastok , 'barang_id' => $barang_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {





        //filterlist
         $tanggal = $request->get('tanggal');
         $bulan = $request->get('bulan');
         $barangs = User::find(Auth::user()->id)->id;


if($bulan==0){
    $ketb = "All";
}else if($bulan==1){
    $ketb = "Januari";
}else if($bulan==2){
    $ketb = "Februari";
}else if($bulan==3){
    $ketb = "Maret";
}else if($bulan==4){
    $ketb = "April";
}else if($bulan==5){
    $ketb = "Mei";
}else if($bulan==6){
    $ketb = "Juni";
}else if($bulan==7){
    $ketb = "Juli";
}else if($bulan==8){
    $ketb = "Agustus";
}else if($bulan==9){
    $ketb = "September";
}else if($bulan==10){
    $ketb = "Oktober";
}else if($bulan==11){
    $ketb = "November";
}else if($bulan==12){
    $ketb = "Desember";
}


if($tanggal==0 && $bulan==0)
{
   $total = DB::table('transaksis')->where('user_id',$barangs)->sum('total_harga');


      $ambil = DB::table('transaksis')->where('user_id',$barangs)
                    ->get();

    $ket = "Total Pendapatan ";  
}
else if($tanggal==0)
{
 $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereMonth('created_at', $bulan)->sum('total_harga');


      $ambil = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereMonth('created_at', $bulan)
                    ->get();

    $ket = "Total Pendapatan Bulan " .$ketb. "";
}
else if($bulan==0)
{
     $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)->sum('total_harga');


      $ambil = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)
                    ->get();
    $ket = "Total Pendapatan Tanggal " .$tanggal. "";
}else{


      $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)
                    ->whereMonth('created_at', $bulan)->sum('total_harga');


      $ambil = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)
                    ->whereMonth('created_at', $bulan)
                    ->get();

                     $ket = "Total Pendapatan Tanggal ".$tanggal. " Bulan " .$ketb. "";
}
       //$barang = User::find(Auth::user()->id)->Transaksi;   
       // $jumlah  = count($barang->total_harga);


       //tanggal
       //whereDay('created_at', '=', date('d'));
      

       
       //$listt = DB::table('transaksis')->get();
       //return view ('transaksi/listtransaksi', ['list' => $listt ]);




        return view ('transaksi.filterlist', compact('tanggal', 'bulan','total','barangs','ambil','ket','ketb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function kategori()
    {
        $kategori = kategori::all();
         return view ('admin.kategori', compact('kategori'));
    } 
    public function tambahkategori()
    {
        return view ('admin.addkategori');
    }
    public function simpankategori(Request $request)
    {
         kategori::create($request->all());
        Session::flash('flash_message', 'Data berhasil disimpan.');
        return back();
    }

    public function search(Request $request)
    {
         $barangs = User::find(Auth::user()->id)->id;
        $query = $request->get('q');
        $hasil = Barang::where('kode_barang',$query)->where('user_id',$barangs)->get();
        
        return view ('transaksi.cari', compact('hasil', 'query'));
    }


    public function export(Request $request)
    {

        $tanggal = $request->get('tanggal');
         $bulan = $request->get('bulan');
        $id = User::find(Auth::user()->id)->id;
$barangs = User::find(Auth::user()->id)->id;

if($bulan==0){
    $ketb = "All";
}else if($bulan==1){
    $ketb = "Januari";
}else if($bulan==2){
    $ketb = "Februari";
}else if($bulan==3){
    $ketb = "Maret";
}else if($bulan==4){
    $ketb = "April";
}else if($bulan==5){
    $ketb = "Mei";
}else if($bulan==6){
    $ketb = "Juni";
}else if($bulan==7){
    $ketb = "Juli";
}else if($bulan==8){
    $ketb = "Agustus";
}else if($bulan==9){
    $ketb = "September";
}else if($bulan==10){
    $ketb = "Oktober";
}else if($bulan==11){
    $ketb = "November";
}else if($bulan==12){
    $ketb = "Desember";
}

if($tanggal==0 && $bulan==0)
{

  $cetak = Transaksi::where('user_id',$id)->select('id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi', function($excel)use($cetak)
        {

            $excel->sheet('mySheet', function($sheet) use($cetak)


            {
               
               
                $sheet->cell('H1', function($cell) {
                    $barangs = User::find(Auth::user()->id)->id;
 $total= Transaksi::where('user_id',$barangs)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);

            });

        })->export('xlsx');
}
else if($tanggal==0)
{
    $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereMonth('created_at', $bulan)->sum('total_harga');
   $cetak = Transaksi::where('user_id',$id)->whereMonth('created_at', $bulan)->select('id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Bulan '.$bulan.'', function($excel)use($cetak,$bulan,$tanggal)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$tanggal)
            {
                   $sheet->cell('H1', function($cell) use($bulan) {
                    $barangs = User::find(Auth::user()->id)->id;
 $total= Transaksi::where('user_id',$barangs)->whereMonth('created_at', $bulan)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}
else if($bulan==0)
{
      $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)->sum('total_harga');
   $cetak = Transaksi::where('user_id',$id)->whereDay('created_at', $tanggal)->select('id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Tanggal '.$tanggal.'', function($excel)use($cetak,$bulan,$tanggal)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$tanggal)
            {
                   $sheet->cell('H1', function($cell) use($tanggal) {
                    $barangs = User::find(Auth::user()->id)->id;
 $total= Transaksi::where('user_id',$barangs)->whereDay('created_at', $tanggal)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}else{

 $total = DB::table('transaksis')->where('user_id',$barangs)
                    ->whereDay('created_at', $tanggal)
                    ->whereMonth('created_at', $bulan)->sum('total_harga');

     $cetak = Transaksi::where('user_id',$id)->whereDay('created_at', $tanggal)->whereMonth('created_at', $bulan)->select('id','nama_barang','kategori_barang','harga_barang','jumlah_barang','total_harga')->get();
        return Excel::create('Daftar Transaksi Tanggal '.$tanggal.' Bulan '.$ketb.'', function($excel)use($cetak,$bulan,$tanggal)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak,$bulan,$tanggal)
            {
                   $sheet->cell('H1', function($cell) use($bulan,$tanggal) {
                    $barangs = User::find(Auth::user()->id)->id;
 $total= Transaksi::where('user_id',$barangs)->whereDay('created_at',$tanggal)->whereMonth('created_at',$bulan)->sum('total_harga');
    // manipulate the cell
    $cell->setValue("Total Pendapatan = ".$total);

});

                 $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
}




    //     $cetak = Transaksi::where('user_id',$id)->get();
    //     return Excel::create('Daftar Transaksi', function($excel)use($cetak)
    //     {
    //         $excel->sheet('mySheet', function($sheet) use($cetak)
    //         {
    //             $sheet->fromArray($cetak);
    //         });
    //     })->export('xlsx');
    // 
}
    
}
