<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PLN Power Service Dashboard</title>
    <link href="<?= base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="<?= base_url('public/style/SettingStyle.css'); ?>" rel="stylesheet">
    <style>
    </style>
</head>

<body>

    <!-- Sidebar -->
    <?= $this->include('sidebar') ?>

    <!-- main content -->
    <div class="main-content">

        <!-- navbar -->
        <?= $this->include('template/navSet') ?>

        <div class="">
            <div class=" mx-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Unit</th>
                            <th>Category Customer</th>
                            <th>Kode Pusat Biaya</th>
                            <th>Deskripsi Pusat Biaya</th>
                            <th>Jenis Pembangkit</th>
                            <th>Status</th>
                            <th class="kolom-opsi">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php $i = 1; ?>
                        <?php if (!empty($dataUnit) && is_iterable($dataUnit)) : ?>
                            <?php foreach ($dataUnit as $unit) : ?>
                                <tr data-id="<?= esc($unit['ID_UNIT'] ?? '') ?>">
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= esc($unit['CUSTOMER'] ?? 'N/A') ?></td>
                                    <td><?= esc($unit['UNIT'] ?? 'N/A') ?></td>
                                    <td><?= esc($unit['CATEGORY_CUSTOMER'] ?? 'N/A') ?></td>
                                    <td><?= esc($unit['KODE_PUSAT_BIAYA'] ?? 'N/A') ?></td>
                                    <td><?= esc($unit['DESKRIPSI_PUSAT_BIAYA'] ?? 'N/A') ?></td>
                                    <td><?= esc($unit['JENIS_PEMBANGKIT'] ?? 'N/A') ?></td>
                                    <td><?= ($unit['STATUS'] ?? '') == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    <td class="btn">
                                        <button class="icon-btn edit-btn" data-toggle="modal" data-target="#EditDataModal" data-id="<?= esc($unit['ID_UNIT'] ?? '') ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn del-btn" data-toggle="modal" data-target="#deleteConfirmModal" data-id="<?= esc($unit['ID_UNIT'] ?? '') ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="9">No data available</td>
                            </tr>
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
            <div class="modal fade modal-edit" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group" style="margin-left: 5px; margin-right: 5px;">
                                <label for="id-del-data">ID yang akan dihapus </label>
                                <input type="text" class="form-control" id="id-del-data" name="ID_UNIT" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <form id="deleteForm" action="" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal edit -->
            <div class="modal fade" id="EditDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 900px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDataModalLabel">Edit Data Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editUnitForm" action="<?= base_url('dataunit/dataApi/update/') ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id-edit-data">ID</label>
                                    <input type="text" class="form-control" id="id-edit-data" name="ID_UNIT" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama-unit">Nama Unit</label>
                                    <input type="text" class="form-control" id="nama-unit" name="UNIT" required> <!-- Change 'Nama_Unit' to 'UNIT' -->
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Category Customer</label>
                                    <select class="form-control" id="kategori" name="CATEGORY_CUSTOMER" required> <!-- Change 'kategori' to 'CATEGORY_CUSTOMER' -->
                                        <option value="">Pilih Category Customer</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <select class="form-control" id="customer" name="CUSTOMER" required> <!-- Change 'customer' to 'CUSTOMER' -->
                                        <option value="">Pilih Customer</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pusat-biaya">Pusat Biaya</label>
                                    <select class="form-control" id="pusat-biaya" name="KODE_PUSAT_BIAYA" required> <!-- Change 'pusat_biaya' to 'KODE_PUSAT_BIAYA' -->
                                        <option value="">Pilih Pusat Biaya</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis-pembangkit">Jenis Pembangkit</label>
                                    <select class="form-control" id="jenis-pembangkit" name="JENIS_PEMBANGKIT" required> <!-- Change 'jenis_pembangkit' to 'JENIS_PEMBANGKIT' -->
                                        <option value="">Pilih Jenis Pembangkit</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="STATUS" required> <!-- Change 'status' to 'STATUS' -->
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-secondary" onclick="backToParentModal('modalUnit')">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Unit atau Jenis Pembangkit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Pilih Opsi Tambah Data :</p>
                            <button type="button" class="btn btn-primary" onclick="openModal('modalUnit')">
                                Tambah Unit
                            </button>
                            <button type="button" class="btn btn-primary" onclick="openModal('modalPembangkit')">
                                Tambah Jenis Pembangkit
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Unit -->
            <div class="modal fade" id="modalUnit" tabindex="-1" role="dialog" aria-labelledby="modalUnitLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 900px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal2Label">Tambah Unit</h5>
                            <button type="button" class="close" onclick="closeModal('modalUnit')" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <form id="unitForm" action="<?= base_url('public/dataunit/dataApi/addData') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Nama-Unit">Nama Unit</label>
                                    <input type="text" class="form-control" id="Nama-unit" name="UNIT" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Category Customer</label>
                                    <select class="form-control" id="kategori" name="CATEGORY_CUSTOMER" required>
                                        <option value="">Pilih Category Customer</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <select class="form-control" id="customer" name="CUSTOMER" required>
                                        <option value="">Pilih Customer</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pusat-biaya">Pusat Biaya</label>
                                    <select class="form-control" id="pusat-biaya" name="KODE_PUSAT_BIAYA" required>
                                        <option value="">Pilih Pusat Biaya</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis-pembangkit">Jenis Pembangkit</label>
                                    <select class="form-control" id="jenis-pembangkit" name="JENIS_PEMBANGKIT" required>
                                        <option value="">Pilih Jenis Pembangkit</option>
                                        <option value="Jeremi">Jeremi</option>
                                        <option value="Jeremi2">Jeremi2</option>
                                        <option value="Jeremi3">Jeremi3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="PIC">PIC</label>
                                    <input type="text" class="form-control" id="PIC" name="PIC" readonly value="<?= esc(session()->get('username')) ?>">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-secondary" onclick="backToParentModal('modalUnit')">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Jenis Pembangkit -->
            <div class="modal fade" id="modalPembangkit" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal1Label">Modal 1</h5>
                            <button type="button" class="close" onclick="closeModal('modalPembangkit')" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Ini adalah Modal 1. Di dalamnya terdapat 2 modal lagi.</p>
                            <button type="button" class="btn btn-primary" onclick="openModal('modal2a')">
                                Tambah Jenis Pembangkit
                            </button>
                            <button type="button" class="btn btn-primary" onclick="openModal('modal2b')">
                                Edit Jenis Pembangkit
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="backToParentModal('modalPembangkit')">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Pembangkit A -->
            <div class="modal fade" id="modal2a" tabindex="-1" role="dialog" aria-labelledby="modal2aLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal1aLabel">Modal 1A</h5>
                            <button type="button" class="close" onclick="closeModal('modal2a')" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nipeg">Initial</label>
                                <input type="text" class="form-control" id="nipeg" name="Nama-Unit" required>
                            </div>
                            <div class="form-group">
                                <label for="nipeg">Kode</label>
                                <input type="text" class="form-control" id="nipeg" name="Nama-Unit" required>
                            </div>
                            <div class="form-group">
                                <label for="nipeg">Deskripsi</label>
                                <input type="text" class="form-control" id="nipeg" name="Nama-Unit" required>
                            </div>
                            <div class="form-group">
                                <label for="nipeg">PIC</label>
                                <input type="text" class="form-control" id="nipeg" name="Nama-Unit" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                            <button type="button" class="btn btn-secondary" onclick="backToParentModal('modal2a')">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Pembangkit B -->
            <div class="modal fade" id="modal2b" tabindex="-1" role="dialog" aria-labelledby="modal2bLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal1bLabel">Edit Jenis Pembangkit</h5>
                            <button type="button" class="close" onclick="closeModal('modal2b')" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body2">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Initial</th>
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>PLTH</td>
                                        <td>HYBRID</td>
                                        <td>Pembangkit Listrik Tenaga Hybrid</td>
                                        <td>-</td>
                                        <td>Aktif</td>
                                        <td class="btn">
                                            <button class="icon-btn" data-toggle="modal" data-target="#EditDataModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    <tr>
                                    <tr>
                                        <td>2</td>
                                        <td>PLTH</td>
                                        <td>HYBRID</td>
                                        <td>Pembangkit Listrik Tenaga Hybrid</td>
                                        <td>-</td>
                                        <td>Aktif</td>
                                        <td class="btn">
                                            <button class="icon-btn" data-toggle="modal" data-target="#EditDataModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    <tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="modal-footer2 my-2 mx-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                            <button type="button" class="btn btn-secondary" onclick="backToParentModal('modal2b')">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="<?= base_url('public/js/script.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.edit-btn');
            const deleteForm = document.getElementById('editUnitForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const unitId = this.getAttribute('data-id');
                    const baseUrl = '<?= base_url('/public/dataunit/dataApi/update/'); ?>';
                    deleteForm.setAttribute('action', `${baseUrl}${unitId}`);
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.del-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const unitId = this.getAttribute('data-id');
                    const baseUrl = '<?= base_url('/public/dataunit/dataApi/delete/'); ?>';
                    deleteForm.setAttribute('action', `${baseUrl}${unitId}`);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateTable();
            document.getElementById("perPage").addEventListener("change", function() {
                updateTable();
            });
        });

        function updateTable() {
            const perPage = parseInt(document.getElementById("perPage").value);
            const table = document.getElementById("myTable");
            const rows = table.getElementsByTagName("tr");
            const totalPages = Math.ceil(rows.length / perPage);

            // Hide all rows
            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            // Show rows for the current page
            const currentPage = 1; // Start with the first page
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            for (let i = start; i < end && i < rows.length; i++) {
                rows[i].style.display = "";
            }

            updatePagination(totalPages, currentPage);
        }

        function updatePagination(totalPages, currentPage) {
            const pagination = document.querySelector(".pagination");
            pagination.innerHTML = "";

            // Previous button
            const prevLi = document.createElement("li");
            prevLi.className = "page-item" + (currentPage === 1 ? " disabled" : "");
            const prevLink = document.createElement("a");
            prevLink.className = "page-link";
            prevLink.href = "javascript:void(0);";
            prevLink.textContent = "Previous";
            prevLink.onclick = () => goToPage(currentPage - 1);
            prevLi.appendChild(prevLink);
            pagination.appendChild(prevLi);

            // First page
            const firstLi = document.createElement("li");
            firstLi.className = "page-item" + (currentPage === 1 ? " active" : "");
            const firstLink = document.createElement("a");
            firstLink.className = "page-link";
            firstLink.href = "javascript:void(0);";
            firstLink.textContent = "1";
            firstLink.onclick = () => goToPage(1);
            firstLi.appendChild(firstLink);
            pagination.appendChild(firstLi);

            // Second page
            if (totalPages > 1) {
                const secondLi = document.createElement("li");
                secondLi.className = "page-item" + (currentPage === 2 ? " active" : "");
                const secondLink = document.createElement("a");
                secondLink.className = "page-link";
                secondLink.href = "javascript:void(0);";
                secondLink.textContent = "2";
                secondLink.onclick = () => goToPage(2);
                secondLi.appendChild(secondLink);
                pagination.appendChild(secondLi);
            }

            // Ellipsis
            if (totalPages > 3) {
                const ellipsisLi = document.createElement("li");
                ellipsisLi.className = "page-item disabled";
                const ellipsisLink = document.createElement("a");
                ellipsisLink.className = "page-link";
                ellipsisLink.href = "javascript:void(0);";
                ellipsisLink.textContent = "..";
                ellipsisLi.appendChild(ellipsisLink);
                pagination.appendChild(ellipsisLi);
            }

            // Last page
            if (totalPages > 2) {
                const lastLi = document.createElement("li");
                lastLi.className =
                    "page-item" + (currentPage === totalPages ? " active" : "");
                const lastLink = document.createElement("a");
                lastLink.className = "page-link";
                lastLink.href = "javascript:void(0);";
                lastLink.textContent = totalPages;
                lastLink.onclick = () => goToPage(totalPages);
                lastLi.appendChild(lastLink);
                pagination.appendChild(lastLi);
            }

            // Next button
            const nextLi = document.createElement("li");
            nextLi.className =
                "page-item" + (currentPage === totalPages ? " disabled" : "");
            const nextLink = document.createElement("a");
            nextLink.className = "page-link";
            nextLink.href = "javascript:void(0);";
            nextLink.textContent = "Next";
            nextLink.onclick = () => goToPage(currentPage + 1);
            nextLi.appendChild(nextLink);
            pagination.appendChild(nextLi);
        }

        function goToPage(page) {
            const perPage = parseInt(document.getElementById("perPage").value);
            const table = document.getElementById("myTable");
            const rows = table.getElementsByTagName("tr");
            const totalPages = Math.ceil(rows.length / perPage);

            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;

            // Hide all rows
            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            // Show rows for the current page
            const start = (page - 1) * perPage;
            const end = start + perPage;
            for (let i = start; i < end && i < rows.length; i++) {
                rows[i].style.display = "";
            }

            updatePagination(totalPages, page);
        }
    </script>
    <script>
        // Mengubah teks navbarBrand
        document.getElementById('navbarBrand').textContent = 'Setting Data Unit';
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var unitId = this.getAttribute('data-id');
                    document.getElementById('id-edit-data').value = unitId;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var delButtons = document.querySelectorAll('.del-btn');
            delButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var unitId = this.getAttribute('data-id');
                    document.getElementById('id-del-data').value = unitId;
                });
            });
        });
    </script>

</body>

</html>