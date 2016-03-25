/*
* nekocms.js
*
*/

var project_url;




function set_base_url(url){
	project_url = url;
}

function loadComments(news_id){
	
	$.ajax({
		url: project_url+'ajaxfrontend/loadcomments',
		data: 'newsID='+news_id,
		type: 'POST',
		success:function(response){
			$("#comments").html(response);
		}
	});
}