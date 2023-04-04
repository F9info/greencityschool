<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ applicationSettings('site-name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="hold-transition animation-form login-page admin-login">

    <div class="container">
    
                <div class="login-box">
                    <div class="login-logo">
                        <img alt="logo" src="{{ asset('images/site-images/' . applicationSettings('logo')) }}" />
                    </div>
                    <!-- /.login-logo -->
                    <h1>Administrator Login</h1>
                    <!-- /.login-box-body -->
                    <form method="post" action="{{ route('admin.adminlogin') }}" autocomplete="off">
                        @csrf

                        @include('flash::message')
                        <div class="form-group input-group mb-3">

                            <input id="myElement" type="email" name="email" value="{{ old('email') }}"
                                autocomplete="off" class="form-control @error('email') is-invalid @enderror" autofocus>
                            <label>Email</label>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group input-group mb-3">

                            <input type="password" name="password" autocomplete="off"
                                class="form-control @error('password') is-invalid @enderror">
                            <label>Password</label>
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                        </div>

                        <p class="mb-1">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </p>
                    </form>

                </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        function checkForInputFooter(element) {
            // element is passed to the function ^

            const $label = $(element).siblings(".login-box .form-group label");

            var $element = $(element);
            if ($element.val().length > 0) {
                $label.parents(".form-group").addClass("input-has-value");
                $element.closest(".animation-form form").addClass("input-has-value");
            } else {
                $label.parents(".form-group").removeClass("input-has-value");
                $element.closest(".animation-form form").removeClass("input-has-value");
            }
        }

        // The lines below are executed on page load
        $(
            ".login-box .form-group input.form-control, .login-box .form-group textarea"
        ).each(function() {
            checkForInputFooter(this);
        });

        // The lines below (inside) are executed on change & keyup
        $(
            ".login-box .form-group input.form-control, .login-box .form-group textarea"
        ).on("change keyup", function() {
            checkForInputFooter(this);
        });
    </script>

</body>

</html>
