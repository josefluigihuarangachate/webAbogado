
<div class="side-slide">
    <span class="close-btn"><i class="lni lni-cross-circle"></i></span>
    <div class="user-avatar">
        <figure>            
            <?php
            $src = 'general/fotos/' . session('foto');
            if (empty(session('foto'))) {
                $src = 'general/fotos/empty/empty-photo.jpg';
            }
            ?>

            <img src="<?php echo $src; ?>" alt="" style="width: 60px;height: 60px;">
            <span class="status status greenbg"></span>
        </figure>
        <div class="user-options">
            <h6><?php echo session('nombre_corto'); ?></h6>
            <a href="#" title="Tipo de Usuario"><?php echo ucwords(session('tipo_usuario')); ?></a>
        </div>
    </div>
    <ul>
        <li>
            <form action="#" method="post" enctype="multipart/form-data" id="formDataProfile" name="formDataProfile">
                <input type="file" id="inputFile" name="inputFile" style="display: none;" onchange="loadFile();"> 
            </form>
            <label for="inputFile" class="btn btn-default" style="border-radius: 50px 0px 0px 50px;" id="labelUploadProfile" name="labelUploadProfile">
                <i class="lni lni-gallery"></i>&nbsp; Cargar...
            </label><button class="btn btn-success" style="border-radius: 0px 50px 50px 0px;background-color: #eeda68;border: 1px solid #ccba57;" id="guardarFotoPerfil" name="guardarFotoPerfil">
                <i class="lni lni-save"></i>&nbsp; Guardar
            </button>
            
        </li>
        <!-- Icono : http://sigmadigitalpartners.com/themes/templatemonster/html/dashield/pages/icons/lineicons.html-->
        <!--<li><a href="/appprofileGeneral" title="" style="font-size: 18px;"><i class="lni lni-inbox"></i>Mi Perfil</a></li>-->
        <li><a href="/appprofileGeneral" title="" style="font-size: 18px;"><i class="lni lni-pencil-alt"></i>Configuración</a></li>

        <?php
        // SOLO PARA CLIENTES
        if (session('idtipo') == 3) {
            ?>
            <li><a href="/applibroreclamoGeneral" title="" style="font-size: 18px;"><i class="lni lni-library"></i>Area de Cliente</a></li>
            <?php
        }
        ?>
        <li><a href="notifications.html" title="" style="font-size: 18px;"><i class="lni lni-alarm"></i>Notificaciones</a></li>
        <!--<li><a href="lock-screen.html" title=""><i class="lni lni-key"></i>Lock screen</a></li>-->
        <!--<li><a href="settings.html" title="" style="font-size: 18px;"><i class="lni lni-control-panel"></i>setting</a></li>-->
        <!--<li><a href="privacy.html" title=""><i class="lni lni-sort-amount-asc"></i>Privacy & Help</a></li>-->
        <!--<li><a href="create-new.html" title=""><i class="lni lni-pencil"></i>Create Page</a></li>-->
        <!--<li><a href="create-new.html" title=""><i class="lni lni-cloud-network"></i>Create Group</a></li>-->
        <li><a href="./appcerrarSesion" title="" style="font-size: 18px;"><i class="lni lni-power-switch"></i>Cerrar Sesion</a></li>
    </ul>
    <div class="night-mode" style="font-size: 18px;">
        <i class="lni lni-night"></i>Modo Oscuro 
        <input type="checkbox" hidden="hidden" id="night-mode" checked="checked">
        <label class="switch" for="night-mode"></label>
    </div>
</div><!-- side panel -->
