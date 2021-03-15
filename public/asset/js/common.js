$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('.sk-datatable.sortable thead th').click(function() {
        $('.sk-datatable thead th').removeClass('asc desc');
        sortCurrent = $(this).attr('data-sort');
        sort = (sortCurrent === "asc") ? "desc" : "asc";
        $(this).addClass(sort);
        $(this).attr('data-sort', sort);
    });
    var isActive = false;
    var path = window.location.origin + window.location.pathname;
    $('.sk-sidebar li.nav-item a').each(function() {
        if (this.href === path) {
            activeMenu($(this));
            isActive = true;
        }
    });
    if (isActive === false) {
        $(".sk-sidebar li.nav-item a[menu-context]").each(function() {
            arrContext = $(this).attr("menu-context").split(',');

            for (let index = 0; index < arrContext.length; index++) {
                const context = arrContext[index];
                href = this.href + context;
                if (path.indexOf(href) >= 0) {
                    activeMenu($(this));
                }
            }

        });
    }

    function activeMenu(element) {
        element.parent().addClass('active');
        element.closest('.nav-item.has-treeview').addClass('menu-open');
    }
})

function skAlert(status, message) {
    $('.sk-toast .toast-body').text(message);
    $('.sk-toast-'+status).toast('show');
}