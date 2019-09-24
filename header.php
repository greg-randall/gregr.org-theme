<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php get_the_title(); ?></title>

    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="wp-content/themes/gregr-org_theme/custom.css">
  </head>
  <body style="background-image: url('wp-content/themes/gregr-org_theme/background.gif');background-repeat: repeat;">
                <div class="jumbotron jumbotron-fluid" style="padding-top:25px;padding-bottom:25px;background-color: rgba(204, 204, 204, 0.3);">
        <div class="container">
            <h1 class="display-1-header font-weight-bold text-center"><?php echo get_bloginfo('name'); ?></h1>
        </div>
    </div>