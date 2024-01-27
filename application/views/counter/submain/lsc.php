        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

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
                  <a href="<?php echo base_url('index.php/BookTicket'); ?>">
                  <h5 class="card-title">Total Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                        if (!is_null($TGS['total_sales'])) {
                          echo (number_format(($TGS['total_sales']+$TDS['total_discount_sales']), 2, '.', ',')) ;
                        }else{
                          echo '00.00';
                        };
                      ?></h6>
                      <span class="text-success small pt-1 fw-bold">BDT</span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                  </a>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

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
                  <a href="<?php echo base_url('index.php/accountsreport') ;?>" target="_blank">
                  <h5 class="card-title">General Sales <span>| Grand Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php 
                          if (!is_null($TGSales['total_sales'])) {
                            print_r(number_format($TGSales['total_sales'], 2, '.', ','));
                          }else{
                            echo '00.00';
                          };
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">BDT</span> 
                      <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                  </a>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Online Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

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
                  <a href="<?php echo base_url('index.php/AccountsDReport') ;?>" target="_blank">
                  <h5 class="card-title">Discount Sales <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-nvme"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                        if (!is_null($TDSales['total_discount_sales'])) {
                          print_r(number_format($TDSales['total_discount_sales'], 2, '.', ',')) ;
                        }else{
                          echo '00.00';
                        };
                       ?></h6>
                      <span class="text-success small pt-1 fw-bold">BDT</span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                  </a>
                </div>

              </div>
            </div><!-- End Online Card -->

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
                      <?php foreach ($GSales as $key => $value): ?>
                      <tr>
                        <th scope="row"><a href="<?php echo base_url('index.php/reprint/'.$value['invoice_number']);?>" target="_blank"><?php echo $value['invoice_number'] ; ?></a></th>
                        <td><?php echo $value['customer_name']; ?></td>
                        <td><?php echo $value['customer_mobile']; ?></td>
                        <td><?php echo $value['currentdate']; ?></td>
                        <td><?php echo $value['reserve_date'].'-'.$value['movie_name'].'-'.$value['show_time']; ?></td>
                      </tr>  
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Recent Sales -->

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
                  <h5 class="card-title">Discount  Sales <span>Info</span></h5>
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
                      <?php foreach ($DSales as $key => $value): ?>
                      <tr>
                        <th scope="row"><a href="<?php echo base_url('index.php/dreprint/'.$value['invoice_number']);?>" target="_blank"><?php echo $value['invoice_number'] ; ?></a></th>
                        <td><?php echo $value['customer_name']; ?></td>
                        <td><?php echo $value['customer_mobile']; ?></td>
                        <td><?php echo $value['currentdate']; ?></td>
                        <td><?php echo $value['reserve_date'].'-'.$value['movie_name'].'-'.$value['show_time']; ?></td>
                      </tr>  
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->