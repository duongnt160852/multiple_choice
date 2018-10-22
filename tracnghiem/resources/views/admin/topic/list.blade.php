@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Chủ Đề</h4>
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
                                    </thead>
                                    <tbody>
                                        @foreach($topic as $tp)
                                           <tr>
                                            <td>{{$tp->id}}</td>
                                            <td>{{$tp->name}}</td>
                                            <td>{{$tp->subject->name}}</td>
                                            <td><a href=""><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
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
        	$("#tittle").html('Danh Sách Chủ Đề');
            $("#topicList").css("display","block");
            $("#topicAdd").css("display","block");
        });
    </script>
@endsection