<?php

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login-admin');
    }
}
function is_loginmhs()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('loginmhs');
    }
}