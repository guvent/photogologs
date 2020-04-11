<?php 


include $indexpath . "/sys/engine/pinterest.php";


$collectors[0] = get_pinlist($keyal, $kelime."style");
$collectors[1] = get_pinlist($keyal, $kelime."ing");
$collectors[2] = get_pinlist($keyal, $kelime."live");


$collector = [];

foreach ($collectors as $key1 => $value1) {
    foreach ($value1["pano"] as $key2 => $value2) {
        array_push($collector, $value2);
    }
}


 ?>

        <div id="colorlib-main">
            <section class="ftco-section bg-light ftco-bread">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-9 ftco-animate">
                            <p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home</a></span> <span>Blog</span></p>
                            <h1 class="mb-3 bread">Articles</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <?php
                                foreach ($collector as $key => $value) { 
                                    $title = ($value["title"] != "") ? $value["title"] : $value["domain"];
                                    $description = $value["description"];

                                    $adsindex = rand(5, count($collector)-5);
                                    $adstitle = ($collector[$adsindex]["title"] != "") ? $collector[$adsindex]["title"] : $collector[$adsindex]["domain"];
                                    $adsdescr = $collector[$adsindex]["description"];
                                ?>

                                <?php if($gads_enable and ($key == 0 or $key == 8 or $key == 22 or $key == 34 or $key == 51)) { ?>
                                    <div class="col-md-6">
                                        <div class="blog-entry ftco-animate">
                                            <div class="img img-2">
                                                <?=$adsense1?>
                                            </div>
                                            <div class="text text-2 pt-2 mt-3">
                                                <h3 class="mb-2"><a href="#">
                                                    <?=$adstitle?>
                                                </a></h3>
                                                <div class="meta-wrap">
                                                    <p class="meta">
                                                        <span><?=rand(0,99)?> Follow</span>
                                                        <span><a href="#">Photography</a></span>
                                                        <span><?=rand(0,99)?> Comment</span>
                                                    </p>
                                                </div>
                                                <p class="mb-4"><?=$adsdescr?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                    <div class="col-md-6">
                                        <div class="blog-entry ftco-animate">
                                            <a href="<?=$value["adres"]?>" class="img img-2"
                                                title="<?=$title?>"
                                                data-description="<?=$description?>"
                                                data-url="/<?=$adres?>"
                                                style="background-image: url(<?=$value["image_large_url"]?>);"></a>
                                            <div class="text text-2 pt-2 mt-3">
                                                <h3 class="mb-2"><a href="/<?=$adres?>"><?=$title?></a></h3>
                                                <div class="meta-wrap">
                                                    <p class="meta">
                                                        <span><?=$value["repin_count"]?> Follow</span>
                                                        <span><a href="<?=$value["adres"]?>">Photography</a></span>
                                                        <span><?=rand(0,99)?> Comment</span>
                                                    </p>
                                                </div>
                                                <p class="mb-4"><?=$value["description"]?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>