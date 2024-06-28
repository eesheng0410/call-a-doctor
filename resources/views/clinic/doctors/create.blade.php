<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #DEF2F1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
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
        }

        .submit-button:hover {
            background-color: #2b7c7b;
            transform: translateY(-5px);
        }

        .submit-button:focus {
            outline: none;
        }

        .link-group {
            margin-top: 20px;
        }

        .link-group a {
            color: #3AAFA9;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .link-group a:hover {
            color: #2b7c7b;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Doctor</h1>
        <form method="POST" action="{{ route('clinic.doctors.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Doctor's Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization</label>
                <select name="specialization" id="specialization" required>
                    <option value="" disabled selected>-- Select Specialization --</option>
                    @foreach($specializations as $specialization)
                        <option value="{{ $specialization }}">{{ $specialization }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="submit-button">Add Doctor</button>
        </form>
        <div class="link-group">
            <a href="{{ route('clinic.doctors.index') }}">Back to Doctors List</a>
        </div>
    </div>
</body>
</html>
