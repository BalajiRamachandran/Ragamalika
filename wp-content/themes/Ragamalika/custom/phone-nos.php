<?php ?>
<!-- <div class="control-group">
  <label class="control-label" for="prependedInput">Prepended text</label>
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on">@</span>
      <input class="span2" id="prependedInput" size="16" type="text" />
    </div>
    <p class="help-block">Here's some help text</p>
  </div>
</div> -->
<p>
	<label class="label_field" for="home_phone">Home Phone</label>
	<div class="input-prepend">
     	<span class="add-on">+1</span>
     	<input id="home_phone" name="home_phone" ref="phone" type="text" tabindex="1" value="<?php echo get_user_meta($current_user->ID, 'home_phone', true);?>"/>
     </div>
</p>
<p>
	<label class="label_field" for="cell_phone">Cell Phone</label>
	<div class="input-prepend">
     	<span class="add-on">+1</span>
     	<input id="cell_phone" name="cell_phone" ref="phone" type="text" tabindex="1" value="<?php echo get_user_meta($current_user->ID, 'cell_phone', true);?>"/>
     </div>
</p>