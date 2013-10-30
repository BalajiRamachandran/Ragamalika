<?php ?>
<h4><i class="icon-search icon-user"></i>&nbsp;Parent / Guardian 2</h4>
<p/>
<div class="clearfix"><!----></div>
<p>
	<label class="label_field" for="g_m_name">Name (First and Last)</label>
	<input id="g_m_name" name="g_m_name" type="text" tabindex="1" placeholder="Guardian First & Last Name" value="<?php echo get_user_meta($current_user->ID, 'g_m_name', true);?>"/>
</p>
<p>
	<label class="label_field" for="g_m_email">Email</label>
	<div class="input-prepend">
     	<span class="add-on">@</span>
		<input id="g_m_email" name="g_m_email" type="text" tabindex="1" placeholder="guardian@ragamalika.net" value="<?php echo get_user_meta($current_user->ID, 'g_m_email', true);?>"/>
	</div>
</p>
<p>
	<label class="label_field" for="g_m_cell_phone">Cell Phone</label>
	<div class="input-prepend">
     	<span class="add-on">+1</span>
		<input id="g_m_cell_phone" name="g_m_cell_phone" ref="phone" type="text" tabindex="1" placeholder="Mobile Phone" value="<?php echo get_user_meta($current_user->ID, 'g_m_cell_phone', true);?>"/>
	</div>
</p>
