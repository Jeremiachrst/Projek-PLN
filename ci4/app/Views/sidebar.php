<div class="sidebar" id="sidebar" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('public/images/sidebar.jpg'); ?>');">
    <div>
        <button class="m-btn btn-primary toggle-btn me-auto" id="sidebarToggleBtn">
            <span class="d-inline d-lg-none"><i class="fas fa-angles-right"></i></span>
            <span class="d-none d-lg-inline"><i class="fas fa-bars"></i></span>
        </button>
    </div>

    <!-- Dropdown Menu 1: Dashboard -->
    <div class="dropdown mt-3">
        <a href="<?= base_url('/public/dashboard') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-house-user"></i>
            <span class="menu-text">Dashboard</span>
        </a>
    </div>

    <!-- Dropdown Menu 2: Invoice Tracking -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonInvoice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-invoice-dollar"></i>
            <span class="menu-text">Invoice Tracking</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonInvoice">
            <a class="dropdown-item" href="#">Invoice 1</a>
            <a class="dropdown-item" href="#">Invoice 2</a>
            <a class="dropdown-item" href="#">Invoice 3</a>
        </div>
    </div>

    <!-- Dropdown Menu 3: Bank Garansi -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonBankGaransi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <span class="menu-text">Bank Garansi</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonBankGaransi">
            <a class="dropdown-item" href="#">Bank Garansi 1</a>
            <a class="dropdown-item" href="#">Bank Garansi 2</a>
            <a class="dropdown-item" href="#">Bank Garansi 3</a>
        </div>
    </div>

    <!-- Dropdown Menu 4: Sourcing -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonSourcing" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i>
            <span class="menu-text">Sourcing</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSourcing">
            <a class="dropdown-item" href="#">Sourcing 1</a>
            <a class="dropdown-item" href="#">Sourcing 2</a>
            <a class="dropdown-item" href="#">Sourcing 3</a>
        </div>
    </div>

    <!-- Dropdown Menu 5: Responsibility -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonResponsibility" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <span class="menu-text">Responsibility</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonResponsibility">
            <a class="dropdown-item" href="#">Responsibility 1</a>
            <a class="dropdown-item" href="#">Responsibility 2</a>
            <a class="dropdown-item" href="#">Responsibility 3</a>
        </div>
    </div>

    <!-- Dropdown Menu 6: RKAP Program Kerja -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonRKAP" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-clipboard-list"></i>
            <span class="menu-text">RKAP Program Kerja</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonRKAP">
            <a class="dropdown-item" href="#">RKAP 1</a>
            <a class="dropdown-item" href="#">RKAP 2</a>
            <a class="dropdown-item" href="#">RKAP 3</a>
        </div>
    </div>

    <!-- Dropdown Menu 7: Setting -->
    <div class="dropdown mt-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonSetting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            <span class="menu-text">Setting</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSetting" style="max-height: 300px; overflow-y:auto;">
            <a class="dropdown-item" href="<?= base_url('/public/datapegawai') ?>">Data Pegawai</a>
            <a class="dropdown-item" href="<?= base_url('/public/dataunit') ?>">Data Unit</a>
            <a class="dropdown-item" href="<?= base_url('/public/datarutinitas') ?>">Data Rutinitas</a>
            <a class="dropdown-item" href="<?= base_url('/public/datacustomer') ?>">Customer</a>
            <a class="dropdown-item" href="<?= base_url('/public/categorycust') ?>">Customer Category</a>
            <a class="dropdown-item" href="<?= base_url('/public/naturalAcc') ?>">Natural Account</a>
            <a class="dropdown-item" href="<?= base_url('/public/confidence') ?>">Confidence</a>
            <a class="dropdown-item" href="<?= base_url('/public/proyeksi') ?>">Proyeksi</a>
            <a class="dropdown-item" href="<?= base_url('/public/estimasiPenyerapan') ?>">Estimasi Penyerapan</a>
            <a class="dropdown-item" href="<?= base_url('/public/segmenBisnis') ?>">Segmen Bisnis </a>
            <a class="dropdown-item" href="<?= base_url('/public/subSegmenBisnis') ?>">Sub Segmen Bisnis</a>
            <a class="dropdown-item" href="<?= base_url('/public/pajakRKAP') ?>">Pajak RKAP</a>
            <a class="dropdown-item" href="<?= base_url('/public/dataKategori') ?>">Kategori</a>
            <a class="dropdown-item" href="<?= base_url('/public/jenisAnggaran') ?>">Jenis Anggaran</a>
            <a class="dropdown-item" href="<?= base_url('/public/dataDept') ?>">DEPT</a>
            <a class="dropdown-item" href="<?= base_url('/public/pajakITrack') ?>">Pajak I-Track</a>
            <a class="dropdown-item" href="<?= base_url('/public/pusatBiaya') ?>">Pusat Biaya</a>
            <a class="dropdown-item" href="<?= base_url('/public/kursITrack') ?>">Kurs I-Track</a>
            <a class="dropdown-item" href="<?= base_url('/public/mitraVendor') ?>">Mitra / Vendor</a>
            <a class="dropdown-item" href="<?= base_url('/public/masterRole') ?>">Master Role</a>
        </div>
    </div>
</div>