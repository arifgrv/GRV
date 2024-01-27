<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>User Registration</title>
    <style>
        body {
            background-color: #BB9642;
            color: #231F20;
        }

        .card {
            background-color: #231F20;
            color: #BB9642;
        }

        .btn-primary {
            background-color: #BB9642;
            border-color: #BB9642;
        }

        .btn-primary:hover {
            background-color: #231F20;
            border-color: #231F20;
        }

        a {
            color: #BB9642;
        }

        a:hover {
            color: #231F20;
        }

        .rounded-image {
            width: 150px;
            height: 150px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color:white ;
        }


    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="rounded-image mx-auto mt-2">
                   <img class="img-fluid" alt="LOGO" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="150" height="150">
                </div>
                <div class="card-header">
                    <h3 class="text-center">GRV Cineplex</h3>
                    <h5 class="text-center">User Registration</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('index.php/RegSave') ;?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" value="<?php echo set_value('username'); ?>">
                            <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="Mobile">Mobile:</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter your 11 digit mobile number"value="<?php echo set_value('mobile'); ?>">
                            <?php echo form_error('mobile', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
                            <?php echo form_error('confirmPassword', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Already registered? <a href="<?php echo base_url('index.php/login') ;?>">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
