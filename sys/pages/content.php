<?php 


include $indexpath . "/sys/engine/pinterest.php"; 

$collectors = get_pin($keyal, $iscontent[2]);

$contents = "";

foreach ($collectors["related"] as $key => $value) {
	if($value["type"]!="pin") { continue; }
	$contents .= "<p>". $value["description"] . "</p>";
}

 ?>


        <div id="colorlib-main">
            <section class="ftco-section bg-light ftco-bread">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-9 ftco-animate">
                            <p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home</a></span> <span>Content</span></p>
                            <h1 class="mb-3 bread"><?=$collectors["pin"]["meta_title_description"]["title"]?></h1>
                            
                            <p>
                                <?=$collectors["pin"]["created_at"]?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ftco-animate">
                            <div style="text-align: center;">
                                <img src="<?=$collectors["pin"]["imageUrl"]?>" alt="" class="img-fluid">
                            </div>
                            <hr>
                            <p>
                                <?=$collectors["pin"]["description"]?>
                            </p>
                            <p>
                                <?=$collectors["pin"]["meta_title_description"]["title"]?>
                            </p>
                            <p>
                                <?=$collectors["pin"]["meta_title_description"]["description"]?>
                            </p>
                            <hr>
                            <p>
                            	<?=$contents?>
                            </p>
                            <?php foreach ($collectors["pin"]["comments"] as $key => $value) { ?>
                                <p>
                                    <?=$value?>
                                </p>
                            <?php } ?>

                            
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section class="ftco-section-2">
                <div class="photograhy">
                    <div class="row no-gutters">

                        <?php  
                        foreach ($collectors["related"] as $key => $value) {
                            if($value["type"]!="pin") { continue; }
                            $title = ($value["title"] != "") ? $value["title"] : $value["domain"];
                            $description = $value["description"];
                            $adres = $value["adres"];
                            ?>
                            
                            <div class="col-md-4 ftco-animate">
                                <a href="<?=$value["image_large_url"]?>" 
                                    class="photography-entry img image-popup d-flex justify-content-center align-items-center" 
                                    style="background-image: url(<?=$value["image_large_url"]?>);"
                                    title="<?=$title?>"
                                    data-description="<?=$description?>"
                                    data-url="/<?=$adres?>"
                                    >
                                    <div class="text text-center" style="width: 100%;">
                                        <h3 style="background-color: #000000b3;width: 100%;"><?=$title?></h3>
                                    </div>
                                </a>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </section>
        </div>