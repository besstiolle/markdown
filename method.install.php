<?php

if (!function_exists("cmsms")) exit;


$this->SetPreference('default_engine',Engine::$PARSDOWN);
//$this->SetPreference('process_smarty_security',true);
$this->SetPreference('process_quote',true);
$this->SetPreference('process_img',true);
$this->SetPreference('process_security',true);
$this->SetPreference('process_codepre',true);
$this->SetPreference('process_content',true);


//Register Smarty Plugin
//$this->RegisterModulePlugin(TRUE);

// Disabling this because it doesn't work in 2.x series, registering it on module load instead.
//$this->RegisterSmartyPlugin('markdown','modifier','exec_parser', true, 0);

// add a ContentPreCompile event
$this->AddEventHandler('Core','ContentPreCompile',false);



// put mention into the admin log
$this->Audit( 0, 
	      $this->Lang('friendlyname'), 
	      $this->Lang('installed', $this->GetVersion()) );
?>
