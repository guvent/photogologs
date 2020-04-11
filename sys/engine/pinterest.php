<?php 

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


function get_pinlist($token, $kelime)
{
    $collector = [];

    $url1 = 'https://api.pinterest.com/v3/search/pins/?join=via_pinner,board,pinner,pin.title,pinner.count,pinner.follow&page_size=40&query='.$kelime.'&access_token='.$token;

    // create curl resource
    $ch1 = curl_init();

    // set options
    curl_setopt($ch1, CURLOPT_URL, $url1);
    //curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); // read more about HTTPS http://stackoverflow.com/questions/31162706/how-to-scrape-a-ssl-or-https-url/31164409#31164409
    curl_setopt($ch1, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    $output1 = curl_exec($ch1);

    // close curl resource to free up system resources
    curl_close($ch1);

    //echo $output;
    // var_dump($output);
    $obj1 = json_decode($output1, true, 512, JSON_BIGINT_AS_STRING);

    $post= $obj1['data'];
    shuffle($post);
    $title1 = $kelime;
    //var_dump($post);
    // echo $title1;


    $urlx = "https://api.pinterest.com/v3/search/autocomplete/?num_autocompletes=20&q=".$kelime."&base_scheme=https&num_people=0&access_token=".$token;

    $chx = curl_init();

    // set options
    curl_setopt($chx, CURLOPT_URL, $urlx);
    curl_setopt($chx, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chx, CURLOPT_SSL_VERIFYPEER, false); // read more about HTTPS http://stackoverflow.com/questions/31162706/how-to-scrape-a-ssl-or-https-url/31164409#31164409
    curl_setopt($chx, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $output = curl_exec($chx);

    curl_close($chx);

    $objx = json_decode($output, true, 512, JSON_BIGINT_AS_STRING);
    $objx1=$objx['data'];
    $kelimeler = [];

    $dizisaysana = count($objx1);

    for ($i=20;$i>=0;$i--) {
        if ($objx1[$i]['query'] != ""){
            $new = array_push($kelimeler, $objx1[$i]['query']);
        }
    }
    $str = implode (", ", $kelimeler);  // html meta keywords ...

    $collector["keywords"] = $str;

    $collector["pano"] = [];

    for($i=0; $i<count($post); $i++){
        if($i<=30) {
            $collector["pano"][$i]["image_medium_url"] = $post[$i]['image_medium_url'];
            $collector["pano"][$i]["image_large_url"] = $post[$i]['image_large_url'];
            $collector["pano"][$i]["title"] = $post[$i]['title'];
            $collector["pano"][$i]["description"] = $post[$i]['description'];
            $collector["pano"][$i]["tracked_link"] = $post[$i]['tracked_link'];
            $collector["pano"][$i]["link"] = $post[$i]['link'];
            $collector["pano"][$i]["image_large_size_points"] = $post[$i]['image_large_size_points'];
            $collector["pano"][$i]["image_medium_size_points"] = $post[$i]['image_medium_size_points'];
            $collector["pano"][$i]["domain"] = $post[$i]['domain'];
            $collector["pano"][$i]["type"] = $post[$i]['type'];
            $collector["pano"][$i]["repin_count"] = $post[$i]['repin_count'];
            $collector["pano"][$i]["comment_count"] = $post[$i]['comment_count'];
            $collector["pano"][$i]["is_repin"] = $post[$i]['is_repin'];
            $collector["pano"][$i]["is_video"] = $post[$i]['is_video'];
            $collector["pano"][$i]["is_playable"] = $post[$i]['is_playable'];
            $collector["pano"][$i]["attribution"] = $post[$i]['attribution'];
            $collector["pano"][$i]["id"] = $post[$i]['id'];
            $collector["pano"][$i]["adres"] = 'content/'.$post[$i]['id'].'.html';
        }
    }

    return $collector;
}

function get_pin($token, $metin)
{
    $collector = [];

    $url = 'https://api.pinterest.com/v3/pins/'.$metin.'/?access_token='.$token;

    // create curl resource
    $ch = curl_init();

    // set options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // read more about HTTPS http://stackoverflow.com/questions/31162706/how-to-scrape-a-ssl-or-https-url/31164409#31164409
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);

    //echo $output;

    $obj = json_decode($output, true, 512, JSON_BIGINT_AS_STRING);

    //var_dump($obj);

    $collector["pin"]["grid_title"] = $obj['data']['grid_title'];
    $collector["pin"]["description"] = $obj['data']['description'];
    $collector["pin"]["comments"] = $obj['data']['comments'];
    $collector["pin"]["comment_count"] = $obj['data']['comment_count'];
    $collector["pin"]["imageUrl"] = $obj['data']['image_large_url'];
    $collector["pin"]["shareable_url"] = $obj['data']['shareable_url'];
    $collector["pin"]["hashtags"] = $obj['data']['hashtags'];
    $collector["pin"]["closeup_user_note"] = $obj['data']['closeup_user_note'];
    $collector["pin"]["id"] = $obj['data']['id'];
    $collector["pin"]["adres"] = 'content/'.$obj['data']['id'].'.html';


    $collector["pin"]["meta_title_description"]["title"] = $obj['data']['meta_title_description']['title'];
    $collector["pin"]["meta_title_description"]["description"] = $obj['data']['meta_title_description']['description'];
    $created_at1=$obj['data']['created_at'];
    $collector["pin"]["created_at"] = substr($created_at1, 0, 16);

    // bu ikinci sorgu

    $url2 = 'https://api.pinterest.com/v3/pins/'.$metin.'/related/pin/?join=pin.description&page_size=20&query='.$metin.'&access_token='.$token;
    $ch2 = curl_init();

    // set options
    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false); // read more about HTTPS http://stackoverflow.com/questions/31162706/how-to-scrape-a-ssl-or-https-url/31164409#31164409
    curl_setopt($ch2, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    $output2 = curl_exec($ch2);

    // close curl resource to free up system resources
    curl_close($ch2);

    $obj2 = json_decode($output2, true, 512, JSON_BIGINT_AS_STRING);

    $collector["status"] = $obj2["status"];
    //$collector["related"] = $obj2["data"];

    $related = $obj2["data"];

    foreach ($related as $key2 => $value2) {
        $value2["adres"] = "content/".$value2["id"].".html";
        $collector["related"][$key2] = $value2;  
    }

    return $collector;
}




$keyFile = __DIR__ . "/keyler.txt";

$keyArray = file($keyFile, FILE_IGNORE_NEW_LINES);

$randIndex = array_rand($keyArray);

$keyal = $keyArray[$randIndex];




//get_pinpics($keyal, "moda");


?>