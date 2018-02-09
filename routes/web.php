<?php



Route::get('/', function () {
    return view('auth.login');
});
/*
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->post('logout', 'Auth\AuthController@logout');

$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\RegisterController@register');

$this->get('password/reset/{token?}', 'Auth\PasswordController@register');

$this->get('register','Auth\RegisterController@register');
$this->get('register', 'Auth\RegisterController@showRegistrationForm');
*/
Auth::routes();


Route::get('/admin',  function(){
	return view('admin.login');
});

Route::group(['middleware' => ['web']], function () {
Route::resource('/barang', 'BarangController');    //
});

Route::get('/home', 'HomeController@index');
Route::resource('/transaksi', 'TransaksiController');

Route::resource('/user','UserController');
Route::resource('/supplier', 'SupplierController');
//Route::resource('/kategori', 'KategoriController');
Route::resource('/listoutlet', 'ListoutletController');
Route::get('query', 'TransaksiController@search');
Route::get('filter', 'TransaksiController@show');
Route::get('cetak', 'TransaksiController@export');
Route::get('cetakbarang', 'BarangController@export');
Route::get('cetakbarangadmin', 'BarangController@exportadmin');
Route::get('listbarang', 'BarangController@show');
Route::get('listtransaksi', 'TransaksiController@listadmin');
Route::get('filteradmin', 'TransaksiController@listadminfilter');
Route::get('cetaktadmin', 'TransaksiController@exporttadmin');
Route::get('listkategori', 'TransaksiController@kategori');
Route::get('tambahkategori', 'TransaksiController@tambahkategori');
Route::post('simpankategori', 'TransaksiController@simpankategori');
