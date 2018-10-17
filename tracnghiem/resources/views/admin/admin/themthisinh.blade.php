@extends('admin.layout.index')
@section('title')
    <title>Thêm thí sinh</title>
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
                <li class="active">
                    <a href="admin/themthisinh">
                        <i class="ti-plus"></i>
                        <p>Thêm Thí Sinh</p>
                    </a>
                </li>
                <li>
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
                                <form action="{{route('themthisinh')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    @if(count($errors)>0)
                                    @foreach($errors->all() as $err)
                                        <div class="alert alert-danger" style="width: 30%">
                                            {{$err}}
                                        </div>
                                    @endforeach
                                    @endif
                                    @if(session('thongbao'))
                                        <div class="alert alert-success" style="width:30%">
                                         Thêm thành công
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control border-input" name="name" autofocus="" placeholder="Họ tên" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input type="text" class="form-control border-input" name="password" required="" value="{{str_random(10)}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã Số Dự Thi</label><!--Tên ADMIN-->
                                                <input type="text" class="form-control border-input" name='username' placeholder="username" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa Chỉ Email</label> <!--Email-->
                                                <input type="email" class="form-control border-input" name='email' placeholder="Email" required="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Số Điện Thoại</label>
                                                <input type="text" class="form-control border-input" name='number' placeholder="Số điện thoại" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Giới Tính</label>
                                                <select class="form-control" name='sex'>
                                                        <option value="nam">Nam</option>
                                                        <option value="nu">Nữ</option>
                                                        <option value="khongxacdinh">Không Xác Định</option>
                                                    </select> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Địa Chỉ</label>
                                                <input type="text" class="form-control border-input" name='address' placeholder="Address" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label>Ngày Sinh</label><!--Tên ADMIN-->
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div class="text-center">
                                                        Năm
                                                    </div>
                                                    <input class="form-control" name="year" placeholder="Năm sinh" require=""  type="text" id="year" onchange="change()">
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div class="text-center">
                                                        Tháng
                                                    </div>
                                                    <select class="form-control" name='month' id='month' required="" onchange="change(this.value)">                                                       
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                        <option value="06">6</option>
                                                        <option value="07">7</option>
                                                        <option value="08">8</option>
                                                        <option value="09">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div class="text-center">
                                                        Ngày
                                                    </div>
                                                    <select class="form-control" name='date' id='date' required="">   
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                        <option value="06">6</option>
                                                        <option value="07">7</option>
                                                        <option value="08">8</option>
                                                        <option value="09">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select> 
                                                </div> 
                                                
                                                
                                            </div>
                                                  

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Đăng Ký</button>
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
        var str=document.getElementById("month").value;
        var str1=document.getElementById("year").value;
        var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange= function(){
                if (this.status==200 && this.readyState==4){
                    document.getElementById("date").innerHTML=this.responseText;
                }    
            };
            xmlhttp.open("GET","admin/ajax/getdate?str="+str + "&str1=" +str1, true);
            xmlhttp.send();
        function change(str=document.getElementById("month").value, str1=document.getElementById("year").value){
            var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange= function(){
                if (this.status==200 && this.readyState==4){
                    document.getElementById("date").innerHTML=this.responseText;
                }    
            };
            xmlhttp.open("GET","admin/ajax/getdate?str="+str+ "&str1=" +str1, true);
            xmlhttp.send();
        }
    </script>
@endsection