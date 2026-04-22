<div class="row convocatoriaT">
    <div class="col col-lg-3 col-sm-12">
    <div class="boxT"> 
        <p class="tituloT"><span>CONVOCATORIA</span></p>
        <p class="sesionT">SESIÓN <?php the_field('numero_sesion') ?></p>
        <p class="comiteT"><?php the_session_type(); ?></p>
        <p class="fechaT">Fecha Limite: <span> <?php the_field('fecha_limite') ?> </span> </p>
    </div>
    </div>
    <div class="col-lg-9 col-sm-12">
        <table style="height:100%;min-height:100px;width:100%;">  
            <tr>
            <td vertical-align="middle" align="center">
                <a class="btn btn-success" href="<?php the_file('convocatoria') ?>" role="button">Descarga la convocatoria completa <i class="fas fa-download"></i></a>
            </td>
            </tr>
        </table>
    </div>
</div>