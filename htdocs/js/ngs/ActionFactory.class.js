ngs.ActionFactory = Class.create();
ngs.ActionFactory.prototype={

	initialize: function(ajaxLoader){
		this.actions = [];

        //admin
        this.actions["admin_add_user"] = function temp(){return new ngs.AdminAddUserAction("admin_add_user", ajaxLoader);};
        this.actions["admin_add_admin"] = function temp(){return new ngs.AdminAddAdminAction("admin_add_admin", ajaxLoader);};
        this.actions["admin_add_group"] = function temp(){return new ngs.AdminAddGroupAction("admin_add_group", ajaxLoader);};
        this.actions["admin_add_publication"] = function temp(){return new ngs.AdminAddPublicationAction("admin_add_publication", ajaxLoader);};
        
        this.actions["admin_activate_user"] = function temp(){return new ngs.AdminActivateUserAction("admin_activate_user", ajaxLoader);};
        
        this.actions["admin_activate_group"] = function temp(){return new ngs.AdminActivateGroupAction("admin_activate_group", ajaxLoader);};
        this.actions["admin_activate_publication"] = function temp(){return new ngs.AdminActivatePublicationAction("admin_activate_publication", ajaxLoader);};
        
        this.actions["admin_delete_selected_groups"] = function temp(){return new ngs.AdminDeleteSelectedGroups("admin_delete_selected_groups", ajaxLoader);};
        this.actions["admin_delete_selected_users"] = function temp(){return new ngs.AdminDeleteSelectedUsers("admin_delete_selected_users", ajaxLoader);};
        this.actions["admin_delete_selected_admins"] = function temp(){return new ngs.AdminDeleteSelectedAdmins("admin_delete_selected_admins", ajaxLoader);};
        this.actions["admin_delete_selected_publications"] = function temp(){return new ngs.AdminDeleteSelectedPublications("admin_delete_selected_publications", ajaxLoader);};
	},

	getAction: function(name){
		return this.actions[name]();
	}
};