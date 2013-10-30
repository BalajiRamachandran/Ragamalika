<?php

$themename = "Ragamalika";
$shortname = "bizzthemes";
$kampylefeedback = "http://www.kampyle.com/feedback_form/ff-feedback-form.php?site_code=9849398&amp;form_id=22123&amp;lang=en";
$customserviceurl = "http://bizzartic.com/services/";
$template = get_option('template');
$customcssurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/theme-editor.php?file=/themes/$template/custom.css&theme=$current_theme&dir=style";
$breadcrumbsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/options-general.php?page=yoast-breadcrumbs.php";
$generaloptionsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/options-general.php";
$widgetsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/widgets.php";
$bloghomeurl = "".trailingslashit( get_bloginfo('url') )."";

  $functions_path = TEMPLATEPATH . '/library/functions/';
  $includes_path = TEMPLATEPATH . '/library/includes/';
  $javascript_path = TEMPLATEPATH . '/library/js/';
  $css_path = TEMPLATEPATH . '/library/css/';
  $custom_path = TEMPLATEPATH . '/custom/';

?>