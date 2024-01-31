  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('index.php/counter'); ?>">
          <i class="bi bi-grid"></i>
          <span>Counter Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Ticket Sell</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/BookTicket/1'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>General Customer</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('index.php/BookTicket/2'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>Discount Customer</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Payment-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Sales Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Payment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/Accounts'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Current Date</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('index.php/Accounts'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Ledger</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-credit-card" aria-hidden="true"></i><span>Online Payment Verification</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/PaymentApproval'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Payment Approval</span>
            </a>
          </li>
        </ul>
      </li><!-- End Payment Verification -->

      <hr>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/logout'); ?>">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->