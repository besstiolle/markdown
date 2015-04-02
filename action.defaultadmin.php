<?php
if (!function_exists('cmsms')) exit;

$itemsEngine = array("MICHELF"=>Engine::$MICHELF, "MICHELF_EXTRA"=>Engine::$MICHELF_EXTRA, "PARSDOWN"=>Engine::$PARSDOWN);


$default_engine = $this->GetPreference('default_engine',Engine::$PARSDOWN);
//$process_smarty_security = $this->GetPreference('process_smarty_security',true);
$process_quote = $this->GetPreference('process_quote',true);
$process_img = $this->GetPreference('process_img',true);
$process_security = $this->GetPreference('process_security',true);
$process_codepre = $this->GetPreference('process_codepre',true);

$smarty->assign("itemsEngine", $this->CreateInputDropdown ($id, 'default_engine', $itemsEngine, -1, $default_engine));
//$smarty->assign('process_smarty_security',$process_smarty_security);
$smarty->assign('process_quote',$process_quote);
$smarty->assign('process_img',$process_img);
$smarty->assign('process_security',$process_security);
$smarty->assign('process_codepre',$process_codepre);


$smarty->assign('form_save',$this->CreateFormStart($id,'admin_save'));


$text = file_get_contents(dirname(__FILE__).'/default.md');
//echo $this->GetParserInstance()->process($text, true);
$text = Engine::initInstance()->process($text, true); //Activate debug in admin part
$smarty->assign('text',$text);


echo $this->ProcessTemplate('admin.tpl');

?>