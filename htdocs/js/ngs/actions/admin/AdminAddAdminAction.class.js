ngs.AdminAddAdminAction = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "do_add_admin";
    },
    getMethod: function() {
        return "POST";
    },
    afterAction: function(transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            jQuery('#f_add_admin_popup_dialog').dialog('close');
            window.location.reload();
        } else if (data.status === "err") {
            jQuery('#ae_add_admin_error').html(data.message);
        }
    }
});
