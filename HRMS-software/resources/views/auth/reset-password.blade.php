<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password </title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0;
            background: #ddd;
            background: url('/images/login2.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        body::before {
            content: '';
            width: 100%;
            height: 100%;
            background: #0000006e;
            position: absolute;
        }

        .wrapper {


            position: relative;
            max-width: 430px;
            width: 100%;
            background: #fff;
            padding: 60px 34px;
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin: 0 15px;
        }

        .wrapper h2 {
            position: relative;
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .wrapper h2::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 48px;
            border-radius: 12px;
            background: #160F54;
        }

        .wrapper form {
            margin-top: 30px;
        }

        .wrapper form .input-box {
            height: 52px;
            margin: 18px 0;
        }

        form .input-box select {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: #fff;
        }

        form .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #160F54;
        }

        form .policy {
            display: flex;
            align-items: center;
        }

        form h3 {
            color: #707070;
            font-size: 14px;
            font-weight: 500;
            margin-left: 10px;
        }

        .input-box.button input {
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #160F54;
            cursor: pointer;
        }

        .input-box.button input:hover {
            background: #160F54;
        }

        form .text h3 {
            color: #333;
            width: 100%;
            text-align: center;
        }

        form .text h3 a {
            color: #4070f4;
            text-decoration: none;
        }

        form .text h3 a:hover {
            text-decoration: underline;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
    <div class="wrapper">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <h2> Reset Password</h2>
        <p style="font-size: 12px; margin:10px 0;">This password reset link will expire in <strong class="text-danger">60 minutes</strong>
        </p>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div class="input-box" data-validate="Valid email is required: ex@abc.xyz">
                <input class="input100" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email">
            </div>

            <!-- Password Input -->
            <div class="input-box">
                <input class="input100" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
            </div>

            <!-- Confirm Password Input -->
            <div class="input-box">
                <input class="input100" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>


            <div class="input-box button">
                <input type="Submit" value="Reset Password">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    </body>

</html>