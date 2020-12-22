
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
        <li><a href="messages.html" title="" style="font-size: 18px;"><i class="lni lni-inbox"></i>inbox</a></li>
        <li><a href="notifications.html" title="" style="font-size: 18px;"><i class="lni lni-alarm"></i>Notificaciones</a></li>
        <li><a href="/appprofileGeneral" title="" style="font-size: 18px;"><i class="lni lni-pencil-alt"></i>Configuración</a></li>
        <!--<li><a href="lock-screen.html" title=""><i class="lni lni-key"></i>Lock screen</a></li>-->
        <li><a href="settings.html" title="" style="font-size: 18px;"><i class="lni lni-control-panel"></i>setting</a></li>
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
