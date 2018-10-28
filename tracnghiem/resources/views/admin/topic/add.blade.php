@extends('admin.layout.index')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Chủ Đề Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/topic/add" method="post">
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
                                                    Môn thi
                                                    <select class="form-control border-input" name="subject">
                                                        @foreach($subject as $su)
                                                            <option value="{{$su->id}}">{{$su->name}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                            </div>
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                     <div>
                                                         Chủ đề 
                                                      </div> 
                                                      <input class="form-control border-input" type="text" name="topic" value="" placeholder="Chủ đề mới" size="42px" required="">
                                                </div> 
                                            </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Đăng Ký</button>
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
            $("#topicAdd").addClass('active');
            $("#title").html('Thêm Chủ Đề');
            $("#topicList").css("display","block");
            $("#topicAdd").css("display","block");
        });
    </script>
@endsection

