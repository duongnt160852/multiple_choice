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
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Môn Thi</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($subject as $su)
                                            <tr>
                                            <td>{{$su->id}}</td>
                                            <td>{{$su->name}}</td>
                                            <td><a href="admin/subject/edit/{{$su->id}}"><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
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
    <script>
    $('#subjectList').addClass("active");
    $("tittle").html("Danh sách môn thi");
    </script>
    <script>
        $(document).ready(function(){
            $("#subjectList").css("display","block");
            $("#subjectAdd").css("display","block");
        });
    </script>
@endsection