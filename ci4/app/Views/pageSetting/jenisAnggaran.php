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

        <div class="container main-container">
            <div class="row">

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis Anggaran</th>
                        <th>Keterangan Jenis Anggaran</th>
                        <th>Status</th>
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
                            <td>SUT</td>
                            <td>Penyusutan</td>
                            <td>Aktif</td>
                            <td class="btn">
                                <button class="icon-btn" data-toggle="modal" data-target="#editDataModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        <tr>
                        <tr>
                            <td>2</td>
                            <td>LUOP</td>
                            <td>Luar Operasi</td>
                            <td>Aktif</td>
                            <td class="btn">
                                <button class="icon-btn" data-toggle="modal" data-target="#editDataModal">
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
            <!-- Modal tambah -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahData">
                                <div class="form-group">
                                    <label for="nipeg">Initial Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nipeg" name="nipeg" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Keterangan Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">PIC:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly>
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

            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahData">
                                <div class="form-group">
                                    <label for="nipeg">ID:</label>
                                    <input type="text" class="form-control" id="nipeg" name="nipeg" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nipeg">Initial Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nipeg" name="nipeg" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Keterangan Jenis Anggaran:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Status:</label>
                                    <select class="form-control" id="lokasi" name="lokasi" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Jakarta">Aktif</option>
                                        <option value="Bandung">Non-Aktif</option>
                                        <!-- Tambahkan opsi sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">PIC:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly>
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
        document.getElementById('navbarBrand').textContent = 'Setting Data Jenis Anggaran';
    </script>
</body>

</html>