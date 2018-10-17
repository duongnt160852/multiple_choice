@extends('admin.layout.index')
@section('title')
    <title>Thông báo</title>
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
                <li>
                    <a href="admin/quanlythisinh">
                        <i class="ti-user"></i>
                        <p>Quản Lý Thí Sinh</p>
                    </a>
                </li>
                <li>
                    <a href="admin/quanlycauhoi">
                        <i class="ti-gallery"></i>
                        <p>Quản Lý Câu Hỏi</p>
                    </a>
                </li>
                <li>
                    <a href="admin/themthisinh">
                        <i class="ti-plus"></i>
                        <p>Thêm Thí Sinh</p>
                    </a>
                </li>
                <li>
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
                <li class="active">
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
                <div class="card">
                    <div class="header">
                        <h4 class="title">Notifications</h4>
                        <p class="category">Handcrafted by our friend <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a></p>

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Notifications Style</h5>
                                <div class="alert alert-info">
                                    <span>This is a plain notification</span>
                                </div>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>This is a notification with close button.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="ti-bell"></span>
                                    <span data-notify="message">This is a notification with close button and icon.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="ti-pie-chart"></span>
                                    <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Notification states</h5>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Info - </b> This is a regular notification made with ".alert-info"</span>
                                </div>
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
                                </div>
                                <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                                </div>
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="places-buttons">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5>Notifications Places
                                        <p class="category">Click to view notifications</p>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','left')">Top Left</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','center')">Top Center</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','right')">Top Right</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','left')">Bottom Left</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','center')">Bottom Center</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','right')">Bottom Right</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection