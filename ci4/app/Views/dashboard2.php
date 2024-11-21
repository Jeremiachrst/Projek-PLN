<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PLN Power Service Dashboard</title>
    <link href="<?= base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="<?= base_url('public/style/db.css'); ?>" rel="stylesheet">
</head>

<body>

    <!-- Sidebar -->
    <?= $this->include('sidebar') ?>

    <div class="main-content">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <img src="<?= base_url('public/images/logo.png') ?>" alt="Logo PT PLN Power Service" style="width: 180px; height: 50px; object-fit: cover;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-search my-2 my-sm-0 mr-2">
                            <i class="fas fa-bell"></i>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn p-0" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="profile-picture" alt="Profile Picture" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= session()->get('username') ?></h5>
                                    <a href="<?= base_url('/public/logout') ?>" class="btn btn-logout my-2 my-sm-0" style="border:none;background-color:#fff;width:120px;">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div>
            <form class="form-inline">
                <label for="filterTahun" class="mr-sm-2 text-light">Tahun :</label>
                <select class="custom-dropdown form-control mr-2" id="filterTahun">
                    <option value="10">2024</option>
                    <option value="20">2023</option>
                    <option value="30">2022</option>
                </select>
            </form>
        </div>

        <!-- Total Rencana Pendapatan -->
        <div class="border-tabel mt-30">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #021F3F;">Existing</h5>
                            <p class="card-text" style="color: #021F3F;">Rp. <?= number_format($eksistingApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Existing : <?= htmlspecialchars($existingDataP->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #021F3F;">Proyeksi Baru</h5>
                            <p class="card-text" id="proyeksiBaru" style="color: #021F3F;">Rp. <?= number_format($proyeksiBaruApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Proyeksi Baru: <?= htmlspecialchars($proyeksiBaruDataP->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card2">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #fff;">Total Rencana Pendapatan</h5>
                            <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingApproveRP->data + $proyeksiBaruApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-text" style="color: #fff;">Total Rencana Pendapatan : <?= htmlspecialchars($proyeksiBaruDataP->data + $existingDataP->data); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Existing</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($eksistingTidakApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Existing : <?= htmlspecialchars($ExistingDataPD->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Proyeksi Baru</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($proyeksiBaruTidakApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Proyeksi Baru : <?= htmlspecialchars($ProyeksiBaruDataPD->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Cadangan</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($cadanganTidakApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Cadangan : <?= htmlspecialchars($CadanganDataPD->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card2">
                        <div class="card-body">
                            <h6 class="card-title" style="color: #fff;">Total Rencana Pendapatan (draft)</h6>
                            <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingTidakApproveRP->data + $proyeksiBaruTidakApproveRP->data + $cadanganTidakApproveRP->data, 0, ',', '.'); ?></p>
                            <p class="card-text" style="color: #fff;">Total Rencana Pendapatan : <?= htmlspecialchars($ExistingDataPD->data + $ProyeksiBaruDataPD->data + $CadanganDataPD->data); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #fff;">Total Rencana Pendapatan + Cadangan</h5>
                    <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingApproveRP->data + $proyeksiBaruApproveRP->data + $eksistingTidakApproveRP->data + $proyeksiBaruTidakApproveRP->data + $cadanganTidakApproveRP->data, 0, ',', '.'); ?></p>
                    <p class="card-text" style="color: #fff;">Summary All data pendapatan : <?= htmlspecialchars($ExistingDataPD->data + $ProyeksiBaruDataPD->data + $CadanganDataPD->data + $proyeksiBaruDataP->data + $existingDataP->data); ?></p>
                </div>
            </div>

        </div>

        <!-- Total Rencana Beban -->
        <div class="border-tabel">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #021F3F;">Existing</h5>
                            <p class="card-text" style="color: #021F3F;">Rp. <?= number_format($eksistingApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Existing : <?= htmlspecialchars($existingApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #021F3F;">Proyeksi Baru</h5>
                            <p class="card-text" style="color: #021F3F;">Rp. <?= number_format($proyeksiBaruApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Proyeksi Baru : <?= htmlspecialchars($proyeksiBaruApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card2">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #fff;">Total Rencana Beban</h5>
                            <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingApproveBebanRP->data + $proyeksiBaruApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-text" style="color: #fff;">Total Rencana Beban : <?= htmlspecialchars($existingApproveBeban->data + $proyeksiBaruApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Existing</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($eksistingTidakApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Existing : <?= htmlspecialchars($existingTidakApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Proyeksi Baru</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($proyeksiBaruTidakApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Proyeksi Baru : <?= htmlspecialchars($proyeksiBaruTidakApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #343a40;">Cadangan</h5>
                            <p class="card-text" style="color: #495057;">Rp. <?= number_format($CadanganTidakApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-title" style="color: #021F3F;">Cadangan : <?= htmlspecialchars($cadanganTidakApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card2">
                        <div class="card-body">
                            <h6 class="card-title" style="color: #fff;">Total Rencana Beban (draft)</h6>
                            <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingTidakApproveBebanRP->data + $proyeksiBaruTidakApproveBebanRP->data + $CadanganTidakApproveBebanRP->data, 0, ',', '.'); ?></p>
                            <p class="card-text" style="color: #fff;">Total Rencana Beban : <?= htmlspecialchars($existingTidakApproveBeban->data + $proyeksiBaruTidakApproveBeban->data + $cadanganTidakApproveBeban->data); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #fff;">Total Rencana Beban + Cadangan</h5>
                    <p class="card-text" style="color: #fff;">Rp. <?= number_format($eksistingApproveBebanRP->data + $proyeksiBaruApproveBebanRP->data + $eksistingTidakApproveBebanRP->data + $proyeksiBaruTidakApproveBebanRP->data + $CadanganTidakApproveBebanRP->data, 0, ',', '.'); ?></p>
                    <p class="card-text" style="color: #fff;">Summary All data beban : <?= htmlspecialchars($existingApproveBeban->data + $proyeksiBaruApproveBeban->data + $existingTidakApproveBeban->data + $proyeksiBaruTidakApproveBeban->data + $cadanganTidakApproveBeban->data); ?></p>
                </div>
            </div>
        </div>

        <!--Grafik-->
        <div class="row">
            <div class="col-md-4 grafik">
                <div class="card mb-4" style="background-color: #021F3F; border: 1px solid #dee2e6;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #fff;">Grafik 1</h5>
                        <canvas id="myChart" width="40" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grafik">
                <div class="card mb-4" style="background-color: #021F3F; border: 1px solid #dee2e6;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #fff;">Grafik 5</h5>
                        <canvas id="grafik5" width="400" height="2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grafik">
                <div class="card mb-4" style="background-color: #021F3F; border: 1px solid #dee2e6;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #fff;">Grafik 5</h5>
                        <canvas id="grafik5" width="400" height="2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #021F3F; border: 1px solid #dee2e6;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #fff;">Grafik 5</h5>
                        <canvas id="grafik5" width="400" height="2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= base_url('public/js/script.js') ?>"></script>
</body>

</html>