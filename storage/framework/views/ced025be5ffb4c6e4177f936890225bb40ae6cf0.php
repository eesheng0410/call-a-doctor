<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
            font-family: 'Poppins', sans-serif; /* Ensures the font is normal */
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var today = new Date();
            var tomorrow = new Date();
            tomorrow.setDate(today.getDate() + 1);

            var dd = String(tomorrow.getDate()).padStart(2, '0');
            var mm = String(tomorrow.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = tomorrow.getFullYear();

            var tomorrowStr = yyyy + '-' + mm + '-' + dd;
            document.getElementById('appointment_date').setAttribute('min', tomorrowStr);
        });
    </script>
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <a href="<?php echo e(route('patient.dashboard')); ?>" style="display: flex; align-items: center; text-decoration: none;">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Call-A-Doctor Logo" class="logo">
                <span class="title">Call-A-Doctor</span>
            </a>
        </div>
        <div class="nav-links">
            <a href="<?php echo e(route('patient.profile')); ?>">Profile</a>
            <a href="<?php echo e(route('patient.bookAppointment')); ?>">Appointment</a>
            <form method="POST" action="<?php echo e(route('patient.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-button" style="background: none; border: none; color: white; font-size: 1.2em; cursor: pointer;">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <h1>Create Appointment</h1>
        <form method="POST" action="<?php echo e(route('patient.bookClinic', $clinic->id)); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="0" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="date" id="appointment_date" name="appointment_date" required>
    </div>
    <div class="form-group">
        <label for="appointment_time">Appointment Time</label>
        <select id="appointment_time" name="appointment_time" required>
            <?php for($i = 8; $i <= 23; $i++): ?>
                <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00"><?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00</option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="type_of_service">Type of Service</label>
        <select id="type_of_service" name="type_of_service" required>
            <option value="General Consultation">General Consultation</option>
            <option value="Specialist Consultation">Specialist Consultation</option>
            <option value="Medical Checkup">Medical Checkup</option>
            <option value="Vaccination">Vaccination</option>
            <option value="Emergency Services">Emergency Services</option>
        </select>
    </div>
    <div class="form-group">
        <label for="details">Details</label>
        <textarea id="details" name="details"></textarea>
    </div>
    <button type="submit" class="submit-button">Submit</button>
</form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\USER\PycharmProjects\CaD\call-a-doctor\resources\views/patient/create_appointment.blade.php ENDPATH**/ ?>