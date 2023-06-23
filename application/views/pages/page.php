<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/7ef55c44b8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="<?= base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style2.css" rel="stylesheet">
    <title>AnekaHijau</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow sticky-top">
        <div class="container">
            <p class="navbar-brand brand py-0 my-0"> <span>Aneka</span><span class="text-hijau poppins">Hijau</span></p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() . '#katalog' ?>">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() . '#about' ?>">About US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('cari') ?>">Cari <i class="fa fa-search"></i></a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button onclick="location.href='<?= site_url('auth') ?>'" class="btn btn-outline-success" type="button">Login <i class="fa-solid fa-right-to-bracket"></i></button>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- hero  -->
    <section>
        <div class="mx-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($hero as $key => $rows) : ?>
                        <div class="carousel-item <?php echo ($key == 0 ? 'active' : '') ?>">
                            <img class="d-block w-100" src="<?= base_url('assets/img/hero/') . $rows['file_foto'] ?>" alt="Hero slide">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- end hero  -->
    <section id="katalog">
        <div class="container py-3">
            <h3 class="pt-5 pb-3">Product kami</h3>
            <div class="row">
                <div class="col-4 px-3">
                    <div class="list-group">
                        <h6>Price</h6>
                        <input type="hidden" id="hidden_minimum_price" value="0" />
                        <input type="hidden" id="hidden_maximum_price" value="40000" />
                        <small class="mb-2" id="price_show">Rp. 1000 - Rp. 40000</small>
                        <div id="price_range"></div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 filter_data">

            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="bg-light pt-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-6 px-4">
                    <h2 class="logo-brand"><span>Aneka</span><span class="text-hijau">Hijau</span></h2>
                    <p>AnekaHijau merupakan toko yang menjual beraneka ragam tanaman, mulai dari tanaman hias hingga tanaman obat keluarga.</p>
                </div>
                <div class="col-6 px-4">
                    <p><i class="fa-solid fa-location-dot icon mx-3 ms-0"></i>Desa Balung, Kecamatan Kendit, Kabupaten Situbondo</p>
                    <small>Developed by</small>
                    <br>
                    <small>Marizka Maulidina</small>
                    <br>
                    <a class="icon" href="https://www.linkedin.com/in/marizka-maulidina-b8b2591a9/"><i class="fa-brands fa-linkedin"></i></a>
                    <a class="icon" href="https://github.com/marizkaaa25"><i class="fa-brands fa-github"></i></a>
                    <a class="icon" href="https://gitlab.com/marizkaaa25"><i class="fa-brands fa-gitlab"></i></a>
                    <a class="icon" href="https://www.facebook.com/marizka.maulidina/"><i class="fa-brands fa-facebook"></i></a>
                    <a class="icon" href="mailto:202410103009@mail.unej.ac.id"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
            <hr>
            <p class="text-center"> &copy 2022 Marizka Maulidina | FWD 1</p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- script -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 2000
            })
        })
    </script>
    <style>
        #loading {
            text-align: center;
            background: url('<?= base_url() ?>assets/img/loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

    <script>
        $(document).ready(function() {

            filter_data(1);

            function filter_data(page) {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                //var page = 1;
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var kategori = get_filter('kategori');
                $.ajax({
                    url: "<?= base_url() ?>product/fetch_data/" + page,
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        kategori: kategori
                    },
                    success: function(data) {
                        $('.filter_data').html(data.product_list);
                        $('#pagination_link').html(data.pagination_link);
                    }
                })
            }

            $('#price_range').slider({
                range: true,
                min: 1000,
                max: 40000,
                values: [1000, 40000],
                step: 1000,
                stop: function(event, ui) {
                    //$('#price_show').show();
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data(1);
                }
            });

            function get_filter(kategori) {
                var filter = [];
                $('.' + kategori + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $(document).on("click", ".pagination li a", function(event) {
                event.preventDefault();
                var page = $(this).data("ci-pagination-page");
                filter_data(page);
            });

            $('.common_selector').click(function() {
                filter_data(1);
            });



        });
    </script>
</body>

</html>