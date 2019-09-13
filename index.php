<?php get_header(); ?>

<?php
    $posts_per_page = 5;
    if (array_key_exists('p', $_GET)) {
        $page = intval(trim($_GET['p']));
    } else {
        $page = 1;
    }
    $postslist = get_posts(array(
        'posts_per_page' => $posts_per_page,
        'paged' => $page
    ));
    echo '<div class="container">';
    foreach ($postslist as $post):
?> 
            
            <h2 style="margin-left:-10px;"><?php echo $post->post_title; ?></h2>
            <div style="overflow: auto;">
            <p style="margin-left:10px;"><em><a href="<?php echo esc_url(get_permalink($post->id)); ?>"><?php echo date('F jS Y', strtotime($post->post_date)); ?></a></em></p> 
            <?php
        echo apply_filters('the_content', $post->post_content);
?></div><!-- overflow -->
           <hr>
    <?php
    endforeach;
    $count_posts     = wp_count_posts();
    $published_posts = $count_posts->publish;
    echo '<div class="text-center">';
    if ($page > 1) {
        $page_calc= $page - 1;
        echo "<a href=\"//gregr.org/index.php?p=$page_calc\">Previous Page</a> ";
    }
    if ($posts_per_page * $page < $published_posts) {
        $page_calc= $page + 1;
        echo " <a href=\"//gregr.org/index.php?p=$page_calc\">Next Page</a>";
    }
    echo '</div>';
    echo '</div>';
    wp_reset_postdata();
?>



<?php
    get_footer();
?>