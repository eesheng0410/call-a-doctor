<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #DEF2F1;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #3AAFA9;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            cursor: pointer;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .record-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .record-table th, .record-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .record-table th {
            background-color: #3AAFA9;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 onclick="window.location='{{ route('doctor.dashboard') }}'">Doctor Dashboard</h1>
        <ul>
            <li><a href="{{ route('doctor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('doctor.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
    <div class="container">
        <h2>Patient Records</h2>
        <table class="record-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Prescription</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>35</td>
                    <td>Male</td>
                    <td>Medicine A, Medicine B</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
