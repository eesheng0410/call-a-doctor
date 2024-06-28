<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
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

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .doctor-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .doctor-table th, .doctor-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .doctor-table th {
            background-color: #3AAFA9;
            color: white;
        }

        .doctor-table td a {
            color: #3AAFA9;
            text-decoration: none;
        }

        .doctor-table td a:hover {
            text-decoration: underline;
        }

        .add-doctor-button {
            background-color: #3AAFA9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .add-doctor-button:hover {
            background-color: #2b7c7b;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 onclick="window.location='<?php echo e(route('clinic.dashboard')); ?>'">Call-A-Doctor</h1>
        <ul>
            <li><a href="<?php echo e(route('clinic.dashboard')); ?>">Dashboard</a></li>
            <li><a href="<?php echo e(route('clinic.logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="<?php echo e(route('clinic.logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </ul>
    </div>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="success-message">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <h2>Manage Doctors</h2>
        <a href="<?php echo e(route('clinic.doctors.create')); ?>" class="add-doctor-button">Add Doctor</a>
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($doctor->id); ?></td>
                        <td><?php echo e($doctor->name); ?></td>
                        <td><?php echo e($doctor->specialization); ?></td>
                        <td>
                            <a href="<?php echo e(route('clinic.doctors.schedule', $doctor->id)); ?>">View Schedule</a>
                            <form action="<?php echo e(route('clinic.doctors.destroy', $doctor->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-button">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\Users\USER\PycharmProjects\CaD\call-a-doctor\resources\views/clinic/doctors/index.blade.php ENDPATH**/ ?>