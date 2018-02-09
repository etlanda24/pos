<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Barang;
use App\User;
use App\kategori;
use DB;
use Auth;
use Session;
use Excel;
class BarangController extends Controller
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
    public function index()
    {
    //$barang = DB::table('barangs')->orderBy('created_at','desc')->get();
    $barang = User::find(Auth::user()->id)->Barang;
   //dd($barang);
        return view('barang.listbarang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $barang = Barang::all();
        $list_supplier = Supplier::all();
        $kategori = kategori::all();
        //dd($list_supplier);
        return view('barang.create', compact('barang','list_supplier','kategori'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barang::create($request->all());
        Session::flash('flash_message', 'Data berhasil disimpan.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $barang = DB::table('barangs')
                    ->orderBy('jumlah_barang', 'asc')
                    ->get();
         return view('admin.listbarang',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      //  $kelas = Kelas::pluck('nama_kelas','kode_kelas');

        $barang = Barang::find($id);
        $supplier = Supplier::pluck('nama_supplier','id');
        return view('barang.editbarang',compact('barang','supplier'));
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
        Barang::find($id)->update($request->all());
        Session::flash('flash_message', 'Data berhasil diupdate.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Barang::find($id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus.');
        return back();   //
    }
    public function export()
    {
        $id = User::find(Auth::user()->id)->id;
        $cetak = Barang::where('user_id',$id)->get();
        return Excel::create('Daftar Barang', function($excel)use($cetak)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak)
            {
                $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
    }

    public function exportadmin()
    {
        $cetak = Barang::orderBy('jumlah_barang', 'asc')->get();
        return Excel::create('Daftar Barang', function($excel)use($cetak)
        {
            $excel->sheet('mySheet', function($sheet) use($cetak)
            {
                $sheet->fromArray($cetak);
            });
        })->export('xlsx'); 
    }
}
