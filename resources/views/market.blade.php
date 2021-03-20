<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARKET</title>
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
                        <li class="active"><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
                        <li><a data-toggle="modal" href="#myModal"><i class="icon-shopping-cart"></i>Bán hàng</a></li>
                        <li><a href="{{route('logout')}}"><i class="icon-arrow-right"></i>Thoát</a></li>
                    </ul>
                </div>
            </div>
            <div class="span9">
                @if(SESSION('thongbao'))
                <div class="alert fade in">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <strong>Đăng ký thành công!</strong> Vui lòng chờ đợi quản trị viên xác nhận đơn đăng ký
                </div>
                @endif
                <div class="hero-unit cc_cursor">
                    <h1>MARKET, xin chào</h1>
                   

                </div>
                {{-- Modal --}}
                <div class="modal" id="myModal" @if (isset($CheckSell)) style="display: none" @endif>
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h3>Đơn đăng ký</h3>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('market.registration') }}" method="POST" class="form-horizontal">
                            @csrf
                            @if (!isset($CheckSell))

                            <div class="control-group">
                                <label class="control-label" for="disabledInput">Email</label>
                                <div class="controls">
                                    <input class="input-xlarge disabled" id="disabledInput" type="text"
                                        value="{{$_SESSION['email']}}" disabled="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="disabledInput">Họ và tên</label>
                                <div class="controls">
                                    <input class="input-xlarge disabled" id="disabledInput" type="text"
                                        value="{{$_SESSION['name']}}" disabled="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="disabledInput">Loại dịch vụ</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input">Bán hàng</span>
                                </div>
                            </div>
                            @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Email</th>
                                        <th>Họ và tên</th>
                                        <th>Dịch vụ</th>
                                        <th>Thời gian</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($Sell as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><b>Bán hàng</b></td>
                                        <td>{{date_format($item->created_at, "d/m/Y")}}</td>
                                        <td>
                                            @if($item->status == 0 )
                                            <button class="btn btn-warning">Đang chờ</button>
                                            @elseif($item->status == 1)
                                            <button class="btn btn-info">Đã duyệt</button>
                                            @else
                                            <button class="btn btn-danger">Từ chối</button>
                                            @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-danger">Đóng</a>
                        @if (!isset($CheckSell))
                        <button class="btn btn-success" type="submit">Đăng ký</button>
                        @endif
                        @if (isset($CheckSell) && $CheckSell->status == 2)
                        <button class="btn btn-warning" type="submit">Đăng ký lại</button>
                        @endif
                    </div>
                    </form>
                </div>
                {{-- End Modal --}}
                
            </div>
        </div>
        <hr>
        <footer>
            <p>© Nguyễn Trường Xuân</p>
        </footer>

    </div>
    <script src="{{ asset('assets/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    @if (!isset($CheckSell))
    <script>
        $('#myModal').modal({
            keyboard: false
        })
    </script>
    @endif
</body>

</html>