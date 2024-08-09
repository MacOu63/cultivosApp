<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>
                .navbar-nav .nav-link {
                color: #ddd !important; /* Color de texto por defecto para las opciones */
                font-size: 16px;
                text-transform: uppercase;
                padding: 8px 12px;
                transition: color 0.3s ease; /* Transición suave entre estados */
                }

                /* Estilos para la opción activa */
                .navbar-nav .nav-link.active {
                color: #07611D !important; /* Color dorado para la opción activa */
                font-weight: bold; /* Hace que el texto sea más grueso */
                }

                /* Efecto hover para cualquier opción del menú */
                .navbar-nav .nav-link:hover {
                color: #07611D !important; /* Cambia el color al pasar el cursor */
                }
        </style>
    </head>
    <body style="
    background-image: url('assets/img/ox.png');">
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Tu Portal de Información Agrícola</span>
                <span class="site-heading-lower">Agro Market</span>
            </h1>
        </header>
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-3"><a class="nav-link text-uppercase active" href="\cultivosApp\public">Inicio</a></li>
                    <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="about.html">Acerca de</a></li>
                    <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="clima.html">Clima</a></li>
                    <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="products.html">Noticias</a></li>
                    <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="contactanos.html">Contactanos</a></li>
                </ul>
            </div>
        </div>
        </nav>



        <!--<section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Fresh Coffee</span>
                            <span class="section-heading-lower">Worth Drinking</span>
                        </h2>
                        <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                    </div>
                </div>
            </div>
        </section>-->

        <section class="page-section clearfix">
    <div id="introCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores del carrusel -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#introCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#introCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#introCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Elementos del carrusel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="intro">
                        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Fresh Coffee</span>
                                <span class="section-heading-lower">Worth Drinking</span>
                            </h2>
                            <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</p>
                            <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Añadir más elementos del carrusel aquí -->
            <div class="carousel-item">
                <div class="container">
                    <div class="intro">
                        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Delicious Pastries</span>
                                <span class="section-heading-lower">Baked Fresh Daily</span>
                            </h2>
                            <p class="mb-3">Our pastries are made with the finest ingredients and baked to perfection. Enjoy a sweet treat with your coffee, any time of the day.</p>
                            <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Taste Them Today!</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Añadir más elementos del carrusel aquí -->
            <div class="carousel-item">
                <div class="container">
                    <div class="intro">
                        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Cozy Ambiance</span>
                                <span class="section-heading-lower">Relax & Enjoy</span>
                            </h2>
                            <p class="mb-3">Our café offers a cozy ambiance where you can relax, work, or catch up with friends while enjoying our delicious coffee and pastries.</p>
                            <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles del carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#introCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#introCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Bootstrap CSS and JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <!--<span class="section-heading-upper">Our Promise</span>-->
                                <span class="section-heading-lower">Negociación Diaria</span>
                            </h2>
                            <p class="mb-0">@yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-section cta">
           <div class="card mb-3 mx-auto" style="max-width: 80%;">
              <img src="assets/img/noticiasbanner.jpg" class="card-img-top img-fluid" style="max-height: 550px;" alt="...">
              <div class="card-body">
                  <h5 class="card-title">Noticias</h5>
                  <p class="card-text">¡No te pierdas las últimas actualizaciones sobre los precios de productos, noticias de agricultura y el clima! Mantente al día con información relevante que afecta tu negocio y tu vida diaria. Descubre cómo los cambios en el clima están impactando las cosechas y los precios en el mercado.</p>
                  <a href="products.html" class="btn btn-primary">Ver más</a>
                  <br><br>
                  <p class="card-text"><small class="text-muted">Última actualización hace 3 horas</small></p>
              </div>
           </div>
        </section>

        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
