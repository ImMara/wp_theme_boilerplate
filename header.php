<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head() ?>
    <!--  wp_head adds dynamics features of wordpress and functions  -->
</head>
<body>
<nav id="navbar" class="w-100 position-fixed z-index-auto">
    <div class="navbar w-100 navbar-expand-lg p-4 navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><?php bloginfo('name') ?></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' =>'navbar-nav mr-auto',
                ])
                ?>
                <div class="ms-auto"><?= get_search_form() ?></div>
            </div>
        </div>
    </div>
    <progress max="100" value="0"></progress>
</nav>

<div class="container-fluid m-0 px-0" style="padding-top:88px">
