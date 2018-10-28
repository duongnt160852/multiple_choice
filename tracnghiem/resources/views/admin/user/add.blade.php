@extends('admin.layout.index')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Thí Sinh Mới</h4>
                            </div>
                            
                            <div class="content">
                                <form action="admin/user/add" method="post">
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
                                                <input  type="text" class="form-control border-input" name="password" id="password" required="" value="{{str_random(10)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="display: none">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input  type="text" class="form-control border-input" name="password1" id="password1" required="" >
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
                                                <input type="email" class="form-control border-input" name='email' placeholder="Email" >
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group" >
                                        <label>Ngày Sinh</label><!--Tên ADMIN-->
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Năm</label>
                                                    </div>
                                                    <input class="form-control border-input" name="year" placeholder="Năm sinh" require=""  type="text" id="year">
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Tháng</label>
                                                    </div>
                                                    <select class="form-control border-input" name='month' id='month' required="">
                                                    @for($i=1;$i<=12;$i++)
                                                        @if ($i<10) <option value='0{{$i}}'>{{$i}}</option>
                                                        @else <option value='{{$i}}'>{{$i}}</option>
                                                        @endif
                                                    @endfor
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Ngày</label>
                                                    </div>
                                                    <select class="form-control border-input" name='date' id='date' required="">   
                                                    </select> 
                                                </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="subject" id="subject1">
                                                        @foreach($subject as $su)
                                                            <option value='{{$su->id}}'>{{$su->name}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control border-input" id="topic1" name="topic">
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Đề Thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="exam" id="exam" >

                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Mã Đề</label>
                                                    </div>
                                                    <select class="form-control border-input" name="code" id="code" >
                                                        @for($i=1;$i<=12;$i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
@endsection
@section('script')
    <script>       
        $(document).ready(function(){
        	$.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                $('#topic1').html(data);
                $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
            });

            $('#subject1').change(function(){
                $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                    $('#topic1').html(data);
                    $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
                });
            });

            $('#topic1').change(function(){
                $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
            });
            $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });

            $('#year').change(function(){
                $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });
            });
            $('#month').change(function(){
                $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('title').html("Thêm Thí Sinh");
            $('#userAdd').addClass('active');
            $("#userList").css("display","block");
            $("#userAdd").css("display","block");
            $('#password1').val($('#password').val());
        });
    </script>
@endsection