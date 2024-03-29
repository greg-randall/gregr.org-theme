<?php get_header(); ?>

<?php
    $posts_per_page = 5;

    $count_posts     = wp_count_posts();
    $published_posts = $count_posts->publish;
    $last_page = ceil($published_posts/$posts_per_page);
    
    if ( array_key_exists('p', $_GET) & is_numeric($_GET['p']) ) {
        
        if($_GET['p']<=$last_page){
            $page = intval(trim($_GET['p']));
        }else {
            $page = $last_page;
        }

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
            
            <h2 style="margin-left:-10px;" id="<?php echo $post->post_name; ?>"><?php echo $post->post_title; ?></h2>
            <div style="overflow: auto;">
            <p style="margin-left:10px;"><em><a href="<?php echo esc_url(get_permalink($post->id)); ?>"><?php echo date('F jS Y', strtotime($post->post_date)); ?></a></em></p> 
            <?php
        echo apply_filters('the_content', $post->post_content);
?></div><!-- overflow -->
           <hr>
    <?php
    endforeach;

    echo '<div class="text-center">';
    if ($page > 1) {
        $page_calc = $page - 1;
        if($page_calc==1){
            echo "<a href=\"//gregr.org/\">Previous Page</a> ";
        }else{
            echo "<a href=\"//gregr.org/index.php?p=$page_calc\">Previous Page</a> "; 
        }
    }
    if ($posts_per_page * $page < $published_posts) {
        $page_calc= $page + 1;
        echo " <a href=\"//gregr.org/index.php?p=$page_calc\">Next Page</a>";
    }
    echo "<br>$page/$last_page";
    echo '</div>';
    echo '</div>';
    wp_reset_postdata();

    
    //https://stackoverflow.com/questions/36918384/how-to-list-all-posts-of-a-category-in-wordpress-shortcode
    
    $args = array('numberposts' => -1, 'post_type' =>  'post' ); 
    $cat_posts = get_posts($args);

    $markup = "\n\n\n<ul class=\"sr-only\">\n";  
    foreach ($cat_posts as $post) {
        $markup .= "\t<li><a href='" . get_permalink($post->ID) . "'>" . $post->post_title . "</a></li>\n";
    }
    $markup .= "</ul>\n\n";
    
    echo $markup;

    get_footer();
?>