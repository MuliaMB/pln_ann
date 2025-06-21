<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PLN Insight</title>
    
    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: white;
            text-align: left;
            background-color: #0D1117;
            font-family: 'Raleway', sans-serif;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            background-color: #151B23;
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: 'Raleway', sans-serif;
        }

        .my-form,
        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row,
        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .card {
            border-radius: 15px;
            border-color: white;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 0 15px rgba(47, 129, 247, 0.2);
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #2f81f7;
            box-shadow: 0 0 5px rgba(47, 129, 247, 0.5);
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #2ea043;
            transform: scale(1.02);
            transition: all 0.2s ease-in-out;
        }

        .text-center a:hover {
            text-decoration: underline !important;
        }

        input[type="checkbox"]:checked {
            accent-color: #238636;
        }

        /* Glass effect card */
        .glass-card {
            background-color: rgba(21, 27, 35, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: glassFade 0.6s ease-in-out;
        }

        @keyframes glassFade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
