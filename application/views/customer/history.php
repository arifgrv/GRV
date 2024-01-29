<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

  <main id="main" class="main">

    <?php include 'submain/pagetitle.php';?>

    <section class="section dashboard">
      <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">General  Sales <span>Info</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">INV#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Show Information</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($AccountsReport as $key => $value): ?>
                  <tr>
                    <th scope="row"><a href="<?php echo base_url('index.php/reprint/'.$value['invoice_number'].'/1');?>" target="_blank"><?php echo $value['invoice_number'] ; ?></a></th>
                    <td><?php echo $value['customer_name']; ?></td>
                    <td><?php echo $value['customer_mobile']; ?></td>
                    <td><?php echo $value['reserve_date']; ?></td>
                    <td><?php echo $value['booking_date'].'-'.$value['movie_name'].'-'.$value['show_time']; ?></td>
                  </tr>  
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Recent Sales -->
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php';?>  