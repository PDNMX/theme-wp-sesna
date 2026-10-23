(function sna_entradas_init() {
    /* gobmx.js inyecta jQuery de forma asíncrona; este script puede
       ejecutarse antes de que esté disponible, así que se espera. */
    if (typeof window.jQuery === 'undefined') {
        setTimeout(sna_entradas_init, 50);
        return;
    }

    jQuery(function ($) {
        var loading = '<div class="loading"><img src="' + ajax_object.loading_url + '"/></div>';

        var $section          = $('.sna-entradas-section');
        var $resultsPanel     = $('#sna-entradas-results');
        var activeFamilia     = $section.attr('data-active-familia') || 'todas';
        var searchTimer       = null;
        var currentEntriesXhr = null;
        var currentCountsXhr  = null;

        function get_filters() {
            return {
                year:     $('#sna-entradas-filter-year').val()  || '',
                monthnum: $('#sna-entradas-filter-month').val() || '',
                search:   $.trim($('#sna-entradas-search').val() || '')
            };
        }

        function update_load_more() {
            var hasMore = $resultsPanel.find('[data-has-more="1"]').length > 0;
            $('#sna-entradas-load-more').toggle(hasMore);
        }

        function update_clear_button() {
            var f = get_filters();
            var hasActiveFilter = !!(f.year || f.monthnum || f.search || (activeFamilia && activeFamilia !== 'todas'));
            $('#sna-entradas-filter-clear').toggle(hasActiveFilter);
        }

        function reset_results() {
            $resultsPanel.empty().data('page', 0).data('loaded', 0);
        }

        function update_counts() {
            var filters = get_filters();

            if (currentCountsXhr && currentCountsXhr.readyState !== 4) {
                currentCountsXhr.abort();
            }

            currentCountsXhr = $.post(ajax_object.ajax_url, {
                action:   'get_familias_counts',
                year:     filters.year,
                monthnum: filters.monthnum,
                search:   filters.search
            }, function (response) {
                if (!response || !response.success) {
                    return;
                }

                $.each(response.data, function (key, count) {
                    var $count = $('#tab-' + key + ' .sna-entradas-tab-count');
                    if ($count.text() !== String(count)) {
                        $count.addClass('sna-entradas-tab-count--updated');
                        setTimeout(function () {
                            $count.removeClass('sna-entradas-tab-count--updated');
                        }, 400);
                    }
                    $count.text(count);
                });
            });
        }

        function fetch_entries() {
            var page    = $resultsPanel.data('page') || 0;
            var filters = get_filters();

            if (currentEntriesXhr && currentEntriesXhr.readyState !== 4) {
                currentEntriesXhr.abort();
            }

            $resultsPanel.find('.loading').remove();
            $resultsPanel.append(loading);

            currentEntriesXhr = $.post(ajax_object.ajax_url, {
                action:   'get_home_entries_by_family',
                familia:  activeFamilia || 'todas',
                page:     page,
                year:     filters.year,
                monthnum: filters.monthnum,
                search:   filters.search
            }, function (response) {
                $resultsPanel.find('.loading').remove();
                $resultsPanel.find('[data-has-more]').remove();
                $resultsPanel.append(response);
                $resultsPanel.data('loaded', 1).data('page', page + 1);
                update_load_more();
            });
        }

        function apply_filters_now() {
            update_clear_button();
            update_counts();
            reset_results();
            fetch_entries();
        }

        function activate_familia(key) {
            activeFamilia = key || 'todas';
            $section.attr('data-active-familia', activeFamilia);
            $resultsPanel.attr('data-familia', activeFamilia);

            $('.sna-entradas-tab').removeClass('active').attr('aria-pressed', 'false');
            if (activeFamilia !== 'todas') {
                var $activeTab = $('#tab-' + activeFamilia);
                $activeTab.addClass('active').attr('aria-pressed', 'true');
                if ($activeTab.hasClass('sna-entradas-tab--extra') && $activeTab.hasClass('muestra--ninguno')) {
                    $('.sna-entradas-tab--extra').removeClass('muestra--ninguno');
                    $('#sna-entradas-toggle-cats').attr('aria-expanded', 'true').addClass('is-expanded');
                    $('#sna-entradas-toggle-cats-text').text('Ver menos categorías');
                    $('#sna-entradas-toggle-cats-icon').removeClass('snd-chevron--down').addClass('snd-chevron--up');
                }
            }
            $('#sna-entradas-filter-topic').val(activeFamilia);

            update_clear_button();
            reset_results();
            fetch_entries();
        }

        /* Clic en chip de categoría (Desktop/Tablet): si ya está activo, deselecciona y vuelve a 'todas' */
        $('.sna-entradas-tab').on('click', function (e) {
            e.preventDefault();
            var clickedKey = $(this).attr('data-familia');
            var nextKey    = (activeFamilia === clickedKey) ? 'todas' : clickedKey;
            activate_familia(nextKey);
        });

        /* Cambio en Select de Categoría (Móvil) */
        $('#sna-entradas-filter-topic').on('change', function () {
            activate_familia($(this).val() || 'todas');
        });

        /* Toggle "Ver todas las categorías" / "Ver menos categorías" (Desktop/Tablet) */
        $('#sna-entradas-toggle-cats').on('click', function (e) {
            e.preventDefault();
            var $extraTabs = $('.sna-entradas-tab--extra');
            var $text      = $('#sna-entradas-toggle-cats-text');
            var $icon      = $('#sna-entradas-toggle-cats-icon');
            if (!$extraTabs.length) return;

            var isHidden = $extraTabs.first().hasClass('muestra--ninguno');
            $extraTabs.toggleClass('muestra--ninguno', !isHidden);
            $(this).attr('aria-expanded', isHidden ? 'true' : 'false').toggleClass('is-expanded', isHidden);

            if ($text.length) {
                $text.text(isHidden ? 'Ver menos categorías' : 'Ver todas las categorías');
            }
            if ($icon.length) {
                $icon.toggleClass('snd-chevron--down', !isHidden).toggleClass('snd-chevron--up', isHidden);
            }
        });

        $('#sna-entradas-load-more').on('click', function () {
            fetch_entries();
        });

        /* Filtrado automático al cambiar Año o Mes */
        $('#sna-entradas-filter-year, #sna-entradas-filter-month').on('change', function () {
            apply_filters_now();
        });

        /* Búsqueda en tiempo real con debounce (350ms) + estado .is-filled SND */
        $('#sna-entradas-search').on('input search', function () {
            var val = $.trim($(this).val() || '');
            $('#sna-entradas-search-box').toggleClass('is-filled', val.length > 0);
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function () {
                apply_filters_now();
            }, 350);
        });

        $('#form-sna-entradas-search').on('submit', function (e) {
            e.preventDefault();
            clearTimeout(searchTimer);
            apply_filters_now();
        });

        $('#sna-entradas-filter-clear').on('click', function () {
            $('#sna-entradas-filter-year').val('');
            $('#sna-entradas-filter-month').val('');
            $('#sna-entradas-search').val('');
            $('#sna-entradas-search-box').removeClass('is-filled');
            activate_familia('todas');
            update_counts();
        });

        /* Carga inicial */
        fetch_entries();
    });
})();
