<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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

        .appointments {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        .appointments th, .appointments td {
            padding: 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .appointments th {
            background-color: #3AAFA9; /* Sky Blue Background for headers */
            color: white;
        }

        .appointments td {
            background-color: #ffffff;
        }

        .appointments tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .appointment-details-button {
            background-color: #3AAFA9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow to buttons */
        }

        .appointment-details-button:hover {
            background-color: #2b7c7b; /* Darker Sky Blue on hover */
        }

        .book-appointment-button {
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

        .book-appointment-button:hover {
            background-color: #2b7c7b; /* Darker Sky Blue on hover */
        }
    </style>
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
        <h1>Welcome, <?php echo e(auth()->user()->name); ?></h1>
        <h2>Upcoming Appointments</h2>
        <table class="appointments">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($appointment->id); ?></td>
                        <td><?php echo e($appointment->appointment_date); ?></td>
                        <td><?php echo e($appointment->appointment_time); ?></td>
                        <td><?php echo e(ucfirst($appointment->status)); ?></td>
                        <td>
                            <a href="<?php echo e(route('patient.appointmentDetails', $appointment->id)); ?>" class="appointment-details-button">View Details</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">No appointments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('patient.bookAppointment')); ?>" class="book-appointment-button">Book an Appointment</a>
    </div>
</body>
</html>
<?php /**PATH C:\Users\USER\PycharmProjects\CaD\call-a-doctor\resources\views/patient/dashboard.blade.php ENDPATH**/ ?>