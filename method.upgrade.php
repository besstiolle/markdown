<?php

if (!function_exists("cmsms")) exit;


// put mention into the admin log
$this->Audit( 0,  $this->Lang('friendlyname'),  $this->Lang('upgraded', $this->GetVersion()));


?>