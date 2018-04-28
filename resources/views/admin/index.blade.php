<!doctype html>
@include('admin.header')

<body>
     <!-- Here is Left Menu -->
    @include('admin.leftmenu')
    
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.headera')
       <!-- /header -->

        <div class="content mt-3">

           @yield('content')
           
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    @include('admin.footer')
</body>
</html>
