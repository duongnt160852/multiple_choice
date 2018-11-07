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
                                <table class="table table-striped" id="table">
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
                                    <tbody id="body">
                                        @foreach($users as $user)
                                            <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->DoB}}</td>
                                            <td>@if($user->status=="0")
                                                    {{"chưa thi"}}
                                                @elseif($user->status=="1")
                                                    {{"đang thi"}}
                                                @endif
                                                @if($user->status=="2")
                                                    {{"đã thi"}}
                                                @endif
                                            </td>
                                            <td>{{$user->mark}}</td>
                                            <td>{{$user->time}}</td>
                                            <td>{{$user->exam->topic->subject->name}}</td>
                                            <td>{{$user->exam->name}}</td>
                                            <td>{{$user->code}}</td>
                                            <td><a href="admin/user/edit/{{$user->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a onclick="myFunction({{$user->id}})" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.3/css/buttons.bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" ></script>
    <script>
        $(document).ready( function () {
            $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        } );
    </script>
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