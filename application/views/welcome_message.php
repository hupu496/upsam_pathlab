<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page · CodeIgniter</title>

    <style>
        /* ----- global reset & base ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f6fa;
            font: 14px/1.6 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #2c3e50;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        /* ----- main card container ----- */
        .login-container {
            max-width: 420px;
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08), 0 4px 10px rgba(0, 0, 0, 0.02);
            padding: 32px 30px 40px;
            transition: box-shadow 0.2s ease;
            border: 1px solid #e9edf4;
        }

        .login-container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06), 0 6px 14px rgba(0, 0, 0, 0.03);
        }

        /* ----- header / brand ----- */
        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-header h1 {
            font-weight: 600;
            font-size: 26px;
            letter-spacing: -0.3px;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .login-header .sub {
            font-size: 14px;
            color: #64748b;
            border-top: 1px solid #eef2f6;
            padding-top: 14px;
            margin-top: 8px;
        }

        .login-header .sub strong {
            font-weight: 600;
            color: #2c3e50;
        }

        /* ----- form elements ----- */
        .login-form .form-group {
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            font-weight: 500;
            font-size: 13px;
            margin-bottom: 5px;
            color: #1e293b;
            letter-spacing: 0.3px;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            border: 1px solid #dce1e9;
            border-radius: 10px;
            background: #fafcff;
            transition: border 0.15s ease, box-shadow 0.15s ease;
            color: #0b1a2b;
            outline: none;
        }

        .login-form input:focus {
            border-color: #4f7df3;
            box-shadow: 0 0 0 3px rgba(79, 125, 243, 0.12);
            background: #ffffff;
        }

        .login-form .input-hint {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 5px;
        }

        /* ----- inline row: remember + forgot ----- */
        .form-row-inline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 6px 0 22px;
            flex-wrap: wrap;
            gap: 8px 12px;
        }

        .form-row-inline label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 400;
            font-size: 14px;
            color: #334155;
            cursor: pointer;
        }

        .form-row-inline label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #4f7df3;
            cursor: pointer;
        }

        .form-row-inline a {
            color: #4f7df3;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.15s;
        }

        .form-row-inline a:hover {
            color: #1f4fcf;
            text-decoration: underline;
        }

        /* ----- button ----- */
        .login-btn {
            width: 100%;
            padding: 13px;
            background: #1e293b;
            color: white;
            border: none;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.4px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            box-shadow: 0 4px 8px rgba(30, 41, 59, 0.08);
            margin-top: 4px;
        }

        .login-btn:hover {
            background: #0f172a;
        }

        .login-btn:active {
            transform: scale(0.98);
        }

        /* ----- signup / footer ----- */
        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: #475569;
            border-top: 1px solid #eef2f6;
            padding-top: 24px;
        }

        .login-footer a {
            color: #4f7df3;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.15s;
        }

        .login-footer a:hover {
            color: #1f4fcf;
            text-decoration: underline;
        }

        .login-footer .ci-version {
            display: block;
            margin-top: 12px;
            font-size: 12px;
            color: #94a3b8;
        }

        /* small mobile tweaks */
        @media (max-width: 460px) {
            .login-container {
                padding: 24px 18px 32px;
            }

            .login-header h1 {
                font-size: 22px;
            }

            .form-row-inline {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* ----- "powered by" codeigniter touch ----- */
        .ci-badge {
            display: inline-block;
            background: #f1f5f9;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 11px;
            font-weight: 500;
            color: #334155;
            letter-spacing: 0.3px;
            margin-top: 6px;
        }

        .ci-badge strong {
            font-weight: 700;
            color: #1e293b;
        }

        /* small message placeholder (demo) */
        .demo-message {
            background: #f8fafc;
            border-left: 3px solid #4f7df3;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            color: #1e293b;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .demo-message span {
            opacity: 0.7;
            font-size: 13px;
        }
         .watermark {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: url("<?php echo base_url('assets/images/background.jpg'); ?>") no-repeat center center;
    background-size: cover;      /* Fit image to entire screen */
    opacity: 0.5;               /* Change opacity (0.01 - 1) */
    z-index: -1;                 /* Keep behind content */
    pointer-events: none;        /* Allow clicking through */
}

.content {
    position: relative;
    z-index: 1;
}
    </style>
</head>
<body>
<div class="watermark"></div>
<div class="login-container">

    <!-- header -->
    <div class="login-header">
        <h1>🔐 Welcome back</h1>
        <div class="sub">
            <strong>Upsam Diagnostic</strong> · secure login
        </div>
    </div>

    <!-- optional demo hint (just for clarity) -->
    <div class="demo-message">
        <span>⏺</span> Demo: <strong>admin@example.com</strong> / password
        <span style="margin-left:auto; opacity:0.5;">CI v3</span>
    </div>

    <!-- login form -->
    <form class="login-form" action="<?php echo base_url('welcome/validatelogin'); ?>" method="post">
        <!-- email -->
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" placeholder="admin@gmail.com"  required>
            <div class="input-hint">We'll never share your email.</div>
        </div>
        <!-- password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••"  required>
        </div>

        <!-- remember + forgot -->
        <div class="form-row-inline">
            <label for="remember">
                <input type="checkbox" id="remember" name="remember" checked>
                Remember me
            </label>
            <a href="#" onclick="alert('Reset link would be sent (demo).'); return false;">Forgot password?</a>
        </div>

        <!-- submit -->
        <button type="submit" class="login-btn">Sign in</button>

        <!-- extra hint: form action would point to controller -->
        <div style="font-size:12px; color:#94a3b8; text-align:center; margin-top:14px;">
            <span>🔒 secured connection</span>
        </div>
    </form>

    <!-- footer -->
    <div class="login-footer">
        <span>Don't have an account?</span>
        <a href="#" onclick="alert('Sign-up page (demo).'); return false;">Create one</a>

        <!-- CodeIgniter version / footer style (matches CI spirit) -->
        <div class="ci-badge">
            ⚡ <strong>CI</strong> <?php echo CI_VERSION; ?> · <?php echo (ENVIRONMENT === 'development') ? 'dev' : 'production'; ?>
        </div>
        <div class="ci-version">
            Page rendered in <strong>{elapsed_time}</strong> seconds
        </div>
    </div>

</div>

<!-- tiny note: this view is the welcome_message replacement, fully styled login page -->
</body>
</html>