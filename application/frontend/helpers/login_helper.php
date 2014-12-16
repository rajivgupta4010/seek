<?php

function check_auth() {
    $THIS = & get_instance();

    $sess = $THIS->session->all_userdata();

    if (!isset($sess['tempdata'])) {
        return 1;
    }

    $logged_in = $sess['tempdata']['logged_in'];
    $user_type = $sess['tempdata']['user_type'];

    if (($user_type == 'jobseeker') and ( $logged_in == 1)) {
        redirect('home');
    }
}

?>