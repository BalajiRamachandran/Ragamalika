<?php
set_time_limit(0);
global  $wpdb;
//require_once (TEMPLATEPATH . '/delete_data.php');
/////////////// TERMS & products START ///////////////
$category_array = array('Blog','Today Special',array('Menu','Bread','Cake','Pizza','Pan-Fry'));

$dummy_image_path = get_template_directory_uri().'/images/dummy/';

$post_array = array();
$post_author = $wpdb->get_var("SELECT ID FROM $wpdb->users order by ID asc limit 1");
$post_info = array();
$post_info[] = array(
					"post_title"	=>	'Sample Lorem Ipsum Post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'another sample post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Sample Blog Post',
					"post_content"	=>	'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
					);
$post_info[] = array(
					"post_title"	=>	'What is Lorem Ipsum?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Letraset sheets',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Why do we use it?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);				
$post_array['Blog'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."b01.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Yeast Rolls',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."b02.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Yeast Rolls',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."b03.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Hush Puppies',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."b04.png",	
					"price1"		=> '10',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Country Cornbread',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."b05.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Bierock',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Bread'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c01.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	"Whoopie Pie Cake",
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c02.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Shoo Fly Cake',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c03.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Jewish Apple Cake',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c04.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Whoopie Pie Cake',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c05.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Shoo Fly Cake',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Cake'] = $post_info;

//====================================================================================//

////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."c05.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Shoo Fly Cake',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
$post_array['Menu'] = $post_info;

//====================================================================================//

$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."p01.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Bacon &amp; Egg',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."p02.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Butter Burgers',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."p03.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Croque Monsieur',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."p04.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Chivito',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."p05.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Chicken Fried Steak',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Pan-Fry'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."pizza01.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Ring O’ Gartic',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."pizza02.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Pan Pizza',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."pizza03.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Cheese stuffed Crust',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."pizza04.png",	
					"price1"		=> '10',		
					"price2"		=> '20',		
					"price3"		=> '30',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Cheesy Bites',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path."pizza05.png",	
					"price1"		=> '30',		
					"price2"		=> '40',		
					"price3"		=> '50',		
					"size1"			=> '9&rdquo;',		
					"size2"			=> '10&rdquo;',		
					"size3"			=> '12&rdquo;',
				);
$post_info[] = array(
					"post_title"	=>	'Pizza',
					"post_content"	=>	'Also known as Mexican pizza or cheese crisp, the tostada grande is a staple of the Sonoran cooking so prevalent in Tucson. This recipe, from the venerable El Charro, is very basic and easy to eat without spillage; but it is common to add cebolitas (grilled green onions) on top. You might also consider salsa, grilled vegetables or shredded beef — all of which make it pretty messy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Pizza'] = $post_info;

$feature_cat_name = 'Today Special';
$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
for($c=0;$c<count($category_array);$c++)
{
	$cat_name = $category_array[$c];
	if(is_array($cat_name))
	{
		$parent_cat_id = '0';
		$cat_name_arr = $cat_name;
		for($i=0;$i<count($cat_name_arr);$i++)
		{
			$cat_id = '';
			$cat_name = $cat_name_arr[$i];
			$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$cat_name\"");
			if($cat_id=='')
			{
				$srch_arr = array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
				$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','','');
				$slug = str_replace($srch_arr,$replace_arr,$cat_name);
				$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
				$wpdb->query($cat_sql);
				$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
				$cat_id  = $last_cat_id;
				$count = count($post_array[$cat_name]);
				$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
				$wpdb->query($tt_sql);
				$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					set_post_info_autorun($post_info_arr);
				}				
			}else
			{
				$last_cat_id = $cat_id;
				$count = count($post_array[$cat_name]);
				$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					set_post_info_autorun($post_info_arr);
				}
				$tt_update_sql = "update $wpdb->term_taxonomy set count=count+$count where term_id=\"$last_cat_id\"";
				$wpdb->query($tt_update_sql);
			}
			if($i==0)
			{
				$parent_cat_id = $last_cat_id;
			}
		}
	}else
	{
		$cat_id = '';
		$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$cat_name\"");
		if($cat_id=='')
		{
			$srch_arr = array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
				$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','','');
			$slug = str_replace($srch_arr,$replace_arr,$cat_name);
			$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
			$wpdb->query($cat_sql);
			$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
			$count = count($post_array[$cat_name]);
			$parent_cat_id = 0;
			$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
			$wpdb->query($tt_sql);
			$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				set_post_info_autorun($post_info_arr);
			}	
		}else
		{
			$last_cat_id = $cat_id;
			$count = count($post_array[$cat_name]);
			$tt_update_sql = "update $wpdb->term_taxonomy set count=count+$count where term_id=\"$last_cat_id\"";
			$wpdb->query($tt_update_sql);
			$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				set_post_info_autorun($post_info_arr);
			}
		}
	}
}
/////////////// TERMS END ///////////////

