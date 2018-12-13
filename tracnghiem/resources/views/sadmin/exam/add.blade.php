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
                        <div id="subTopic" class="collapse ">
                            <ul class="nav">
                                <li id="topicList" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                        <div id="subExam" class="collapse in">
                            <ul class="nav">
                                <li id="examList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="sadmin/exam/list">
                                        <p>DANH SÁCH ĐỀ THI</p>
                                    </a>
                                </li>
                                <li id="examAdd" class="active" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm Đề Thi</h4>
                            </div>
                            <div class="content">
                                <form action="sadmin/exam/add" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('loi'))
                                            <div class="alert alert-danger" style="width: 30%">
                                                {{session('loi')}}
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                {{session('thongbao')}}
                                            </div>
                                        @endif
                                        <div class="row"> 
                                            <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Tên Đề Thi</label>
                                                    </div>
                                                    <input class="form-control border-input" type="text" name="name" value="" placeholder="Tên đề thi" required="">
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="subject" id="subject1">
                                                        @foreach($subject as $su)
                                                            <option value="{{$su->id}}">{{$su->name}}</option>}
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control border-input" id="topic1" name="topic">
                                                    </select> 
                                                </div> 
                                            </div>
                                     <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 1</label>
                                                </div>
                                                <select class="form-control border-input" name="level1" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 2</label>
                                                </div>
                                                <select class="form-control border-input" name="level2" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 3</label>
                                                </div>
                                                <select class="form-control border-input" name="level3" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                    </div>  
                                    <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 4</label>
                                                </div>
                                                <select class="form-control border-input" name="level4" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 5</label>
                                                </div>
                                                <select class="form-control border-input" name="level5" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                    </div>   
                                    <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Thời gian thi</label>
                                                    </div>
                                                    <input class="form-control border-input" type="text" name="time" value="" placeholder="Thời gian thi(phút)" required="" pattern="[1-9][0-9]{0,2}" title="Nhập sai thời gian">>
                                                </div> 
                                                
                                    </div>                                  
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#examAdd').addClass("active");
            $("title").html("Thêm đề thi");
            $("#examList").css("display","block");
            $("#examAdd").css("display","block");
            $.get("sadmin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                $('#topic1').html(data);
            });

            $('#subject1').change(function(){
                $.get("sadmin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                    $('#topic1').html(data);
                });
            });
        });
    </script>
@endsection
