var $ = jQuery.noConflict();

$.getJSON("http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=c378d72ba608bb9d22c0ee252c90d333&user_id=24941028@N07&per_page=1&format=json&jsoncallback=?", displayImages);

function displayImages(data) {	
	 //Loop through the results in the JSON array of data. The 'data.photos.photo' bit is what you are trying to 'get at'. i.e. this loop looks at each photo in turn.
	$.each(data.photos.photo, function(i,item){
		
		//Gets the url for the image.
		var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg',
			linkURL = 'http://www.flickr.com/photos/recycledfilm/' + item.id + '/';
		
		//Uses this URL to creats a html 'img' tag.
		htmlString = '<div class="flickr-item"><a class="thumb" href="' + linkURL + '" target="_blank" rel="nofollow"><img src="' + photoURL + '" /></a><h2><a href="' + linkURL + '" target="_blank" rel="nofollow">' + item.title + '</a></h2><p><a class="btn" href="' + linkURL + '" target="_blank" rel="nofollow">More Info</a><a class="btn secondary-btn enlarge-btn" href="' + photoURL + '">Enlarge</a></p></div>';
		
		//Adds this image to the 'images1' div.
		$('#flickr-wrap').append(htmlString);

	});	
}