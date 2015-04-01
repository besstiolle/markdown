<?php

if (!function_exists("cmsms")) exit;
if(isset($params['default_engine'])){
	$this->SetPreference('default_engine',$params['default_engine']);
}
if(isset($params['process_smarty_security'])){
	$this->SetPreference('process_smarty_security',$params['process_smarty_security']);
}
if(isset($params['process_quote'])){
	$this->SetPreference('process_quote',$params['process_quote']);
}
if(isset($params['process_img'])){
	$this->SetPreference('process_img',$params['process_img']);
}
if(isset($params['process_security'])){
	$this->SetPreference('process_security',$params['process_security']);
}
if(isset($params['process_codepre'])){
	$this->SetPreference('process_codepre',$params['process_codepre']);
}


$this->redirect($id,'defaultadmin');