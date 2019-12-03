<?php get_header(); ?>
<?php if( have_posts() ) :?>

<div class="quotes-box">
    <section id="quotes-content">

        <?php while( have_posts() ) :
            the_post(); ?>
            <h2><?php the_title();?></h2>
            <hr>
            <?php the_content(); ?>
            <?php echo get_post_meta(get_the_ID(), '_qod_quote_source', true);?>
            <?php echo get_post_meta(get_the_ID(), '_qod_quote_source_url', true);?>
        <?php endwhile;?>

</section>

</div>

<button id="quote-button">Show Me Another!</button>    

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<?php get_footer();?>