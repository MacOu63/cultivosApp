<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agro Market - Tu Portal de Información Agricola</title>
    <link rel="icon" type="image/x-icon" href="assets/IconoAgri.png" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Footer Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">       

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
                color: #eeca06 !important; /* Color dorado para la opción activa */
                font-weight: bold; /* Hace que el texto sea más grueso */
                }
    
                /* Efecto hover para cualquier opción del menú */
                .navbar-nav .nav-link:hover {
                color: #eeca06 !important; /* Cambia el color al pasar el cursor */
                }

            /* Estilos para pantallas pequeñas */
            @media (max-width: 768px) {
                .site-heading-upper, .site-heading-lower {
                    font-size: 18px; /* Ajusta el tamaño del texto */
                }
                
                .navbar-nav .nav-link {
                    font-size: 14px; /* Reduce el tamaño del texto del menú */
                }

                .product-item-title .bg-faded {
                    padding: 15px; /* Reduce el padding para ajustar el contenido */
                    text-align: center; /* Centra el texto para pantallas pequeñas */
                }

                .product-item-img {
                    width: 100%; /* Asegura que la imagen ocupe todo el ancho del contenedor */
                    height: auto; /* Mantiene la proporción de la imagen */
                }

                .product-item-description {
                    flex-direction: column; /* Cambia la dirección a columna para apilar los elementos */
                    align-items: center; /* Centra los elementos dentro del contenedor */
                }

                .product-item-description .bg-faded {
                    padding: 15px; /* Ajusta el padding */
                    text-align: center; /* Centra el texto */
                }

                .product-item-description .btn-primary {
                    margin-top: 20px; /* Añade un margen superior para separar el botón */
                    width: 100%; /* Hace que el botón ocupe todo el ancho */
                    padding: 15px; /* Ajusta el padding del botón */
                }
            }

            /* Estilos para pantallas muy pequeñas */
            @media (max-width: 576px) {
                .navbar-toggler {
                    margin-right: 10px; /* Ajusta el margen del botón de menú */
                }

                .product-item-title .bg-faded h2 {
                    font-size: 22px; /* Reduce el tamaño del texto de los títulos */
                }

                .product-item-description .btn-primary {
                    font-size: 14px; /* Reduce el tamaño del texto dentro del botón */
                    padding: 10px; /* Ajusta el padding del botón */
                }
            }

        /* Estilo para el ícono de usuario */
        .user-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 50%;
            left: 1330px;
            background-color: #97a3a3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            cursor: pointer;
            position: relative;
        }

        /* Contenedor del menú desplegable */
        .dropdown {
            position: relative;
            margin: 20px;
        }

        /* Contenido del menú desplegable */
        .dropdown-content {
            display: none;
            background-color: #333;
            width: 200px;
            left:1130px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            border-radius: 8px;
            overflow: hidden;
            position: absolute;
            /*top: 50px; /* Ajusta según sea necesario */
            right: 0;
        }

        /* Estilo de los enlaces dentro del menú */
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #575757;
        }

        /* Mostrar el menú desplegable cuando se hace clic */
        .show {
            display: block;
        }

        /* Media Query para pantallas pequeñas */
        @media (max-width: 1001px) {
            .user-icon {
                left: auto; /* Evita que el icono se salga de la pantalla */
                margin-left: auto;
                margin-right: auto;
            }

            .dropdown-content {
                left: 0; /* Alinea el menú desplegable con el icono */
                right: auto; /* Evita que se salga de la pantalla en pantallas pequeñas */
                margin-left: 261px;
            }

            .dropdown {
                margin-bottom: 110px;
            }
        }

        /* Footer Styles */
        footer {
                background-color: #47704b;
                color: #fff;
                padding: 20px 0;
        }
        
        .footer-container {
            display: flex;
            justify-content: space-around; /* Distribuir los elementos equitativamente */
            align-items: center; /* Alinear al centro */
            flex-wrap: wrap;
            max-width: 1200px;
            margin: auto;
        }
    
        .footer-section {
            flex: 1;
            margin: 20px;
            text-align: center; /* Centrar el contenido */
        }
    
        .footer-logo {
            width: 200px;
            margin-bottom: 10px;
        }
    
        .footer-section h3, .footer-section h4 {
            margin-bottom: 20px;
            font-size: 26px;
        }
    
        .footer-section ul {
            list-style-type: none;
            padding: 0;
            margin: 0 auto;
            text-align: center;
        }
    
        .footer-section ul li {
            margin-bottom: 8px;
        }
    
        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
        }
    
        .footer-section ul li a:hover {
            text-decoration: underline;
        }
    
        .contact-info p {
            margin: 8px 0;
            color: #e6a756;
        }
    
        .contact-info p i {
            margin-right: 8px;
        }
    
        .social-icons {
            text-align: center;
            margin-bottom: 10px;
        }
    
        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 40px;
            text-decoration: none;
        }
    
        .footer-bottom {
            text-align: center;
            border-top: 1px solid #333;
            margin-top: 20px;
            padding-top: 30px;
        }
    
        /* Media queries para responsividad */
        @media (max-width: 1068px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
    
            .footer-section {
                margin: 10px 0;
                width: 100%;
                max-width: 400px;
            }
    
            .social-icons a {
                font-size: 35px;
            }
        }

        @media (max-width: 480px) {
            .footer-section {
                margin: 15px 0;
                width: 90%;
                max-width: 300px;
            }

            .footer-logo {
                width: 120px;
            }

            .social-icons a {
                font-size: 28px;
                margin: 0 8px;
            }

            .footer-section ul {
                margin: 0;
            }

            .footer-links a {
                font-size: 14px;
                line-height: 1.8;
                color: #fff;
            }
        }
    </style>

