<?php

if (!function_exists("cmsms")) exit;


$this->RemovePreference();
$this->RemoveSmartyPlugin();

$pluginManager = cms_module_smarty_plugin_manager::get_instance();
$pluginManager->remove_by_module('Parser');

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));

?>