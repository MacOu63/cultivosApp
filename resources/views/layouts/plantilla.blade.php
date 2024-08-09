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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="\cultivosApp\public">Inicio</a></li>
                        <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="about.html">Acerca de</a></li>
                        <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="clima.html">Clima</a></li>
                        <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="products.html">Noticias</a></li>
                        <li class="nav-item px-lg-3"><a class="nav-link text-uppercase active" href="contactanos">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--<div class="cta-inner bg-faded text-center rounded">
                            <!<h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Our Promise</span>
                                <span class="section-heading-lower">contáctanos</span>
                            </h2>--
                            <p class="mb-0">@yield('content')
        </div>-->

        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <!--<h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Our Promise</span>
                                <span class="section-heading-lower">contáctanos</span>
                            </h2>-->
                            <p class="mb-0">@yield('content')
                        </div>
                    </div>
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
