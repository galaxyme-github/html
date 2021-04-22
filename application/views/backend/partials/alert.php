<style>
/* BFT Message */
.bft-message {
    display: none;
    position: absolute;
    background-color: #fefefe;
    top: 1.5rem;
    /* left: calc(50% - 300px); */
    padding: .4rem 1rem;
    /* border: 1px solid #888; */
    border-radius: 3px;
    /* width: 600px; */
    z-index: 9999;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.bft-message .message-body {
    padding: 2px 16px;
    position: relative;
}

/* The Close Button */
.close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
  
.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.fadein {
    display: block;
    -webkit-animation-name: showtop;
    -webkit-animation-duration: 0.4s;
    animation-name: showtop;
    animation-duration: 0.4s
}
.fadeout {
	transition: opacity 0.4s;
    opacity: 0;
    -webkit-animation-name: hidetop;
    -webkit-animation-duration: 0.4s;
    animation-name: hidetop;
    animation-duration: 0.4s;
}
.bft-message-success span, .bft-message-error span, .bft-message-warning span {
    margin-right: .3rem;
}
.bft-message-success span {
    color: #52C41A;
}
.bft-message-error span {
    color: #F5222D;
}
.bft-message-warning span {
    color: #FA8C16;
}
/* fade in */
@-webkit-keyframes showtop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}
  
@keyframes showtop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
/* fade out */
@-webkit-keyframes hidetop {
    from {top: 0; opacity:1} 
    to {top:-300px; opacity:0}
}
@keyframes hidetop {
    from {top: 0; opacity:1} 
    to {top:-300px; opacity:0}
}
</style>

<?php if ($this->session->flashdata('success_message')): ?>
<div class="bft-message bft-message-success">
    <div class="message-body">
        <span class="fa fa-check-circle"></span>
        <?php echo $this->session->flashdata('success_message'); ?>
    </div>
</div>
<script>
    "use strict"
    const message = $('.bft-message-success');
    message.addClass('fadein');
    setTimeout(() => {
        message.removeClass('fadein').addClass('fadeout');
    }, 4000)
</script>
<?php endif; ?>


<!-- Error Message -->
<?php if ($this->session->flashdata('error_message')): ?>
<div class="bft-message bft-message-error">
    <div class="message-body">
        <span class="fas fa-times-circle"></span>
        Some text in the Modal Body
    </div>
</div>
<script>
    "use strict"
    const message = $('.bft-message-error');
    message.addClass('fadein');
    setTimeout(() => {
        message.removeClass('fadein').addClass('fadeout');
    }, 4000)
</script>
<?php endif; ?>


<!-- Warning Message -->
<?php if ($this->session->flashdata('warning_message')): ?>
<div class="bft-message bft-message-warning">
    <div class="message-body">
        <span class="fas fa-exclamation-circle"></span>
        Some text in the Modal Body
    </div>
</div>
<script>
    "use strict"
    const message = $('.bft-message-warning');
    message.addClass('fadein');
    setTimeout(() => {
        message.removeClass('fadein').addClass('fadeout');
    }, 4000)
</script>
<?php endif; ?>


<!-- Responsive -->
<script>
    var mw = $('.bft-message').width();
    var vw = $(window).width();
    $('.bft-message').css('left', (vw/2 - mw/2));

    $(window).on('resize', function() {
        var mw = $('.bft-message').width();
        var vw = $(window).width();
        $('.bft-message').css('left', (vw/2 - mw/2));
    })
</script>