</head>
<body>
    
    <div class="dropdown" id="userDropdown">
        <div class="user-icon" id="userIcon">
            <span class="initials"></span>
        </div>
        <div class="dropdown-content" id="dropdownContent">
            <a href="/personalizar">Personalizar Cuenta</a>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </div>

    <script>
        document.getElementById("userDropdown").onclick = function() {
            document.getElementById("dropdownContent").classList.toggle("show");
        }

        // Cerrar el menú si se hace clic fuera de él
        window.onclick = function(event) {
            if (!event.target.matches('.user-icon') && !event.target.closest('.dropdown-content')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script>
        // Función para obtener los datos del usuario
        function fetchUserData() {
            fetch('/user-data')
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.nombre_usuario && data.apellido_usuario) {
                        const firstName = data.nombre_usuario;
                        const lastName = data.apellido_usuario;
                        const initials = firstName.charAt(0).toUpperCase() + lastName.charAt(0).toUpperCase();
                        document.querySelector(".initials").innerText = initials;
                    } else {
                        console.error('User data is not available.');
                    }
                })
                .catch(error => console.error('There has been a problem with your fetch operation:', error));
        }

        // Llama a la función para cargar los datos
        fetchUserData();
    </script>

    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Tu Portal de Información Agrícola</span>
            <span class="site-heading-lower">Agro Market</span>
        </h1>
    </header>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Agro Market</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="inicio">Inicio</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="acercaNosotros">Acerca de</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="reportes">Reportes</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="clima">Clima</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase active" href="notiapa">Noticias</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="contactanos">Contactanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <img src="assets/IconoAgri.png" alt="Logo" class="footer-logo">
                    <div class="contact-info">
                        <p><i class="fas fa-phone"></i> 957-874-833</p>
                        <p><i class="fas fa-envelope"></i> leoutten31@gmail.com</p>
                    </div>
                </div>

                <br>

                <div class="footer-section">
                    <h4>REDES SOCIALES</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                        <a href="https://x.com"><i class="fab fa-twitter"></i></a>
                        <a href="https://wa.me/+51957874833"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <br>

                <div class="footer-section">
                    <h3>ENLACES</h3>
                    <ul>
                        <li>
                            <a href="inicio.php">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16">
                                <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z"/>
                                <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018"/>
                              </svg>
                              Inicio
                            </a>
                        </li>

                        <li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="acercaNosotros">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                              </svg>
                              Nosotros
                            </a>
                        </li>

                        <li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="reportes">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                              </svg>
                              Reportes
                            </a>
                        </li>

                        <li>
                            <a href="clima">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-drizzle-fill" viewBox="0 0 16 16">
                                    <path d="M4.158 12.025a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317m6 0a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317m-3.5 1.5a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317m6 0a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317m.747-8.498a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 11H13a3 3 0 0 0 .405-5.973"/>
                                </svg>
                              Clima
                            </a>
                        </li>

                        <li>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="notiapa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
                                    <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
                                </svg>
                              Noticias
                            </a>
                        </li>

                        <li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="contactanos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                                  <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                                  <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8m0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"/>
                                </svg>
                              Contacto
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; Agro Market - Tu Portal de Información Agrícola - Todos los Derechos Reservados - 2024</p>
            </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>
</html>