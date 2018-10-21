@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <form action="admin/subject/edit/{{$subject->id}}" method="post">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Môn Thi</label>
                                                <input type="text" class="form-control border-input" placeholder="Câu hỏi" required="" name="subject" value="{{$subject->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Sửa</button>
                                        <a href="admin/quanlycauhoi" class="btn btn-info btn-fill btn-wd">Hủy</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
    $('#subjectEdit').addClass("active");
    $("tittle").html("Sửa môn thi");
    </script>
    <script>
        $(document).ready(function(){
            $("#subjectList").css("display","block");
            $("#subjectAdd").css("display","block");
        });
    </script>
@endsection