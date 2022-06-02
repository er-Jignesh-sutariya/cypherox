<?php defined('BASEPATH') OR exit('No direct script access allowed');

function flashMsg($success, $succmsg, $failmsg, $redirect)
{
    $CI =& get_instance();
    
    if ( $success )
        $CI->session->set_flashdata('success', $succmsg);
    else
        $CI->session->set_flashdata('error', $failmsg);
    
    return redirect($redirect);
}