ngs.LoadFactory= Class.create();
ngs.LoadFactory.prototype={
	
	initialize: function(ajaxLoader){
		this.loads = [];
		this.loads["main"] = function temp(){return new ngs.MainLoad("main", ajaxLoader);};
		
		
        //admin
        this.loads["admin_main"] = function temp(){return new ngs.AdminMainLoad("admin_main", ajaxLoader);};
		this.loads["admin_home"] = function temp(){return new ngs.AdminHomeLoad("admin_home", ajaxLoader);};
		this.loads["dentist_main"] = function temp(){return new ngs.DentistMainLoad("dentist_main", ajaxLoader);};
		this.loads["dentist_home"] = function temp(){return new ngs.DentistHomeLoad("dentist_home", ajaxLoader);};
		this.loads["dentist_calendar"] = function temp(){return new ngs.DentistCalendarLoad("dentist_calendar", ajaxLoader);};
       
      
		},
	
	getLoad: function(name){
		try{
			return this.loads[name]();
		}
		catch(ex){
		}
	}
};