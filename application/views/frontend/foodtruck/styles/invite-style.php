<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-datepicker.css'); ?>">

<style>
    .img-circle {
        width: 17.5rem;
        height: 17.5rem;
        object-fit: cover;
        object-position: center;
        border-radius: 100%;
        border: 5px solid transparent;
        transition: border .1s ease-in;
    }

    .foodtruck-img {
        text-align: center;
    }

    .text-block {
        padding: 38px 0 0 0;
    }

    .text-block p {
        font-size: 20px;
    }

    .menu-title {
        font-size: 21px;
    }

    .dish-amount {
        width: 150px;
        display: inline-block;
        margin-right: 10px;
    }

    .dish-amount .input-group .form-control:not(:first-child):not(:last-child), .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {
        border: none;
        margin: 0 10px;
    }

    .dish-amount .btn-outline-secondary {
        border-radius: 50% !important;
        cursor: pointer;
    }

    .invite-form label {
        float: left;
    }

    .timezone-abbr {
        height: calc(2.25rem + 5px) !important;
        margin-top: 32px !important;
    }

    .event-time {
        height: calc(2.25rem + 5px) !important;
    }

    .submit-invite {
        width: 100%;
        height: 40px;
        color: #fff;
        font-size: 18px;
        background: #4277ff;
        font-weight: bold;
        letter-spacing: 1px;
        border: none;
        cursor: pointer;
    }

    .submit-invite:hover {
        background: #292b69;
    }
</style>