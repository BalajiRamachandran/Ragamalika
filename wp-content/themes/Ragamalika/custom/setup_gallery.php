<?php
include dirname(__FILE__) . '/../../../../wp-load.php';
get_header();
$directory = TEMPLATEPATH . '/gallery/';
$a_directory = get_stylesheet_directory_uri() . '/gallery/';
$galleries = array();
$gallery = '';
?>
<?php

$ir = directory_iterator ( $directory );

traverse_iterator($ir, $a_directory);

function directory_iterator ( $dir ) {
	return new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), RecursiveIteratorIterator::SELF_FIRST);	
}


function traverse_iterator ( $_iterator, $a_directory ) {
	global $galleries;
	global $gallery;
	$ignore = array ( '.', '..');
	$current_directory = '';
	$open_gallery = 'false';
	foreach ($_iterator as $path => $object ) {
		if ( is_dir($path) && !in_array(basename($path), $ignore) ) {
			$current_directory = basename($path);
			array_push($galleries, $current_directory);
			if ( $open_gallery == 'true' ) {
				$gallery .= '</div>';
			}
			$gallery .= '<div id="' . $current_directory . '" gallery="gallery-' . $current_directory .'">';
			$open_gallery = 'true';
			$gallery .= '<div>' . basename($path) . '</div>';
		} elseif ( is_file($path)) {
			$gallery .= '<div class="gallery-items" style="padding: 6px;display: inline;"><a class="gallery gallery-' . $current_directory . '  cboxElement " href="'. $a_directory . $current_directory . '/' . basename($path)  .'">' . '<img src="' . $a_directory . $current_directory . '/' . basename($path) . '" style="height: 50px; width: 50px;"/>' . '</a></div>';
		}
	}
	$gallery .= '</div>';

}
if ( count($galleries) > 0 ) {
	echo '<script type="text/javascript">';
	echo 'jQuery(document).ready(function(){';
	foreach ($galleries as $key => $value) {
		echo 'jQuery("gallery-' . $value  . '").colorbox({rel: \'gallery-' . $value . '\')});';
	}
	echo '});';
	echo '});';
	echo '</script>';
}
echo $gallery;
?>
