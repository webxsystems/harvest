<?php
require_once "support/web_browser.php";
require_once "support/tag_filter.php";
require_once "scraped.class.php";

// Retrieve the standard HTML parsing array for later use.
$htmloptions = TagFilter::GetHTMLOptions();

// Retrieve a URL.

$title = array();
$price = array();

$scraped = new scraped();
$scraped->setCity("Los+Angeles");
$scraped->setState("California");
$scraped->setCountry("USA");
$scraped->setAdults(3);
$scraped->setRooms(1);
$lengthOfStay = date("d")+1;

$scraped->setCheckInDate(date("d").date("m").date("Y"));
$scraped->setCheckOutDate($lengthOfStay.date("m").date("Y"));

$uri            =   "https://www.booking.com/searchresults.en-gb.html?";
$paramLabel     =   "label=gen173nr-1FCAEoggJCAlhYSDNiBW5vcmVmcgV1c19jYYgBAZgBLsIBA2FibsgBD9gBAegBAfgBC5ICAXmoAgQ&";
$paramLang      =   "lang=en-gb&sid=498d454b81539d9e14885a30ca816693&sb=1&";
$paramSrc       =   "src=index&";
$paramSrc_elem  =   "src_elem=sb&";
$paramError_url =   "error_url=https%3A%2F%2Fwww.booking.com%2Findex.en-gb.html%3Flabel%3Dgen173nr-1FCAEoggJCAlhYSDNiBW5vcmVmcgV1c19jYYgBAZgBLsIBA2FibsgBD9gBAegBAfgBC5ICAXmoAgQ%3Bsid%3D498d454b81539d9e14885a30ca816693%3Bsb_price_type%3Dtotal%26%3B&";
$paramSs        =   "ss=".$scraped->getCity()."%2C+".$scraped->getState()."%2C+".$scraped->getCountry()."&checkin_monthday=".substr($scraped->getCheckInDate(),0, 2)."&checkin_month=".substr($scraped->getCheckInDate(),2,2)."&checkin_year=".substr($scraped->getCheckInDate(),4,4)."&checkout_monthday=".substr($scraped->getCheckOutDate(),0, 2)."&checkout_month=".substr($scraped->getCheckOutDate(),2, 2)."&checkout_year=".substr($scraped->getCheckOutDate(),4, 4)."&";
$paramSb_Purp   =   "sb_travel_purpose=leisure&";
$paramRoom1     =   "room1=A%2CA&";
$paramNo_Rooms  =   "no_rooms=".$scraped->getRooms()."&";
$paramAdults    =   "group_adults=".$scraped->getAdults()."&";
$paramChildren  =   "group_children=0&";
$paramFromSf    =   "from_sf=1&";
$paramSs_raw    =   "los+angeles&";
$paramAc_pos    =   "ac_position=0&ac_langcode=en&dest_id=20014181&dest_type=city&";
$paramFiller    =   "search_pageview_id=23004b7753980159&search_selected=true&search_pageview_id=23004b7753980159&ac_suggestion_list_length=5&ac_suggestion_theme_list_length=0";

$url = $uri.$paramLabel.$paramLang.$paramSrc.$paramSrc_elem.$paramError_url.$paramSs.$paramSb_Purp.$paramRoom1.$paramNo_Rooms.$paramAdults.$paramChildren.$paramFromSf.$paramSs_raw.$paramAc_pos.$paramFiller;
echo file_get_contents($url);

echo $url;

$web = new WebBrowser();

// Definition:  public function WebBrowser::Process($url, $profile = "auto", $tempoptions = array())
$result = $web->Process($url);

// Check for connectivity and response errors.
if (!$result["success"]) {
    echo "Error retrieving URL.  " . $result["error"] . "\n";
    exit();
}
if ($result["response"]["code"] != 200) {
    echo "Error retrieving URL.  Server returned:  " . $result["response"]["code"] . " " . $result["response"]["meaning"] . "\n";
    exit();
}
$baseurl = $result["url"];

// Use TagFilter to parse the content.x
$html = TagFilter::Explode($result["body"], $htmloptions);

// Retrieve a pointer object to the root node.
$root = $html->Get();

// Find all anchor tags.
$rows = $root->Find("span[class=sr-hotel__name");
$rows2 = $root->Find('span[class=bui-u-sr-only]');


foreach ($rows as $row) {
      //$scraped->setTitle(trim($row->GetInnerHTML()));
      $scraped->addTitle(trim($row->GetInnerHTML()));
      $title[] = $scraped->getTitle();
      //echo trim($row->GetInnerHTML()) . "\n";
}

foreach($rows2 as $row2){
    echo $row2;
    if(stripos($row2, '$')) {
        $sub = trim($row2->GetInnerHTML()) . "\n";
        $pos = stripos($sub, '$');
       // echo substr($sub, $pos);
       // $scraped->setPrice(substr($sub, $pos));
        $scraped->addPrice(substr($sub, $pos));
        $price[] = $scraped->getPrice();
    }
}

//echo "titles : ".count($title);
//echo "rates : ".count($price);

//foreach($title as $k=>$v){
   // $scraped->setTitle($v);
    //$scraped->setPrice(trim($price[$k]));
    echo "<pre>";
    print_r($scraped);
    echo "</pre>";
//}

