ngs.AdminUsersLoad = Class.create(ngs.AbstractLoad, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "users";
    },
    getMethod: function() {
        return "POST";
    },
    getContainer: function() {
        return "content";
    },
    getName: function() {
        return "admin_users";
    },
    afterLoad: function() {
    	jQuery('.user-wrapper').addClass("active");
    	jQuery(".user-wrapper").find(".current-nav-wrapper").addClass("active");	
    	this.deleteSelectedUsers();
    	
    	this.showMoreDetails();
    	
        jQuery('#ae_add_user').click(function() {

            jQuery('<div id="f_add_user_popup_container" class="sign-up-wrapper"></div>').dialog({
                resizable: false,
                modal: true,
                width: 500,
                title: 'Add User',
                show: {effect: "slide", direction: "up", duration: 600},
                hide: {effect: "slide", direction: "up", duration: 200},
                close: function() {
                    jQuery(this).remove();
                }
            });
            ngs.load('admin_add_user', {});
        });
        jQuery('.f_delete_users').click(function() {
            var user_id = jQuery(this).attr('user_id');
            jQuery('<div>Are you sure?</div>').dialog(
                    {
                        resizable: false,
                        width: 350,
                        height: 200,
                        modal: true,
                        buttons: {
                            "yes": {
                                text: 'yes',
                                click: function() {
                                    window.location.href = '/dyn/admin/do_delete_user?user_id=' + user_id;
                                }
                            },
                            "cancel": {
                                text: 'cancel',
                                click: function() {
                                    jQuery(this).dialog("close");
                                }
                            }

                        },
                        close: function() {
                            jQuery(this).remove();
                        }

                    });
        });
        jQuery('.f_edit_user').click(function() {
            jQuery('<div id="" class="sign-up-wrapper"></div>').dialog({
                resizable: false,
                modal: true,
                width: 500,
                title: 'Edit User',
                show: {effect: "slide", direction: "up", duration: 600},
                hide: {effect: "slide", direction: "up", duration: 200},
                close: function() {
                    jQuery(this).remove();
                }
            });
        });
       this.initUsersPictures();
       this.initUserActiveFieldCheckboxes();
    },
    initUsersPictures: function() {
        jQuery('.ae_users_picture_file_input').change(function() {
            var user_id = jQuery(this).attr('user_id');            
            jQuery('#upload_user_image_'+user_id).submit();
        });
    },
    initUserActiveFieldCheckboxes: function() {
        jQuery('.f_active_users_checkbox').change(function() {
            var active_value = jQuery(this).prop('checked') ? 1 : 0;
            var user_id = jQuery(this).attr('user_id');
            ngs.action('admin_activate_user', {'user_id': user_id, 'active': active_value});
        });
    },
    deleteSelectedUsers: function() {
    	usersArray = [];
    	jQuery(".f_delete_selected_user").change(function(){
	    		if(jQuery(this).prop('checked') == true) {
	    			usersArray.push(jQuery(this).attr("user_id"));
	    			console.log(usersArray);
	    		}else {
	    			usersArray.pop(jQuery(this).attr("user_id"));
	    			console.log(usersArray);
	    		}
    		});
			jQuery("#delete_selected_users").click(function(){
				console.log(usersArray);
				ngs.action('admin_delete_selected_users', {"selectedUsers[]" : usersArray});
			});
    		
    },
    showMoreDetails: function() {
    	jQuery(".f_show_more_details").click(function(){
    		jQuery(this).parents(".table-row").next().stop(true,false).toggleClass("active");
    	});
    }
    
});
