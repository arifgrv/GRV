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
              <h5 class="card-title">Payment Varification: <span>Info</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">INV#</th>
                    <th scope="col">Status</th>
                    <th scope="col">transaction_id</th>
                    <th scope="col">Received Amount</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Customer Info</th>
                    <th scope="col">Show Information</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($PaymentStatus as $key => $value): ?>
                  <tr>
                    <th scope="row"><?php echo $value['invoice_number'] ; ?></th>
                    <td><?php echo $value['comments']; ?></td>
                    <td><?php echo $value['transaction_id']; ?></td>
                    <td><?php echo $value['received_amount']; ?></td>
                    <td><?php echo $value['booking_date']; ?></td>
                    <td><?php echo $value['customer_name'].'<br/>'.$value['customer_mobile']; ?></td>
                    <td><?php echo $value['booking_date'].'-'.$value['movie_name'].'-'.$value['show_time']; ?></td>
                    <td>
                        <a href="<?php echo base_url('index.php/PayApprove/'.$value['invoice_number']); ?>"><button class="btn btn-success">Approve</button></a>
                        <a href="<?php echo base_url('index.php/PayReject/'.$value['invoice_number']); ?>"><button class="btn btn-danger">Reject</button></a>
                      </td>
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