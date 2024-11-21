<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PLN Power Service Dashboard</title>
    <link href="<?= base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="<?= base_url('public/style/SettingStyle.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <?= $this->include('sidebar') ?>

    <!-- main content -->
    <div class="main-content">
        <!-- navbar -->
        <?= $this->include('template/navSet') ?>

        <div class="">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PERSON ID</th>
                            <th>Nilpeg</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Posisi</th>
                            <th>Departemen</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if (!empty($pegawai) && is_array($pegawai)) : ?>
                            <?php foreach ($pegawai as $index => $pegawaiItem) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= esc($pegawaiItem['nama']) ?></td>
                                    <td><?= esc($pegawaiItem['jabatan']) ?></td>
                                    <td><?= esc($pegawaiItem['departemen']) ?></td>
                                    <td><?= esc($pegawaiItem['email']) ?></td>
                                    <td><?= date('d-m-Y', strtotime(esc($pegawaiItem['tanggal_bergabung']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td>1</td>
                                <td>12345</td>
                                <td>12345</td>
                                <td>Andi</td>
                                <td>andi@example.com</td>
                                <td>IT Developer</td>
                                <td>Sistem Informasi</td>
                                <td class="btn">
                                    <button class="icon-btn" data-toggle="modal" data-target="#tambahDataModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            <tr>
                            <tr>
                                <td>2</td>
                                <td>23123</td>
                                <td>23123</td>
                                <td>Ando</td>
                                <td>Ando@example.com</td>
                                <td>IT Developer</td>
                                <td>Sistem Informasi</td>
                                <td class="btn">
                                    <button class="icon-btn" data-toggle="modal" data-target="#tambahDataModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            <tr>
                            <?php endif; ?>
                    </tbody>
                </table>
            </div>


            <!-- pagination -->
            <ul class="pagination justify-content-end">
                <li class="page-item"><a class="page-link" href="javascript:void(0);" style="color: black;">Previous</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);" style="color: black;">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);" style="color: black;">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);" style="color: black;">Next</a></li>
            </ul>


            <!-- Modal -->
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit n tambah -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahData">
                                <div class="form-group">
                                    <label for="nipeg">NIP/EG:</label>
                                    <input type="text" class="form-control" id="nipeg" name="nipeg" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Kerja:</label>
                                    <select class="form-control" id="lokasi" name="lokasi" required>
                                        <option value="">Pilih Lokasi Kerja</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Bandung">Bandung</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <!-- Tambahkan opsi sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="posisi">Posisi:</label>
                                    <select class="form-control" id="posisi" name="posisi" required>
                                        <option value="">Pilih Posisi</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Staff">Staff</option>
                                        <!-- Tambahkan opsi sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen:</label>
                                    <select class="form-control" id="departemen" name="departemen" required>
                                        <option value="">Pilih Departemen</option>
                                        <option value="IT">IT</option>
                                        <option value="HRD">HRD</option>
                                        <option value="Keuangan">Keuangan</option>
                                        <!-- Tambahkan opsi sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="approval">Approval Atasan:</label>
                                    <select class="form-control" id="approval" name="approval" required>
                                        <option value="">Pilih Approval Atasan</option>
                                        <option value="Manager A">Manager A</option>
                                        <option value="Manager B">Manager B</option>
                                        <option value="Supervisor A">Supervisor A</option>
                                        <!-- Tambahkan opsi sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
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
    <script>
        // Mengubah teks navbarBrand
        document.getElementById('navbarBrand').textContent = 'Setting Data Pegawai';
    </script>
</body>

</html>