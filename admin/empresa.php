<?php
session_start();
?>
<!doctype html>
<html lang="en">

<?php include('head.php');?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('navbar.php');?>
        <div class="app-main">
            <?php include('navbarheader.php');?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Analytics Dashboard
                                    <div class="page-title-subheading">This is an example dashboard created using
                                        build-in elements and components.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip"
                                    data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Buttons
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Inbox
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Book
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Picture
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                    <i class="nav-link-icon lnr-file-empty"></i>
                                                    <span>
                                                        File Disabled
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <img src="" id="foto" alt="">
                        </div>
                    </div>
                    <div class="main-card mb-3 card">

                        <div class="card-body">
                            <form class="">
                                <input hidden type="text" id="id_empresa" value="<?php echo $_SESSION['id'];?>">
                                <div class="position-relative row form-group"><label for="exampleEmail"
                                        class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10"><input name="nombre" id="nombre" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-10"><input name="text" id="telefono" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Correo</label>
                                    <div class="col-sm-10"><input name="text" id="correo" placeholder="" type="email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Ciudad</label>
                                    <div class="col-sm-10"><input name="text" id="ciudad" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Direccion</label>
                                    <div class="col-sm-10"><input name="text" id="direccion" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="exampleText"
                                        class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10"><textarea name="text" id="descripcion"
                                            class="form-control"></textarea></div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10"><input name="text" id="instagram" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10"><input name="text" id="facebook" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10"><input name="text" id="twitter" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                        class="col-sm-2 col-form-label">Whatsapp</label>
                                    <div class="col-sm-10"><input name="text" id="whatsapp" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="exampleFile"
                                        class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10"><input name="file" id="ruta_foto" type="file" onchange="UploadPhoto(this)"
                                            class="form-control-file">
                                        <small class="form-text text-muted">This is some placeholder block-level help
                                            text for the above input. It's a bit lighter and easily wraps to a new
                                            line.</small>
                                    </div>
                                </div>

                                <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="button" class="btn btn-secondary" onclick="actualizar()">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include('footer.php');?>
            </div>
        </div>
    </div>
    <script src="js/empresa.js"></script>
</body>

</html>