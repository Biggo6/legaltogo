
<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:34:23 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="">

        <title>@yield('title', 'Dashboard')</title>

        @include('incs.header')

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{url('assets/js/modernizr.min.js')}}"></script>



    </head>


    <body>

      <div class="modal fade" id="modal-cpass">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title"><i class="fa fa-edit"></i> Change Password </h3>
            </div>
            <div class="modal-body" style="">
              <form role="form" id="registerForm_CPass">

                {!!csrf_field()!!}

                <div class="form-group" id="currentPasswordArea">
                  <span style="display: flex; justify-content: space-between; margin-bottom: 10px">
                    <label for="currentPassword">Current Password:</label>
                  </span>
                  <input type="password" required class="form-control validate[required]" data-errormessage-value-missing="Current Password is required!" value="" data-prompt-position="bottomRight" id="currentPassword" name="currentPassword" placeholder="Enter Current Password">
                </div>

                <div id="getChangePasswordView"></div>

                @include('partials._buttonSave', ['btnId'=>'changePassword', 'title'=>'Change Password'])



              </form>

            </div>
          </div>
        </div>
      </div>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="{{url('dashboard')}}" class="logo"> <span>{{lapp()->app_name}}</span> </a>
                    </div>
                    <!-- End Logo container-->

                    @include('partials._extras')

                </div>
            </div>
            <!-- End topbar -->


            <!-- Navbar Start -->
            @include('partials._sidebar')
        </header>
        <!-- End Navigation Bar-->


        <!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    @yield('main')
                </div>
                <!-- Page-Title -->





                <!-- Footer -->
                @include('partials._footer')
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- End wrapper -->



        <!-- jQuery  -->
        @include('incs.footer')

        @yield('custom-scripts')

        <?php

        $urlCPass = route("app.getChangePasswordView");
        $customCodes = '
            $.get("' . $urlCPass . '", function(res){
                $("#currentPasswordArea").hide();
                $("#changePassword").hide();
                $("#getChangePasswordView").html(res);

            });
        ';

        ?>

        @include('partials._saveFunc', ['btnID'=>'changePassword', 'formID'=>'registerForm_CPass', 'route'=>'app.changePassword', 'routeWith'=>'permissions.refreshWith', 'redirectable'=>false, 'customCodes' => $customCodes])

    </body>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:35:17 GMT -->
</html>
