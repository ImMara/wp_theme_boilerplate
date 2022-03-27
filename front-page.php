<!--ref to header.php-->
<?php get_header() ?>
<main class="min-vh-100">
    <div class="row">
        <div class="col-12 bg-red">
            <div class="container">
                <div class="py-5">
                    <h1><strong>This is a light wordpress theme boilerplate</strong></h1>
                    <hr>
                    <p>Pre-installed libraries : </p>
                    <ul>
                        <li>Font Awesome</li>
                        <li>Bootstrap</li>
                        <li>Gsap</li>
                    </ul>
                    <p><strong>How to correctly use it:</strong></p>
                    <ul>
                        <li>index.js & index.css r used to import other files to be easily maintainable</li>
                        <li>ACF plugin is <strong>required</strong> to make easy meta fields</li>
                        <li>ACF to code to make life easier</li>
                        <li>Style.css in root folder should be used only to give template info.(check assets folder)</li>
                        <li>MetaBoxes folder is used to create class for php generated acf code to optimization and r imported in functions.php</li>
                        <li>Parts folder for template parts</li>
                    </ul>
                </div>
                <?php
                // simple example to force query to return null when id is missing
                     //$id = [];
                    $id = [5];
                    $args = array(
                            "post_type" => "custompost",
                            "post__in"=>empty($id) ? [0] : $id,
                    );
                    $the_query = New WP_Query($args);
                    wp_reset_postdata();
                    // var_dump($the_query);
                    ?>
            </div>
        </div>
    </div>
</main>

<!--ref to footer.php-->
<?php get_footer() ?>