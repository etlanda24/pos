@if (Auth::check() && Auth::user()->level == 'admin')      
<div class="logo">
                <span class="simple-text">
                    Administator
                </span>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{route ('user.index')}}">
                        <i class="pe-7s-cart"></i>
                        <p>List Outlet</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('listbarang') }}">
                        <i class="pe-7s-credit"></i>
                        <p>Stok Barang</p>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('listtransaksi') }}">
                        <i class="pe-7s-credit"></i>
                        <p>List Transaksi</p>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('listkategori') }}">
                        <i class="pe-7s-credit"></i>
                        <p>List Kategori</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('supplier.index')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Suplier</p>
                    </a>
                </li>
                
                
            </ul>
@else
<div class="logo">
                <span class="simple-text">
                    P.O.S
                </span>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{route ('transaksi.create')}}">
                        <i class="pe-7s-cart"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('barang.index')}}">
                        <i class="pe-7s-credit"></i>
                        <p>List Barang</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
@endif