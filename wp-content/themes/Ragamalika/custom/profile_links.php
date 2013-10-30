<?php global $current_user;?>
<?php
      if (isset($action) && isset($account)) {
            switch($action) {
                  case '1':
                        include (TEMPLATEPATH . '/custom/change_password.php');
                        break;
                  case '2':
                        include (TEMPLATEPATH . '/custom/my_class.php');
                        break;                        
                  default:
                        include (TEMPLATEPATH . '/custom/my_profile.php');
                        break;
            }
      } else {
                  include (TEMPLATEPATH . '/custom/my_profile.php');                
      }
?>
<div class="action_icons">
      <ul class="actions">
            <li>
            <a 
                  href="#" 
                  id="address-form"
                  class="colorbox-form"                                       
                  xtitle="Update the Address" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?address=1';?>">
                  Address
            </a>
            </li>
            <li>
            <a 
                  href="#" 
                  id="address-form"
                  class="colorbox-form"                                       
                  xtitle="Change Password" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?ch_passwd=1';?>">
                  Password
            </a>
            </li>
            <li>
            <a 
                  href="#" 
                  id="address-form"
                  class="colorbox-form"                                       
                  xtitle="Update Phone No" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?ch_phone=1';?>">
                  Phone
            </a>
            </li>
            <li>
            <a 
                  href="#" 
                  id="address-form"
                  class="colorbox-form"                                       
                  xtitle="My Class Details" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?class_details=1';?>">
                  My Class
            </a>
            </li>
            <li>
            <a 
                  href="#" 
                  id="m-g-form"
                  class="colorbox-form"                                       
                  xtitle="Guardian Details (Father)" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?f_g_info=1';?>">
                  Guardian 1
            </a>
            </li>            
            <li>
            <a 
                  href="#" 
                  id="m-g-form"
                  class="colorbox-form"                                       
                  xtitle="Guardian Details (Mother)" 
                  xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?m_g_info=1';?>">
                  Guardian 2
            </a>
            </li>            
      </ul>
</div>

<div class="clearfix"><!----></div>

<div class="clearfix"><!----></div>

<div class="profile_details ragamalika_tabs">
      <ul>
            <li><a href="#address">Address</a></li>
            <li><a href="#phone">Phone</a></li>
            <li><a href="#Guardian_F">Guardian 1</a></li>
            <li><a href="#Guardian_M">Guardian 2</a></li>
      </ul>
      <div id="address">
            <table class="profile_details_table table table-bordered table-condensed">
            <?php
                  $address_details = array ( "Street" => 'street', "City" => 'city', "State" => 'state', "Zipcode" => 'zipcode'); 
                  foreach ($address_details as $key => $value) {
                        echo '<tr>';
                        echo '<td class="cell_head">';
                        echo $key;
                        echo '</td>';
                        echo '<td>';
                        echo get_user_meta($current_user->ID, $value, true);
                        echo '</td>';
                        echo '</tr>';

                  }
            ?>
            </table>
      </div>
      <div id="phone">
            <table class="profile_details_table table table-bordered table-condensed">
            <?php
                  $phone_details = array ( "Mobile" => 'cell_phone', "Home" => 'home_phone'); 
                  foreach ($phone_details as $key => $value) {
                        echo '<tr>';
                        echo '<td class="cell_head">';
                        echo $key;
                        echo '</td>';
                        echo '<td>';
                        echo get_user_meta($current_user->ID, $value, true);
                        echo '</td>';
                        echo '</tr>';

                  }
            ?>
            </table>            
      </div>
      <div id="Guardian_F">
            <table class="profile_details_table table table-bordered table-condensed">
            <?php
                  $phone_details = array ( "Guardian (Father)" => 'g_f_name', "Email" => 'g_f_email', "Phone" => 'g_f_cell_phone'); 
                  foreach ($phone_details as $key => $value) {
                        echo '<tr>';
                        echo '<td class="cell_head">';
                        echo $key;
                        echo '</td>';
                        echo '<td>';
                        echo get_user_meta($current_user->ID, $value, true);
                        echo '</td>';
                        echo '</tr>';

                  }
            ?>
            </table>            
      </div>
      <div id="Guardian_M">
            <table class="profile_details_table table table-bordered table-condensed">
            <?php
                  $phone_details = array ( "Guardian (Mother)" => 'g_m_name', "Email" => 'g_m_email', "Phone" => 'g_m_cell_phone'); 
                  foreach ($phone_details as $key => $value) {
                        echo '<tr>';
                        echo '<td class="cell_head">';
                        echo $key;
                        echo '</td>';
                        echo '<td>';
                        echo get_user_meta($current_user->ID, $value, true);
                        echo '</td>';
                        echo '</tr>';

                  }
            ?>
            </table>            
      </div>
</div>
