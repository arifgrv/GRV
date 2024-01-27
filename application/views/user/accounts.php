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
            <div class="card-body">
              <h5 class="card-title">General Sales<span>Info</span></h5>
                <form action="<?php echo base_url("index.php/accountsreport"); ?>" method="POST">
                    <div class="row bg-light p-3">
                        <div class="col-md-4">
                            <label for="Date_From">From:</label>
                            <input class="form-control" type="date" name="Date_From" required>
                        </div>
                        <div class="col-md-4">
                            <label for="Date_TO">To:</label>
                            <input class="form-control" type="date" name="Date_TO" required>
                        </div>
                        <div class="col-md-4 text-center mt-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <table id="salesTable" class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice Number</th>
                            <th>Booking Date</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Show Information</th>
                            <th>Seat Numbers</th>
                            <th>Ticket Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accReport as $key => $row) { ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $row['invoice_number']; ?></td>
                                <td><?php echo $row['currentdate']; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['customer_mobile']; ?></td>
                                <td><?php echo $row['reserve_date'] . ' - ' . $row['movie_name'] . ' - ' . $row['show_time']; ?></td>
                                <td><?php echo $row['seat_number']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                            </tr>
                        <?php }; ?>
                        <!-- Sales data will be dynamically loaded here -->
                    </tbody>
                </table>
            </div>
          </div>
        </div><!-- End Recent Sales -->
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php';?>  