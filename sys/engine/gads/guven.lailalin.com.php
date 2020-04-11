<?php 

// guven.lailalin.com

$gads_enable = true;

$adsensejs = <<<ADSENSEJS
    <script data-ad-client="ca-pub-8537762664689449" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
ADSENSEJS;

$analytics = <<<ANALYTICS
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155162593-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-155162593-1');
	</script>
ANALYTICS;


$adsensecss = <<<ADSENSECSS
    <style type="text/css">
        .adsense1 { width: 99%; max-width: 99%; }
        .adsense2 { width: 99%; max-width: 99%; }
        .adsense3 { width: 99%; max-width: 99%; }
        .adsense4 { width: 99%; max-width: 99%; }
    </style>
ADSENSECSS;

$adsense1 = <<<ADSENSE1
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- deneme -->
    <ins class="adsbygoogle adsense1"
         style="display:block"
         data-ad-client="ca-pub-8537762664689449"
         data-ad-slot="9358064166"
         data-ad-format="rectangle"
         data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
ADSENSE1;

$adsense2 = <<<ADSENSE2
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- yatayReklam -->
	<ins class="adsbygoogle adsense2"
	     style="display:block"
	     data-ad-client="ca-pub-8537762664689449"
	     data-ad-slot="2689805343"
	     data-ad-format="rectangle"
	     data-full-width-responsive="true"></ins>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
ADSENSE2;

$adsense3 = <<<ADSENSE3
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- kare -->
	<ins class="adsbygoogle adsense3"
	     style="display:block"
	     data-ad-client="ca-pub-8537762664689449"
	     data-ad-slot="3270537078"
	     data-ad-format="rectangle"
	     data-full-width-responsive="true"></ins>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
ADSENSE3;

$adsense4 = <<<ADSENSE4
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle adsense4"
	     style="display:block; text-align:center;"
	     data-ad-layout="in-article"
	     data-ad-format="fluid"
	     data-ad-client="ca-pub-8537762664689449"
	     data-ad-slot="8668427311"></ins>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
ADSENSE4;


 ?>