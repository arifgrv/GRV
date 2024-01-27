        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <h1>Welcome to GRV Cineplex</h1>
            <?php foreach ($homepage as $key => $value) { ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body mt-3">
                  <a href="<?php echo base_url('index.php/UserBookTicket'); ?>">
                    <img src="<?php echo  base_url($value['poster']); ?>" class="card-img-top" alt="Movie A" width="300" height="300">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $value['Show_Name']; ?></h3>
                        <h5 class="card-text"><?php echo $value['Show_Date']; ?></h5>
                        <p class="card-text"><?php echo $value['Show_Time']; ?></p>
                        <a href="<?php echo base_url('index.php/UserBookTicket'); ?>" class="btn btn-primary mt-5">Book Now</a>
                    </div>
                  </a>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <?php }; ?>

        </div><!-- End Left side columns -->