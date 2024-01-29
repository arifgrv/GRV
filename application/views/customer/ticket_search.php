<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

  <main id="main" class="main">

    <?php include 'submain/pagetitle.php';?>

    <section class="section dashboard">
      <div class="row">
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
                            <form action="<?php echo base_url('index.php/UserSitPlan') ;?>" method="POST"> 
                                <div class="form-group">
                                    <label for="show_name">Show Name:</label>
                                    <select class="form-control" id="show_name" name="show_name" required>
                                        <?php foreach ($moviename as $key => $mn) { ?>
                                           <option value="<?php echo $mn['MovieName']; ?>"><?php echo $mn['MovieName']; ?></option>
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
                                            <option value="<?php echo $st['ShowTime']; ?>"><?php echo $st['ShowTime']; ?></option>
                                        <?php }; ?>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <input type="hidden" name="CustomerType" value="<?php echo $CustomerType ;?>">
                                <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php';?>  