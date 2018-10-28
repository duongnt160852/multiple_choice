@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Thí Sinh</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                {{session('thongbao')}}
                                            </div>
                                        @endif
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>MSDT</th>
                                        <th>Email</th>
                                        <th>Ngày Sinh</th>
                                        <th>Trạng Thái</th>
                                        <th>Điểm</th>
                                        <th>TG Thi</th>
                                        <th>Môn Thi</th>
                                        <th>Đề Thi</th>
                                        <th>Mã Đề</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $us)
                                            <tr>
                                            <td>{{$us->id}}</td>
                                            <td>{{$us->name}}</td>
                                            <td>{{$us->username}}</td>
                                            <td>{{$us->email}}</td>
                                            <td>{{$us->DoB}}</td>
                                            <td>@if($us->status=="0")
                                                    {{"chưa thi"}}
                                                @elseif($us->status=="1")
                                                    {{"đang thi"}}
                                                @endif
                                                @if($us->status=="2")
                                                    {{"đã thi"}}
                                                @endif
                                            </td>
                                            <td>{{$us->mark}}</td>
                                            <td>{{$us->time}}</td>
                                            <td>{{$us->exam->topic->subject->name}}</td>
                                            <td>{{$us->exam->name}}</td>
                                            <td>{{$us->code}}</td>
                                            <td><a href="admin/user/edit/{{$us->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a onclick="myFunction({{$us->id}})" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="text-center">
                                {!! $user->links() !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
    $('#userList').addClass("active");
    $("title").html("Danh sách thí sinh");
    </script>
    <script>
        $(document).ready(function(){
            $("#userList").css("display","block");
            $("#userAdd").css("display","block");
        });
    </script>
    <script>
        function myFunction(str){
            if (confirm('Bạn có chắc chắn muốn xóa?')){
                window.location.href="admin/user/delete/"+str;
            }
        }
    </script>
@endsection