<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/style/css/style.css') !!}">
    <style>
        label.error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        
        
        <form class="form-signin" method="POST" action="{{route('login')}}">
            @if(SESSION('thongbao'))
        <div class="alert fade in alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <strong>Đăng ký thành công!</strong>
        </div>
        @endif
            @if(SESSION('thongbaoloi'))
        <div class="alert fade in alert-error">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <strong>{{SESSION('thongbaoloi')}}</strong> 
        </div>
        @endif
            @csrf
            <h2 class="form-signin-heading">MARKET</h2>
            <input type="text" class="input-block-level" name="email" placeholder="Tài khoản"
                value="{{ isset($_COOKIE["email"]) ? $_COOKIE["email"] : "" }}">
            <input type="password" class="input-block-level" name="password" placeholder="Mật khẩu"
                value="{{ isset($_COOKIE["password"]) ? $_COOKIE["password"] : "" }}">
            <label class="checkbox">
                <input type="checkbox" {{ isset($_COOKIE["email"]) ? "checked" : "" }} name="remember" value="1">Nhớ mật
                khẩu
            </label>
            <button class="btn btn-large btn-primary" type="submit">Đăng nhập</button>

            <a class="btn btn-primary btn-large" data-toggle="modal" href="#myModal">Đăng ký</a>

        </form>
        <div class="modal" id="myModal" style="display: none">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Đăng ký MARKET</h3>
            </div>
            <form class="form-horizontal" id="RegistrationForm" method="POST" action="{{route('registration')}}">
                @csrf
                <div class="modal-body">

                    <div class="control-group">
                        <label class="control-label">Họ và tên</label>
                        <div class="controls">
                            <input class="input-xlarge" type="text" name="name">

                            @error('name')
                            <span class="label label-important">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input class="input-xlarge" type="text" id="email" name="email">

                            @error('email')
                            <span class="label label-important">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label">Mật khẩu</label>
                        <div class="controls">
                            <input class="input-xlarge" type="password" id="password" name="password">

                            @error('password')
                            <span class="label label-important">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label">Nhập lại mật khẩu</label>
                        <div class="controls">
                            <input class="input-xlarge" type="password" id="password_confirmation"
                                name="password_confirmation">
                            <span id='message'></span>
                            @error('password_confirmation')
                            <span class="label label-important">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-large btn-primary" type="submit">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        $('#RegistrationForm').validate({
            rules:{
                name:{
                    required:true
                },
                email:{
                    required:true,
                    email:true,
                    remote: "{{route('checkMail')}}"
                },
                password:{
                    required:true
                },
                password_confirmation:{
                    required:true,
                    equalTo: "#password"
                }
            },
            messages: {
                name:{
                    required: "Vui lòng điền họ và tên"
                },
                email: {
                    required: "Vui lòng điền email",
                    email: "Vui lòng điền đúng định dạng email",
                    remote: "Email đã tồn tại"
                },
                password:{
                    required: "Vui lòng điền mật khẩu"
                },
                password_confirmation:{
                    required: "Vui lòng điền nhập lại mật khẩu",
                    equalTo: "Mật khẩu chưa trùng khớp"
                }
            }
        })
    </script>
</body>

</html>