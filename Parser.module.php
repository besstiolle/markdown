<?php


class Parser extends CMSModule
{   
	public function __construct()
    {
        parent::__construct();
        $smarty = CmsApp::get_instance()->GetSmarty();
        if( !$smarty ) return;
        
        $smarty->register_modifier('markdown', array($this, 'exec_parser'));
    }
	function GetName() {return 'Parser';}
	function GetFriendlyName() {return $this->Lang('friendlyname');}
	function GetVersion() {return '1.0.1';}
	function GetDependencies() {return array();}
	function GetHelp() {return $this->Lang('help').Parser::exec_parser(file_get_contents(__DIR__."/README.md"));}
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
	function LazyLoadFrontend() {return false;}
	function LazyLoadAdmin() {return false;}
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
	// AJProg: I think this would be better as Parser::process(), Parser::markdown(), or Parser::parse()
	public static function exec_parser($text,$engineType = null){
		return cmsms()->GetModuleInstance('Parser')->GetParserInstance($engineType)->process($text);
	}
	
	public function HasCapability($capability, $params = array())
    {
        if( $capability == CmsCoreCapabilities::WYSIWYG_MODULE ) return TRUE;
        return FALSE;
    }
 
    public function WYSIWYGGenerateHeader($selector = null,$cssname = null)
    {
        if( !$selector ) $selector = 'textarea.Parser';

		$config = cms_config::get_instance();
		$dirlist = array();
		$dirlist[] = $config['root_path']."/module_custom/".$this->GetName().'/templates';
		$dirlist[] = __DIR__.'/templates';
		$fn = '';
		foreach( $dirlist as $dir ) {
			$fn = "$dir/wysiwyg.tpl";
			if( is_file($fn) ) break;
		}
		$out = str_replace('{root_url}', $config['root_url'], file_get_contents($fn));
		return $out;
    }
} 
?>
