

@include('Inc.header_tags')
<body>
<div class="wrapper">
@include('Inc.sidebar')

<!-- Page Content  -->
    <div id="content">
       @include('Inc.top_nav')
        <div id="container" class="container-fluid">
            @yield('content')

        </div>

    </div>
</div>
</body>

{{--<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>--}}
{{--<script src="js/myScript.js"></script>--}}
@include('Inc.footer')

{{--// If you wish you can have a separate section for javascript that's strictly for one page--}}

@yield('script')
</html>


