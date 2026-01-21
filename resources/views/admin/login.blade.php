<!DOCTYPE html>
<html>
<head>
    <title>Admin Login | Temple Fund</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.25);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1e293b;
        }

        label {
            font-weight: 600;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #64748b;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🛕 Admin Login</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="admin@temple.com" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••" required>

        <button class="btn">Login</button>
    </form>

    <div class="footer-text">
        Temple Fund Management System
    </div>
</div>

</body>
</html>
