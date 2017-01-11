$(function(){
	var img = $('img.imgItem');
	for (var i = 0; i < img.length; i++) {
		if (img[i].clientWidth > 10) {
			img[i].className = 'imgItem';
		}
	}
	// console.log(img[0].clientWidth, img[0].clientHeight);
	// console.log(img[0].naturalWidth, img[0].naturalHeight);
	var imgWidth = img[0].clientWidth;
	var imgHeight = img[0].clientHeight;
	var imgRatio = img[0].naturalWidth / img[0].naturalHeight;
	imgWidth = (imgHeight * imgRatio) * 0.4;
})