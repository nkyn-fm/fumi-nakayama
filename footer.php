<audio id="overSound" preload="auto">
    <source src="<?php echo get_template_directory_uri(); ?>/audio/focus_sound.mp3" type="audio/mp3">
    <source src="<?php echo get_template_directory_uri(); ?>/udio/focus_sound.wav" type="audio/wav">
</audio>
<audio id="clickSound" preload="auto">
    <source src="<?php echo get_template_directory_uri(); ?>/audio/sound_shutter.mp3" type="audio/mp3">
    <source src="<?php echo get_template_directory_uri(); ?>/audio/sound_shutter.wav" type="audio/wav">
</audio>
<footer id="footer">
    <p class="copyright eng">© Fumi Nakayama</p>
</footer>

<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/infiniteslidev2.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js" type="text/javascript"></script>
<?php if ( is_home() || is_front_page() ) : ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/home.js" type="text/javascript"></script>
<?php endif; ?>

</body>

</html>
