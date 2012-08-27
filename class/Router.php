<?php
class Router {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    public function route($dealRequest, $refUrl, $userIp) {
        $cityDealsUrl = $this->_getCityDealsUrl($dealRequest);
        $dealId = $cityDealsUrl['deal_id'];
        $cityDealsUrl = $cityDealsUrl['dest_url'];
        if (!empty($cityDealsUrl)) {
            $this->_incrementHitCounter($dealRequest, $dealId, $refUrl, $userIp);
            header('Location: ' . $cityDealsUrl); // Go to linked deal
        } else { // No deal, so go back to home page
            header('Location: http://www.dealdynamite.com/');
        } 
    }

    private function _getCityDealsUrl($dealRequest) {
        if ($dealRequest == 'test') {
            echo '<pre>';
            print_r($_SERVER);
            echo '</pre>';
            exit();
        } 

        // Attempt to pull matching CityDeals deal URL + ref_id from DB
        $sqlSelectDealUrl = "SELECT d.id, d.citydeals_url, rc.code
                             FROM deal d
                             INNER JOIN referral_code rc ON rc.id = d.ref_type
                             WHERE d.deal_key = '" . $dealRequest . "'";
        $dealRow = $this->_db->fetch_single($sqlSelectDealUrl);
        return array('deal_id'  => $dealRow['id'],
                     'dest_url' => $dealRow['citydeals_url'] . $dealRow['code'],);        
    }

    private function _incrementHitCounter($dealRequest, $dealId, $refUrl, $userIp) {
        $sqlUpdateHitTbl = sprintf("INSERT INTO hit
                                    (deal_id, ref_url, ip, timestamp)
                                    VALUES
                                    (%d, '%s', '%s', now())",
                                  $dealId, 
                                  $refUrl,
                                  $userIp);
        mysql_query($sqlUpdateHitTbl);
    } 

}
