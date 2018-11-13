@extends('admin.layout.index')
@section('menu')
<div class="sidebar" data-background-color="black" data-active-color="danger" >

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper " >
            <div class="logo">
                <a href="admin/home" class="simple-text">
                    Trắc Nghiệm
                </a>
            </div>
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                    <li id="home"> 
                        <a href="admin/home">
                            <i class="ti-home"></i>
                            <p>Trang Chủ</p>
                        </a>
                    </li>
                    <li id="user">
                        <a href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <span>QUẢN LÝ THÍ SINH</span></a>
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/user/list">
                                        <p>DANH SÁCH THÍ SINH</p>
                                    </a>
                                </li>
                                <li id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/user/add">
                                        <p>THÊM THÍ SINH</p>
                                    </a>
                                </li>      
                            </ul>
                        </div>
                    </li>  
                    <li>
                        <a href="#subQuestion" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <span>QUẢN LÝ CÂU HỎI</span></a>
                        <div id="subQuestion" class="collapse ">
                            <ul class="nav">
                                <li id="questionList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/question/list">
                                        <p>DANH SÁCH CÂU HỎI</p>
                                    </a>
                                </li>
                                <li id="questionAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/question/add">
                                        <p>THÊM CÂU HỎI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <span>QUẢN LÝ MÔN THI</span></a>
                        <div id="subSubject" class="collapse ">
                            <ul class="nav">
                                <li id="subjectList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/subject/list">
                                        <p>DANH SÁCH MÔN THI</p>
                                    </a>
                                </li>
                                <li id="subjectAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/subject/add">
                                        <p>THÊM MÔN THI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subTopic" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <span>QUẢN LÝ CHỦ ĐỀ</span></a>
                        <div id="subTopic" class="collapse ">
                            <ul class="nav">
                                <li id="topicList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/list">
                                        <p>DANH SÁCH CHỦ ĐỀ</p>
                                    </a>
                                </li>
                                <li id="topicAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/add">
                                        <p>THÊM CHỦ ĐỀ</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subExam" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <span>QUẢN LÝ ĐỀ THI</span></a>
                        <div id="subExam" class="collapse ">
                            <ul class="nav">
                                <li id="examList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/exam/list">
                                        <p>DANH SÁCH ĐỀ THI</p>
                                    </a>
                                </li>
                                <li id="examAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/exam/add">
                                        <p>THÊM ĐỀ THI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li>          
                </ul>
                </nav>
            </div>
            
        </div>
    </div>
@endsection
@section('content')

    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Tổng Số Thí Sinh </p>
                                            {{$count_user}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Thí Sinh Đang Thi</p>
                                             {{$count_online}}                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7" style="padding:0px">
                                        <div class="numbers">
                                            <p>Số câu hỏi đã đăng</p>
                                            {{$count_question}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-twitter-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Số đề thi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
                                  <h4 class="title">{{$adm->middlename." ".$adm->name}}<br /><!--Tên Admin-->
                                     <a style="cursor: pointer;"><small>{{$adm->email}}</small></a> <!--Nhập Địa Chỉ Email-->
                                  </h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nhà Quản Trị</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    @foreach($alladmin as $a)
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="avatar">
                                                        <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    {{$a->middlename." ".$a->name}}
                                                    <br />
                                                    
                                                    @if($a->status=="online")
                                                        <span class="text-success"><small>{{$a->status}}</small></span>
                                                    @else
                                                        <span class="text-muted"><small>{{$a->status}}</small></span>
                                                    @endif
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chỉnh Sửa Thông Tin Cá Nhân</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('postAdmin')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company" value="RABILOO">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tên Tài Khoản</label><!--Tên ADMIN-->
                                                <input type="text" class="form-control border-input" disabled value="{{$adm->username}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa Chỉ Email</label> <!--Email-->
                                                <input type="email" class="form-control border-input" value="{{$adm->email}}" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ Và Tên Đệm</label>
                                                <input type="text" class="form-control border-input"  value="{{$adm->middlename}}" name="middlename">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input type="text" class="form-control border-input"  value="{{$adm->name}}" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Địa Chỉ</label>
                                                <input type="text" class="form-control border-input" value="{{$adm->address}}" name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Cập Nhật</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $('#home').addClass("active");

            $('title').html("Trang chủ");

            demo.initChartist();

            $.notify({
                icon: 'ti-gift',
                message: "Welcome to multiplechoice.com"

            },{
                type: 'success',
                timer: 2000
            });

        });
    </script>
@endsection