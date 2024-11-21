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
                        <th>Customer Initial</th>
                        <th>Name</th>
                        <th>Customer Category
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if (!empty($dataCustomer) && is_array($dataCustomer)) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($dataCustomer as $Customer) : ?>
                            <tr data-id="<?= esc($Customer['ID_CUSTOMER'] ?? '') ?>">
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($Customer['INITIAL_CUSTOMER'] ?? 'N/A') ?></td>
                                <td><?= esc($Customer['NAME_CUSTOMER'] ?? 'N/A') ?></td>
                                <?php
                                $initialOutput = 'N/A'; // Nilai default
                                if (isset($dataCustomerCategory) && is_array($dataCustomerCategory)) {
                                    foreach ($dataCustomerCategory as $category) {
                                        if ($Customer['ID_CATEGORY_CUSTOMER'] == $category['ID_CATEGORY_CUSTOMER']) {
                                            $initialOutput = esc($category['INITIAL_CATEGORY_CUSTOMER']); // Ambil INITIAL_CATEGORY_CUSTOMER
                                            break; // Keluar dari loop jika sudah ditemukan
                                        }
                                    }
                                }
                                ?>
                                <td>
                                    <?= $initialOutput; // Tampilkan hasil 
                                    ?>
                                </td>
                                <td><?= ($Customer['STATUS'] ?? '') == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td class="btn">
                                    <button class="icon-btn edit-btn" data-toggle="modal" data-target="#EditDataModal" data-id="<?= esc($Customer['ID_CUSTOMER'] ?? '') ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="icon-btn del-btn" data-toggle="modal" data-target="#deleteConfirmModal" data-id="<?= esc($Customer['ID_CUSTOMER'] ?? '') ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <tr>
                            <td>1</td>
                            <td>BULK</td>
                            <td>Bulk</td>
                            <td>Aktif</td>
                            <td class="btn">
                                <button class="icon-btn" data-toggle="modal" data-target="#editDataModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="icon-btn" data-toggle="modal" data-target="#deleteConfirmModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
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
                            <form id="deleteForm" action="" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal tambah -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahData" action="<?= base_url('public/customer/dataApi/addData') ?>" method="post">
                                <div class="form-group">
                                    <label for="INITIAL_CUSTOMER">Customer Initial:</label>
                                    <input type="text" class="form-control" id="INITIAL_CUSTOMER" name="INITIAL_CUSTOMER" required>
                                </div>
                                <div class="form-group">
                                    <label for="NAME_CUSTOMER">Name:</label>
                                    <input type="text" class="form-control" id="NAME_CUSTOMER" name="NAME_CUSTOMER" required>
                                </div>
                                <div class="form-group">
                                    <label for="ID_CATEGORY_CUSTOMER">Customer Category:</label>
                                    <select class="form-control" id="ID_CATEGORY_CUSTOMER" name="ID_CATEGORY_CUSTOMER" required>
                                        <option value="">Pilih Kategori Customer</option>
                                        <?php if (!empty($dataCustomerCategory) && is_array($dataCustomerCategory)) : ?>
                                            <?php foreach ($dataCustomerCategory as $category) : ?>
                                                <option value="<?= esc($category['ID_CATEGORY_CUSTOMER']) ?>">
                                                    <?= esc($category['INITIAL_CATEGORY_CUSTOMER']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">PIC:</label>
                                    <input type="text" class="form-control" id="username" name="username" readonly>
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

            <!-- Modal Edit -->
            <div class="modal fade" id="EditDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editUnitForm" action="<?= base_url('public/customer/dataApi/update/') ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="id-edit-data">ID</label>
                                    <input type="text" class="form-control" id="id-edit-data" name="ID_CUSTOMER" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="INITIAL_CUSTOMER">Customer Initial:</label>
                                    <input type="text" class="form-control" id="INITIAL_CUSTOMER" name="INITIAL_CUSTOMER" required>
                                </div>
                                <div class="form-group">
                                    <label for="NAME_CUSTOMER">Name:</label>
                                    <input type="text" class="form-control" id="NAME_CUSTOMER" name="NAME_CUSTOMER" required>
                                </div>
                                <div class="form-group">
                                    <label for="ID_CATEGORY_CUSTOMER">Customer Category:</label>
                                    <select class="form-control" id="ID_CATEGORY_CUSTOMER" name="ID_CATEGORY_CUSTOMER" required>
                                        <option value="">Pilih Kategori Customer</option>
                                        <?php if (!empty($dataCustomerCategory) && is_array($dataCustomerCategory)) : ?>
                                            <?php foreach ($dataCustomerCategory as $category) : ?>
                                                <option value="<?= esc($category['ID_CATEGORY_CUSTOMER']) ?>">
                                                    <?= esc($category['INITIAL_CATEGORY_CUSTOMER']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Status:</label>
                                    <select class="form-control" id="lokasi" name="lokasi" required>
                                        <option value="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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
        document.getElementById('navbarBrand').textContent = 'Setting Data Customer';
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.edit-btn');
            const deleteForm = document.getElementById('editUnitForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const unitId = this.getAttribute('data-id');
                    const baseUrl = '<?= base_url('/public/customer/dataApi/update/'); ?>';
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
                    const baseUrl = '<?= base_url('/public/customer/dataApi/delete/'); ?>';
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