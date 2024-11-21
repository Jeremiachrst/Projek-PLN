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


<div class="fitur-cont">
    <ul>
        <li class="nav-item">
            <button type="button" class="btn btn-search my-2 my-sm-0 mr-2" data-toggle="modal" data-target="#tambahDataModal">Tambah Data</button>
        </li>
        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0">
                <label for="perPage" class="mr-2 text-light">Tampilkan:</label>
                <select class="custom-dropdown form-control mr-2" id="perPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
            </form>
        </li>
        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-2">
                <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Cari..." aria-label="Search">
            </form>
        </li>
    </ul>
</div>
<div class="my-3">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
</div>