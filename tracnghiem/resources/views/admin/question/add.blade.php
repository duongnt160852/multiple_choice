@extends('admin.layout.index')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Thí Sinh Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/question/add" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                Thêm thành công
                                            </div>
                                        @endif
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" id="subject1" name="subject">
                                                        @foreach($subject as $su)
                                                            <option value="{{$su->id}}">{{$su->name}}</option>}
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control border-input" id="topic1" name="topic">
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                       <label>Độ khó</label>
                                                    </div>
                                                    <select class="form-control border-input" name="level">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select> 
                                                </div> 
                                            </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu Hỏi</label>
                                                <div>
                                                        <textarea name="question" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án A</label>
                                                <div>
                                                        <textarea name="A" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án B</label>
                                                <div>
                                                        <textarea name="B" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án C</label>
                                                <div>
                                                        <textarea name="C" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án D</label>
                                                <div>
                                                        <textarea name="D" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row"> 
                                                   <div class="col-xs-6 col-md-6">
                                                    <label>Đáp Án Đúng</label>
                                                    <div class="form-group">
                                                    
                                                    <div class="col-sm-2">
                                                        A <input type="radio" name="answer" value="A" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        B <input type="radio" name="answer" value="B" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        C <input type="radio" name="answer" value="C" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        D <input type="radio" name="answer" value="D" required="">  
                                                    </div>
                                                  </div><!--dap an -->
                                                </div> 
                                        </div>
                                        <div class="row"> 
                                                   <div class="col-xs-12 col-md-12">
                                                    <label>Giải thích</label>
                                                    <div>
                                                        <textarea name="comment" rows='5' cols='160' id="demo" class="ckeditor"></textarea >
                                                    </div>
                                                </div> 
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
			</div>
		</div>
@endsection
@section('script')
    <script>
        $('#questionAdd').addClass("active");
        $("title").html("Thêm câu hỏi");
    </script>
    <script>
        $(document).ready(function(){
            $("#questionList").css("display","block");
            $("#questionAdd").css("display","block");

            $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                $('#topic1').html(data);
            });

            $('#subject1').change(function(){
                $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                    $('#topic1').html(data);
                });
                });
            });
    </script>
@endsection
