<?php get_header(); ?>
<?php if( have_posts() ) :?>

<section id="quotes-content">

    <?php while( have_posts() ) :
        the_post(); ?>
    <?php the_content(); ?>
    <h2><?php the_title(); ?></h2>
    <?php endwhile;?>

</section>

    <button id="quote-button" >Show Me Another!</button>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>