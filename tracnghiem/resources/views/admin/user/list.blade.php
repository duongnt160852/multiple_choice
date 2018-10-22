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
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>MSDT</th>
                                        <th>Email</th>
                                        <th>Ngày Sinh</th>
                                        <th>Trạng Thái</th>
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
                                                @else($us->status=="1")
                                                    {{"đang thi"}}
                                                @endif
                                                @if($us->status=="2")
                                                    {{"đã thi"}}
                                                @endif
                                            </td>
                                            <td><a href=""><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a href=""><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
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
    $("tittle").html("Danh sách thí sinh");
    </script>
    <script>
        $(document).ready(function(){
            $("#userList").css("display","block");
            $("#userAdd").css("display","block");
        });
    </script>
@endsection