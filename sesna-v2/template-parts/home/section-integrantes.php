<section class="pb--48 sna-integrantes-section">
    <div class="contenedor mb--48">
        <div class="fila justify-content-center mb--48">
            <div class="columna__12 columna__8--md texto--centro">
                <h2 class="h2b patria color--pguinda600 mb--0">¿Quiénes integran el SNA?</h2>
            </div>
        </div>
        <div class="reticulaGrid__12">

            <div class="columna__12 columna__6--md columna__4--lg">
                <?php get_template_part( 'template-parts/ui/card', null, array(
                    'href'     => 'https://www.sna.org.mx/category/comite-coordinador/',
                    'target'   => '_blank',
                    'title'    => 'Comité Coordinador',
                    'text'     => 'Instancia encargada de la coordinación y eficacia del Sistema Nacional, que tiene bajo su encargo el diseño, promoción y evaluación de políticas públicas de combate a la corrupción',
                    'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-cc-card.svg',
                    'icon_alt' => 'Comité Coordinador',
                    'action'   => array( 'type' => 'link', 'label' => 'Conoce más' ),
                ) ); ?>
            </div>

            <div class="columna__12 columna__6--md columna__4--lg">
                <?php get_template_part( 'template-parts/ui/card', null, array(
                    'href'     => 'https://comiteparticipacion.com.mx/',
                    'target'   => '_blank',
                    'title'    => 'Comité de Participación Ciudadana',
                    'text'     => 'Instancia de vinculación con las organizaciones sociales y académicas relacionadas con materias del SNA que coadyuven en el cumplimiento de los objetivos del Comité Coordinador.',
                    'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-cpc-card.svg',
                    'icon_alt' => 'Comité de Participación Ciudadana',
                    'action'   => array( 'type' => 'link', 'label' => 'Conoce más' ),
                ) ); ?>
            </div>

            <div class="columna__12 columna__6--md columna__4--lg">
                <?php get_template_part( 'template-parts/ui/card', null, array(
                    'href'     => 'https://www.sna.org.mx/sistemas-estatales-anticorrupcion/',
                    'target'   => '_blank',
                    'title'    => 'Sistemas Estatales Anticorrupción',
                    'text'     => 'Conoce la integración de cada sistema anticorrupción de las 32 entidades federativas.',
                    'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-sea-card.svg',
                    'icon_alt' => 'Sistemas Estatales Anticorrupción',
                    'action'   => array( 'type' => 'link', 'label' => 'Conoce más' ),
                ) ); ?>
            </div>

        </div>
    </div>
</section>