<?php
/**
 * Created by PhpStorm.
 * User: goldenboy
 * Date: 10/31/2019
 * Time: 5:35 AM
 */


require_once __DIR__ . '\vendor\autoload.php';

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once "scraped.class.php";

//
//$uri            =   "https://www.booking.com/searchresults.en-gb.html?";
//$paramLabel     =   "label=gen173nr-1FCAEoggJCAlhYSDNiBW5vcmVmcgV1c19jYYgBAZgBLsIBA2FibsgBD9gBAegBAfgBC5ICAXmoAgQ&";
//$paramLang      =   "lang=en-gb&sid=498d454b81539d9e14885a30ca816693&sb=1&";
//$paramSrc       =   "src=index&";
//$paramSrc_elem  =   "src_elem=sb&";
//$paramError_url =   "error_url=https%3A%2F%2Fwww.booking.com%2Findex.en-gb.html%3Flabel%3Dgen173nr-1FCAEoggJCAlhYSDNiBW5vcmVmcgV1c19jYYgBAZgBLsIBA2FibsgBD9gBAegBAfgBC5ICAXmoAgQ%3Bsid%3D498d454b81539d9e14885a30ca816693%3Bsb_price_type%3Dtotal%26%3B&";
//$paramSs        =   "ss=".$scraped->getCity()."%2C+".$scraped->getState()."%2C+".$scraped->getCountry()."&checkin_monthday=".substr($scraped->getCheckInDate(),0, 2)."&checkin_month=".substr($scraped->getCheckInDate(),2,2)."&checkin_year=".substr($scraped->getCheckInDate(),4,4)."&checkout_monthday=".substr($scraped->getCheckOutDate(),0, 2)."&checkout_month=".substr($scraped->getCheckOutDate(),2, 2)."&checkout_year=".substr($scraped->getCheckOutDate(),4, 4)."&";
//$paramSb_Purp   =   "sb_travel_purpose=leisure&";
//$paramRoom1     =   "room1=A%2CA&";
//$paramNo_Rooms  =   "no_rooms=".$scraped->getRooms()."&";
//$paramAdults    =   "group_adults=".$scraped->getAdults()."&";
//$paramChildren  =   "group_children=0&";
//$paramFromSf    =   "from_sf=1&";
//$paramSs_raw    =   "los+angeles&";
//$paramAc_pos    =   "ac_position=0&ac_langcode=en&dest_id=20014181&dest_type=city&";
//$paramFiller    =   "search_pageview_id=23004b7753980159&search_selected=true&search_pageview_id=23004b7753980159&ac_suggestion_list_length=5&ac_suggestion_theme_list_length=0";

//$url = $uri.$paramLabel.$paramLang.$paramSrc.$paramSrc_elem.$paramError_url.$paramSs.$paramSb_Purp.$paramRoom1.$paramNo_Rooms.$paramAdults.$paramChildren.$paramFromSf.$paramSs_raw.$paramAc_pos.$paramFiller;

$url = "https://www.booking.com/searchresults.en-gb.html?label=gen173nr-1FCAEoggI46AdIM1gEaIkCiAEBmAEJuAEXyAEM2AEB6AEB-AELiAIBqAIDuAL9p4nvBcACAQ&lang=en-gb&sid=4c0c7eac5f595794a64d412cc14b7d73&sb=1&src=index&src_elem=sb&error_url=https%3A%2F%2Fwww.booking.com%2Findex.en-gb.html%3Flabel%3Dgen173nr-1FCAEoggI46AdIM1gEaIkCiAEBmAEJuAEXyAEM2AEB6AEB-AELiAIBqAIDuAL9p4nvBcACAQ%3Bsid%3D4c0c7eac5f595794a64d412cc14b7d73%3Bsb_price_type%3Dtotal%26%3B&ss=1+room+rentals+in+Los+Angeles&is_ski_area=0&checkin_year=2019&checkin_month=12&checkin_monthday=1&checkout_year=2019&checkout_month=12&checkout_monthday=2&group_adults=1&group_children=0&no_rooms=1&b_h4u_keep_filters=&from_sf=1&ss_raw=1+room+rentals+in+Los+Angeles&search_pageview_id=0222517ef225004e";


$client = new Client();
$crawler = $client->request('GET', $url);

foreach($crawler as $domElement){
    var_dump($domElement->nodeName);

}

//print_r($crawler);

$goutteClient = new Client();
$guzzleClient = new GuzzleClient();
$goutteClient->setClient($guzzleClient);
$crawler2 = $goutteClient->request('GET', $url);

print_r($crawler2);
