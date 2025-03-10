<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #DEF2F1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: left;
        }

        h1 {
            color: #3AAFA9;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-group select {
            background-color: #fff;
        }

        .submit-button {
            background-color: #3AAFA9;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
        }

        .submit-button:hover {
            background-color: #2b7c7b;
            transform: translateY(-5px);
        }

        .submit-button:focus {
            outline: none;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3AAFA9;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .back-button:hover {
            color: #2b7c7b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Doctor</h1>
        <form method="POST" action="{{ route('clinic.doctors.update', $doctor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Doctor's Name</label>
                <input type="text" name="name" id="name" value="{{ $doctor->name }}" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization</label>
                <select name="specialization" id="specialization" required>
                    <option value="" disabled>Select Specialization</option>
                    <option value="General Practitioner" {{ $doctor->specialization == 'General Practitioner' ? 'selected' : '' }}>General Practitioner</option>
                    <option value="Pediatrics" {{ $doctor->specialization == 'Pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                    <option value="Cardiology" {{ $doctor->specialization == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                    <option value="Dermatology" {{ $doctor->specialization == 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" class="submit-button">Update Doctor</button>
        </form>
        <a href="{{ route('clinic.doctors.index') }}" class="back-button">Back to Doctors</a>
    </div>
</body>
</html>
