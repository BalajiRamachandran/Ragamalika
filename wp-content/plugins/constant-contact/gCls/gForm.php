<?php if(get_option('gConstantcontact_widget_username')<>"enter username") { ?>
<div>
  <?php if(get_option('gConstantcontact_widget_caption')<>"") { ?>
  <div class="cc_caption"><?php echo get_option('gConstantcontact_widget_caption'); ?></div>
  <?php } ?>
  <div class="cc_msg"><span id="gConstantcontact_msg"></span></div>
  <div class="cc_textbox">
    <input class="cc_textbox_class" name="gConstantcontact_email" id="gConstantcontact_email" onkeypress="if(event.keyCode==13) gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact/gCls/')" onblur="if(this.value=='') this.value='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>';" onfocus="if(this.value=='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>') this.value='';" value="<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>" maxlength="120" type="text">
  </div>
  <div class="cc_button">
    <input class="cc_textbox_button" type="button" name="gConstantcontact_Button" onClick="return gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact/gCls/')" id="gConstantcontact_Button" value="<?php echo get_option('gConstantcontact_widget_button'); ?>">
  </div>
</div>
<?php } else  { ?>
<div class="cc_underconstruction">Under Construction.</div>
<?php } ?>