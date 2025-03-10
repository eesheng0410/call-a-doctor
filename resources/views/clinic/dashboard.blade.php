<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #DEF2F1; /* Mint Green Background */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #3AAFA9;
            padding: 10px;
            color: white;
            width: 100%;
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
            margin: 0;
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
            max-width: 90%;
            width: 1200px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Deeper shadow for a floating effect */
            margin-top: 30px;
        }

        .appointments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .appointment-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .appointment-table th, .appointment-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .appointment-table th {
            background-color: #3AAFA9;
            color: white;
        }

        .appointment-table td a {
            color: #3AAFA9;
            text-decoration: none;
        }

        .appointment-table td a:hover {
            text-decoration: underline;
        }

        .back-button-container {
            text-align: right;
            margin-top: 20px;
        }

        .back-button {
            background-color: #3AAFA9; /* Sky Blue Button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow to buttons */
        }

        .back-button:hover {
            background-color: #2b7c7b; /* Darker Sky Blue on hover */
            transform: translateY(-5px); /* Slight lift on hover */
        }

        .back-button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 onclick="window.location='{{ route('clinic.dashboard') }}'">Call-A-Doctor</h1>
        <ul>
            <li><a href="{{ route('clinic.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('clinic.doctors.index') }}">Doctors</a></li>
            <li><a href="{{ route('clinic.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('clinic.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
    <div class="container">
        <div class="appointments-header">
            <h2>Upcoming Appointments</h2>
        </div>
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Type of Service</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->age }}</td>
                        <td>{{ $appointment->gender }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->type_of_service }}</td>
                        <td>
                            <select name="status[{{ $appointment->id }}]" required>
                                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="accepted" {{ $appointment->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $appointment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>
                        <td><a href="{{ route('clinic.appointmentDetails', $appointment->id) }}">View Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
