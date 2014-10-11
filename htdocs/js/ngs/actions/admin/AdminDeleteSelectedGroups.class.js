ngs.AdminDeleteSelectedGroups = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "do_delete_selected_groups";
    },
    getMethod: function() {
        return "POST";
    },
    afterAction: function(transport) {
    	location.reload();
        // var data = transport.responseText.evalJSON();
        // if (data.status === "ok") {
            // ngs.DialogsManager.autohideDialog('You have ' + (data.active ? 'activated' : 'deactivated') + ' ' + data.user_name);      	
// 
        // } else if (data.status === "err") {
        // }
        // alert(1);
    }
});
