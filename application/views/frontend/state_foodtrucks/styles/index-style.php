<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-datepicker.css'); ?>">

<style>
.lp-hero__header {
    width: 100%;
    /* min-height: 665px; */
    height: calc(100vh - 78.03px);
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
.lp-hero__bg-image {
    background-image: url(<?php echo site_url("assets/images/bg/state/".$area['state_abbr'].".webp"); ?>);
}
.lp-area-foodtrucks__search-box {
    padding-top: 20%;
}
.lp-hero__header__title {
    padding-bottom: 2rem;
}
.lp-hero__header__title h2 {
    color: #fff;
    font-weight: 900;
}
@media (min-width: 544px) {
    .lp-hero__bg-image {
        /* min-height: 850px; */
    }
}
@media (max-width: 767px) {
    .ft-search-box {
        margin-top: .2rem;
    }
    .lp-hero__bg-image {
        background-image: url(<?php echo site_url("assets/images/bg/state/small/".$area['state_abbr'].".webp"); ?>);
    }
    .lp-area-foodtrucks__search-box {
        padding-top: 25%;
    }
}
.lp-hero__mask {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: rgba(249,216,115,0.26);
    z-index: 0;
}

@import url(https://fonts.googleapis.com/css?family=Muli:400, 300);
.calendar, .calendar_weekdays, .calendar_content {
    max-width: 300px;
}
.calendar {
    margin: auto;
    font-family:'Muli', sans-serif;
    font-weight: 400;
}
.calendar_content, .calendar_weekdays, .calendar_header {
    position: relative;
    overflow: hidden;
}
.calendar_weekdays div {
    display:inline-block;
    vertical-align:top;
}
.calendar_weekdays div, .calendar_content div {
    width: 14.28571%;
    overflow: hidden;
    text-align: center;
    background-color: transparent;
    color: #6f6f6f;
    font-size: 14px;
}
.calendar_content div {
    border: 1px solid transparent;
    float: left;
}
.calendar_content div:hover {
    border: 1px solid #dcdcdc;
    cursor: default;
}
.calendar_content div.blank:hover {
    cursor: default;
    border: 1px solid transparent;
}
.calendar_content div.past-date {
    color: #d5d5d5;
}
.calendar_content div.today {
    font-weight: bold;
    font-size: 14px;
    color: #87b633;
    border: 1px solid #dcdcdc;
}
.calendar_content div.selected {
    background-color: #f0f0f0;
}
.calendar_header {
    width: 100%;
    text-align: center;
}
.calendar_header h2 {
    padding: 0 10px;
    font-family:'Muli', sans-serif;
    font-weight: 300;
    font-size: 18px;
    color: #87b633;
    float:left;
    width:70%;
    margin: 0 0 10px;
}
button.switch-month {
    background-color: transparent;
    padding: 0;
    outline: none;
    border: none;
    color: #dcdcdc;
    float: left;
    width:15%;
    transition: color .2s;
}
button.switch-month:hover {
    color: #87b633;
}
.descriptions .description {
    text-align: center;
}
.descriptions .description .search-icon {
    background-image: url(<?php echo site_url("assets/frontend/images/search-icon.webp"); ?>);
}
.descriptions .description .pay-icon {
    background-image: url(<?php echo site_url("assets/frontend/images/pay-icon.webp"); ?>);
}
.descriptions .description .relax-icon {
    background-image: url(<?php echo site_url("assets/frontend/images/relax-icon.webp"); ?>);
}
.descriptions .description .icon {
    width: 80px;
    height: 80px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: 50%;
    margin: auto;
}
.form-control[readonly] {
    cursor: default;
    background-color: #fff;
}

.ft-search-frm #address {
    background-image: url(<?php echo site_url("assets/frontend/images/location-pin.png"); ?>);
}

.ft-search-frm #event_date {
    background-image: url(<?php echo site_url("assets/frontend/images/sb-calendar.png"); ?>);
}

.ft-search-frm .bg-user-icon {
    background-image: url(<?php echo site_url("assets/frontend/images/sb-user.png"); ?>);
    padding-left: 3px;
    background-repeat: no-repeat;
    background-size: 20px;
    background-position: 15px center;
    text-align: left;
}

.ft-search-frm .bg-meal-icon {
    background-image: url(<?php echo site_url("assets/frontend/images/sb-meal-time.png"); ?>);
    padding-left: 3px;
    background-repeat: no-repeat;
    background-size: 25px;
    background-position: 15px center;
    text-align: left;
}

#address, #event_date {
    padding-left: 50px;
    background-repeat: no-repeat;
    background-size: 20px;
    background-position: 16px center;
}
.datepicker-days table tr th.dow {
    color: #6b6b6b !important;
}
.datepicker {
    -webkit-box-shadow: 0 2px 16px rgb(0 0 0 / 15%);
    box-shadow: 0 2px 16px rgb(0 0 0 / 15%);
}
.ft-sb-select option:hover {
    display: none;
    background-color: red !important;
}
/*the container must be positioned relative:*/
.ft-sb-select {
    position: relative;
    width: 100%;
}

.ft-sb-select select {
    display: none; /*hide original SELECT element:*/
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
    border-color: transparent transparent #fff transparent;
    top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
    color: #545E62;
    padding: 8px 16px;
    cursor: pointer;
    user-select: none;
    text-align: left;
    padding-left: 3rem;
}

/*style items (options):*/
.select-items {
    position: absolute;
    background-color: #fff;
    top: 113%;
    left: 0;
    right: 0;
    z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
    display: none;
}

.select-items div:hover, .same-as-selected {
    background-color: rgba(0, 189, 113, 0.164);
}

.ft__fieldset {
    -webkit-box-shadow: 0 2px 8px rgb(73 80 87 / 70%);
    box-shadow: 0 2px 8px rgb(73 80 87 / 70%);
}

.ft-sb-btn {
    background-color: #20a268;
    color: #fff;
}

.ft-sb-btn:hover {
    background-color: #1db370;
    color: #fff;
}
</style>