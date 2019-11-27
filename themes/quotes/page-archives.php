<?php get_header(); ?>
<?php if( have_posts() ) :?>

<section >
    <?php while( have_posts() ) :
        the_post(); ?>
        <h2><?php the_title();?></h2>
        <hr>
        <?php the_content(); ?>
    <?php endwhile;?>
</section>



<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<?php get_footer();?>