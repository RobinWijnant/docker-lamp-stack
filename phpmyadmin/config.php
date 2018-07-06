<?php
// This config.php is additional to the default config.inc.php
// Settings here override the default config.inc.php

$hiddenDbs = '^(information_schema|mysql|performance_schema|sys)$';

for ($i = 1; isset($hosts[$i - 1]); $i++) {
    $cfg['Servers'][$i]['hide_db'] = $hiddenDbs;
}

?>