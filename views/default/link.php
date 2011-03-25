<?php
$rel = $vars['rel'];
$type = $vars['type'];
$href = $vars['href'];

echo <<<LINKTAG
<link href="$href" rel="$rel" type="$type" />
LINKTAG;
