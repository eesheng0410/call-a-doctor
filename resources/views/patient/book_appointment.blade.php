<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3AAFA9;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .filter-container {
            margin-bottom: 20px;
        }

        .filter-container label {
            font-size: 1.2em;
            margin-right: 10px;
        }

        .filter-container select {
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .book-button {
            background-color: #3AAFA9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .book-button:hover {
            background-color: #2b7c7b;
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
        <h1>Book an Appointment</h1>
        <div class="filter-container">
            <label for="area">Filter by Area:</label>
            <select id="area" name="area" onchange="filterClinics()">
                <option value="">-- Select Area --</option>
                @foreach($areas as $area)
                    <option value="{{ $area }}">{{ $area }}</option>
                @endforeach
            </select>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Clinic Name</th>
                    <th>Area</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="clinicTableBody">
                @foreach($clinics as $clinic)
                    <tr data-area="{{ $clinic->area }}">
                        <td>{{ $clinic->name }}</td>
                        <td>{{ $clinic->area }}</td>
                        <td>
                            <a href="{{ route('patient.bookClinicForm', ['clinic' => $clinic->id]) }}" class="book-button">Book</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function filterClinics() {
            var area = document.getElementById('area').value;
            var rows = document.querySelectorAll('#clinicTableBody tr');

            rows.forEach(function(row) {
                if (area === "" || row.getAttribute('data-area') === area) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
