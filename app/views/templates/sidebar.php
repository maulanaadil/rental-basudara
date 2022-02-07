  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Rental Basudara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
       <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="<?= base_url; ?>/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
      <?php
      
      if ($_COOKIE['username'] == 'admin') {
        ?>
          <li class="nav-item">
            <a href="<?= base_url; ?>/transaksi" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?= base_url; ?>/playstation" class="nav-link">
              <i class="nav-icon fas fa-gamepad"></i>
              <p>
                Playstation
              </p>
            </a>
          </li>

        <?php
      } else 
      if ($_COOKIE['username'] == 'penjaga') {
        ?>
          <li class="nav-item">
            <a href="<?= base_url; ?>/peminjaman" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/pengembalian" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pengembalian
              </p>
            </a>
          </li>
        <?php
      }

      ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>