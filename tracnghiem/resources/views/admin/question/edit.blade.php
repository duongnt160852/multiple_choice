@extends('admin.layout.index')
@section('content')
<div class="content">
            <div class="container-fluid">
                <form action="admin/question/edit/{{$question->id}}" method="post">
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
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                       <label>Độ khó</label>
                                                    </div>
                                                    <select class="form-control" name="level">
                                                        @for($i=1;$i<=5;$i++)
                                                            <option @if($i==$question->level) {{"selected='selected'"}} @endif value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select> 
                                                </div> 
                                            </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu Hỏi</label>
                                                <input type="text" class="form-control border-input" placeholder="Câu hỏi" required="" name="question" value="{{$question->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án A</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án A" required="" name="A" value="{{$question->A}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án B</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án B" required="" name="B" value="{{$question->B}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án C</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án C" required="" name="C" value="{{$question->C}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án D</label>
                                                <input type="text" class="form-control border-input" placeholder="Đáp án D" required="" name="D" value="{{$question->D}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row"> 
                                                   <div class="col-xs-6 col-md-6">
                                                    <label>Đáp Án Đúng</label>
                                                    <div class="form-group">
                                                    
                                                    <div class="col-sm-2">
                                                        A <input type="radio" name="answer" value="A" required="" @if("A"==$question->answer) {{"checked='checked'"}} @endif> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        B <input type="radio" name="answer" value="B" required="" @if("B"==$question->answer) {{"checked='checked'"}} @endif> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        C <input type="radio" name="answer" value="C" required="" @if("C"==$question->answer) {{"checked='checked'"}} @endif> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        D <input type="radio" name="answer" value="D" required="" @if("D"==$question->answer) {{"checked='checked'"}} @endif>  
                                                    </div>
                                                  </div><!--dap an -->
                                                </div> 
                                        </div>
                                        <div class="row"> 
                                                   <div class="col-xs-12 col-md-12">
                                                    <label>Giải thích</label>
                                                    <div>
                                                        <textarea name="comment" rows='5' cols='160' >{{$question->comment}}</textarea >
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
                                <p id="idTopic" style="display: none;">{{$question->idTopic}}</p>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
    $('#questionEdit').addClass("active");
    $("tittle").html("Sửa câu hỏi");
    </script>
    <script>
        $(document).ready(function(){
            $("#questionList").css("display","block");
            $("#questionAdd").css("display","block");
        });
    </script>
@endsection
