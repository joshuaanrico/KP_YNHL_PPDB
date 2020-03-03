$(document).ready(function($) {
		$('#stylesw').styleSwitcher();
		
	$('.open-close').click(function() {
		if ($(this).parent().css('left') == '-148px') {
			$(this).parent().animate({
				"left": "0"
			}, 300);
		} else {
			$(this).parent().animate({
				"left": "-148px"
			}, 300);
		}
	});
	$('a.col2').click(function() {
	$('#ssubmit').removeClass().addClass('yellow');
	$('#submit').removeClass().addClass('yellow');
		return false;
	});
	$('a.col1').click(function() {
	$('#ssubmit').removeClass().addClass('blue');
	$('#submit').removeClass().addClass('blue');
		return false;
	});
	$('a.col3').click(function() {
	$('#ssubmit').removeClass().addClass('red');
	$('#submit').removeClass().addClass('red');
		return false;
	});
	$('a.col4').click(function() {
	$('#ssubmit').removeClass().addClass('orange');
	$('#submit').removeClass().addClass('orange');
		return false;
	});
	$('a.col5').click(function() {
	$('#ssubmit').removeClass().addClass('green');
	$('#submit').removeClass().addClass('green');
		return false;
	});
	$('a.col6').click(function() {
	$('#ssubmit').removeClass().addClass('purple');
	$('#submit').removeClass().addClass('purple');
		return false;
	});
	$('a.col7').click(function() {
	$('#ssubmit').removeClass().addClass('white');
	$('#submit').removeClass().addClass('white');
		return false;
	});
	$('a.col8').click(function() {
	$('#ssubmit').removeClass().addClass('black');
	$('#submit').removeClass().addClass('black');
		return false;
	});	
	$('a.col9').click(function() {
	$('#ssubmit').removeClass().addClass('darkblue');
	$('#submit').removeClass().addClass('darkblue');
		return false;
	});		
	$('#pat1').click(function() {
		$('body').css({background: 'url(../images/backgrounds/diagonal-noise.png) repeat'});
		return false;
	});
	$('#pat2').click(function() {
		$('body').css({background: 'url(../images/backgrounds/bgnoise_lg.png) repeat'});
		return false;
	});
	$('#pat3').click(function() {
		$('body').css({background: 'url(../images/backgrounds/wood4.jpg) repeat'});
		return false;
	});
	$('#pat4').click(function() {
		$('body').css({background: 'url(../images/backgrounds/concrete_wall_3.png) repeat'});
		return false;
	});
	$('#pat5').click(function() {
		$('body').css({background: 'url(../images/backgrounds/45degreee_fabric.png) repeat'});
		return false;
	});
	$('#pat6').click(function() {
		$('body').css({background: 'url(../images/backgrounds/double_lined.png) repeat'});
		return false;
	});
	$('#pat7').click(function() {
		$('body').css({background: 'url(../images/backgrounds/fancy_deboss.png) repeat'});
		return false;
	});
	$('#pat8').click(function() {
		$('body').css({background: 'url(../images/backgrounds/light_alu.png) repeat'});
		return false;
	});
	$('#pat9').click(function() {
		$('body').css({background: 'url(../images/backgrounds/wood3.jpg) repeat'});
		return false;
	});
	$('#pat10').click(function() {
		$('body').css({background: 'url(../images/backgrounds/noise.png) repeat'});
		return false;
	});
	$('#pat11').click(function() {
		$('body').css({background: 'url(../images/backgrounds/roughcloth.png) repeat'});
		return false;
	});
	$('#pat12').click(function() {
		$('body').css({background: 'url(../images/backgrounds/soft_wallpaper.png) repeat'});
		return false;
	});
	$('#pat13').click(function() {
		$('body').css({background: 'url(../images/backgrounds/subtle_freckles.png) repeat'});
		return false;
	});
	$('#pat14').click(function() {
		$('body').css({background: 'url(../images/backgrounds/white_texture.png) repeat'});
		return false;
	});
	$('#pat15').click(function() {
		$('body').css({background: 'url(../images/backgrounds/wood_pattern.png) repeat'});
		return false;
	});	

});