<?php 
$pre_footer = get_field("pre-footer", "option");
?>
<div id="contact" class="site-footer__pre-footer">
    <?php if($pre_footer) : 
        $text = $pre_footer["text"];
        $button = $pre_footer["button"];
        $email = $pre_footer["e-mail"];
        ?>
        <div class="container">
            <?php echo $text ?>
            <div class="site-footer__pre-footer-email"><?php echo $email ?></div>
        </div>
    <?php endif; ?>
</div>