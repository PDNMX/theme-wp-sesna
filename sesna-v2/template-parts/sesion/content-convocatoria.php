<div class="reticulaGrid__12 convocatoriaT">
    <div class="columna__12 columna__3--lg">
    <div class="boxT">
        <p class="tituloT"><span>CONVOCATORIA</span></p>
        <p class="sesionT">SESIÓN <?php the_field('numero_sesion') ?></p>
        <p class="comiteT"><?php the_session_type(); ?></p>
        <p class="fechaT">Fecha Limite: <span> <?php the_field('fecha_limite') ?> </span> </p>
    </div>
    </div>
    <div class="columna__12 columna__9--lg">
        <table style="height:100%;min-height:100px;width:100%;">  
            <tr>
            <td vertical-align="middle" align="center">
                <a class="boton__primario" href="<?php the_file('convocatoria') ?>" role="button">Descarga la convocatoria completa <i class="fas fa-download" aria-hidden="true"></i></a>
            </td>
            </tr>
        </table>
    </div>
</div>