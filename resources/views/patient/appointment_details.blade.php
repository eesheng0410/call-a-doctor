<!DOCTYPE html>
<html>
<head>
    <title>Appointment Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #E8F6F3;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        h1 {
            margin-bottom: 40px;
            color: #3AAFA9;
            font-size: 2.5em;
            letter-spacing: 2px;
            text-align: center;
        }
        .close-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: #3AAFA9;
        }
        .details {
            margin-top: 30px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details table th, .details table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .details table th {
            background-color: #3AAFA9;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="close-button" onclick="window.location.href='{{ route('patient.dashboard') }}'">&times;</button>
        <h1>Appointment Details</h1>
        <div class="details">
            <table>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
                <tr>
                    <td>Appointment ID</td>
                    <td>{{ $appointment->id }}</td>
                </tr>
                <tr>
                    <td>Clinic Name</td>
                    <td>{{ $appointment->clinic->name }}</td>
                </tr>
                <tr>
                    <td>Appointment Date</td>
                    <td>{{ $appointment->appointment_date }}</td>
                </tr>
                <tr>
                    <td>Appointment Time</td>
                    <td>{{ $appointment->appointment_time }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
                <tr>
                    <td>Type of Service</td>
                    <td>{{ $appointment->type_of_service }}</td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td>{{ $appointment->details }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
