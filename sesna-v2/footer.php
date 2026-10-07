</main><!-- /.page -->

<!--
  Footer institucional SND v1 — estructura exacta del spec oficial
  https://www.snd.gob.mx/componentes/footer
  Los iconos usan rutas absolutas al CDN de framework-gb (las relativas
  assets/icons-base/* del spec apuntan al CDN en producción).
-->
<footer class="footer sesna-footer">
  <div class="footer__contenedor">

    <!-- Identidad institucional -->
    <div class="footer__mexico">
      <img src="https://framework-gb.cdn.gob.mx/gobmx/img/logo_blanco.svg"
           alt="Gobierno de México"
           class="footer__escudo" />
    </div>

    <!-- Columna central: ¿Qué es gob.mx? + Enlaces -->
    <div class="footer__colCentral">

      <div class="footer__gobmx">
        <details class="mexico__details" open="">
          <summary class="footer__summary footer__summary--gobmx">
            <span class="footer__tit">¿Qué es gob.mx?</span>
          </summary>
          <div class="footer__detailsul">
            <p class="mexico__detailsp">
              Es el portal único de trámites,
              información y participación ciudadana.
              <a href="https://www.gob.mx/que-es-gobmx" target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva"><b>Leer más</b></a>
            </p>
          </div>
        </details>
      </div>

      <div class="footer__enlaces">
        <details class="mexico__details" open="">
          <summary class="footer__summary footer__summary--enlaces">
            <span class="footer__tit">Enlaces</span>
          </summary>
          <div class="footer__enlacesList footer__detailsul">

            <div class="footer__enlacesCol1">
              <a class="footer__enlacesLink"
                 href="https://datos.gob.mx/"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Datos</a>
              <a class="footer__enlacesLink"
                 href="https://www.gob.mx/inafed/acciones-y-programas/portal-de-obligaciones-de-transparencia-pot"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Portal de Obligaciones de Transparencia</a>
              <a class="footer__enlacesLink"
                 href="https://www.plataformadetransparencia.org.mx/Inicio"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Plataforma Nacional de Transparencia</a>
              <a class="footer__enlacesLink"
                 href="https://alertadores.buengobierno.gob.mx/"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Alerta</a>
            </div>

            <div class="footer__enlacesCol2">
              <a class="footer__enlacesLink"
                 href="#"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Administraciones anteriores</a>
              <a class="footer__enlacesLink"
                 href="https://www.gob.mx/accesibilidad"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Declaración de accesibilidad</a>
              <a class="footer__enlacesLink"
                 href="http://www.ordenjuridico.gob.mx/"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Marco jurídico</a>
              <a class="footer__enlacesLink"
                 href="#"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Política de seguridad</a>
              <a class="footer__enlacesLink"
                 href="https://www.gob.mx/terminos"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Términos y condiciones</a>
              <a class="footer__enlacesLink"
                 href="#"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Aviso de privacidad</a>
              <a class="footer__enlacesLink"
                 href="#"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Aviso de privacidad simplificado</a>
              <a class="footer__enlacesLink"
                 href="#"
                 target="_blank" rel="noopener"
                 title="El enlace abre en ventana nueva">Mapa de sitio</a>
            </div>

          </div>
        </details>
      </div>

    </div><!-- /.footer__colCentral -->

    <!-- Redes y atención ciudadana -->
    <div class="footer__redes">

      <p class="footer__denuncia">
        <a href="https://sidec.buengobierno.gob.mx/#!/"
           target="_blank" rel="noopener"
           title="El enlace abre en ventana nueva">Denuncia contra servidores públicos</a>
      </p>

      <div class="footer__siguenosCont">
        <p class="footer__siguenosTit">Síguenos en</p>
        <ul class="footer__redes__ul">
          <li>
            <a target="_blank" rel="noopener"
               title="El enlace abre en ventana nueva"
               href="https://www.facebook.com/gobmexico"
               aria-label="Facebook de Presidencia">
              <img alt="Facebook"
                   src="<?php echo get_template_directory_uri(); ?>/img/icons-base/facebook.svg" />
            </a>
          </li>
          <li>
            <a target="_blank" rel="noopener"
               title="El enlace abre en ventana nueva"
               href="https://twitter.com/GobiernoMX"
               aria-label="Twitter de Presidencia">
              <img alt="Twitter"
                   src="<?php echo get_template_directory_uri(); ?>/img/icons-base/twitter-x.svg" />
            </a>
          </li>
          <li>
            <a target="_blank" rel="noopener"
               title="El enlace abre en ventana nueva"
               href="https://www.instagram.com/gobmexico/"
               aria-label="Instagram de Presidencia">
              <img alt="instagram"
                   src="<?php echo get_template_directory_uri(); ?>/img/icons-base/instagram.svg" />
            </a>
          </li>
          <li>
            <a target="_blank" rel="noopener"
               title="El enlace abre en ventana nueva"
               href="https://www.youtube.com/@gobiernodemexico"
               aria-label="Youtube de Presidencia">
              <img alt="youtube"
                   src="<?php echo get_template_directory_uri(); ?>/img/icons-base/youtube.svg" />
            </a>
          </li>
        </ul>
      </div>

      <div class="footer__079">
        <div class="footer__079col1">
          <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/footer-flor.svg"
               alt="" class="footer__079img" />
          <span class="footer__079num">079</span>
        </div>
        <div class="footer__079info">
          <span class="footer__079txt">
            Comunícate,<br />estamos para ayudarte
          </span>
        </div>
      </div>

    </div><!-- /.footer__redes -->

  </div><!-- /.footer__contenedor -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
