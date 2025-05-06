<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: #f7f9fc;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
        }

        button:hover {
            background: #357ab8;
        }

        .message {
            margin-top: 10px;
            font-size: 14px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        @if(session('status'))
            <div class="message success">{{ session('status') }}</div>
        @endif

        @foreach ($errors->all() as $error)
            <div class="message error">{{ $error }}</div>
        @endforeach

        {{-- Show OTP form if OTP has been sent --}}
        @if (session('otp_sent'))
            <form method="POST" action="{{ route('login.custom') }}">
                @csrf
                <labe>Enter OTP</labe>
                <input type="text" name="otp" placeholder="Enter OTP" required>

                <labe>Enter Your Password</labe>
                <input type="password" name="password" placeholder="Enter Password" required>
                @php
                    $num1 = session('captcha_num1');
                    $num2 = session('captcha_num2');
                @endphp
                <labe>Solve the Captcha</labe>
                <label>{{ $num1 }} + {{ $num2 }} = </label>
                <input type="number" name="captcha" required>

                <button type="submit">Login</button>

            </form>
        @else
            {{-- Form to send OTP --}}
            <form method="POST" action="{{ route('send.otp') }}">
                @csrf
                <input type="email" name="email" placeholder="Enter Email" required>
                <button type="submit">Send OTP</button>
            </form>
        @endif
    </div>
</body>

</html>