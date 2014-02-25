var $ = jQuery.noConflict();

$.getJSON("http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=c378d72ba608bb9d22c0ee252c90d333&user_id=24941028@N07&per_page=50&format=json&jsoncallback=?", displayImages);

function displayImages(data) {	
	 //Loop through the results in the JSON array of data. The 'data.photos.photo' bit is what you are trying to 'get at'. i.e. this loop looks at each photo in turn.
	$.each(data.photos.photo, function(i,item){
		
		//Gets the url for the image.
		var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_q.jpg';
		
		//Uses this URL to creats a html 'img' tag.
		htmlString = '<div class="flickr-item"><a class="thumb" href="#"><img src="' + photoURL + '" /></a></div>';
		
		//Adds this image to the 'images1' div.
		$('#flickr-wrap').append(htmlString);

	});	
}