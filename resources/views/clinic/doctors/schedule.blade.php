<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doctor->name }}'s Schedule</title>
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
        }

        .doctor-schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .doctor-schedule-table th, .doctor-schedule-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .doctor-schedule-table th {
            background-color: #3AAFA9;
            color: white;
        }

        .doctor-schedule-table td {
            background-color: #ffffff;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3AAFA9;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 onclick="window.location='{{ route('clinic.dashboard') }}'">Call-A-Doctor</h1>
        <ul>
            <li><a href="{{ route('clinic.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('clinic.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('clinic.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
    <div class="container">
        <h2>{{ $doctor->name }}'s Schedule</h2>
        <table class="doctor-schedule-table">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('clinic.doctors.index') }}" class="back-link">Back to Manage Doctors</a>
    </div>
</body>
</html>
