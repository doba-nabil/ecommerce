<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layout.head')
</head>

<body>
<input type="hidden" value="{{URL::to('/')}}" id="base_url">
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<div class="wrapper theme-1-active pimary-color-red">
    <!-- Top Menu Items -->
@include('backend.layout.header')

<!-- Left Sidebar Menu -->
@include('backend.layout.navbar')
<!-- /Left Sidebar Menu -->

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
        <div style="height: 20px;"></div>
        @section('backend-main')

        @show
            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p><a href="https://7loll.net/">Designed & developed by 7loll.net</a></p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->

        </div>
    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->
@include('backend.layout.footer')
</body>
</html>