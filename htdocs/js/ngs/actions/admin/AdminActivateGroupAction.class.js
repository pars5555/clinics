ngs.AdminActivateGroupAction = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "do_activate_group";
    },
    getMethod: function() {
        return "POST";
    },
    afterAction: function(transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            ngs.DialogsManager.autohideDialog('You have ' + (data.active ? 'activated' : 'deactivated') + ' ' + data.group_name);      	

        } else if (data.status === "err") {
        }
        
    }
});
