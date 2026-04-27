/* SESNA v2 — JS global */

document.addEventListener('DOMContentLoaded', function () {

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        var siteHeader  = document.querySelector('.site-header');
        if (!siteHeader) return;

        var gobmxHeight  = gobmxHeader ? gobmxHeader.offsetHeight : 70;
        var navbarHeight = siteHeader.offsetHeight;

        siteHeader.style.top = gobmxHeight + 'px';
        document.body.style.paddingTop = (gobmxHeight + navbarHeight) + 'px';
    }

    var observer = new MutationObserver(function () {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        if (gobmxHeader && gobmxHeader.offsetHeight > 0) {
            adjustNavbar();
            observer.disconnect();
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });

    adjustNavbar();

    window.addEventListener('resize', adjustNavbar);
});
