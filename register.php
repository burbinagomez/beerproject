<!DOCTYPE html>
<html lang="zxx">

<?php include('header.php')?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include('navbar.php')?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Registro</h2>
                        <form action="#">
                            <div class="group-input">
                                <label for="user">Cerveceria*</label>
                                <input type="text" id="user" name="user">
                            </div>
                            <div class="group-input">
                                <label for="telefono">Telefono*</label>
                                <input type="number" pattern="[0-9]" id="telefono" name="telefono">
                            </div>
                            <div class="group-input">
                                <label for="username">Ciudad*</label>
                                <input type="text" id="ciudad" name="ciudad">
                            </div>
                            <div class="group-input">
                                <label for="username">Correo*</label>
                                <input type="email" id="username" name="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Contraseña *</label>
                                <input type="password" id="pass" name="pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirmar Contraseña *</label>
                                <input type="password" id="con-pass" name="con-pass">
                            </div>
                            <button type="button" onclick="registrar()" class="site-btn register-btn">Registrar</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Iniciar Sesion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <?php include('footer.php')?>
    <script src="js/register.js"></script>
</body>

</html>