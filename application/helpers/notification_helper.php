<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Helper functions for BFT Notifications
 * 
 * @author Zita Yevloyeva
 * @created 13th Apr 2021
 */

// Success Notificaation and redirect
if (!function_exists('success')) {
    function success($message = '', $redirectTo = '')
    {
        $CI = &get_instance();
        $CI->session->set_flashdata('flash_message', $message);
        redirect($redirectTo, 'refresh');
    }
}

// error Notificaation and redirect
if (!function_exists('error')) {
    function error($message = '', $redirectTo = '')
    {
        $CI = &get_instance();
        $CI->session->set_flashdata('error_message', $message);
        if (!empty($redirectTo)) {
            redirect($redirectTo, 'refresh');
        }
    }
}

/*==================== BFT Messaages =================*/

// success message
function success_message($message = '', $redirectTo = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('success_message', $message);
    if ($redirectTo) {
        redirect($redirectTo, 'refresh');
    }
}

// error message
function error_message($message = '', $redirectTo = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('error_message', $message);
    if ($redirectTo) {
        redirect($redirectTo, 'refresh');
    }
}

// warning message
function warning_message($message = '', $redirectTo = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('warning_message', $message);
    if ($redirectTo) {
        redirect($redirectTo, 'refresh');
    }
}

/**
 * common notification and redirect
 * 
 * @param String message
 * @param String type [info, warning, danger, success ...]
 * @param String icon [alert-circle-o, block ... @url: https://zavoloklom.github.io/material-design-iconic-font/icons.html]
 * @param String redirectTo
 * @return Void
 *  */
function bft_notification($message = '', $type = '', $icon = '', $redirectTo = '')
{
    $CI = &get_instance();
    $notification_body = '<div class="alert alert-' . $type . ' alert-dismissable">';
    $notification_body .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    $notification_body .= '<i class="zmdi zmdi-' . $icon . ' pull-left p-t-3 pr-15"></i><p class="pl-4 bft-alert-text">' . $message . '</p>';
    $notification_body .= '<div class="clearfix"></div>';
    $notification_body .= '</div>';

    $CI->session->set_flashdata('bft_notification', $notification_body);
    redirect($redirectTo, 'refresh');
}
// ------------------------------------------------------------------------
/* End of file notification_helper.php */
/* Location: ./system/helpers/notification_helper.php */
