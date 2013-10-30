<?php
require './wp-load.php';
echo 'Current PHP version: ' . phpversion();
print_r($_SERVER);
echo '<br/>';
echo get_permalink(get_page_by_title('Maragatham Ramaswamy')->ID);
echo '<br/>';
phpinfo();
?>