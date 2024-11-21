<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PLN Power Service Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
        }

        #main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .main-content-expanded {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        .sidebar {
            width: 260px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://www.pjbservices.com/wp-content/uploads/2024/01/GEDUNG-PLN-NPS.jpg);
            background-size: cover;
            background-position: 50% 10%;
            color: #fff;
            padding-top: 20px;
            height: 100vh;
            transition: width 0.3s ease;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow-y: auto;
            position: fixed;
            z-index: 5;
        }

        .sidebar .logo {
            margin-top: -50px;
            margin-bottom: 20px;
            text-align: center;
            transition: opacity 0.3s ease;
        }

        .sidebar .logo img {
            max-width: 60%;
            height: auto;
        }

        .sidebar .profile {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .sidebar .profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .btn {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 35px;
            text-align: left;
            padding: 10px;
            border: 2px solid #6c757d;
            border-radius: 10px;
            background-color: #021F3F;
            color: #fff;
            margin-bottom: 10px;
            transition: all 0.7s ease;
            font-size: 0.9rem;
        }

        .sidebar .m-btn {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 35px;
            text-align: left;
            padding: 10px;
            border: 2px solid #6c757d;
            border-radius: 0px;
            background-color: #021F3F;
            color: #fff;
            margin-bottom: 10px;
            transition: all 0.7s ease;
            font-size: 0.9rem;
        }

        .sidebar .btn i {
            margin-right: 10px;
        }

        #sidebarToggleBtn .fas {
            transition: transform 0.3s ease;
            /* Efek transisi rotasi */
        }

        .sidebar-minimized #sidebarToggleBtn .fas {
            transform: rotate(180deg);
            /* Rotasi 180 derajat saat sidebar minimized */
        }

        .sidebar .menu-text {
            flex: 1;
            margin-left: 10px;
            display: block;
        }

        .sidebar .btn:hover {
            background-color: #495057;
            border-color: #495057;
        }

        .sidebar.sidebar-minimized {
            width: 100px;
        }

        .sidebar.sidebar-minimized .btn {
            width: 80%;
            text-align: center;
            padding: 10px;
            margin-left: 0;
        }

        .sidebar.sidebar-minimized .menu-text {
            display: none;
        }

        .sidebar.sidebar-minimized .logo {
            opacity: 0;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content-expanded {
            margin-left: 80px;
        }

        .dropdown-menu {
            background-color: #343a40;
            border: none;
            font-size: 14px;
            padding: 5px;
            margin-top: 5px;
            min-width: 100%;
            border-radius: 0;
            transition: background-color 5s ease;
        }

        .dropdown-item {
            color: #fff;
            padding: 8px 20px;
            transition: background-color 3s ease;
        }

        .dropdown-item:hover {
            background-color: #495057;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }

        .dropdown .btn {
            width: 100%;
            text-align: left;
            padding: 10px;
            border-radius: 0;
        }

        .dropdown .btn i {
            margin-right: 10px;
        }

        .dropdown-menu .dropdown-item {
            padding: 10px 20px;
        }

        .dropdown {
            width: 80%;
        }

        .sidebar.sidebar-minimized .profile img {
            width: 30px;
            /* Ubah ukuran sesuai kebutuhan */
            height: 30px;
            /* Ubah ukuran sesuai kebutuhan */
        }

        .btn-notif {
            background-color: transparent;
            /* Hapus latar belakang agar tampak seperti ikon */
            border: none;
            color: #02101E;
            margin-right: 20px;
            margin-left: auto;
        }

        .btn-logout {
            margin-right: 40px;
        }

        .navbar {
            height: 50px;
            background-color: #e9ecef;
            align-items: right;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR SECTION -->
    <section id="sidebar">
        <div class="sidebar">
            <div>
                <button class="m-btn btn-primary toggle-btn me-auto" id="sidebarToggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="logo" style="margin-top: -105px; margin-bottom: -40px">
                <img src="<?= base_url('public/images/logo.png') ?>" alt="Logo PT PLN Power Service">
            </div>
            <div class="profile">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="rounded-circle" alt="Profile Picture">
                <h5 class="menu-text">Nama User</h5>
            </div>

            <!-- Dropdown Menu 1: Dashboard -->
            <div class="dropdown mt-3">
                <button class="btn btn-primary btn-sm" type="button">
                    <i class="fas fa-house-user"></i>
                    <span class="menu-text">Dashboard</span>
                </button>
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
                    <i class="fas fa-info-circle"></i>
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
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSetting">
                    <a class="dropdown-item" href="#">General Settings</a>
                    <a class="dropdown-item" href="#">Account Settings</a>
                    <a class="dropdown-item" href="#">Privacy Settings</a>
                </div>
            </div>
        </div>
    </section>

    <!-- MAINCONTENT Section -->
    <section id="main-content">
        <nav class="navbar navbar-expand-sm sticky-top">
            <button class="btn-notif btn btn-primary btn-sm">
                <i class="fas fa-bell"></i>
            </button>

            <!-- Tombol Logout -->
            <button class="btn btn-danger btn-sm logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </nav>

    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url('public/js/script.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const mainContent = document.querySelector('.main-content');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-minimized');
                mainContent.classList.toggle('main-content-expanded');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const mainContent = document.getElementById('main-content');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-minimized');
                mainContent.classList.toggle('main-content-expanded');
            });
        });
    </script>

</body>

</html>