$(document).ready(function(){
	// Set active tab on the navbar
	let current_path_name = window.location.href;
	let navbar_links = $("#navbar li a");
	for (let link of navbar_links) 
	{
		if(link.href == current_path_name)
		{
			$("li#"+link.id).addClass("active");
			break;
		}
	}
});