function set_post_tag($pid,$post_tags)
{
	global $wpdb;
	$post_tags_arr = explode(',',$post_tags);
	for($t=0;$t<count($post_tags_arr);$t++)
	{
		$posttag = $post_tags_arr[$t];
		$term_id = $wpdb->get_var("SELECT t.term_id FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where t.name=\"$posttag\" and tt.taxonomy='post_tag'");
		if($term_id == '')
		{
			$srch_arr = array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
				$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','','');
			$posttagslug = str_replace($srch_arr,$replace_arr,$posttag);
			$termsql = "insert into $wpdb->terms (name,slug) values (\"$posttag\",\"$posttagslug\")";
			$wpdb->query($termsql);
			$last_termsid = $wpdb->get_var("SELECT max(term_id) as term_id FROM $wpdb->terms");
		}else
		{
			$last_termsid = $term_id;
		}
		$term_taxonomy_id = $wpdb->get_var("SELECT term_taxonomy_id FROM $wpdb->term_taxonomy where term_id=\"$last_termsid\" and taxonomy='post_tag'");
		if($term_taxonomy_id=='')
		{
			$termpost = "insert into $wpdb->term_taxonomy (term_id,taxonomy,count) values (\"$last_termsid\",'post_tag',1)";
			$wpdb->query($termpost);
			$term_taxonomy_id = $wpdb->get_var("SELECT term_taxonomy_id FROM $wpdb->term_taxonomy where term_id=\"$last_termsid\" and taxonomy='post_tag'");
		}else
		{
			$termpost = "update $wpdb->term_taxonomy set count=count+1 where term_taxonomy_id=\"$term_taxonomy_id\"";
			$wpdb->query($termpost);
		}
		$termsql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$pid\",\"$term_taxonomy_id\")";
		$wpdb->query($termsql);
	}
}
function set_post_info_autorun($post_info_arr)
{
	if(count($post_info_arr)>0)
	{
		global $last_tt_id,$feature_cat_name,$post_author,$wpdb;
		for($p=0;$p<count($post_info_arr);$p++)
		{
			$post_title = $post_info_arr[$p]['post_title'];
			$post_content = $post_info_arr[$p]['post_content'];
			$post_date = date('Y-m-d H:s:i');
			$post_IDs = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post'");
			if($post_IDs==0)
			{
				$post_name = strtolower(str_replace(array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_','/'),array('','','','','','','','','','','','','','','','','','','','',',','','',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name like \"$post_name%\" and post_type='post'");
				if($post_name_count>0)
				{
					$post_name = $post_name.'-'.($post_name_count+1);
				}
				$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
				$wpdb->query($post_sql);
				$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
				$guid = get_option('siteurl')."/?p=$last_post_id";
				$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
				$wpdb->query($guid_sql);
				if($post_info_arr[$p]['post_meta'])
				{
					foreach($post_info_arr[$p]['post_meta'] as $mkey=>$mval)
					{
						update_post_meta( $last_post_id, $mkey, $mval );
					}
				}
				update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				if($post_info_arr[$p]['post_tags'])
				{
					set_post_tag($last_post_id,$post_info_arr[$p]['post_tags']);
				}
				$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
				$wpdb->query($ter_relation_sql);
				$post_feature = $post_info_arr[$p]['post_feature'];
				$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
				
				if($post_feature && $feature_cat_id)
				{
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
					$wpdb->query($ter_relation_sql);
					$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
					$wpdb->query($tt_update_sql);
				}
			}
		}
	}
}
$pages_array = array('Events',array('About','Page - Full Width','Page - Left  Sidebar'),'Reservations','Review','Staff','Welcome to Our Restaurant','Special Offers - Sample Menu Half Price');
$page_info_arr = array();
$page_info_arr['About'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero.</p>
<p>Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero. </p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec </p>
';
$page_info_arr['Page - Full Width'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Page - Left  Sidebar'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_key_arr = array();
$page_info_arr['Events'] = '<h4>Private Events</h4>
<p>The newly remodeled and upgraded Anvil Room at The PT is an exceptional setting for private parties.  From business events to birthdays, anniversaries or wedding receptions, let the PT make your event memorable and flawless. </p><p>The Dining room is warmly lit with dark hardwood tables, comfortable leather chairs and stone walls.  The anvil room is also equipped with a 55 plasma screen that can be used for presentations or just watching the big game.  The room also has wireless internet for business functions. </p>
';
$page_info_key_arr['Events']['image'] = $dummy_image_path."event1.png";
$page_info_arr['Welcome to Our Restaurant'] = '
Create a website like this for your Restaurant or Cafe business using this theme in just few minutes. You get to edit each and everything in the theme without touching a single line of code from the theme control panel. Strategically designed, it covers all aspects that a restaurant website should actually have. What are you waiting for? 
';
$page_info_key_arr['Welcome to Our Restaurant']['image'] = $dummy_image_path."thumb5.png";

$page_info_arr['Special Offers - Sample Menu Half Price'] = '
<strong>7 Days A Week - Any Time Menu iteam      Was    Now </strong>
<strong>Chicken Curry</strong>  &tilde;   <s>$ 7.10</s>   $ 3.55
<strong>Meat Madras</strong>  &tilde;   <s>$ 7.20</s>   $ 3.65
<strong>Chicken Balti</strong> &tilde;   <s>$ 7.30</s>   $ 3.45
<strong>Keema Balti</strong>    &tilde; <s> $ 7.40</s>    $ 3.95
';
$page_info_key_arr['Special Offers - Sample Menu Half Price']['image'] = $dummy_image_path."thumb6.png";
$page_info_arr['Reservations'] = '
<img src="'.$dummy_image_path.'reserved.png" alt=""  /> 
<p>To make a reservation please call our reservation line +44 (0) 2828 620 111 between 10am and 5pm Monday to Friday (including bank holidays). </p>
<p>The lines are closed between 1pm and 2pm. </p>
 <p>We accept reservations as far as two calendar months in advance and the restaurant is closed on Sunday evening and all day Monday. </p>
<p> Before making a booking please be aware that we request credit card details for all reservations and due to the size of the restaurant the maximum number in a party is six. </p>
<div class="clearfix"> </div>
<h4>CANCELLATION POLICY </h4>
<p> Regrettably our experience dictates this precaution.  </p>
<p>For parties of five and six people we ask that our customers give at least 7 working days notice. In the event this is not honoured we will charge $100.00 per person. </p>
<p>For parties of three and four we ask that customers give at least 5 working days notice. In the event this is not honoured we will charge $80.00 per person.</p>
<p>For parties of two and below we ask that customers give at least 72 hours notice. In the event this is not honoured we will charge $80.00 per person.</p>
<p>The restaurant operates a no smoking policy.</p>
<p>We do not have a dress code.</p>
';
$page_info_arr['Review'] = '
<blockquote> Up We had a great night. The food was amazing. The service excellent and very accommodating, especially when we had an extra person turn up. Would definitely recommend to friends and work colleagues </blockquote>
<strong class="alignright"><em>- Catty</em></strong>
<hr />
<blockquote> Wanted to let you know that we had a fantastic evening Saturday night! The food was amazing and service great! Great venue will definitely recommend it to my friends.  </blockquote>
<strong class="alignright"><em>- Krista</em></strong>
<hr />
<blockquote> Just wanted to drop you a line to say thanks for Tuesday night. Everything went really well with our event so we are pleased. We had lots of positive feedback from our guests regarding the venue space and the food. </blockquote>
<strong class="alignright"><em>- Carpy</em></strong>
<hr />
<blockquote> A great time was had by all and everyone thought the food was great so thanks for ensuring that all went smoothly.Ill defo bear you in mind if we need a venue in the future.</blockquote>
<strong class="alignright"><em>- Taniya</em></strong>
';


$page_info_arr['Reservations'] = '

<img src="'.$dummy_image_path.'reserved.png" alt=""  class="post_img alignleft"  /> <p>  To make a reservation please call our reservation line +44 (0) 2828 620 111 between 10am and 5pm Monday to Friday (including bank holidays). </p>

<p> The lines are closed between 1pm and 2pm. </p>

<p> We accept reservations as far as two calendar months in advance and the restaurant is closed on Sunday evening and all day Monday. </p>
<p> Before making a booking please be aware that we request credit card details for all reservations and due to the size of the restaurant the maximum number in a party is six. </p>
<div class="clearfix"> </div>
<h4>CANCELLATION POLICY </h4>
<p>Regrettably our experience dictates this precaution. </p>

<p>For parties of five and six people we ask that our customers give at least 7 working days notice. In the event this is not honoured we will charge $100.00 per person. </p>

<p>For parties of three and four we ask that customers give at least 5 working days notice. In the event this is not honoured we will charge $80.00 per person.</p>

<p>For parties of two and below we ask that customers give at least 72 hours notice. In the event this is not honoured we will charge $80.00 per person.</p>

<p>The restaurant operates a no smoking policy.</p>
<p>We do not have a dress code.</p>
';
$page_info_arr['Staff'] = '
<p><img src="'.$dummy_image_path.'staff.png" alt="" class="alignleft post_img" /></p>
<p>For more than 35 years, we at PT have committed ourselves to offering the best experience to every guest and every employee.  We strive to provide unparalleled service, food and career opportunities.  As one of the leading seafood restaurant companies in the country we want to continue to attract and retain the best of the best!  That is why we take pride in providing our employees with continued opportunities to learn lorem ipsum dolor site amet.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat.</p>
<p>Explore our site and discover just how far you can go as part of the PT team!</p>
<p><strong>Kang</strong> -  is completely obsessed with food. When he&rsquo;s not eating, he will be busy combining copywriting and photography to deliver delicious online copy. Kang writes two restaurant reviews every week and his mission is to help you find great places to eat. </p>
<hr />
<p><strong>Rocky</strong> -  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis.</p>
<hr />
<p><strong>Rose</strong> - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis.</p>
';

set_page_info_autorun($pages_array,$page_info_arr);
/////////////// Design Settings START ///////////////
$blog_cat_id = 'Blog';	
$pageId = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'About' and post_type='page'");
$simple1_slider_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Welcome to Our Restaurant'");
update_option("pag_exclude_$simple1_slider_id",$simple1_slider_id);
$simple2_slider_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Special Offers - Sample Menu Half Price'");
update_option("pag_exclude_$simple2_slider_id",$simple2_slider_id);
$simple3_slider_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Events'");
update_option("pag_exclude_$simple3_slider_id",$simple3_slider_id);

update_option("bizzthemes_sliderpages","$simple1_slider_id,$simple2_slider_id,$simple3_slider_id");
update_option("bizzthemes_breadcrumbs",$dummy_image_path.'true');
update_option("bizzthemes_frontpage_title",'Welcome to our Restaurant!');
update_option("bizzthemes_frontpage_content",'Create a website like this for your Restaurant or Cafe business using this theme in just few minutes. You get to edit each and everything in the theme without touching a single line of code from the theme control panel. What are you waiting for? <a href="http://templatic.com/cms-themes/gourmet.html">Grab this theme now!</a>');
update_option("bizzthemes_frontpage_button_text",'More Info');
update_option("bizzthemes_frontpage_button_link",'http://templatic.com/cms-themes/restaurant.html');
update_option("bizzthemes_slider_image1",$dummy_image_path.'s1.jpg');
update_option("bizzthemes_slider_image2",$dummy_image_path.'s2.jpg');
update_option("bizzthemes_slider_image3",$dummy_image_path.'s3.jpg');
update_option("bizzthemes_slider_image4",$dummy_image_path.'s4.jpg');
update_option("bizzthemes_slider_image5",$dummy_image_path.'s5.jpg');

//update_option("bizzthemes_blog_categories_id",'Home');
update_option("bizzthemes_home_name",'Home');
update_option("bizzthemes_search_name",'Search');
update_option("bizzthemes_search_nothing_found",'Nothing found, please search again.');
update_option("bizzthemes_general_tags_name",'Tags');
update_option("bizzthemes_pages_name",'Pages');
update_option("bizzthemes_last_posts",'Last 60 Blog Posts');
update_option("bizzthemes_monthly_archives",'Monthly Archives');
update_option("bizzthemes_categories_name",'Categories');
update_option("bizzthemes_rssfeeds_name",'Available RSS Feeds');
update_option("bizzthemes_404error_name",'Error 404 | Nothing found!');
update_option("bizzthemes_404solution_name",'Sorry, but you are looking for something that is not here.');
update_option("bizzthemes_password_protected_name",'This post is password protected. Enter the password to view comments.');
update_option("bizzthemes_comment_responsesa_name",'No Comments');
update_option("bizzthemes_comment_responsesb_name",'One Comment');
update_option("bizzthemes_comment_responsesc_name",'% Comments');
update_option("bizzthemes_comment_trackbacks_name",'Trackbacks For This Post');
update_option("bizzthemes_comment_moderation_name",'Your comment is awaiting moderation.');
update_option("bizzthemes_comment_conversation_name",'Be the first to start a conversation');
update_option("bizzthemes_comment_closed_name",'Comments are closed.');
update_option("bizzthemes_comment_off_name",'Comments are off for this post');
update_option("bizzthemes_comment_reply_name",'Leave a Reply');
update_option("bizzthemes_comment_mustbe_name",'You must be');
update_option("bizzthemes_comment_loggedin_name",'logged in');
update_option("bizzthemes_comment_postcomment_name",'to post a comment.');
update_option("bizzthemes_comment_name_name",'Name');
update_option("bizzthemes_comment_mail_name",'Mail');
update_option("bizzthemes_comment_website_name",'Website');
update_option("bizzthemes_comment_addcomment_name",'Add Comment');
update_option("bizzthemes_comment_justreply_name",'Reply');
update_option("bizzthemes_comment_edit_name",'Edit');
update_option("bizzthemes_comment_delete_name",'Delete');
update_option("bizzthemes_comment_spam_name",'Spam');
update_option("bizzthemes_pagination_first_name",'First');
update_option("bizzthemes_pagination_last_name",'Last');
update_option("bizzthemes_postcontent_full",'true');
update_option("bizzthemes_reservations_name",'For reservations call');
update_option("bizzthemes_reservations_number",'(502) 256-0772');
update_option("bizzthemes_footpages",$pageId);
$include_cat_ids = $wpdb->get_var("SELECT GROUP_CONCAT(t.term_id) FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where (t.name!=\"$blog_cat_id\") and t.name!=\"$blog_cat_id\"  group by tt.taxonomy having tt.taxonomy='category'"); 
update_option("bizzthemes_categories_id",substr($include_cat_ids,2,strlen($include_cat_ids)));
$blog_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$blog_cat_id\"");
update_option("bizzthemes_blog_categories_id",$blog_cat_id);

$recent_info = array();
$recent_info[1] = array(
					"title"				=>	'Recent Posts',
					"number"			=>	'5',
					);
$recent_info['_multiwidget'] = '1';
update_option('widget_recent-posts',$recent_info);
$recent_info = get_option('widget_recent-posts');
krsort($recent_info);
foreach($recent_info as $key1=>$val1)
{
	$recent_info_key = $key1;
	if(is_int($recent_info_key))
	{
		break;
	}
}
//archive ----
$archive_info = array();
$archive_info[1] = array(
					"title"				=>	'Archives',
					"number"			=>	'5',
					"count"				=>	'1',
					);
$archive_info['_multiwidget'] = '1';
update_option('widget_archives',$archive_info);
$archive_info = get_option('widget_archives');
krsort($archive_info);
foreach($archive_info as $key1=>$val1)
{
	$archive_info_key = $key1;
	if(is_int($archive_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-1"] = array('recent-posts-'.$recent_info_key,'archives-'.$archive_info_key);


// page sidebar 2 start 
// Widget Title
$widget_title = array();
$widget_title[1] = array(
					"title"				=>	'Restaurant Hours',
					);
$widget_title['_multiwidget'] = '1';
update_option('widget_widget_stitle',$widget_title);
$widget_title = get_option('widget_widget_stitle');
krsort($widget_title);
foreach($widget_title as $key1=>$val1)
{
	$widget_title_key = $key1;
	if(is_int($widget_title_key))
	{
		break;
	}
}

// Restaturant Hours 
$restaturant_hours = array();
$restaturant_hours[1] = array(
					"title1"				=>	'Lunch',
					"days1"					=>	'Monday - Friday',
					"hours1"				=>	'11:00 am - 03:00 pm',
					"days12"				=>	'Saturaday - Sunday',
					"hours12"				=>	'11:00 am - 03:00 pm',
					);
$restaturant_hours['_multiwidget'] = '1';
update_option('widget_widget_hours',$restaturant_hours);
$restaturant_hours = get_option('widget_widget_hours');
krsort($restaturant_hours);
foreach($restaturant_hours as $key1=>$val1)
{
	$restaturant_hours_key = $key1;
	if(is_int($restaturant_hours_key))
	{
		break;
	}
}

// Restaturant Hours  2
$restaturant_hours2 = array();
$restaturant_hours2 = get_option('widget_widget_hours');
$restaturant_hours2[2] = array(
					"title1"				=>	'Dinner',
					"days1"					=>	'Monday - Friday',
					"hours1"				=>	'12:00 am - 04:00 pm',
					"days12"				=>	'Saturaday - Sunday',
					"hours12"				=>	'12:00 am - 06:00 pm',
					);
$restaturant_hours2['_multiwidget'] = '1';
update_option('widget_widget_hours',$restaturant_hours2);
$restaturant_hours2 = get_option('widget_widget_hours');
krsort($restaturant_hours2);
foreach($restaturant_hours2 as $key1=>$val1)
{
	$restaturant_hours2_key = $key1;
	if(is_int($restaturant_hours2_key))
	{
		break;
	}
}

// Restaturant Contact Details
$restaturant_contact = array();
$restaturant_contact[1] = array(
					"title"				=>	'Contact Info :',
					"address"			=>	'98790, Aincent Place, Glas Gow, DC 45, Fr 45',
					"phone_title"		=>	'Phone',
					"phone_number"		=>	'0261 211111',
					"email_title"		=>	'Email',
					"email_address"		=>	'restaurant@yahoo.com',
					);
$restaturant_contact['_multiwidget'] = '1';
update_option('widget_widget_contact',$restaturant_contact);
$restaturant_contact = get_option('widget_widget_contact');
krsort($restaturant_contact);
foreach($restaturant_contact as $key1=>$val1)
{
	$restaturant_contact_key = $key1;
	if(is_int($restaturant_contact_key))
	{
		break;
	}
}

$sidebars_widgets["sidebar-2"] = array('widget_stitle-'.$widget_title_key,'widget_hours-'.$restaturant_hours_key,'widget_hours-'.$restaturant_hours2_key,'widget_contact-'.$restaturant_contact_key);


////////////////////////////////////////////
$special_info = array();
$special_cat_id = $wpdb->get_var("SELECT t.term_id FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where t.name LIKE \"Cake\" and  tt.taxonomy='category'"); 
$special_info[1] = array(
					"title"				=>	'Today\'s Special',
					"category"			=>	$special_cat_id,
					);
$special_info['_multiwidget'] = '1';

update_option('widget_widget_recent',$special_info);
$special_info = get_option('widget_widget_recent');
krsort($special_info);
foreach($special_info as $key1=>$val1)
{
	$special_info_key = $key1;
	if(is_int($special_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-3"] = array('widget_recent-'.$special_info_key);



////////////////////////////////////////////
$latest_info = array();
$latest_menu_cat_id = $wpdb->get_var("SELECT t.term_id FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where t.name LIKE \"Bread\" and  tt.taxonomy='category'"); 
$menu_cat_id = $wpdb->get_var("SELECT t.term_id FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where t.name LIKE \"Menu\" and  tt.taxonomy='category'"); 
$latest_info[1] = array(
					"title"				=>	'Latest Menus',
					"category"			=>	$latest_menu_cat_id,
					"post_number"		=>	'5',
					"view_menu"			=>	get_category_link( $menu_cat_id ),
					);
$latest_info['_multiwidget'] = '1';

update_option('widget_widget_latest',$latest_info);
$latest_info = get_option('widget_widget_latest');
krsort($latest_info);
foreach($latest_info as $key1=>$val1)
{
	$latest_info_key = $key1;
	if(is_int($latest_info_key))
	{
		break;
	}
}
$location_info = array();
$location_info[1] = array(
					"title"				=>	'Location',
					"desc"				=>	'<p><b>Gourmet Restaurant </b> <br />14400 Dogwood Road Snellville, GA 30078  <br />Google Map <br />770.979.7000 </p><p> Phone : 0261 211111 <br /> Emial : <a href="#" >restaurant@yahoo.com  </a> </p><p>We are located on Dogwood Rd. between Webb Gin House Rd. and Highway 124 (Scenic Highway) in Snellville.</p>',
					"google_map"		=>	'<iframe width="220" height="165" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=727+Flournoy+Lucas+Road,+Shreveport,+La+71118&sll=44.246913,-62.944799&sspn=91.718249,227.636719&num=10&ie=UTF8&hq=&hnear=727+Flournoy+Lucas+Rd,+Shreveport,+Caddo,+Louisiana+71118&z=16&ll=32.389906,-93.773502&output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&source=embed&hl=en&geocode=&q=727+Flournoy+Lucas+Road,+Shreveport,+La+71118&sll=44.246913,-62.944799&sspn=91.718249,227.636719&num=10&ie=UTF8&hq=&hnear=727+Flournoy+Lucas+Rd,+Shreveport,+Caddo,+Louisiana+71118&z=16&ll=32.389906,-93.773502" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
					);
$location_info['_multiwidget'] = '1';

update_option('widget_widget_location',$location_info);
$location_info = get_option('widget_widget_location');
krsort($location_info);
foreach($location_info as $key1=>$val1)
{
	$location_info_key = $key1;
	if(is_int($location_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-4"] = array('widget_latest-'.$latest_info_key,'widget_location-'.$location_info_key);
////////////////////////////////////////////


// page sidebar 2 start 
// Widget Title
$widget_title = array();
$widget_title = get_option('widget_widget_stitle');
$widget_title[1] = array(
					"title"				=>	'Restaurant Hours',
					);
$widget_title['_multiwidget'] = '1';
update_option('widget_widget_stitle',$widget_title);
$widget_title = get_option('widget_widget_stitle');
krsort($widget_title);
foreach($widget_title as $key1=>$val1)
{
	$widget_title_key = $key1;
	if(is_int($widget_title_key))
	{
		break;
	}
}

// Restaturant Hours 
$restaturant_hours = array();
$restaturant_hours = get_option('widget_widget_hours');
$restaturant_hours[3] = array(
					"title1"				=>	'Lunch',
					"days1"					=>	'Monday - Friday',
					"hours1"				=>	'11:00 am - 03:00 pm',
					"days12"				=>	'Saturaday - Sunday',
					"hours12"				=>	'11:00 am - 03:00 pm',
					);
$restaturant_hours['_multiwidget'] = '1';
update_option('widget_widget_hours',$restaturant_hours);
$restaturant_hours = get_option('widget_widget_hours');
krsort($restaturant_hours);
foreach($restaturant_hours as $key1=>$val1)
{
	$restaturant_hours_key = $key1;
	if(is_int($restaturant_hours_key))
	{
		break;
	}
}

// Restaturant Hours  2
$restaturant_hours2 = array();
$restaturant_hours2 = get_option('widget_widget_hours');
$restaturant_hours2[4] = array(
					"title1"				=>	'Dinner',
					"days1"					=>	'Monday - Friday',
					"hours1"				=>	'12:00 am - 04:00 pm',
					"days12"				=>	'Saturaday - Sunday',
					"hours12"				=>	'12:00 am - 06:00 pm',
					);
$restaturant_hours2['_multiwidget'] = '1';
update_option('widget_widget_hours',$restaturant_hours2);
$restaturant_hours2 = get_option('widget_widget_hours');
krsort($restaturant_hours2);
foreach($restaturant_hours2 as $key1=>$val1)
{
	$restaturant_hours2_key = $key1;
	if(is_int($restaturant_hours2_key))
	{
		break;
	}
}

// Restaturant Contact Details
$restaturant_contact = array();
$restaturant_hours2 = get_option('widget_widget_hours');
$restaturant_contact[2] = array(
					"title"				=>	'Contact Info :',
					"address"			=>	'98790, Aincent Place, Glas Gow, DC 45, Fr 45',
					"phone_title"		=>	'Phone',
					"phone_number"		=>	'0261 211111',
					"email_title"		=>	'Email',
					"email_address"		=>	'restaurant@yahoo.com',
					);
$restaturant_contact['_multiwidget'] = '1';
update_option('widget_widget_contact',$restaturant_contact);
$restaturant_contact = get_option('widget_widget_contact');
krsort($restaturant_contact);
foreach($restaturant_contact as $key1=>$val1)
{
	$restaturant_contact_key = $key1;
	if(is_int($restaturant_contact_key))
	{
		break;
	}
}

$sidebars_widgets["sidebar-5"] = array('widget_stitle-'.$widget_title_key,'widget_hours-'.$restaturant_hours_key,'widget_hours-'.$restaturant_hours2_key,'widget_contact-'.$restaturant_contact_key);


update_option('sidebars_widgets',$sidebars_widgets);  //save widget iformations
/////////////// Design Settings END ///////////////
function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb,$page_info_key_arr;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}

		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = addslashes($page_info_arr[$j]['post_content']);
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent!='')
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_','/'),array('','','','','','','','','','','','','','','','','','','','',',','','',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_name_count>0)
				{
					echo '';
				}else
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\",  \"$post_title\", \"$post_content\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
					if($page_info_key_arr)
					{
						$page_info_key_arr_key = $page_info_key_arr[$post_title];
						if($page_info_key_arr_key)
						{
							foreach($page_info_key_arr_key as $key=>$val)
							{
								if($key)
								{
									update_post_meta( $last_post_id, $key, $val );
								}
							}
						}
					}
				}
			}
		}
	}
}
?>