<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/select2/css/select2.min.css">

<!-- Bootstrap iCheck -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<!-- Bootstrap Taginputs -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/tags-input.css">

<!-- IMAGE UPLOAD WITH PREVIEW -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/file-upload-preview.css">

<!-- TIME PICKER -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/bootstrap-clockpicker.min.css">

<!-- EVENT DATE CALENDAR CSS -->
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/'); ?>multi-select-calendar/jquery-ui.multidatespicker.css">

<style>
    /* Event Schedule Calendar Styles */
    #event_schedule .ui-widget-content {
        width: 100%;
        background: #fff;
    }
    #event_schedule .ui-widget-content .ui-datepicker-calendar tbody tr td {
        height: 50px;
    }
    #event_schedule .ui-widget-content .ui-datepicker-calendar tbody tr td span {
        height: 100%;
        text-align: center;
        padding-top: 10px;
    }
    #event_schedule .ui-widget-content .ui-datepicker-next,
    #event_schedule .ui-widget-content .ui-datepicker-prev {
        cursor: pointer;
    }
    #event_schedule .ui-widget-content .ui-datepicker-next:hover,
    #event_schedule .ui-widget-content .ui-datepicker-prev:hover {
        background: #0DA166 !important;
    }
    .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
        border: none;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
        border: none;
        color: #654b24;
        height: 100%;
        padding-top: 10px;
        text-align: center;
    }
    .ui-datepicker-unselectable.ui-state-disabled span {
        background: #fff;
        color: #000;
    }
    .ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled {
        border: none;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
        background: #11925E;
        color: #fff;
    }
    .ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
        background: #6c757d none;
    }
    .square-available {
        background-color: #11925e;
        padding: 1px 11px;
        margin-right: 5px;
    }
    .square-unavailable {
        background-color: #6C757D;
        padding: 1px 11px;
        margin-right: 5px;
    }
</style>
