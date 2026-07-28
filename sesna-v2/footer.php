</main><!-- /.page -->

<?php wp_footer(); ?>

<!-- Fix global para evitar salto de barra GOBMX al abrir modales en Bootstrap 5 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gobmxObserver = new MutationObserver((mutations, obs) => {
        const gobmxNav = document.querySelector('.navbar-fixed-top');
        if(gobmxNav) {
            gobmxNav.classList.add('fixed-top');
            obs.disconnect();
        }
    });
    gobmxObserver.observe(document.body, { childList: true, subtree: true });
});
</script>

</body>
</html>
