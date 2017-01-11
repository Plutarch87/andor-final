const nav = document.querySelector("#main");
const topOfNav = nav.offsetTop;

function fixNav() {
	if(window.scrollY >= topOfNav) {
		document.body.style.paddingTop = nav.offsetHeight + "px";
		document.body.classList.add("fixed-nav");
	}
	else {
		document.body.style.paddingTop = 0;
		document.body.classList.remove("fixed-nav");
	}
}
window.addEventListener("scroll", fixNav);

$(document).ready(function() {
    $("nav > ul > li").mouseover(function() {
        var the_width = $(this).find("a").width();
        var child_width = $(this).find("ul").width();
        var width = parseInt((child_width - the_width)/2);
        $(this).find("ul").css('left', -width);
    });
});