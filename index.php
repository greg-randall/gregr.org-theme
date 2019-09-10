<?php get_header(); ?>

<?php

$postslist = get_posts( array( 'posts_per_page' => 5 ) );
echo '<div class="container">';
foreach ( $postslist as $post ) :?> 
        <h2><?php echo $post->post_title; ?></h2>
        <p style="margin-left:10px;"><em><?php echo date('F jS Y',strtotime($post->post_date)); ?></em> </p> 
		<?php echo apply_filters( 'the_content', $post->post_content ) ?>
        <hr>
<?php
endforeach; 
echo '</div>';

wp_reset_postdata();
?>

<div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>

<?php get_footer(); ?>