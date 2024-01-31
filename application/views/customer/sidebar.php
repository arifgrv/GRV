  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('index.php/customer'); ?>">
          <i class="bi bi-grid"></i>
          <span>User Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/UserBookTicket/1'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>Online Booking</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('index.php/UserBookTicket/2'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>Have Discount Voucher?</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Print Ticket</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/PaymentVerification'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Payment Verification Pending</span>
            </a>
          </li>
                    <li>
            <a href="<?php echo base_url('index.php/PaymentVerification'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Print Tickets</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <hr>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/logout'); ?>">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->