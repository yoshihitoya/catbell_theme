<?php
/*
Template Name: お問い合わせ
*/
?>

	<?php get_template_part('header'); ?>
	<main class="main cntInner inner">
		<div id="contact">
			<h2 class="shoplist__title">お問い合わせ</h2>
			<?php echo the_content(); ?>
		</div>
	</main>

	<style>
    #contact {
    	margin: 200px 0;
		}
		input,
		textarea {
			border: 1px solid;
		}
		form {
			width: 300px;
			margin: auto;
		}
	</style>
	
	<?php get_footer(); ?>
</body>

</html>