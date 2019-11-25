<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="quotes-content">

    <?php while( have_posts() ) :
        the_post(); ?>
    
    <h2><?php the_title(); ?></h2>
    <h3><?php the_permalink();?></h3>
    <?php the_content(); ?>
    
    <?php endwhile;?>

</section>

    <button id="quote-button" >Generate New Quote</button>

    <!-- <?php the_posts_navigation();?> -->

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>