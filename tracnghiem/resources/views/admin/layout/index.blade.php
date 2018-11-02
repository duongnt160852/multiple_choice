<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <base href="{{asset('')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> --}}
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>

</head>
<body>

<div class="wrapper">
    @include('admin.layout.menu')

    <div class="main-panel">
        
        @include('admin.layout.header')

        @yield('content')


        @include('admin.layout.footer')

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
</script>
    

    <script>
        $(document).ready(function(){
            $('#user').click(function(){
                $('#examList').css("display","none");
                $('#examAdd').css("display","none");
                $('#topicList').css("display","none");
                $('#topicAdd').css("display","none");
                $('#questionList').css("display","none");
                $('#questionAdd').css("display","none");
                $('#subjectList').css("display","none");
                $('#subjectAdd').css("display","none");
                $('#userList').slideToggle("fast");
                $('#userAdd').slideToggle("fast");
            });
            $('#question').click(function(){
                $('#examList').css("display","none");
                $('#examAdd').css("display","none");
                $('#topicList').css("display","none");
                $('#topicAdd').css("display","none");
                $('#userList').css("display","none");
                $('#userAdd').css("display","none");
                $('#subjectList').css("display","none");
                $('#subjectAdd').css("display","none");
                $('#questionList').slideToggle("fast");
                $('#questionAdd').slideToggle("fast");
            });
            $('#subject').click(function(){
                $('#examList').css("display","none");
                $('#examAdd').css("display","none");
                $('#topicList').css("display","none");
                $('#topicAdd').css("display","none");
                $('#questionList').css("display","none");
                $('#questionAdd').css("display","none");
                $('#userList').css("display","none");
                $('#userAdd').css("display","none");
                $('#subjectList').slideToggle("fast");
                $('#subjectAdd').slideToggle("fast");
            });
            $('#topic').click(function(){
                $('#examList').css("display","none");
                $('#examAdd').css("display","none");
                $('#questionList').css("display","none");
                $('#questionAdd').css("display","none");
                $('#userList').css("display","none");
                $('#userAdd').css("display","none");
                $('#subjectList').css("display","none");
                $('#subjectAdd').css("display","none");
                $('#topicList').slideToggle("fast");
                $('#topicAdd').slideToggle("fast");
            });
            $('#exam1').click(function(){
                $('#questionList').css("display","none");
                $('#questionAdd').css("display","none");
                $('#userList').css("display","none");
                $('#userAdd').css("display","none");
                $('#subjectList').css("display","none");
                $('#subjectAdd').css("display","none");
                $('#topicList').css("display","none");
                $('#topicAdd').css("display","none");
                $('#examList').slideToggle("fast");
                $('#examAdd').slideToggle("fast");
            });
        });
    </script>

    @yield('script')

</html>
