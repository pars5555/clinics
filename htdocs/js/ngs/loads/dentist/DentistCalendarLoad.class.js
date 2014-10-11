ngs.DentistCalendarLoad = Class.create(ngs.AbstractLoad, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "dentist", ajaxLoader);
    },
    getUrl: function() {
        return "calendar";
    },
    getMethod: function() {
        return "POST";
    },
    getContainer: function() {
        return "content";
    },
    getName: function() {
        return "dentist_calendar";
    },
    afterLoad: function() {
    
    }
});
