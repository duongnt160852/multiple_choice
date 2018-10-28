@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <form action="admin/user/edit/{{$user->id}}" method="post">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control border-input" name="name" required="" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label> <!--Email-->
                                                <input type="email" class="form-control border-input" name='email' value="{{$user->email}}">
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
                                                    <input class="form-control border-input" name="year" require=""  type="text" id="year" value="{{substr($user->DoB,0,4)}}">
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Tháng</label>
                                                    </div>
                                                    <select class="form-control border-input" name='month' id='month' required="" >
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
                                                    <select class="form-control border-input" name='date' id='date' required="" >   
                                                    </select> 
                                                </div> 
                                        </div>
                                    </div>
                                    <div class="text-center form-group">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Sửa</button>
                                        <a href="admin/user/list" class="btn btn-info btn-fill btn-wd">Hủy</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>       
        $(document).ready(function(){
            $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                    $('#month').val(<?php echo substr($user->DoB,5,2); ?><10?"0"+<?php echo substr($user->DoB,5,2); ?>:<?php echo substr($user->DoB,5,2); ?>);
                    $('#date').val(<?php echo substr($user->DoB,8,2); ?><10?"0"+<?php echo substr($user->DoB,8,2); ?>:<?php echo substr($user->DoB,8,2); ?>);
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
    $('#userEdit').addClass("active");
    $("title").html("Sửa thí sinh");
    </script>
    <script>
        $(document).ready(function(){
            $("#userList").css("display","block");
            $("#userAdd").css("display","block");
        });
    </script>
@endsection
