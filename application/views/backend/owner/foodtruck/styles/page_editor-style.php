<!-- SUMMERNOTE -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/summernote/summernote-bs4.min.css">
<!-- Bootstrap Colorpicker CSS -->
<link href="<?php echo base_url('assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css');?>" rel="stylesheet" type="text/css"/>

<style>
.input-group-addon:last-child {
    border-left: 0;
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child>.btn-group:not(:first-child)>.btn, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    padding-top: 9px;
}
.input-group-addon {
    background: #eee;
    border-color: rgba(33, 33, 33, 0.12);
    border-radius: 0;
    color: #324148;
    min-width: 42px;
}
.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.input-group-addon, .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.colorpicker {
    z-index: 9999 !important;
}
.themes-panel {
    background-color: #17a2b821;
    padding-bottom: 1rem;
}
.themes-panel input {
    display: none;
}
.theme {
    cursor: pointer;
}
.theme img {
    width: 50px;
    height: 50px;
    border: 1px solid #aba6a2;
    border-radius: 5px;
}
.theme-wrap {
    display: inline-block;
}
.theme.active img {
    border: 1px solid #0DA166;
}
</style>