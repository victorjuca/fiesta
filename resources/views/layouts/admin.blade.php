<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Simple Responsive Admin</title>
        <!-- BOOTSTRAP STYLES-->
        {!!Html::style('admin/assets/css/bootstrap.css')!!}
        <!-- FONTAWESOME STYLES-->
        {!!Html::style('admin/assets/css/font-awesome.css')!!}
        <!-- CUSTOM STYLES-->
        {!!Html::style('admin/assets/css/custom.css')!!}

        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>

        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="assets/img/logo.png" />
                        </a>
                    </div>

                    <span class="logout-spn" >
                        <a href="#" style="color:#fff;">LOGOUT</a>  

                    </span>
                </div>
            </div>
            <!-- /. MENU  -->
            @include('admin.menu')
            <!-- /. CUERPO  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    @yield('content')
          
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 avida.com | Design by: <a href="http://avida.com" style="color:#fff;"  target="_blank">www.avida.com</a>
                </div>
            </div>
        </div>


        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        {!!Html::script('admin/assets/js/jquery-1.10.2.js')!!}
        <!-- BOOTSTRAP SCRIPTS -->
        {!!Html::script('admin/assets/js/bootstrap.min.js')!!}
        <!-- CUSTOM SCRIPTS -->
        {!!Html::script('admin/assets/js/custom.js')!!}


    </body>
</html>
