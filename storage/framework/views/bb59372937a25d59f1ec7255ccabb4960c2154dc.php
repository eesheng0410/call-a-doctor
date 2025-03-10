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
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #3AAFA9;
        }

        .form-group {
            margin-bottom: 20px;
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
            padding: 15px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #2b7c7b;
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

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
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
        <div class="form-container">
            <h2>Add Doctor</h2>
            <form method="POST" action="<?php echo e(route('clinic.doctors.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <select name="specialization" id="specialization" required>
                        <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($specialization); ?>"><?php echo e($specialization); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="submit-button">Add Doctor</button>
            </form>
            <?php if($errors->any()): ?>
                <div class="error-message">
                    <p><?php echo e($errors->first()); ?></p>
                </div>
            <?php endif; ?>
            <a href="<?php echo e(route('clinic.doctors.index')); ?>" class="back-link">Back to Manage Doctors</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\USER\PycharmProjects\CaD\call-a-doctor\resources\views/clinic/doctors/create.blade.php ENDPATH**/ ?>