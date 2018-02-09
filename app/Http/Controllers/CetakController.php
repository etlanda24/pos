<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class CetakController extends Controller
{
 	public function ExportClients()
 	{
 		Excel::create('clients', function($excel){
 			$excel->sheet('clients', function($sheet){
 				$sheet->loadView('barang.listbarang');
 			});
 		})->export('xlsx');
 	}

}
