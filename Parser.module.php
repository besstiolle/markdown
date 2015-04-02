<?php


class Parser extends CMSModule
{   
	function GetName() {return 'Parser';}
	function GetFriendlyName() {return $this->Lang('friendlyname');}
	function GetVersion() {return '1.0.0';}
	function GetDependencies() {return array();}
	function GetHelp() {return $this->Lang('help');}
	function GetAuthor() {return 'Kevin Danezis (aka Bess)';}
	function GetAuthorEmail() {return 'contact at furie point be';}
	function GetChangeLog() {return $this->Lang('changelog');}
	function GetAdminDescription() {return $this->Lang('moddescription');}
	function MinimumCMSVersion() {return "1.11.13";}
	function IsPluginModule() {return false;}
	function HasAdmin() {return true;}
	function GetAdminSection() {return 'extensions';}
	function VisibleToAdminUser() {return true;}
	function InitializeFrontend() {}
	function InitializeAdmin() {}
	function AllowSmartyCaching() {return true;}
	function LazyLoadFrontend() {return true;}
	function LazyLoadAdmin() {return true;}
	function InstallPostMessage() {return $this->Lang('postinstall');}
	function UninstallPostMessage() {return $this->Lang('postuninstall');}
	function UninstallPreMessage() {return $this->Lang('really_uninstall');}
	function DisplayErrorPage($msg) {echo "<h3>".$msg."</h3>";}  
	function CreateStaticRoutes() {}
	function GetParserInstance($engineType = null){
		if(empty($engineType)){
			$engineType = $this->GetPreference('default_engine',Engine::$PARSDOWN);
		}
		return Engine::initInstance($engineType);
	}
	static function exec_parser($text){
		$config = cmsms()->GetConfig();
		include_once($config['root_path'].'/modules/Parser/lib/class.Engine.php');
		return Engine::initInstance()->process($text);
	}
} 
?>
