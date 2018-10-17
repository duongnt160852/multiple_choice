@extends('admin.layout.index')

@section('title')
    <title>Quản lý câu hỏi</title>
@endsection
@section('menu')
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="admin/trangchu" class="simple-text">
                    Trắc Nghiệm
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="admin/trangchu">
                        <i class="ti-home"></i>
                        <p>Trang Chủ</p>
                    </a>
                </li>
                <li >
                    <a href="admin/taikhoan">
                        <i class="ti-settings"></i>
                        <p>Thông Tin Người Dùng</p>
                    </a>
                </li>
                <li >
                    <a href="admin/quanlythisinh">
                        <i class="ti-user"></i>
                        <p>Quản Lý Thí Sinh</p>
                    </a>
                </li>
                <li class="active">
                    <a href="admin/quanlycauhoi">
                        <i class="ti-gallery"></i>
                        <p>Quản Lý Câu Hỏi</p>
                    </a>
                </li>
                <li >
                    <a href="admin/themthisinh">
                        <i class="ti-plus"></i>
                        <p>Thêm Thí Sinh</p>
                    </a>
                </li>
                <li >
                    <a href="admin/themcauhoi">
                        <i class="ti-plus"></i>
                        <p>Thêm Câu Hỏi</p>
                    </a>
                </li>
                <li>
                    <a href="admin/themmonthi">
                        <i class="ti-plus"></i>
                        <p>Thêm Môn Thi</p>
                    </a>
                </li>
                <li>
                    <a href="admin/themchude">
                        <i class="ti-plus"></i>
                        <p>Thêm Chủ Đề</p>
                    </a>
                </li>
                <li>
                    <a href="admin/thongbao">
                        <i class="ti-bell"></i>
                        <p>Thông báo</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Các Câu Hỏi</h4>
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
                                        <th>ID Chủ Đề</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        @foreach($question as $qt)
                                           <tr>
                                            <td>{{$qt->ID}}</td>
                                            <td>{{$qt->name}}</td>
                                            <td>{{$qt->A}}</td>
                                            <td>{{$qt->B}}</td>
                                            <td>{{$qt->C}}</td>
                                            <td>{{$qt->D}}</td>
                                            <td>{{$qt->answer}}</td>
                                            <td>{{$qt->level}}</td>
                                            <td>{{$qt->IDtopic}}</td>
                                            <td><a href=""><img src="https://cdn1.iconfinder.com/data/icons/real-estate-set-2/512/21-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            <td><a href=""><img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-plain/448/010_trash-512.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
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