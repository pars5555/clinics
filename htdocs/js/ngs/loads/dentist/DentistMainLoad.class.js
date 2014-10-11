ngs.DentistMainLoad = Class.create(ngs.AbstractLoad, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "dentist", ajaxLoader);
    },
    getUrl: function() {
        return "main";
    },
    getMethod: function() {
        return "POST";
    },
    getContainer: function() {
        return "content";
    },
    getName: function() {
        return "dentist_main";
    },
    afterLoad: function() {  
       
        ngs.nestLoad(jQuery("#contentLoad").val(), {});
         jQuery('.f_showMenu').click(function(){
        	jQuery('.header-nav-popup-menus').not(jQuery(this).find(".header-nav-popup-menus")).removeClass("active");
        	jQuery(this).find(".header-nav-popup-menus").toggleClass("active");
        });
        jQuery('.f_subNav_controller').click(function(){
        	this.parentNode.classList.toggle("active");
        	jQuery(this).toggleClass("active");
        	jQuery(this).next(".current-nav-wrapper").toggleClass("active");
        	
        });
    }
});
