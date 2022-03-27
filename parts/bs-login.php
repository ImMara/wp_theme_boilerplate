<?php

    if($_POST){
        global $wpdb;

        // SECURITY CHECK
        $username = $wpdb->escape($_REQUEST['username']);
        $password = $wpdb->escape($_REQUEST['password']);
        $remember = $wpdb->escape($_REQUEST['rememberme']);

        if($remember) $remember = 'true';
        else $remember = 'false';

        $login_data = array();
        $login_data['user_login'] = $username;
        $login_data['user_password'] = $password;
        $login_data['remember'] = $remember;

        $user_verify = wp_signon($login_data,false);

        if( is_wp_error($user_verify))
        {
            header('Location: '. home_url() . "/test/");
        }else{
            echo "<script type='text/javascript'>window.location='". home_url() ."'</script>";
            exit();
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head() ?>
    <!--  wp_head adds dynamics features of wordpress and functions  -->
</head>
<body class="min-vh-100">
<div class="container-fluid p-0 m-0 h-100">
    <div class="row gy-0 gx-0 h-100">
        <div class="col-6 h-100 bg-danger">
            <div></div>
        </div>
        <div class="col-6 h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100 gx-0 gy-0 justify-content-center">
                <form action="<?php echo home_url(); ?>/test/" method="post" class="col-10 bg-light shadow-lg p-5 border border-danger rounded">
                    <h1>Login</h1>
                    <div class="input-group row gy-0 gx-0 mb-3 w-100">
                        <div class="col-4 text-center  input-group-text" id="<?= __('user_login') ; ?>">Email/Username</div>
                        <input type="text" id="<?= __('user_login') ; ?>" name="username" class="col-8 form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group row gx-0 gy-0 mb-3 w-100">
                        <div class="col-4 text-center input-group-text" id="basic-addon1">Password</div>
                        <input type="password" name="password" id="<?= __('user_pass'); ?>" class="col-8 form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
                    <div>
                        <button type="submit" name="wp-submit"  class="btn btn-danger">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
