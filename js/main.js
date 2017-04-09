$(document).ready(function(){
	console.log("FUCK");
	var nav = $("#admin_nav")
    nav.find('li').on('click', 'a', function(e){
    	e.preventDefault;
        if ($("#admin_nav li").hasClass("active"))
        	$("#admin_nav li").removeClass("active");
     	$(this).parents().toggleClass("active");
     	updateHash($(this.hash));
    });

    function updateHash(hash)
    {
    	console.log(hash);
    	var admin_nav = $("#admin_content div");
    	admin_nav.each(function(){
    		var e = $(this);
    		if (admin_nav.hasClass('active'))
    			e.removeClass('active').hide();
    	});
    	hash.addClass('active').fadeIn(20);

    }
});