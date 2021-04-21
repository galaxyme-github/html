<style>
.service-landing-header {
    background-image: url('<?php echo base_url('uploads/frontend/banners/guarantee.jpg'); ?>');
    background-color: #eee;
    background-repeat: no-repeat;
    background-position: top;
    background-size: cover!important;
}
.jumbo-header-container {
    position: relative;
    margin-top: -51px;
    min-height: 665px;
}
.jumbo-centered {
    position: absolute;
    top: 50%!important;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.text-contrast, .text-contrast-muted {
    color: #f4f5f6!important;
}
.bft-header-group {
    margin-bottom: 20px;
}
.bft-header-group .bft-header-title {
    font-size: 3.5rem;
    font-weight: 600;
    margin: 0;
}
.bft-header-group .bft-header-subtitle {
    font-size: 1.7rem;
}
.margin-bottom-x4 {
    margin-bottom: 20px!important;
}
@media (min-width: 544px) {
    .jumbo-header-container {
        min-height: 725px;
    }
}
@media (max-width: 544px) {
    .bft-header-group .bft-header-title {
        font-size: 2.3rem;
    }
    .bft-header-group .bft-header-subtitle {
        font-size: 1.2rem;
    }
    .primary-col h4 {
        font-size: 18px;
    }
    .primary-col h6 {
        font-size: 16px;
    } 
    .primary-col p {
        font-size: 14px;
    }
}
</style>