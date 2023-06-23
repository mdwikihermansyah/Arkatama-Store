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
        <ul class="navbar-nav bg-gradient-success sidebar text-white accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-white" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AnekaHijau</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Nav Item - Dashboard -->
            <div class="sidebar-heading">
                Admin
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                    <span class="text-white">Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
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
                    <h1 class="h2 text-gray-800 mt-3"><?= $title ?></h1>
                    <a href="<?= site_url('auth/regist') ?>"> + Add New Staff</a>
                    <hr>
                    <h4 class="h4 text-gray-800 py-2">Hero Website</h4>
                    <div class="row row-cols-1 row-cols-md-4">
                        <?php foreach ($hero as $key => $rows) : ?>
                            <div class="col py-2">
                                <div class="card h-100">
                                    <img src="<?= base_url('assets/img/hero/') . $rows['file_foto'] ?>" class="card-img-top" alt="hero">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $rows['nama'] ?></h5>
                                        <?php if ($rows['status'] == '0') {
                                            $status = 'Belum Disetujui';
                                        } elseif ($rows['status'] == '1') {
                                            $status = 'Disetujui';
                                        } else {
                                            $status = 'Ditolak';
                                        } ?>
                                        <p class="card-text"><?= $status ?></p>
                                        <a href="<?= site_url('admin/setuju/') . $rows['id']; ?>" type="submit" name="setuju" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="<?= site_url('admin/tolak/') . $rows['id']; ?>" type="submit" name="tolak" class="btn btn-warning"><i class="fas fa-thumbs-down"></i></a>
                                        <a href="<?= site_url('admin/hapus/') . $rows['id']; ?>" type="submit" name="hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <h4 class="h4 text-gray-800 py-2">Product</h4>
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
                                <th scope="col">Setuju</th>
                                <th scope="col">Tolak</th>
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
                                        <a href="<?= site_url('admin/setujuprod/') . $product['id']; ?>" type="submit" name="setujuprod" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('admin/tolakprod/') . $product['id']; ?>" type="submit" name="tolakprod" class="btn btn-warning"><i class="fas fa-thumbs-down"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('admin/delete/') . $product['id']; ?>" type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- <h4 class="h4 text-gray-800 py-2">Product</h4> -->

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
                        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>