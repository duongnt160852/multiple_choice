@extends('sadmin.layout.index')
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
                        <a href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <p>QUẢN LÝ THÍ SINH</p></a>
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/user/list">
                                        <p>DANH SÁCH THÍ SINH</p>
                                    </a>
                                </li>
                                <li id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/user/add">
                                        <p>THÊM THÍ SINH</p>
                                    </a>
                                </li>      
                            </ul>
                        </div>
                    </li>  
                    <li>
                        <a href="#subQuestion" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ CÂU HỎI</p></a>
                        <div id="subQuestion" class="collapse ">
                            <ul class="nav">
                                <li id="questionList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/question/list">
                                        <p>DANH SÁCH CÂU HỎI</p>
                                    </a>
                                </li>
                                <li id="questionAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/question/add">
                                        <p>THÊM CÂU HỎI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ MÔN THI</p></a>
                        <div id="subSubject" class="collapse ">
                            <ul class="nav">
                                <li id="subjectList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/subject/list">
                                        <p>DANH SÁCH MÔN THI</p>
                                    </a>
                                </li>
                                <li id="subjectAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/subject/add">
                                        <p>THÊM MÔN THI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subTopic" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ CHỦ ĐỀ</p></a>
                        <div id="subTopic" class="collapse">
                            <ul class="nav">
                                <li id="topicList"  style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/topic/list">
                                        <p>DANH SÁCH CHỦ ĐỀ</p>
                                    </a>
                                </li>
                                <li id="topicAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/topic/add">
                                        <p>THÊM CHỦ ĐỀ</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subExam" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ ĐỀ THI</p></a>
                        <div id="subExam" class="collapse in ">
                            <ul class="nav">
                                <li id="examList" class="active" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/exam/list">
                                        <p>DANH SÁCH ĐỀ THI</p>
                                    </a>
                                </li>
                                <li id="examAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/exam/add">
                                        <p>THÊM ĐỀ THI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subAdmin" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <p>QUẢN LÝ ADMIN</p></a>
                        <div id="subAdmin" class="collapse ">
                            <ul class="nav">
                                <li id="adminList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/admin/list">
                                        <p>DANH SÁCH ADMIN</p>
                                    </a>
                                </li>
                                <li id="adminAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/admin/add">
                                        <p>THÊM ADMIN</p>
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
                <form action="sadmin/exam/edit/{{$exam->id}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                               {{session('thongbao')}}
                                            </div>
                                        @endif
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đề thi</label>
                                                <input type="text" class="form-control border-input" required="" name="name" value="{{$exam->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Thời gian( phút)</label>
                                                <input type="text" class="form-control border-input" required="" name="time" value="{{$exam->time}}" pattern="[1-9][0-9]{0,2}" title="Nhập sai thời gian">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Sửa</button>
                                        <a href="sadmin/exam/list" class="btn btn-info btn-fill btn-wd">Hủy</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
    $("title").html("Sửa đề thi");
    </script>
@endsection