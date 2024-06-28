<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call-A-Doctor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #DEF2F1; /* Mint Green Background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px; /* More rounded corners */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Deeper shadow for a floating effect */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effect */
        }

        .container:hover {
            transform: translateY(-10px); /* Lift up on hover */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); /* More pronounced shadow on hover */
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 40px;
            color: #3AAFA9; /* Sky Blue Color */
            font-size: 2.5em;
            letter-spacing: 2px; /* Added spacing for a futuristic look */
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            background-color: #3AAFA9; /* Sky Blue Button */
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px; /* Fully rounded buttons for a futuristic look */
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow to buttons */
        }

        .btn:hover {
            background-color: #2b7c7b; /* Darker Sky Blue on hover */
            transform: translateY(-5px); /* Slight lift on hover */
        }

        .btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Call-A-Doctor Logo" class="logo">
        <h1>Call-A-Doctor</h1>
        <div class="btn-group">
            <button class="btn" onclick="window.location='{{ route('patient.login') }}'">Patient</button>
            <button class="btn" onclick="window.location='{{ route('clinic.login') }}'">Clinic</button>
            <button class="btn" onclick="window.location='{{ route('doctor.login') }}'">Doctor</button>
        </div>
    </div>
</body>
</html>
