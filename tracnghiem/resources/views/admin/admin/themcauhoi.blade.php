@extends('admin.layout.index')
@section('title')
    <title>Thêm câu hỏi</title>
@endsection
@section('menu')
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="admin/trangchu" class="simple-text">
                    Trắc Nghiệm
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="admin/trangchu">
                        <i class="ti-home"></i>
                        <p>Trang Chủ</p>
                    </a>
                </li>
                <li >
                    <a href="admin/taikhoan">
                        <i class="ti-settings"></i>
                        <p>Thông Tin Người Dùng</p>
                    </a>
                </li>
                <li>
                    <a href="admin/quanlythisinh">
                        <i class="ti-user"></i>
                        <p>Quản Lý Thí Sinh</p>
                    </a>
                </li>
                <li>
                    <a href="admin/quanlycauhoi">
                        <i class="ti-gallery"></i>
                        <p>Quản Lý Câu Hỏi</p>
                    </a>
                </li>
                <li >
                    <a href="admin/themthisinh">
                        <i class="ti-plus"></i>
                        <p>Thêm Thí Sinh</p>
                    </a>
                </li>
                <li class="active">
                    <a href="admin/themcauhoi">
                        <i class="ti-plus"></i>
                        <p>Thêm Câu Hỏi</p>
                    </a>
                </li>
                <li>
                    <a href="admin/themmonthi">
                        <i class="ti-plus"></i>
                        <p>Thêm Môn Thi</p>
                    </a>
                </li>
                <li>
                    <a href="admin/themchude">
                        <i class="ti-plus"></i>
                        <p>Thêm Chủ Đề</p>
                    </a>
                </li>
                <li>
                    <a href="admin/thongbao">
                        <i class="ti-bell"></i>
                        <p>Thông báo</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Thí Sinh Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/themcauhoi" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                Thêm thành công
                                            </div>
                                        @endif
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control" id="subject" onchange="change(this.value)">
                                                        @foreach($subject as $su)
                                                            <option value="{{$su->ID}}">{{$su->name}}</option>}
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control" id="topic" name="topic">
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                       <label>Độ khó</label>
                                                    </div>
                                                    <select class="form-control" name="level">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select> 
                                                </div> 
                                            </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu Hỏi</label>
                                                <input type="text" class="form-control border-input" placeholder="Câu hỏi" required="" name="question">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án A</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án A" required="" name="A">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án B</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án B" required="" name="B">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án C</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án C" required="" name="C">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án D</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án D" required="" name="D">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row"> 
                                                   <div class="col-xs-6 col-md-6">
                                                    <label>Đáp Án Đúng</label>
                                                    <div class="form-group">
                                                    
                                                    <div class="col-sm-2">
                                                        A <input type="radio" name="answer" value="A" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        B <input type="radio" name="answer" value="B" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        C <input type="radio" name="answer" value="C" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        D <input type="radio" name="answer" value="D" required="">  
                                                    </div>
                                                  </div><!--dap an -->
                                                </div> 
                                        </div>
                                        <div class="row"> 
                                                   <div class="col-xs-12 col-md-12">
                                                    <label>Giải thích</label>
                                                    <div>
                                                        <textarea name="comment" rows='5' cols='160' ></textarea >
                                                    </div>
                                                </div> 
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
        var str=document.getElementById("subject").value;
        var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange= function(){
                if (this.status==200 && this.readyState==4){
                    document.getElementById("topic").innerHTML=this.responseText;
                }    
            };
            xmlhttp.open("GET","admin/ajax/gettopic?str="+str, true);
            xmlhttp.send();
        function change(str){
            var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange= function(){
                if (this.status==200 && this.readyState==4){
                    document.getElementById("topic").innerHTML=this.responseText;
                }    
            };
            xmlhttp.open("GET","admin/ajax/gettopic?str="+str, true);
            xmlhttp.send();
        }
    </script>
@endsection
