ngs.AdminAddGroupAction = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "do_add_group";
    },
    getMethod: function() {
        return "POST";
    },
    afterAction: function(transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            jQuery('#f_add_group_popup_dialog').dialog('close');
            window.location.reload();
        } else if (data.status === "err") {
            jQuery('#ae_add_group_error').html(data.message);
        }
    }
});
