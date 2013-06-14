/*  
	Your Project Title
	Author: You
*/

(function($){
	
	// top level variables for application use
	
	var currentUser,
		container,
		currentView
	;
	
	
	var getTasks = function(){
		return $.ajax({
			url: 'xhr/get_tasks.php',
			type: 'get',
			dataType: 'json',
			success: function(response){
				// add tasks to the page
			}
		});
	};
	
	
	var loadApp = function(){};
	
	
	var loadLanding = function(){};
	
	
	var checkLoginState = function(){
		return $.ajax({
			url: 'xhr/check_login.php',
			type: 'get',
			dataType: 'json',
			success: function(response){
				// if user, loadApp()
				// if error, loadLanding()
			}
		});
	};
	
	
	
	// init function should be run on document ready, and load either the app or landing
	 
	var init = function(){

		$.fetcher([
			["templates/components.html #addTaskTemplate"],
			["templates/components.html #taskTemplate"],
			["templates/components.html #projectTemplate"],
			["templates/landing.html"],
			["templates/app.html"]
		]).then(checkLoginState);
	
		container = $('#container');
	};
	
	
	
	// DOM ready code last
	
	$(document).ready(function(){
		
		init();
		
		
		// Create any "live" events here... you could create all your events with .live()
		// Examples:  new task "submit", register "submit", login "submit", logout "click", open task, etc etc
		
		$('#user-reg-form').live('submit', function(){
			
			return false;
		});
		
	}); // end document ready
	
})(jQuery); // end private scope


//mike - example: edit in place plugin - last day

var activeateProjects = function(sel){
	var projects = $(sel);
	projects.find(".detailstatus form").buttonset();
	projects.each(function(){
		var project = $(this);
		var id = project.attr("data-projectid");
		project.find(".tasktitle").editable("xhr/update_project.php",{
			name: "projectName",
			submitdata: {
				projectId: id
			},
			callback: function(val){
				var json = $.parseJSON(val);
				$(this).text(json.project.projectName);
			} //val will be the data from the server
		}); //this may be different for me - path wise that is
		
		project.find(".detailleft p").editable("xhr/update_project.php",{ //this will make the description editable
			name: "projectDescription",
			type: "textarea",
			rows: 9,
			submitdata: {
				projectId: id
			},
			callback: function(val){
				var json = $.parseJSON(val);
				$(this).text(json.project.projectDescription);
			} //val will be the data from the server
		}); //this may be different for me - path wise that is
	});
};