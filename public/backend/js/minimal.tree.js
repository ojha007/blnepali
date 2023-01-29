$(function () {
    var
        $table = $('.tree-table'),
        rows = $table.find('tr');

    rows.each(function (index, row) {
        var
            $row = $(row),
            level = $row.data('level'),
            id = $row.data('id'),
            $columnName = $row.find('td[data-column="name"]'),
            children = $table.find('tr[data-parent="' + id + '"]');
        hideIfAllHiddenChildren($table, $row);
        if (children.length) {
            var expander = $columnName.prepend('' +
                '<span class="treegrid-expander fa fa-minus" style="padding-right: 10px;"></span>');

            children.show();

            expander.find('.treegrid-expander').on('click', function (e) {
                var $target = $(e.target);
                if ($target.hasClass('fa-plus')) {
                    $target
                        .removeClass('fa-plus')
                        .addClass('fa-minus');
                    children.show();

                } else {
                    $target
                        .removeClass('fa-minus')
                        .addClass('fa-plus');

                    reverseHide($table, $row);
                }
            });
        } else {
            var expander = $columnName.prepend('' +
                '<span class="treegrid-expander" style="padding-right: 25px;"></span>');
        }

        $columnName.prepend('' +
            '<span class="treegrid-indent" style="padding-left:' + 35 * level + 'px ;,width:' + 35 * level + 'px"></span>');
        /*$columnName.attr('style',"padding-left:" + 15 * level + "px");*/
    });

    // Reverse hide all elements
    reverseHide = function (table, element) {
        var
            $element = $(element),
            id = $element.data('id'), subTotals = {},
            children = table.find('tr[data-parent="' + id + '"]');

        if (children.length) {
            children.each(function (i, e) {
                reverseHide(table, e);

            });

            $element
                .find('.fa-minus')
                .removeClass('fa-minus')
                .addClass('fa-plus');

            children.hide();

        }
    };

});
var hideIfAllHiddenChildren = function (table, element) {
    var $element = $(element),
        id = $element.data('id'), countHidden = 0,
        children = table.find('tr[data-parent="' + id + '"]'), childLength = children.length;
    if (childLength) {
        children.each(function (i, e) {
            hideIfAllHiddenChildren(table, e);
            if ($(e).attr('class') == 'hide') {
                countHidden = countHidden + 1;
            }
        });
        if (childLength == countHidden) {
            $element.addClass('hide');
        }
    }

};
