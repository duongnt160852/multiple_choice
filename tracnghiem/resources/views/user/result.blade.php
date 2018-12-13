<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <base href="{{asset('')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Kết Quả</title>

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


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
           <div class="logo">
                <a class="simple-text">
                    <h4 style="color:#AF4A92; font-weight: bold;">Trắc Nghiệm</h4>
                </a>
            </div>
           <div class="logo" align="center" style="font-size: 15px;font-weight: bold;color:#AF4A92;">
                Thí sinh: {{$user->name}}
            </div>
            <div class="logo" align="center" style="font-size: 15px;font-weight: bold;color:#AF4A92;">
                Email: {{$user->email}}
            </div>
            <div class="logo" align="center" style="font-size: 15px;font-weight:bold;color:#AF4A92;">
                Ngày sinh: {{$user->DoB}}
            </div>
        </div>
    </div>

    <div class="main-panel">
        

    
        <div class="content">
            <div class="container">
                <div class="text-center">
                    <h1 style="color:#009298; font-weight: bold; font-size:70px;">Bài Thi Môn {{$exam->topic->subject->name}}</h1>
                    <h3 style="color:#83C75D; font-style:italic; font-size:30px;">Đề thi: {{$exam->name}}</h3>
                    <h3 style="color:#83C75D; font-style:italic; font-size:30px;">Thời gian làm bài:{{$exam->time}} phút</h3>
                </div>
                <form action="user/result/{{$count}}/{{$total}}/{{$answer}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="text-center" style="margin-top:200px" >
                        <h3>Bạn đã hoàn thành bài thi với số câu đúng {{$count}}/{{$total}}</h3>
                    </div>
                    <div class="text-center" style="margin-top:100px">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Xem đáp án</button>
                    </div>
                </form>
                <div>
                    
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="">
                                Trac Nghiem
                            </a>
                        </li>
                        <li>
                            <a href="">
                               Liên Hệ
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Phiên Bản
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made <i class="fa fa-heart heart"></i> by <a href="">Nhom2</a>
                </div>
            </div>
        </footer>

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

    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>

    <script async type="text/javascript" src="mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML,local/local"></script>
    <script>
</html>
