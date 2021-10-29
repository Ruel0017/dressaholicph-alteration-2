<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="img/logo.jpg" alt="bootstrap 4 login page">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <form method="POST" class="my-login-validation" novalidate=""
                                action="{{ route('register') }}">

                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @csrf

                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input id="fname" type="text" class="form-control" name="fname" required autofocus
                                        placeholder="First Name">
                                    <span class="text-danger">@error('fname'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="mname">Middle Name</label>
                                        <input id="mname" type="text" class="form-control" name="mname" autofocus
                                            placeholder="Middle Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input id="lname" type="text" class="form-control" name="lname" required autofocus
                                            placeholder="Last Name">
                                        <span class="text-danger">@error('lname'){{ $message }}@enderror</span>

                                        </div>

                                        <div class="form-group">
                                            <label for="sex">Sex</label>
                                            <select class="form-control" name="sex">
                                                <option value="0">Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                </option>
                                            </select>
                                            <span class="text-danger">@error('sex'){{ $message }}@enderror</span>

                                            </div>

                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input id="dob" type="date" class="form-control" name="dob" required autofocus>
                                                <span class="text-danger">@error('dob'){{ $message }}@enderror</span>

                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input id="address" type="text" class="form-control" name="address" required
                                                        autofocus placeholder="Address">
                                                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="mobilenumber">Mobile Number</label>
                                                        <input id="mobilenumber" type="text" minlength="11" maxlength="11"
                                                            class="form-control" name="mobilenumber" required autofocus
                                                            placeholder="Mobile Number">
                                                        <span
                                                            class="text-danger">@error('mobilenumber'){{ $message }}@enderror</span>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">E-Mail Address</label>
                                                            <input id="email" type="email" class="form-control" name="email" required
                                                                placeholder="Email Address">
                                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input id="password" type="password" class="form-control" name="password" required
                                                                    data-eye placeholder="Enter Password">
                                                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="password-confirm">Confirm Password</label>
                                                                    <input id="password-confirm" type="password" class="form-control"
                                                                        name="password_confirmation" required data-eye>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" name="agree" id="agree" class="custom-control-input"
                                                                            required="">
                                                                        <label for="agree" class="custom-control-label">I agree to the <a href="#">Terms
                                                                                and Conditions</a></label>
                                                                        <div class="invalid-feedback">
                                                                            You must agree with our Terms and Conditions
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group m-0">
                                                                    <button type="submit" class="btn btn-primary btn-block">
                                                                        Register
                                                                    </button>
                                                                </div>
                                                                <div class="mt-4 text-center">
                                                                    Already have an account? <a href="{{ route('login') }}">Login</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="footer">
                                                        Copyright &copy; 2021 &mdash; Dressaholicph Alteration
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                                                                        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                                                                        crossorigin="anonymous">
                                    </script>
                                    <script src="js/my-login.js"></script>
                                </body>

                                </html>
