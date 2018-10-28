@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Chủ Đề</h4>
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
                                        <th>Chủ Đề</th>
                                        <th>Môn Thi</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($topic as $tp)
                                           <tr>
                                            <td>{{$tp->id}}</td>
                                            <td>{{$tp->name}}</td>
                                            <td>{{$tp->subject->name}}</td>
                                            <td><a href="admin/topic/edit/{{$tp->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a onclick="myFunction('{{$tp->id}}')" style="cursor: pointer;"><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            {!! $topic->links() !!}
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
        	$("#topicList").addClass('active');
        	$("#title").html('Danh Sách Chủ Đề');
            $("#topicList").css("display","block");
            $("#topicAdd").css("display","block");
        });
        function myFunction(str){
            if (confirm('Bạn có chắc chắn muốn xóa\nXóa chủ đề này cũng sẽ xóa toàn bộ đề và câu hỏi của nó?')){
                window.location.href="admin/topic/delete/"+str;
            }
        }
    </script>
@endsection