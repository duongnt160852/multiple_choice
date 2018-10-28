@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Đề Thi</h4>
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" >
                                    <thead >
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Thời gian</th>
                                        <th>Chủ đề</th>
                                        <th>Môn thi</th>
                                        <th>Chi tiết</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($exam as $qt)
                                           <tr >
                                            <td>{{$qt->id}}</td>
                                            <td>{{$qt->name}}</td>
                                            <td>{{$qt->time}}</td>
                                            <td>{{$qt->topic->name}}</td>
                                            <td>{{$qt->topic->subject->name}}</td>
                                            <td><a href="admin/exam/view/{{$qt->id}}"><i class="ti-eye"></i></a></td>
                                            <td><a href="admin/exam/edit/{{$qt->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a onclick="myFunction({{$qt->id}})" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="text-center">
                                {!! $exam->links() !!}
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
        $(document).ready(function(){
            $('#examList').addClass("active");
            $("title").html("Danh sách đề thi");
            $("#examList").css("display","block");
            $("#examAdd").css("display","block");
        });
        function myFunction(str){
            if (confirm('Bạn có chắc chắn muốn xóa?')){
                window.location.href="admin/exam/delete/"+str;
            }
        }
    </script>
@endsection