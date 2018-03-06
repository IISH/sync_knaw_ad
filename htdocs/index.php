<?php
require_once "classes/start.inc.php";

// check cron_key
checkCronKey();
?>

<h1>Sync KNAW Active Directory</h1>

<a href="import.php?cron_key=<?php echo Settings::get('cron_key'); ?>">Start import</a>
