<?php
        global $current_user;
?>
<p>
        <label class="label_field" for="street">Street</label>
        <input id="street" name="street" type="text" tabindex="1" value="<?php echo get_user_meta($current_user->ID, 'street', true);?>" placeholder="Street Name"/>
</p>
<p>
        <label class="label_field" for="city">City</label>
        <input id="city" name="city" type="text" tabindex="1" value="<?php echo get_user_meta($current_user->ID, 'city', true);?>" placeholder="City"/>
</p>
<p>
        <script type="text/javascript">
        jQuery(document).ready(function(){
                var state = "<?php echo get_user_meta($current_user->ID, 'state', true);?>";
                // alert ( state );
                // alert ( jQuery("option[value="+state+"]").val() );
                if ( state != null || state != '') {
                        jQuery("#state").val(state);
                }
                jQuery("select#state option").filter(function() {
                    //may want to use $.trim in here
                    return jQuery(this).text() == state; 
                }).attr('selected', true);
                // alert ( state );
        });
        </script>
	<label class="label_field" for="state">State</label>
	<select id="state" name="state" tabindex="1">
        <option value="">Please Select One:</option>
        <option value="AL">AL</option>
        <option value="AK">AK</option>
        <option value="AZ">AZ</option>
        <option value="AR">AR</option>
        <option value="CA">CA</option>
        <option value="CO">CO</option>
        <option value="CT">CT</option>
        <option value="DC">DC</option>
        <option value="DE">DE</option>
        <option value="FL">FL</option>
        <option value="GA">GA</option>
        <option value="HI">HI</option>
        <option value="ID">ID</option>
        <option value="IL">IL</option>
        <option value="IN">IN</option>
        <option value="IA">IA</option>
        <option value="KS">KS</option>
        <option value="KY">KY</option>
        <option value="LA">LA</option>
        <option value="ME">ME</option>
        <option value="MD">MD</option>
        <option value="MA">MA</option>
        <option value="MI">MI</option>
        <option value="MN">MN</option>
        <option value="MS">MS</option>
        <option value="MO">MO</option>
        <option value="MT">MT</option>
        <option value="NE">NE</option>
        <option value="NV">NV</option>
        <option value="NH">NH</option>
        <option value="NJ">NJ</option>
        <option value="NM">NM</option>
        <option value="NY">NY</option>
        <option value="NC">NC</option>
        <option value="ND">ND</option>
        <option value="OH">OH</option>
        <option value="OK">OK</option>
        <option value="OR">OR</option>
        <option value="PA">PA</option>
        <option value="RI">RI</option>
        <option value="SC">SC</option>
        <option value="SD">SD</option>
        <option value="TN">TN</option>
        <option value="TX">TX</option>
        <option value="UT">UT</option>
        <option value="VT">VT</option>
        <option value="VA">VA</option>
        <option value="WA">WA</option>
        <option value="WV">WV</option>
        <option value="WI">WI</option>
        <option value="WY">WY</option>
	</select>
</p>
<p>
	<label class="label_field" for="zipcode">Zipcode</label>
	<input id="zipcode" name="zipcode" type="text" tabindex="1" value="<?php echo get_user_meta($current_user->ID, 'zipcode', true);?>" placeholder='Zipcode'/>
</p>