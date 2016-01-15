<?php

if (!function_exists("cmsms")) exit;

switch ($oldversion) {
    case '1.0.0':
        $this->SetPreference('process_content',true);
        $this->AddEventHandler('Core','ContentPreCompile',false);

    default:
        // code...
        break;
}
// put mention into the admin log
$this->Audit( 0,  $this->Lang('friendlyname'),  $this->Lang('upgraded', $this->GetVersion()));


?>