<?php


get_header();
?>
<?php $post=get_post(get_the_ID()); ?>
<div class="container">
            <h2 style="margin-left:-10px;"><?php echo $post->post_title; ?></h2>
            <div style="overflow: auto;">
            <p style="margin-left:10px;"><em><?php echo date('F jS Y',strtotime($post->post_date)); ?></em></p> 
            <?php echo apply_filters( 'the_content', $post->post_content ) ?>
            </div>
</div>

<?php
get_footer();
?>