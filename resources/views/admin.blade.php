<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN MARKET</title>
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.css') !!}">
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#"><b>MARKET</b></a>
                <div class="nav-collapse">
                    <p class="navbar-text pull-right">Xin chào, <a
                            href="#">{{isset($_SESSION['name']) ? $_SESSION['name'] : ""}}</a></p>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 70px">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header"></li>
                        <li class="active"><a href="#"><i class="icon-home icon-white"></i> Đơn đăng ký bán hàng</a>
                        </li>
                        <li><a href="{{route('logout')}}"><i class="icon-arrow-right"></i>Thoát</a></li>
                    </ul>
                </div>
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span12">
                        <h2>Đơn đăng ký</h2>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Thời gian</th>
                                    <th>Trạng thái</th>
                                </tr>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($Sell as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{date_format($item->created_at, "H:i:s d/m/Y")}}</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <a href="{{route('admin.censor', ['id' => $item->user_id, 'status' => 2])}}">
                                        <button class="btn btn-danger">Từ chối</button>
                                        </a>
                                        <a href="{{route('admin.censor', ['id' => $item->user_id, 'status' => 1])}}">
                                            <button class="btn btn-info">Xét duyệt</button>
                                        </a>
                                        @elseif($item->status == 2)
                                        <span class="badge badge-error">Đã từ chối</span>
                                        @else
                                        <span class="badge badge-info">Đã duyệt</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer>
            <p>© Nguyễn Trường Xuân</p>
        </footer>

    </div>
</body>

</html>