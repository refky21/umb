<?php  
	$post_id = is_home() ? get_option('page_for_posts') : ( is_front_page() ? get_option('page_on_front') : get_the_id() );
?>

<style type="text/css">

</style>
<script type="text/javascript">
	var home_url = '<?php echo home_url(); ?>',
		theme_url = '<?php echo get_stylesheet_directory_uri(); ?>',
		ajax_url = '<?php echo home_url()."/wp-admin/admin-ajax.php" ?>';
</script>

