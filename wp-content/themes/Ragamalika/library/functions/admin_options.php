<?php

$options[] = array(	"type" => "maintabletop");

    ////// General Settings
	    $options[] = array(	"name" => "General Settings",
						"type" => "heading");
						
		    $options[] = array(	"name" => "Customize Your Design",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Use Custom Stylesheet",
						            "desc" => "If you want to make custom design changes using CSS enable and <a href='". $customcssurl . "'>edit custom.css file here</a>.",
						            "id" => $shortname."_customcss",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Favicon",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"desc" => "Paste the full URL for your favicon image here if you wish to show it in browsers. <a href='http://www.favicon.cc/'>Create one here</a>",
						            "id" => $shortname."_favicon",
						            "std" => "",
						            "type" => "text");	
			
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Logo",
						        "toggle" => "true",
								"type" => "subheadingtop");

                $options[] = array(	"name" => "Choose Your Logo",
				                    "desc" => "Paste the full URL to your logo here. Must be within <code>620x100 px</code> dimensions!",
						            "id" => $shortname."_logo_url",
						            "std" => "",
						            "type" => "file");

				$options[] = array(	"name" => "Choose Blog Title over Logo",
				                    "desc" => "This option will overwrite your logo selection above - You can <a href='". $generaloptionsurl . "'>change your settings here</a>",
						            "label" => "Show Blog Title + Tagline.",
						            "id" => $shortname."_show_blog_title",
						            "std" => "true",
						            "type" => "checkbox");	

			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Syndication / Feed",
						        "toggle" => "true",
								"type" => "subheadingtop");			
						
				$options[] = array( "name" => "Feed URL Address",				
				                    "desc" => "If you are using a service like Feedburner to manage your RSS feed, enter full URL to your feed into box above. If you'd prefer to use the default WordPress feed, simply leave this box blank.",
			    		            "id" => $shortname."_feedburner",
			    		            "std" => "",
			    		            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Blog Stats and Scripts",
						        "toggle" => "true",
								"type" => "subheadingtop");	
						
				$options[] = array(	"name" => "Header Scripts",
					                "desc" => "If you need to add scripts to your header (like <a href='http://haveamint.com/'>Mint</a> tracking code), do so here.",
					                "id" => $shortname."_scripts_header",
					                "std" => "",
					                "type" => "textarea");
						
				$options[] = array(	"name" => "Footer Scripts",
					                "desc" => "If you need to add scripts to your footer (like <a href='http://www.google.com/analytics/'>Google Analytics</a> tracking code), do so here.",
					                "id" => $shortname."_google_analytics",
					                "std" => "",
					                "type" => "textarea");
			
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Header Reservations Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");	
						
				$options[] = array( "name" => "Reservations Name",				
				                    "desc" => "Enter descriptions for reservations call (i.e. For reservations call)",
			    		            "id" => $shortname."_reservations_name",
			    		            "std" => "",
			    		            "type" => "text");	
						
				$options[] = array( "name" => "Reservations Number",				
				                    "desc" => "Enter number for reservations (i.e. (502) 256-0772)",
			    		            "id" => $shortname."_reservations_number",
			    		            "std" => "",
			    		            "type" => "text");	
			
			$options[] = array(	"type" => "subheadingbottom");
								
 $options[] = array(	"name" => "Image Setting (Tim thumb setting - Image Cutting Edge)",
						        "toggle" => "true",
								"type" => "subheadingtop");	

