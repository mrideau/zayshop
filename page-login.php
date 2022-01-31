<?php
// Template Name: Login
get_header(); ?>

<?php wp_login_form( array( 'redirect' => home_url() ) ); ?>

<?php get_footer(); ?>