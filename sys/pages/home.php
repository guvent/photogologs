<?php 


include $indexpath . "/sys/engine/pinterest.php"; 

$collectors[0] = get_pinlist($keyal, $kelime);
$collectors[1] = get_pinlist($keyal, $kelime);
//$collectors[2] = get_pinlist($keyal, "moda");
//$collectors[3] = get_pinlist($keyal, "moda");
//$collectors[4] = get_pinlist($keyal, "moda");


$collector = [];

foreach ($collectors as $key1 => $value1) {
    foreach ($value1["pano"] as $key2 => $value2) {
        array_push($collector, $value2);
    }
}


 ?>


        <div id="colorlib-main">
            <section class="ftco-section-2">
                <div class="photograhy">
                    <div class="row no-gutters">

                        <?php  
                        foreach ($collector as $key => $value) {
                            $title = ($value["title"] != "") ? $value["title"] : $value["domain"];
                            $description = $value["description"];
                            $adres = $value["adres"];
                        ?>

                            <?php if($gads_enable and ($key == 0 or $key == 12 or $key == 24)) { ?>
                                <div class="col-md-4 ftco-animate">
                                    <?=$adsense1?>
                                </div>
                            <?php } ?>
                            
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