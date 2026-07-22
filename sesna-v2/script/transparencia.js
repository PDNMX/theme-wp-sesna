/* SESNA v2 — Página Transparencia: visor de PDF integrado en página completa */

(function () {

    function initTxViewerPage(container) {
        var frame = container.querySelector('#tx-viewer-frame');
        var emptyState = container.querySelector('#tx-viewer-empty');
        var title = container.querySelector('#tx-viewer-title');
        var actions = container.querySelector('#tx-viewer-actions');
        var openLink = container.querySelector('#tx-viewer-open');
        var dlLink = container.querySelector('#tx-viewer-download');
        
        if (!frame || !title || !emptyState) return;

        function openDoc(url, docTitle, activeRow) {
            // Remove active class from all rows
            document.querySelectorAll('.tx-doc-row').forEach(function(row) {
                row.classList.remove('active');
            });
            // Add active class to clicked row
            if (activeRow) {
                activeRow.classList.add('active');
            }

            // Update Viewer UI
            frame.src = url;
            frame.title = docTitle;
            title.textContent = docTitle;
            openLink.setAttribute('href', url);
            dlLink.setAttribute('href', url);
            
            // Show iframe and actions, hide empty state
            emptyState.classList.add('d-none');
            emptyState.classList.remove('d-flex');
            
            frame.style.display = 'block';
            actions.style.display = 'flex';
        }

        // Listen for clicks on the document rows anywhere on the page
        document.addEventListener('click', function (e) {
            var row = e.target.closest ? e.target.closest('.tx-doc-row') : null;
            if (!row) return;
            
            e.preventDefault();
            openDoc(row.getAttribute('data-pdf-url'), row.getAttribute('data-pdf-title'), row);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var viewerPage = document.getElementById('tx-viewer-page');
        if (viewerPage) {
            initTxViewerPage(viewerPage);
        }
    });

})();
