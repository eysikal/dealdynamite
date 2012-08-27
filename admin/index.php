<?php
if (!isset($_POST['submit'])) {?>

<form action="index.php" method="post">
    <fieldset>
        Deal Dynamite URL Key:<br />
        <input type="text" name="deal_key" size="50" /><br /><br />
        Affiliate URL:<br />
        <input type="text" name="affiliate_url" size="50" /><br /><br />
        Referral Type:<br />
        <select name="ref_type">
            <option value="0">-select one-</option>
            <option value="1">Refer a Friend</option>
            <option value="2">Commission</option>
            <option value="3">none</option>
        </select><br /><br />
        <input type="submit" name="submit" value="get translated url" />
    </fieldset>
</form>

<?php
} else {
    require_once '../class/Database.php';
    $db = new Database();
    $sql_insert_deal = "INSERT INTO `deal` (`id`, `deal_key`, `affiliate_url`, `ref_type`, `hit`)
                        VALUES ('', 
                                '" . $_POST['deal_key'] . "', 
                                '" . $_POST['affiliate_url'] . "',
                                 " . $_POST['ref_type'] . ", 
                                '')";
    $result = $db->query($sql_insert_deal);
    if($result === true) {
        echo 'Your new URL has been set up.<p><a href="http://www.dealdynamite.com/' . $_POST['deal_key'] . '">www.dealdynamite.com/' . $_POST['deal_key']  . '</a>';
    }

}
