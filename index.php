<?php get_header(); ?>

<?php
    $postslist = get_posts( array( 'posts_per_page' => 5 ) );
    echo '<div class="container">';
    foreach ( $postslist as $post ) :?> 
            <h2 style="margin-left:-10px;"><?php echo $post->post_title; ?></h2>
            <p style="margin-left:10px;"><em><a href="<?php echo esc_url( get_permalink($post->id)); ?>"><?php echo date('F jS Y',strtotime($post->post_date)); ?></a></em></p> 
            <?php echo apply_filters( 'the_content', $post->post_content ) ?>
            <hr>
    <?php
    endforeach; 
    echo '</div>';

    wp_reset_postdata();
?>



<?php get_footer(); ?>