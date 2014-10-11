ngs.AdminAddUserLoad = Class.create(ngs.AbstractLoad, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "add_user";
    },
    getMethod: function() {
        return "POST";
    },
    getContainer: function() {
        return "f_add_user_popup_container";
    },
    getName: function() {
        return "admin_add_user";
    },
    afterLoad: function() {
		jQuery('#f_add_user_form').submit(function(){		
           ngs.action('admin_add_user', jQuery(this).serializeObject());
           return false;
       });
    }
});
jQuery.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    jQuery.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};