$options[] = array(	"name" => __("Default Image Cutting Edge"),
					                "desc" => __("Set Default Image Cutting Edge Position."),
					                "id" => $shortname."_image_x_cut",
					                "std" => "",
									"options" => array('center','top','bottom','left','right','top right','top left','bottom right','bottom left'),
					                "type" => "select");
				$options[] = array(	"type" => "subheadingbottom");
			 
			 					
		$options[] = array(	"type" => "maintablebreak");

		
     /// Navigation Settings												
				
		$options[] = array(	"name" => "Navigation Settings",
						    "type" => "heading");
										
			$options[] = array(	"name" => "Exclude Pages from Header Menu",
								"toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"type" => "multihead");
						
				$options = pages_exclude($options);
					
			$options[] = array(	"type" => "subheadingbottom");
			
			
			$options[] = array(	"name" => "Include Categories from Header Menu Category",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Header Navigation Select Menu Category",
                	                "desc" => "Enter a comma-separated list of the <code>categories ID's</code> that you'd like to display in header (on the right). (ie. <code>1,2,3,4</code>)",
						            "id" => $shortname."_categories_id",
						            "std" => "",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
			$options[] = array(	"name" => "Breadcrumbs Navigation",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Show breadcrumbs navigation bar",
						            "desc" => "i.e. Home > Blog > Title - <a href='". $breadcrumbsurl . "'>Change options here</a>",
						            "id" => $shortname."_breadcrumbs",
						            "std" => "true",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Footer Navigation",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Show breadcrumbs navigation bar",
                	                "desc" => "Enter a comma-separated list of the <code>page ID's</code> that you'd like to display in footer (on the right). (ie. <code>1,2,3,4</code>)",
						            "id" => $shortname."_footpages",
						            "std" => "",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
		
		
	/// Blog Section Settings												
				
		$options[] = array(	"name" => "Blog Section Settings",
						    "type" => "heading");
			
		    $options[] = array(	"name" => "Pick Category for Your Blog Posts",
						        "toggle" => "true",
								"type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Select a category where your blog posts will be.",
			    		            "id" => $shortname."_blogcategory",
			    		            "type" => "select",
			    		            "options" => $pn_categories);
			
			$options[] = array(	"label" => "Display Blog Category Link",
						            "desc" => "Wish to appear or disapper Blog Category link in header menu or not",
						            "id" => $shortname."_showhide_blog",
						            "std" => "false",
						            "type" => "checkbox");	
			
			
		    $options[] = array(	"type" => "subheadingbottom");


			/*$options[] = array(	"name" => "Include Categories from Header Blog Category",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Header Navigation Select Blog Category",
                	                "desc" => "Enter a comma-separated list of the <code>categories ID's</code> that you'd like to display in header (on the right). (ie. <code>1,2,3,4</code>)",
						            "id" => $shortname."_blog_categories_id",
						            "std" => "",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");*/
			
			$options[] = array(	"name" => "Content Display",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Display Full Post Content",
						            "desc" => "Instead of default Post excerpts display Full Post Content in Blog Section",
						            "id" => $shortname."_postcontent_full",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Comments Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Display Comments Count",
						            "desc" => "Show comments count in Blog Section",
						            "id" => $shortname."_commentcount",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");

		
    /// Featured Slider Settings
	
		$options[] = array(	"name" => "Front Slider Settings",
						    "type" => "heading");
							
			$options[] = array(	"name" => "Pick Pages For Your Featured Slider",
						        "toggle" => "true",
								"type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Enter a comma-separated list of the <code>page ID's</code> that you'd like to display in the featured slider. (ie. <code>1,2,3,4</code>)",
					                "id" => $shortname."_sliderpages",
					                "std" => "",
					                "type" => "text");
					
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Pick Height for Your Featured Slider",
						        "toggle" => "true",
								"type" => "subheadingtop");
					
				$options[] = array(	"desc" => "Enter the height of featured slider displayed on front page. By default it is <code>270</code>.",
					                "id" => $shortname."_featheight",
					                "std" => "",
					                "type" => "text");
					
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Pick Featured Image Size for Your Featured Slider",
						        "toggle" => "true",
								"type" => "subheadingtop");
					
				$options[] = array(	"name" => "Height",
				                    "desc" => "Enter the height of featured image displayed in slider custom field. By default height is <code>200</code>.",
					                "id" => $shortname."_imgslideheight",
					                "std" => "",
					                "type" => "text");
					
				$options[] = array(	"name" => "Width",
					                "desc" => "Enter the width of featured image displayed in slider custom field. By default width is <code>350</code>.",
					                "id" => $shortname."_imgslidewidth",
					                "std" => "",
					                "type" => "text");
					
			$options[] = array(	"type" => "subheadingbottom");
				
		$options[] = array(	"type" => "maintablebreak");
				
$options[] = array(	"type" => "maintablebottom");
				
$options[] = array(	"type" => "maintabletop");

	////// Advertising scripts
                
		$options[] = array(	"name" => "Advertising Scripts",
						    "type" => "heading");
						
			$options[] = array(	"name" => "Enter Ad Scripts Code",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"name" => "Search Page",
					                "desc" => "Enter your ad script code here. Must be up to <code>620 px</code> width.",
					                "id" => $shortname."_search_adsense",
					                "std" => "",
					                "type" => "textarea");
				
				$options[] = array(	"name" => "Above Comments",
					                "desc" => "Enter your ad script code here. Must be up to <code>620 px</code> width.",
					                "id" => $shortname."_comment_adsense",
					                "std" => "",
					                "type" => "textarea");
						
		    $options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
			
			
    /// 300x250
				
		$options[] = array(	"name" => "Banner Ad 300x250 - <em class='widgetsurl'><a href='". $widgetsurl . "'>enable in Widgets</a></em>",
						    "type" => "heading");
						
			$options[] = array(	"name" => "300x250 Ad Banner Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Disable 300x250 Ad Banner",
						            "label" => "Ignore the 300x250 Ad.",
						            "id" => $shortname."_not_200",
						            "std" => "true",
						            "type" => "checkbox");

				$options[] = array(	"name" => "Display Only On Homepage?",
						            "label" => "Display this ad only on homepage. ",
						            "id" => $shortname."_home_only",
						            "std" => "false",
						            "type" => "checkbox");

				$options[] = array(	"name" => "300x250 Ad - Image Location",
						            "desc" => "Enter the URL for this Ad.",
						            "id" => $shortname."_block_image",
						            "std" => $template_path . "/images/300x250.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "300x250 Ad - Destination",
						            "desc" => "Enter the URL where this Ad points to.",
			    		            "id" => $shortname."_block_url",
						            "std" => "http://templatic.com",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
		$options[] = array(	"type" => "maintablebreak");
			

	/// 125x125 top
				
		$options[] = array(	"name" => "Banner Ads 125x125 - <em class='widgetsurl'><a href='". $widgetsurl . "'>enable in Widgets</a></em>",
						    "type" => "heading");
			
			$options[] = array(	"name" => "125x125 Ad Banners Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Display two (1 and 2) 125x125 ads",
						            "label" => "Display top 1st and 2nd Ads in sidebar.",
						            "id" => $shortname."_show_ads_top12",
						            "std" => "false",
						            "type" => "checkbox");

				$options[] = array(	"name" => "#1 - Image Location",
						            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_1",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#1 - Destination",
						            "desc" => "Enter the URL where this Ads points to.",
			    		            "id" => $shortname."_ad_url_1",
						            "std" => "http://templatic.com",
			    		            "type" => "text");						

				$options[] = array(	"name" => "#2 - Image Location",
						            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_2",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#2 - Destination",
					      	        "desc" => "Enter the URL where this Ad points to.",
			    		            "id" => $shortname."_ad_url_2",
						            "std" => "http://templatic.com",
			    		            "type" => "text");

				$options[] = array(	"name" => "Display two (3 and 4) 125x125 ads",
						            "label" => "Display 2nd and 3rd Ad in sidebar.",
						            "id" => $shortname."_show_ads_top34",
						            "std" => "false",
						            "type" => "checkbox");

				$options[] = array(	"name" => "#3 - Image Location",
						            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_3",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#3 - Destination",
						            "desc" => "Enter the URL where this Ad points to.",
			    		            "id" => $shortname."_ad_url_3",
						            "std" => "http://templatic.com",
			    		            "type" => "text");						

				$options[] = array(	"name" => "#4 - Image Location",
						            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_4",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#4 - Destination",
						            "desc" => "Enter the URL where this Ads points to.",
			    		            "id" => $shortname."_ad_url_4",
						            "std" => "http://templatic.com",
			    		            "type" => "text");
						
				$options[] = array(	"name" => "Display two (5 and 6) 125x125 ads",
						            "label" => "Display top 5th and 6th Ad in sidebar.",
						            "id" => $shortname."_show_ads_top56",
						            "std" => "false",
						            "type" => "checkbox");
						
				$options[] = array(	"name" => "#5 - Image Location",
					 	            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_5",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#5 - Destination",
						            "desc" => "Enter the URL where this Ads points to.",
			    		            "id" => $shortname."_ad_url_5",
						            "std" => "http://templatic.com",
			    		            "type" => "text");
						
				$options[] = array(	"name" => "#6 - Image Location",
						            "desc" => "Enter the URL for this Ads.",
						            "id" => $shortname."_ad_image_6",
						            "std" => $template_path . "/images/ad-125x125.png",
						            "type" => "text");
						
				$options[] = array(	"name" => "#6 - Destination",
					 	            "desc" => "Enter the URL where this Ads points to.",
			    	 	            "id" => $shortname."_ad_url_6",
						            "std" => "http://templatic.com",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
		$options[] = array(	"type" => "maintablebreak");

    /// SEO Options
				
		$options[] = array(	"name" => "SEO Options",
						    "type" => "heading");
						
			$options[] = array(	"name" => "Home Page <code>&lt;meta&gt;</code> tags",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Meta Description",
					                "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
					                "id" => $shortname."_meta_description",
					                "std" => "",
					                "type" => "textarea");

				$options[] = array(	"name" => "Meta Keywords (comma separated)",
					                "desc" => "Meta keywords are rarely used nowadays but you can still provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
						            "id" => $shortname."_meta_keywords",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"name" => "Meta Author",
					                "desc" => "You should write your <em>full name</em> here but only do so if this blog is writen only by one outhor. This only applies to your home page.",
						            "id" => $shortname."_meta_author",
						            "std" => "",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Add <code>&lt;noindex&gt;</code> tags",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to category archives.",
						            "id" => $shortname."_noindex_category",
						            "std" => "true",
						            "type" => "checkbox");
									
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to tag archives.",
						            "id" => $shortname."_noindex_tag",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to author archives.",
						            "id" => $shortname."_noindex_author",
						            "std" => "true",
						            "type" => "checkbox");
									
			    $options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to Search Results.",
						            "id" => $shortname."_noindex_search",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to daily archives.",
						            "id" => $shortname."_noindex_daily",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to monthly archives.",
						            "id" => $shortname."_noindex_monthly",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to yearly archives.",
						            "id" => $shortname."_noindex_yearly",
						            "std" => "true",
						            "type" => "checkbox");
				
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
		$options[] = array(	"type" => "maintablebreak");
		
	//////Translations		

	    $options[] = array(	"name" => "Translations",
						    "type" => "heading");
						
			$options[] = array(	"name" => "General Text",
			                    "toggle" => "true",
						        "type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Change Home link text - next to category menu in header",
			    		            "id" => $shortname."_home_name",
			    		            "std" => "Home",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change Search text",
			    		            "id" => $shortname."_search_name",
			    		            "std" => "Search",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Nothing Found for Search text",
			    		            "id" => $shortname."_search_nothing_found",
			    		            "std" => "Nothing found, please search again.",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Tags text",
			    		            "id" => $shortname."_general_tags_name",
			    		            "std" => "Tags",
			    		            "type" => "text");
				
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Sitemap Custom Template Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
								
				$options[] = array(	"desc" => "Change Pages text",
			    		            "id" => $shortname."_pages_name",
			    		            "std" => "Pages",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change Last 60 blog posts text",
			    		            "id" => $shortname."_last_posts",
			    		            "std" => "Last 60 Blog Posts",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change Monthly archives text",
			    		            "id" => $shortname."_monthly_archives",
			    		            "std" => "Monthly Archives",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change Categories text",
			    		            "id" => $shortname."_categories_name",
			    		            "std" => "Categories",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change RSS feeds text",
			    		            "id" => $shortname."_rssfeeds_name",
			    		            "std" => "Available RSS Feeds",
			    	 	            "type" => "text");
						
	        $options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "404 Error Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change 404 error text",
			    		            "id" => $shortname."_404error_name",
			    		            "std" => "Error 404 | Nothing found!",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change 404 error solution text",
			    		            "id" => $shortname."_404solution_name",
			    		            "std" => "Sorry, but you are looking for something that is not here.",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Comments Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change password protected text",
			    		            "id" => $shortname."_password_protected_name",
			    		            "std" => "This post is password protected. Enter the password to view comments.",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change no responses text",
			    		            "id" => $shortname."_comment_responsesa_name",
			    		            "std" => "No Comments",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change one response text",
			    		            "id" => $shortname."_comment_responsesb_name",
			    		            "std" => "One Comment",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change multiple responses text, leave % intact!",
			    		            "id" => $shortname."_comment_responsesc_name",
			    		            "std" => "% Comments",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change trackbacks text",
			    		            "id" => $shortname."_comment_trackbacks_name",
			    		            "std" => "Trackbacks For This Post",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change comment moderation text",
			    		            "id" => $shortname."_comment_moderation_name",
			    		            "std" => "Your comment is awaiting moderation.",
			    	             	"type" => "text");
						
				$options[] = array( "desc" => "Change start conversation text",
			    		            "id" => $shortname."_comment_conversation_name",
			    		            "std" => "Be the first to start a conversation",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change closed comments text",
			    		            "id" => $shortname."_comment_closed_name",
			    		            "std" => "Comments are closed.",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change disabled comments text",
			    		            "id" => $shortname."_comment_off_name",
			    		            "std" => "Comments are off for this post",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change leave a reply text",
			    		            "id" => $shortname."_comment_reply_name",
			    		            "std" => "Leave a Reply",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change 'you must be' text",
			    		            "id" => $shortname."_comment_mustbe_name",
			    		            "std" => "You must be",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change 'logged in' text",
			    		            "id" => $shortname."_comment_loggedin_name",
			    		            "std" => "logged in",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'to post a comment' text",
			    		            "id" => $shortname."_comment_postcomment_name",
			    		            "std" => "to post a comment.",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change Logout text",
			    		            "id" => $shortname."_comment_logout_name",
			    		            "std" => "Logout",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change name text",
			    		            "id" => $shortname."_comment_name_name",
			    		            "std" => "Name",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change mail text",
			    		            "id" => $shortname."_comment_mail_name",
			    		            "std" => "Mail",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change website text",
			    		            "id" => $shortname."_comment_website_name",
			    		            "std" => "Website",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change add comment text",
			    		            "id" => $shortname."_comment_addcomment_name",
			    		            "std" => "Add Comment",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'reply' to threaded comment text",
			    		            "id" => $shortname."_comment_justreply_name",
			    		            "std" => "Reply",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'edit' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_edit_name",
			    	            	"std" => "Edit",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'delete' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_delete_name",
			    		            "std" => "Delete",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'spam' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_spam_name",
			    		            "std" => "Spam",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Pagination Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change first page text",
			    		            "id" => $shortname."_pagination_first_name",
			    	 	            "std" => "First",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change last page text",
			    		            "id" => $shortname."_pagination_last_name",
			    		            "std" => "Last",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
									
		$options[] = array(	"type" => "maintablebreak");
						
$options[] = array(	"type" => "maintablebottom");

?>