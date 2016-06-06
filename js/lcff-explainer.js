jQuery(document).ready(function(){

	/* SHOW OR HIDE NAV
	=====================================*/
	jQuery('.slick-nav-hed a').on('click', function(){
		if (jQuery('#lcff-nav').attr('state') === 'show'){
			jQuery('#lcff-nav').animate({'left': '-1000px'}, 500).attr('state','hide');
			jQuery('#lcff-slides').animate({'width': '70%','margin': '0 15%'}, 500);
			jQuery(this).text('Show Navigation');
		}
		else {
			jQuery('#lcff-nav').animate({'left': '1%'}, 500).attr('state','show');
			jQuery('#lcff-slides').animate({'width': '70%', 'margin': '0'}, 500);
			jQuery(this).text('Hide Navigation');
		}
	})

	/* DEFAULT SLIDE
	=====================================*/
	jQuery('#lcff-nav i[type="0"]').css('visibility', 'visible');
	jQuery('#lcff-nav a[type="0"]').css('color', '#88419d');

	/* HANDLING SLIDE TRANSITIONS
	=====================================*/
	var curSlide = 0;

	jQuery('#lcff-nav a').add('#lcff-top a').on('click', function(){
		var slide = parseInt(jQuery(this).attr('type'));

		/* Change Slide Title
		-----------------------------------*/
		var title = jQuery('#lcff-nav a[type="'+slide+'"]').text();
		jQuery('#lcff-title h2').text(title);
		
		/* SubNavigation Code
		-----------------------------------*/
		if (slide >= 2 && slide <= 14 || slide >= 15 && slide <= 21 || slide == 22 || slide == 23 || slide >= 27){
			var subnav;			

			if (slide >= 2 && slide <= 14){subnav = 0;}
			else if (slide >= 15 && slide <= 21){subnav = 1;}
			else if (slide == 22 || slide == 23){subnav = 2;}
			else if (slide >= 27){subnav = 3;}

			jQuery('.lcff-subnav:not(.lcff-subnav[subnav="' + subnav + '"])').animate({height: 0}, 300).dequeue();

			//subnav
			var subH = 0, subL = jQuery('.lcff-subnav[subnav="' + subnav + '"] li').size();
			for (var i = 0 ; i < subL ; i++){subH += jQuery('.lcff-subnav[subnav="' + subnav + '"] li:eq('+i+')').height() + 5;}
			jQuery('.lcff-subnav[subnav="' + subnav + '"]').animate({height: subH + 'px'}, 200).dequeue();


		}
		else {jQuery('.lcff-subnav').animate({height: 0}, 300).dequeue();}

		/* Slide Transition
		-----------------------------------*/
		jQuery('.lcff-slide[type="' + curSlide + '"]').fadeOut(500);
		jQuery('.lcff-slide[type="' + slide + '"]').fadeIn(700);

		/* Slide Styles
		-----------------------------------*/
		jQuery('#lcff-nav i[type="' + curSlide + '"]').css('visibility', 'hidden');
		jQuery('#lcff-nav a[type="' + curSlide + '"]').css('color', '#333');
		jQuery('#lcff-nav i[type="' + slide + '"]').css('visibility', 'visible');
		jQuery('#lcff-nav a[type="' + slide + '"]').css('color', '#88419d');	

		/* Top NavBar Navigation
		-----------------------------------*/
		if (slide !== 0 && slide !== 28){
			jQuery('#lcff-top>div').add('#lcff-bottom>div').fadeIn(500);
		}
		else if (slide === 0) {
			jQuery('#lcff-top>div:first-of-type').add('#lcff-bottom>div:first-of-type').fadeOut(500);
			jQuery('#lcff-top>div:last-of-type').add('#lcff-bottom>div:last-of-type').fadeIn(500);
		}
		else if (slide === 28){
			jQuery('#lcff-top>div:last-of-type').add('#lcff-bottom>div:last-of-type').fadeOut(500);
			jQuery('#lcff-top>div:first-of-type').add('#lcff-bottom>div:first-of-type').fadeIn(500);
		}

		/* Which Slide Next Top Nav
		-----------------------------------*/
		jQuery('#lcff-top>div:first-of-type a').attr('type', slide - 1);
		jQuery('#lcff-top>div:last-of-type a').attr('type', slide + 1);

		curSlide = slide;


		

	});
})

window.onload = function(){

	/* IFRAME LOADING
	=====================================*/
	jQuery('.lcff-slide[type="28"]').css('display','none');
}