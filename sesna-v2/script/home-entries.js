(function sna_entradas_init() {
    /* gobmx.js inyecta jQuery de forma asíncrona; este script puede
       ejecutarse antes de que esté disponible, así que se espera. */
    if (typeof window.jQuery === 'undefined') {
        setTimeout(sna_entradas_init, 50);
        return;
    }

    jQuery(function ($) {
        var loading = '<div class="loading"><img src="' + ajax_object.loading_url + '"/></div>';

        function get_filters() {
            return {
                year: $('#sna-entradas-filter-year').val() || '',
                monthnum: $('#sna-entradas-filter-month').val() || ''
            };
        }

        function update_load_more($panel) {
            var hasMore = $panel.find('[data-has-more="1"]').length > 0;
            $('#sna-entradas-load-more').toggle(hasMore);
        }

        function update_clear_button() {
            var f = get_filters();
            $('#sna-entradas-filter-clear').toggle(!!(f.year || f.monthnum));
        }

        function reset_panels() {
            $('.sna-entradas-panel').empty().data('page', 0).data('loaded', 0);
        }

        function update_counts() {
            var filters = get_filters();

            $.post(ajax_object.ajax_url, {
                action: 'get_familias_counts',
                year: filters.year,
                monthnum: filters.monthnum
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

        function fetch_familia(key) {
            var $panel = $('#panel-' + key);
            var page = $panel.data('page') || 0;
            var filters = get_filters();

            $panel.append(loading);

            $.post(ajax_object.ajax_url, {
                action: 'get_home_entries_by_family',
                familia: key,
                page: page,
                year: filters.year,
                monthnum: filters.monthnum
            }, function (response) {
                $panel.find('.loading').remove();
                $panel.find('[data-has-more]').remove();
                $panel.append(response);
                $panel.data('loaded', 1).data('page', page + 1);
                update_load_more($panel);
            });
        }

        $('.sna-entradas-tab').on('click', function () {
            var key = $(this).data('familia');

            $('.sna-entradas-tab').removeClass('active').attr('aria-selected', 'false');
            $(this).addClass('active').attr('aria-selected', 'true');

            $('.sna-entradas-panel').removeClass('active');
            var $panel = $('#panel-' + key).addClass('active');

            if ($panel.data('loaded') != 1) {
                fetch_familia(key);
            } else {
                update_load_more($panel);
            }
        });

        $('#sna-entradas-load-more').on('click', function () {
            var key = $('.sna-entradas-panel.active').data('familia');
            fetch_familia(key);
        });

        $('#sna-entradas-filter-apply').on('click', function () {
            update_clear_button();
            update_counts();
            reset_panels();
            var key = $('.sna-entradas-tab.active').data('familia');
            $('#panel-' + key).addClass('active');
            fetch_familia(key);
        });

        $('#sna-entradas-filter-clear').on('click', function () {
            $('#sna-entradas-filter-year').val('');
            $('#sna-entradas-filter-month').val('');
            $(this).hide();
            update_counts();
            reset_panels();
            var key = $('.sna-entradas-tab.active').data('familia');
            $('#panel-' + key).addClass('active');
            fetch_familia(key);
        });

        fetch_familia($('.sna-entradas-tab.active').data('familia'));
    });
})();
