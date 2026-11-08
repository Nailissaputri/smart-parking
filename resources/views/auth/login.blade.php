
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking - Authentication</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
            padding: 20px;
        }

        .container {
            position: relative;
            width: 760px;
            max-width: 100%;
            min-height: 500px;
            background: #f4f2f2;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.16);
        }

        /* FORM LOGIN DAN REGISTER */
        .form-container {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            z-index: 2;
        }

        .sign-up {
            left: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-in {
            transform: translateX(-100%);
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(0);
            opacity: 1;
            z-index: 5;
        }

        form {
            width: 100%;
            text-align: center;
        }

        form h1 {
            color: #090820;
            font-size: 36px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        /* IKON SOSIAL MEDIA */
        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin: 15px 0;
        }

        .social-icons span {
            width: 43px;
            height: 38px;
            border: 1px solid #333;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: bold;
            color: #111;
            flex-shrink: 0;
        }

        .social-icons svg {
            width: 27px;
            height: 27px;
            display: block;
        }

        .social-text {
            color: #333;
            font-size: 11px;
            margin-bottom: 15px;
        }

        /* INPUT FORM */
        .form-input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #ccc;
            background: transparent;
            padding: 12px 5px;
            margin: 7px 0;
            outline: none;
            font-size: 13px;
            color: #222;
        }

        .form-input:focus {
            border-bottom: 1px solid #9b19ed;
        }

        .form-input::placeholder {
            color: #888;
        }

        /* MENCEGAH BACKGROUND AUTOFILL BIRU */
        .form-input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #f4f2f2 inset;
            -webkit-text-fill-color: #222;
            transition: background-color 5000s ease-in-out 0s;
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 13px;
            font-size: 12px;
            color: #222;
        }

        /* TOMBOL UTAMA */
        .main-button {
            border: none;
            border-radius: 30px;
            padding: 9px 30px;
            min-width: 115px;
            background: linear-gradient(120deg, #db1fff, #7030ef);
            color: white;
            font-size: 17px;
            cursor: pointer;
            margin-top: 18px;
            transition: 0.3s;
        }

        .main-button:hover {
            opacity: 0.85;
            transform: translateY(-2px);
        }

        /* PANEL NAVY */
        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            z-index: 10;
            border-radius: 150px 20px 20px 150px;
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 20px 150px 150px 20px;
        }

        .toggle {
            position: relative;
            left: -100%;
            width: 200%;
            height: 100%;
            background: #090820;
            color: white;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 35px;
        }

        .toggle-panel h1 {
            color: white;
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 22px;
        }

        .toggle-panel p {
            color: #e2e2e2;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .toggle-button {
            border: none;
            border-radius: 30px;
            padding: 9px 28px;
            min-width: 115px;
            background: linear-gradient(120deg, #db1fff, #7030ef);
            color: white;
            font-size: 17px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toggle-button:hover {
            opacity: 0.85;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        .error {
            color: red;
            font-size: 12px;
            margin: 8px 0;
        }

        /* TAMPILAN HP */
        @media (max-width: 650px) {
            body {
                padding: 15px;
            }

            .container {
                min-height: 620px;
            }

            .form-container {
                width: 100%;
                height: 65%;
                padding: 25px;
            }

            .sign-in,
            .sign-up {
                left: 0;
            }

            .container.active .sign-in,
            .container.active .sign-up {
                transform: translateY(0);
            }

            .toggle-container {
                left: 0;
                top: 65%;
                width: 100%;
                height: 35%;
                border-radius: 70px 70px 20px 20px;
            }

            .container.active .toggle-container {
                transform: none;
                border-radius: 70px 70px 20px 20px;
            }

            .toggle {
                width: 200%;
            }

            .toggle-panel {
                padding: 15px;
            }

            .toggle-panel h1 {
                font-size: 22px;
                margin-bottom: 8px;
            }

            .toggle-panel p {
                font-size: 11px;
                margin-bottom: 5px;
            }

            .toggle-button {
                margin-top: 5px;
                font-size: 14px;
                padding: 8px 22px;
            }

            form h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<div class="container active" id="container">

    <!-- FORM LOGIN -->
    <div class="form-container sign-in">
        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <h1>Sign In</h1>

            <div class="social-icons">

                <!-- GitHub -->
                <span title="GitHub">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-label="GitHub">
                        <path d="M12 .9a11.1 11.1 0 0 0-3.51 21.63c.55.1.76-.24.76-.54v-2.1c-3.1.68-3.76-1.32-3.76-1.32-.5-1.29-1.24-1.63-1.24-1.63-1.01-.69.08-.68.08-.68 1.12.08 1.71 1.15 1.71 1.15 1 1.7 2.62 1.21 3.26.92.1-.72.39-1.21.71-1.49-2.48-.28-5.08-1.24-5.08-5.52 0-1.22.44-2.21 1.15-2.99-.12-.28-.5-1.42.11-2.96 0 0 .94-.3 3.05 1.14a10.6 10.6 0 0 1 5.55 0c2.11-1.44 3.05-1.14 3.05-1.14.61 1.54.23 2.68.11 2.96.72.78 1.15 1.77 1.15 2.99 0 4.29-2.61 5.24-5.1 5.51.4.35.76 1.03.76 2.08v3.08c0 .3.2.65.77.54A11.1 11.1 0 0 0 12 .9Z"/>
                    </svg>
                </span>

                <!-- Google -->
                <span title="Google">G+</span>

                <!-- LinkedIn -->
                <span title="LinkedIn">in</span>

            </div>

            <div class="social-text">
                or use email for password
            </div>

            @if ($errors->any() && !old('name'))
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <input
                class="form-input"
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >

            <input
                class="form-input"
                type="password"
                name="password"
                placeholder="Password"
                autocomplete="current-password"
                required
            >

            <span class="forgot-password">
                Forgot your password?
            </span>

            <button type="submit" class="main-button">
                Sign In
            </button>
        </form>
    </div>

    <!-- FORM REGISTER -->
    <div class="form-container sign-up">
        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <h1>Create Account</h1>

            <div class="social-icons">

                <!-- GitHub -->
                <span title="GitHub">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-label="GitHub">
                        <path d="M12 .9a11.1 11.1 0 0 0-3.51 21.63c.55.1.76-.24.76-.54v-2.1c-3.1.68-3.76-1.32-3.76-1.32-.5-1.29-1.24-1.63-1.24-1.63-1.01-.69.08-.68.08-.68 1.12.08 1.71 1.15 1.71 1.15 1 1.7 2.62 1.21 3.26.92.1-.72.39-1.21.71-1.49-2.48-.28-5.08-1.24-5.08-5.52 0-1.22.44-2.21 1.15-2.99-.12-.28-.5-1.42.11-2.96 0 0 .94-.3 3.05 1.14a10.6 10.6 0 0 1 5.55 0c2.11-1.44 3.05-1.14 3.05-1.14.61 1.54.23 2.68.11 2.96.72.78 1.15 1.77 1.15 2.99 0 4.29-2.61 5.24-5.1 5.51.4.35.76 1.03.76 2.08v3.08c0 .3.2.65.77.54A11.1 11.1 0 0 0 12 .9Z"/>
                    </svg>
                </span>

                <!-- Google -->
                <span title="Google">G+</span>

                <!-- LinkedIn -->
                <span title="LinkedIn">in</span>

            </div>

            <div class="social-text">
                or use email for password
            </div>

            @if ($errors->any() && old('name'))
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <input
                class="form-input"
                type="text"
                name="name"
                placeholder="Name"
                value="{{ old('name') }}"
                autocomplete="name"
                required
            >

            <input
                class="form-input"
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >

            <input
                class="form-input"
                type="password"
                name="password"
                placeholder="Password"
                autocomplete="new-password"
                required
            >

            <input
                class="form-input"
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                autocomplete="new-password"
                required
            >

            <button type="submit" class="main-button">
                Sign Up
            </button>
        </form>
    </div>

    <!-- PANEL GESER -->
    <div class="toggle-container">
        <div class="toggle">

            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>

                <p>
                    Enter your personal details to use all of the site features.
                </p>

                <button type="button" class="toggle-button" id="loginBtn">
                    Sign In
                </button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>

                <p>
                    Register with your personal details to use all of site features.
                </p>

                <button type="button" class="toggle-button" id="registerBtn">
                    Sign Up
                </button>
            </div>

        </div>
    </div>

</div>

<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('registerBtn');
    const loginBtn = document.getElementById('loginBtn');

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });

    @if ($errors->any() && old('name'))
        container.classList.add('active');
    @endif
</script>

</body>
</html>
