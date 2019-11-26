<?php get_header(); ?>
<?php if( have_posts() ) :?>

<section id="quotes-content">

    <?php while( have_posts() ) :
        the_post(); ?>
        <?php the_content(); ?>

    <h2><?php the_title();?></h2>

    <?php endwhile;?>

</section>

<form>
    <input type="text" id="quote-title">
    <textarea name="" id="quote-content" cols="30" rows="10"></textarea>
</form>

<button id="submit-button">Submit a Quote</button>    

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<?php get_footer();?>