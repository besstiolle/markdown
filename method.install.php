<?php

if (!function_exists("cmsms")) exit;


$this->SetPreference('default_engine',Engine::$PARSDOWN);
//$this->SetPreference('process_smarty_security',true);
$this->SetPreference('process_quote',true);
$this->SetPreference('process_img',true);
$this->SetPreference('process_security',true);
$this->SetPreference('process_codepre',true);


//Register Smarty Plugin
//$this->RegisterModulePlugin(TRUE);
$this->RegisterSmartyPlugin('markdown','modifier','exec_parser', true, 0);


// put mention into the admin log
$this->Audit( 0, 
	      $this->Lang('friendlyname'), 
	      $this->Lang('installed', $this->GetVersion()) );
?>
