(function($){
	var $default_template 	= $('#page_option'),
		$home_template		= $('#home_intro_page'),
		$profile_template	= $('#profile_page'),	
		$unitusaha_template = $('#unit_usaha_page'),		
		$direksi_template 	= $('#direksi_page'),		
		$struktur_template 	= $('#struktur_page'),
		$alur_template 		= $('#alur_page'),
		$unitbisnis_template 		= $('#unit_bisnis_page'),
		page_tempate 		= $('#page_template'),
		editor_hidden 		= ["frontpage.php", "template/struktur.php","template/alur.php"];

	var hide_home_template = function(){
		if ($home_template.hasClass('option-is-show') || !$home_template.hasClass('option-is-hide')){
			$home_template.removeClass('option-is-show');
			$home_template.addClass('option-is-hide');
		}
	}, 	show_home_template = function(){
		if ($home_template.hasClass('option-is-hide')) {
			$home_template.removeClass('option-is-hide');
			$home_template.addClass('option-is-show');
		}
	},	hide_direksi_template = function(){
		if ($direksi_template.hasClass('option-is-show') || !$direksi_template.hasClass('option-is-hide')) {
			$direksi_template.removeClass('option-is-show');
			$direksi_template.addClass('option-is-hide');
		}
	},	show_direksi_template = function(){
		if ($direksi_template.hasClass('option-is-hide')) {
			$direksi_template.removeClass('option-is-hide');
			$direksi_template.addClass('option-is-show');
		}
	},	hide_profile_template = function(){
		if ($profile_template.hasClass('option-is-show') || !$profile_template.hasClass('option-is-hide')){
			$profile_template.removeClass('option-is-show');
			$profile_template.addClass('option-is-hide');
		}
	}, 	show_profile_template = function(){
		if ($profile_template.hasClass('option-is-hide')) {
			$profile_template.removeClass('option-is-hide');
			$profile_template.addClass('option-is-show');
		}
	}, 	hide_unitusaha_template = function(){
		if ($unitusaha_template.hasClass('option-is-show') || !$unitusaha_template.hasClass('option-is-hide')){
			$unitusaha_template.removeClass('option-is-show');
			$unitusaha_template.addClass('option-is-hide');
		}
	}, 	show_unitusaha_template = function(){
		if ($unitusaha_template.hasClass('option-is-hide')) {
			$unitusaha_template.removeClass('option-is-hide');
			$unitusaha_template.addClass('option-is-show');
		}
	}, 	hide_struktur_template = function(){
		if ($struktur_template.hasClass('option-is-show') || !$struktur_template.hasClass('option-is-hide')) {
			$struktur_template.removeClass('option-is-show');
			$struktur_template.addClass('option-is-hide');
		}
	}, 	show_struktur_template = function(){
		if ($struktur_template.hasClass('option-is-hide')) {
			$struktur_template.removeClass('option-is-hide');
			$struktur_template.addClass('option-is-show');
		}
	}, 	hide_alur_template = function(){
		if ($alur_template.hasClass('option-is-show') || !$alur_template.hasClass('option-is-hide')) {
			$alur_template.removeClass('option-is-show');
			$alur_template.addClass('option-is-hide');
		}
	}, 	show_alur_template = function(){
		if ($alur_template.hasClass('option-is-hide')) {
			$alur_template.removeClass('option-is-hide');
			$alur_template.addClass('option-is-show');
		}
	}, 	hide_unitbisnis_template = function(){
		if ($unitbisnis_template.hasClass('option-is-show') || !$unitbisnis_template.hasClass('option-is-hide')) {
			$unitbisnis_template.removeClass('option-is-show');
			$unitbisnis_template.addClass('option-is-hide');
		}
	}, 	show_unitbisnis_template = function(){
		if ($unitbisnis_template.hasClass('option-is-hide')) {
			$unitbisnis_template.removeClass('option-is-hide');
			$unitbisnis_template.addClass('option-is-show');
		}
	}, 	hide_default_template = function(){
		if ($default_template.hasClass('option-is-show') || !$default_template.hasClass('option-is-hide')) {
			$default_template.removeClass('option-is-show');
			$default_template.addClass('option-is-hide');
		}
	},	show_default_template = function(){
		if ($default_template.hasClass('option-is-hide')) {
			$default_template.removeClass('option-is-hide');
			$default_template.addClass('option-is-show');
		}
	},	hide_page_template = function(){
		if ($page_template.hasClass('option-is-show') || !$page_template.hasClass('option-is-hide')) {
			$page_template.removeClass('option-is-show');
			$page_template.addClass('option-is-hide');
		}
	},	show_page_template = function(){
		if ($page_template.hasClass('option-is-hide')) {
			$page_template.removeClass('option-is-hide');
			$page_template.addClass('option-is-show');
		}
	};

	
	$(document).ready(function () {
		var page_tempate_val = page_tempate.val();

		if ( page_tempate_val != 'frontpage.php'){
			$home_template.addClass('option-is-hide');
		}

		if ( page_tempate_val != 'template/profiles.php' ){
			$profile_template.addClass('option-is-hide');
		}

		if ( page_tempate_val != 'template/unitusaha.php' ){
			$unitusaha_template.addClass('option-is-hide');
		}

		if ( page_tempate_val != 'template/direksi.php' ){
			$direksi_template.addClass('option-is-hide');
		}

		if ( page_tempate_val != 'template/struktur.php' ){
			$struktur_template.addClass('option-is-hide');
		}
		if ( page_tempate_val != 'template/alur.php' ){
			$alur_template.addClass('option-is-hide');
		}
		if ( page_tempate_val != 'template/unitbisnis.php' ){
			$unitbisnis_template.addClass('option-is-hide');
		}

		if ($.inArray(page_tempate_val, editor_hidden) >= 0){
			$('#postdivrich').addClass('option-is-hide');
		} else {
			$('#postdivrich').removeClass('option-is-hide');
		}
	});

	$(document).on('change', '#page_template', function () {
		
		if ($(this).val() === "frontpage.php"){
			show_home_template();
			hide_profile_template();
			hide_direksi_template();
			hide_unitbisnis_template();
			hide_struktur_template();
			hide_unitusaha_template();
			hide_default_template();
		} else if ($(this).val() === "template/profiles.php") { 
			show_profile_template();
			hide_unitusaha_template();
			hide_home_template();
			hide_unitbisnis_template();
			hide_direksi_template();
			hide_struktur_template();
			hide_default_template();
		} else if ($(this).val() === "template/unitusaha.php") { 
			show_unitusaha_template();
			hide_profile_template();
			hide_home_template();
			hide_direksi_template();
			hide_struktur_template();
			hide_unitbisnis_template();
			hide_default_template();
		} else if ($(this).val() === "template/direksi.php") { 
			show_direksi_template();
			hide_struktur_template()
			hide_home_template();
			hide_profile_template();
			hide_unitusaha_template();
			hide_unitbisnis_template();
			hide_unitbisnis_template();
			hide_default_template();
		} else if ($(this).val() === "template/struktur.php") { 
			show_struktur_template();
			hide_direksi_template();
			hide_profile_template();
			hide_unitbisnis_template();
			hide_home_template();
			hide_unitusaha_template();
			hide_default_template();
		} else if ($(this).val() === "template/alur.php") { 
			show_alur_template();
			hide_struktur_template();
			hide_direksi_template();
			hide_profile_template();
			hide_unitbisnis_template();
			hide_home_template();
			hide_unitusaha_template();
			hide_default_template();
		} else if ($(this).val() === "template/unitbisnis.php") { 
			show_unitbisnis_template();
			hide_alur_template();
			hide_struktur_template();
			hide_direksi_template();
			hide_profile_template();
			hide_home_template();
			hide_unitusaha_template();
			hide_default_template();
		} else if ($(this).val() === "default"){
			hide_default_template();
			hide_unitbisnis_template();
			hide_alur_template();
			hide_struktur_template();
			hide_direksi_template();
			hide_profile_template();
			hide_home_template();
			hide_unitusaha_template();
			hide_default_template();
		}  else {
			hide_home_template();
			// hide_default_template();
			hide_unitbisnis_template();
			hide_profile_template();
			hide_unitusaha_template();
			hide_direksi_template();
			hide_struktur_template();
		}

		if ($.inArray($(this).val(), editor_hidden) >= 0){
			$('#postdivrich').addClass('option-is-hide');
		} else {
			$('#postdivrich').removeClass('option-is-hide');
		}
	}).trigger('change');
	
	// var selectedStatusSlug = $('#listing_statuschecklist input[type="radio"]').filter(':checked').data('slug'),
	// 	handdleChangeStatus = function(statusSlug){
	// 		$('#listing_price_rangechecklist > li').css('display', 'none');
	// 		if (statusSlug != undefined){
	// 			$('#listing_price_rangechecklist > li.'+statusSlug).removeAttr('style');
	// 		}
	// 	};

	// handdleChangeStatus(selectedStatusSlug);
	// $('#listing_statuschecklist input[type="radio"]').change(function(event) {
	// 	/* Act on the event */
	// 	selectedStatusSlug = $(this).filter(':checked').data('slug');
	// 	handdleChangeStatus(selectedStatusSlug);
	// });
})(jQuery);