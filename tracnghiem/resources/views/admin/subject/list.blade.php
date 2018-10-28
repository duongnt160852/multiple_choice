@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Môn Thi</h4>
                            </div>
                            <div>
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Môn Thi</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($subject as $su)
                                            <tr>
                                            <td>{{$su->id}}</td>
                                            <td>{{$su->name}}</td>
                                            <td><a href="admin/subject/edit/{{$su->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a onclick="myFunction('{{$su->id}}')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="text-center">
                                {!! $subject->links() !!}
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
    $('#subjectList').addClass("active");
    $("title").html("Danh sách môn thi");
    </script>
    <script>
        $(document).ready(function(){
            $("#subjectList").css("display","block");
            $("#subjectAdd").css("display","block");
        });
        function myFunction(str){
            if (confirm('Bạn có chắc chắn muốn xóa\nXóa môn thi này cũng sẽ xóa toàn bộ đề thi, câu hỏi, chủ đề của nó ?')){
                window.location.href="admin/subject/delete/"+str;
            }
        }
    </script>
@endsection