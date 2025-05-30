<?php get_template_part('template-parts/footer/main-footer'); ?>
<div id="reactLoader"></div>
<div class="cdk-overlay"></div>
<?php wp_footer(); ?>

<?php echo Theme_Manager::get_instance()->get_theme_option('before_closing_footer_scripts'); ?>

</body>

</html>