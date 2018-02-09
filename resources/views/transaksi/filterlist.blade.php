@extends('template')
@section('main')
<div class="col-md-12">
@include('_partial.flash_message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Transaksi</h4>
                                </br>
                                <a href="{{route('transaksi.create')}}">
                                <p class="pull-right"><i class="pe-7s-add-user"></i> Tambah Transaksi</p>
                                </a>

            <form action="{{ url('filter') }}" method="GET">
            <div class="row">
            <div class="col-md-3">
            <div class="form-group">
            <select class="form-control" name="tanggal">
            <option value="{{$tanggal}}">{{$tanggal}}</option>
            <option value="0">All</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>  


            </div>

            </div>
            <div class="col-md-3">
            <div class="form-group">
            <select class="form-control" name="bulan">
            <option value="{{$bulan}}">{{$ketb}}</option>
            <option value="0">All</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
            
            </select>  
            

            </div>

            </div>
            <div class="col-md-3">
            <button type="submit" class="btn btn-info btn-fill">Refresh</button>
             <button type="submit" value="cetak" class="btn btn-info btn-fill" formaction="{{ url('cetak') }}">Cetak</button>
            </div>

            </div>
            </form>
           


                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Beli</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($ambil as $tampil)
                                        <tr>
            <td>{{$tampil->id}}</td>
            <td>{{$tampil->kategori_barang}}</td>
            <td>{{$tampil->nama_barang}}</td>
            <td>{{$tampil->harga_barang}}</td>
            <td>{{$tampil->jumlah_barang}}</td>
            <td>{{$tampil->total_harga}}</td>

           
            </td>

        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>



                            </div>
                        <div class="paging pull-right">
                        
                        </div>
            </div>
                    </div>

                    <div class="row">
    <div class="col-md-4 pull-right">
    <div class="form-group">
    <label>{{$ket}}</label>
    <input type="text" class="form-control" placeholder="Total Harga" value="{{$total}}" name="total_harga" readonly>
    </div>
    </div>
    </div>
@stop
@section('footer')
    @include('footer')
@stop
