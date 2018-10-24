@extends('admin.layout.index')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm Đề Thi</h4>
                            </div>
                            <div class="content">
                                <form action="admin/exam/add" method="post">
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
                                                        <label>Tên Đề Thi</label>
                                                    </div>
                                                    <input class="form-control border-input" type="text" name="name" value="" placeholder="Tên đề thi" required="">
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="subject" id="subject1">
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
                                            </div>
                                     <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 1</label>
                                                </div>
                                                <select class="form-control border-input" name="level1" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 2</label>
                                                </div>
                                                <select class="form-control border-input" name="level2" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 3</label>
                                                </div>
                                                <select class="form-control border-input" name="level3" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                    </div>  
                                    <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 4</label>
                                                </div>
                                                <select class="form-control border-input" name="level4" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                    <label>Số Câu Hỏi Mức 5</label>
                                                </div>
                                                <select class="form-control border-input" name="level5" >
                                                    @for($i=0;$i<=50;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                    </div>   
                                    <div class="row">
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Thời gian thi</label>
                                                    </div>
                                                    <input class="form-control border-input" type="text" name="time" value="" placeholder="Thời gian thi(phút)" required="">
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
        $(document).ready(function(){
            $('#examAdd').addClass("active");
            $("tittle").html("Thêm đề thi");
            $("#examList").css("display","block");
            $("#examAdd").css("display","block");
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
