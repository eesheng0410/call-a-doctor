<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #DEF2F1; /* Mint Green Background */
            margin: 0;
            padding: 0;
        }

        .navbar {
            width: 100%;
            background-color: #3AAFA9;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow to navbar */
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box; /* Ensures padding is included in the element's total width and height */
        }

        .navbar .logo-container {
            display: flex;
            align-items: center;
        }

        .navbar .logo {
            width: 40px;
            height: 40px;
        }

        .navbar .title {
            color: white;
            font-size: 1.5em;
            margin-left: 10px;
            font-family: 'Poppins', sans-serif;
            text-decoration: none; /* Remove underline */
        }

        .navbar .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            margin-left: 10px; /* Reduced margin for better fit */
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            color: #DEF2F1;
        }

        .navbar .nav-links form {
            margin-left: 10px; /* Reduced margin for better fit */
        }

        .container {
            width: 100%;
            max-width: 1200px;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px; /* More rounded corners */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Deeper shadow for a floating effect */
            margin: 20px auto;
        }

        h1 {
            margin-bottom: 40px;
            color: #3AAFA9; /* Sky Blue Color */
            font-size: 2.5em;
            letter-spacing: 2px; /* Added spacing for a futuristic look */
        }

        .profile-info {
            font-size: 1.2em;
            line-height: 2;
        }

        .profile-info label {
            font-weight: bold;
        }

        .profile-info p {
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #3AAFA9;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px; /* Fully rounded buttons for a futuristic look */
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow to buttons */
            display: block;
            margin: 0 auto;
        }

        .submit-button:hover {
            background-color: #2b7c7b; /* Darker Sky Blue on hover */
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <a href="{{ route('patient.dashboard') }}" style="display: flex; align-items: center; text-decoration: none;">
                <img src="{{ asset('images/logo.png') }}" alt="Call-A-Doctor Logo" class="logo">
                <span class="title">Call-A-Doctor</span>
            </a>
        </div>
        <div class="nav-links">
            <a href="{{ route('patient.profile') }}">Profile</a>
            <a href="{{ route('patient.bookAppointment') }}">Appointment</a>
            <form method="POST" action="{{ route('patient.logout') }}">
                @csrf
                <button type="submit" class="logout-button" style="background: none; border: none; color: white; font-size: 1.2em; cursor: pointer;">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <h1>Your Profile</h1>
        <div class="profile-info">
            <p><label>Name:</label> {{ auth()->user()->name }}</p>
            <p><label>Email:</label> {{ auth()->user()->email }}</p>
        </div>
        <h2>Change Password</h2>
        <form method="POST" action="{{ route('patient.updatePassword') }}">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="tip">Tip (Optional)</label>
                <input type="text" id="tip" name="tip">
            </div>
            <button type="submit" class="submit-button">Update Password</button>
        </form>
    </div>
</body>
</html>
