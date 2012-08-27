<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/dealdynamite');

require_once 'class/Instantiator.php';
$db = Instantiator::makeDatabase();

$sql_get_deal_ids = 'SELECT DISTINCT deal_id
                     FROM hit;';
$deal_id_list = $db->fetchAll($sql_get_deal_ids);
if (!$deal_id_list) die('failed retreiving list of deal ids');

foreach ($deal_id_list as $deal_id) {
    $sql_get_hit_count = sprintf("SELECT count(1)
                                  FROM hit
                                  WHERE deal_id = %d;",
                                 $deal_id['deal_id']);
    $hit_count = $db->fetch_single($sql_get_hit_count);
    
    $sql_update_hit_count = sprintf("UPDATE deal
                                     SET hit = %d
                                     WHERE id = %d;",
                                    $hit_count['count(1)'],
                                    $deal_id['deal_id']);
    $db->query($sql_update_hit_count);
}
