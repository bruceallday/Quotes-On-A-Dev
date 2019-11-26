<?php get_header(); ?>
<?php if( have_posts() ) :?>

<div class="quotes-box">

    <section id="quotes-content">
        <h1>ABOUT</h1>
        <br>
        <p >Quotes On Dev is a project site for RED Academy web developer professional program. Its used to experiment with AJAX, 
            WP API, jQuery, and other cool things</p>

        <p>This site is heavily inspired by Chris Coyiers Quotes on Design</p>
        

        <!-- <?php while( have_posts() ) :
            the_post(); ?>
            <h2><?php the_title();?></h2>
            <hr>
            <?php the_content(); ?>
        <?php endwhile;?> -->

</section>

</div>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<?php get_footer();?>