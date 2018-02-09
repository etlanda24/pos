
 <!-- batas-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>P.O.S</title>
    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  </head>
  <body>
    <div class="wrapper">
  <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
      <div class="sidebar-wrapper">
      @include('sidebarleft-adm')
      </div>
  </div>
  <div class="main-panel">
      @include('navbar-admin')
  
  <div class="content">
  <div class="container-fluid">
@if (Auth::check() && Auth::user()->level == 'admin')
  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <center>
                                <h4 class="title">Point Of Sale => BAM</h4>
                                </center>
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                <a href="{{route ('user.index')}}">
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><span class="pe-7s-users"></span>
                                      <b>List Outlet</b>
                                    </div>
                                    </div>
                                    </a>
                                    <a href="{{route('supplier.index')}}">
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-arc"></i>
                                      <b>List Supplier</b>
                                    </div>
                              </div>
                              </a>
                            </div>
                          </div>
                           </div>
                              </div>
                                  </div>
                
@else
  <div class="content all-icons">
                                <div class="row">
                                <a href="{{route ('transaksi.create')}}">
                                  <div class="font-icon-list col-lg-8 col-md-8 col-sm-8 col-xs-8 col-xs-8">
                                    <div class="font-icon-detail"><span class="pe-7s-cart"></span>
                                      <b>Transaksi</b>
                                    </div>
                                    </div>
                                    </a>
                                    <a href="{{route('barang.index')}}">
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-credit"></i>
                                      <b>List Barang</b>
                                    </div>
                              </div>
                              </a>
                            </div>
                          </div>
@endif
     </div>
  </div>
  
    @include('footer')
</div>
  </div>
<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>

  <!--  Charts Plugin -->
  <script src="/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="/assets/js/light-bootstrap-dashboard.js"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="/assets/js/demo.js"></script>
  <script src="/js/jquery.maskMoney.js"></script>
  <script type="text/javascript">
  
      $(document).ready(function(){

          demo.initChartist();

          $.notify({
              icon: 'pe-7s-gift',
              message: "Welcome ."

            },{
                type: 'info',
                timer: 4000
            });

      });



  </script>
  </body>
</html>
