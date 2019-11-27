<?php get_header(); ?>
<?php if( have_posts() ) :?>

<section >
    <?php while( have_posts() ) :
        the_post(); ?>
        <h1><?php the_title();?></h1>
        <hr>
        <h2>Categories</h2>
        <?php wp_list_categories(); ?>

        <h2>Quote Authors</h2>
        <?php wp_list_authors(); ?>

        <h2>Tags</h2>
        <?php $tags = get_tags(); 
        foreach ($tags as $tag) {
            echo "<p>{$tag->name}</p>";
            
        } ;?>
        <?php the_content(); ?>
        
    <?php endwhile;?>
</section>

<?php else : ?>
        <p>No posts found</p>
<?php endif; ?>

<?php get_footer();?>