@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Các Câu Hỏi</h4>
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
                                        <th>Câu Hỏi</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>Đáp Án</th>
                                        <th>Độ khó</th>
                                        <th>Chủ Đề</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($question as $qt)
                                           <tr>
                                            <td>{{$qt->id}}</td>
                                            <td>{{$qt->name}}</td>
                                            <td>{{$qt->A}}</td>
                                            <td>{{$qt->B}}</td>
                                            <td>{{$qt->C}}</td>
                                            <td>{{$qt->D}}</td>
                                            <td>{{$qt->answer}}</td>
                                            <td>{{$qt->level}}</td>
                                            <td>{{$qt->topic->name}}</td>
                                            <td><a href="admin/question/edit/{{$qt->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="text-center">
                                {!! $question->links() !!}
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
    $('#questionList').addClass("active");
    $("tittle").html("Danh sách câu hỏi");
    </script>
    <script>
        $(document).ready(function(){
            $("#questionList").css("display","block");
            $("#questionAdd").css("display","block");
        });
    </script>
@endsection