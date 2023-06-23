<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $title ?> </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-danger sidebar text-white accordion" id="accordionSidebar">

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <div class="sidebar-heading">
                Staff
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('staff') ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                    <span class="text-white">Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt text-white"></i>
                    <span class="text-white">Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid pt-3">
                    <!-- Page Heading -->
                    <?= $this->session->flashdata('message'); ?>
                    <h5 class="text-gray-800 pt-2">Tambah Hero</h5>
                    <form action="<?= site_url('staff/do_upload') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class=" form-control" required>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label>Gambar/File</label>
                                    <input type="file" name="file_foto" size="20" class="form-control">
                                </div>
                            </div>
                            <div class="col-2 pt-3 mt-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <h5 class="text-gray-800 pt-2">Daftar Hero</h5>
                    <div class="row row-cols-1 row-cols-md-4">
                        <?php foreach ($hero as $key => $rows) : ?>
                            <div class="col py-2">
                                <div class="card h-100">
                                    <img src="<?= base_url('assets/img/hero/') . $rows['file_foto'] ?>" class="card-img-top" alt="hero">
                                    <div class="card-body pb-0">
                                        <?php if ($rows['status'] == '0') {
                                            $status = 'Belum Disetujui';
                                        } elseif ($rows['status'] == '1') {
                                            $status = 'Disetujui';
                                        } else {
                                            $status = 'Ditolak';
                                        } ?>
                                        <h6 class="card-title"><?= $rows['nama'] ?> | <?= $status ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- product  -->
                    <hr class="my-3">
                    <?= $this->session->flashdata('message_prod'); ?>
                    <h3 class="h4 text-gray-800 mb-3">Product</h3>
                    <!-- <hr> -->
                    <h5 class="text-gray-800">Tambah Product</h5>
                    <form action="<?= base_url('staff/do_upload_prod') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class=" form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Kategori</label><br>
                                    <select class=" form control form-select" name="kategori" aria-label="Default select example">
                                        <option selected>--- Pilih Kategori ---</option>
                                        <option value="Tanaman hias">Tanaman hias</option>
                                        <option value="Tanaman obat">Tanaman obat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class=" form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Gambar/File</label>
                                    <input type="file" name="image" size="20" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea type="text" name="deskripsi" class=" form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <h5 class="text-gray-800 pt-2">Daftar Product</h5>
                    <table class="table text-dark my-3">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Image</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $i => $product) : ?>
                                <?php if ($product['product_status'] == '0') {
                                    $status = 'Belum Disetujui';
                                } elseif ($product['product_status'] == '1') {
                                    $status = 'Disetujui';
                                } else {
                                    $status = 'Ditolak';
                                } ?>
                                <tr>
                                    <th scope="row"><?= $i + 1 ?></th>
                                    <td><?= $product['nama'] ?></td>
                                    <td><?= $product['kategori'] ?></td>
                                    <td><?= $product['harga'] ?></td>
                                    <td> <img src="<?= base_url('assets/img/product/') . $product['image'] ?>" alt="<?= $product['image'] ?>" height="100"> </td>
                                    <td><?= $product['deskripsi'] ?></td>
                                    <td><?= $status ?></td>
                                    <td>
                                        <a href="<?= site_url('staff/update/') . $product['id']; ?>" type="submit" name="update" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('staff/delete/') . $product['id']; ?>" type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AnekaHijau 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>