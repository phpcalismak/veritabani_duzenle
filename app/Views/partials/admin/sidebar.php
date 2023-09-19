<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= $website_ayarlari['site_logosu'] ?>" width="100" height="100">
      <span class="brand-text font-weight-light"><?= $website_ayarlari['site_basligi']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
          <a href="<?= site_url('profile'); ?>">
         <?= session()->get('kullanici_adi') ?> 
          </a>
          <p></p>
        </div>
        <div class="info">
          <a href="" class="d-block">
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<!--      Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--
         
          <li class="nav-item">
            <a href=" " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Düz Datatable
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                El Yapımı Tablo
              </p>
            </a>
          </li>

-->

   
          <li class="nav-item">
            <a href="<?= site_url('aidatlar'); ?> " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Aidatlar
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="<?= site_url('/daireler'); ?> " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Daireler
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="<?= site_url('gelirler'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gelirler
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url('/giderler'); ?> " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Giderler
              </p>
            </a>
          </li>
   
          <li class="nav-item">
            <a href="<?= site_url('hesaplar'); ?> " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Hesaplar
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="<?= site_url('kasa'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kasa
              </p>
            </a>
          </li>
   
          <li class="nav-item">
            <a href="<?= site_url('blok_duzeni'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Site Düzeni
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="<?= site_url('site_ayarlari'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Site Ayarları
              </p>
            </a>
          </li>



         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>