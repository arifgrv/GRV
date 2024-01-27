<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <title>Home Page</title>
    <style>
        body {
            background-color: #231F20; /* Black */
            color: #BB9642; /* Golden */
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                    	<h1>Welcome to GRV Cineplex! </h1>
                    	<img class="rounded-image" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="100" height="100">
                        <h4 class="mb-0">Movie Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('index.php/SitPlan') ;?>" method="POST"> 
                            <div class="form-group">
                                <label for="show_name">Show Name:</label>
                                <select class="form-control" id="show_name" name="show_name" required>
                                    <?php foreach ($moviename as $key => $mn) { ?>
                                       <option value="<?php echo $mn['id']; ?>"><?php echo $mn['MovieName']; ?></option>
                                    <?php };?>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="show_date">Show Date:</label>
                                <input class="form-control" type="date" name="show_date" id="show_date" value="<?php echo date('Y-m-d');?>">
                            </div>
                            <div class="form-group">
                                <label for="show_time">Show Time:</label>
                                <select class="form-control" id="show_time" name="show_time" required>
                                    <?php foreach ($showtime as $key => $st) { ?>
                                        <option value="<?php echo $st['id']; ?>"><?php echo $st['ShowTime']; ?></option>
                                    <?php }; ?>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
			            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<footer class="mt-5">
  Design and Developed by : www.iarifbd.com
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
