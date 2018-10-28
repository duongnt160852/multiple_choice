@extends('admin.layout.index')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Môn Thi Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/subject/add" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                    <div class="form-group">
                                        <div class="row"> 
                                                <div class="col-lg-4">
                                                    <div>
                                                         Môn thi
                                                     </div> 
                                                     <input class="form-control border-input" type="text" name="name" value="" placeholder="Môn thi mới" size="45px" required="">
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
    $('#subjectAdd').addClass("active");
    $("title").html("Thêm môn thi");
    </script>
    <script>
        $(document).ready(function(){
            $("#subjectList").css("display","block");
            $("#subjectAdd").css("display","block");
        });
    </script>
@endsection@

