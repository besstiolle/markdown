<?php

if (!function_exists("cmsms")) exit;


$this->SetPreference('default_engine',Engine::$PARSDOWN);
//$this->SetPreference('process_smarty_security',true);
$this->SetPreference('process_quote',true);
$this->SetPreference('process_img',true);
$this->SetPreference('process_security',true);
$this->SetPreference('process_codepre',true);


//Register Smarty Plugin
$pluginManager = cms_module_smarty_plugin_manager::get_instance();
$pluginManager->addStatic('Parser', 'markdown', 'modifier', 'exec_parser' , TRUE, $pluginManager::AVAIL_FRONTEND);

// put mention into the admin log
$this->Audit( 0, 
	      $this->Lang('friendlyname'), 
	      $this->Lang('installed', $this->GetVersion()) );
?>
