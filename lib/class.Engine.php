<?php


class Engine{


	public static $MICHELF = 1;
	public static $MICHELF_EXTRA = 2;
	public static $PARSDOWN = 3;

	protected static $engine;

	protected static $process_security = false;
	protected static $process_smarty_security = false;
	protected static $process_quote = false;
	protected static $process_img = false;
	protected static $process_codepre = false;



	public static function initInstance($engineType = null){

		if(self::$engine != null){
			return self::$engine;
		}

		$parser = ModuleOperations::get_instance()->get_module_instance('Parser');
		if($engineType == null){
			$engineType = $parser->GetPreference('default_engine',Engine::$PARSDOWN);
		}
		
		self::$process_smarty_security = $parser->GetPreference('process_smarty_security',true);
		self::$process_security = $parser->GetPreference('process_security',true);
		self::$process_quote = $parser->GetPreference('process_quote',true);
		self::$process_img = $parser->GetPreference('process_img',true);
		self::$process_codepre = $parser->GetPreference('process_codepre',true);
		

		if(Engine::$MICHELF == $engineType) {
			include_once(dirname(__FILE__).'/Engines/class.MichelfEngine.php');
			self::$engine = new MichelfEngine();
		
		} else if(Engine::$MICHELF_EXTRA == $engineType) {
			include_once(dirname(__FILE__).'/Engines/class.MichelfExtraEngine.php');
			self::$engine = new MichelfExtraEngine();
		
		} else if(Engine::$PARSDOWN == $engineType) {
			include_once(dirname(__FILE__).'/Engines/class.ParsedownEngine.php');
			self::$engine = new ParsedownEngine();
		} 

		return self::$engine;

	}

	protected function __construct(){
	}

	public function process($text, $debug = false){

		$start = microtime(true);

		// Main security entry
		if(self::$process_security){
			$text = htmlentities($text);
		}

		//Will replace > > > into  tab tab tab
		if(self::$process_quote){
			$text = self::fixQuoteBloc($text);
		}

		//Will fix ! symbol for img/link
		if(self::$process_img){
			$text = self::fixImageUrl($text);
		}		

		$startP = microtime(true);
		$text = self::$engine->parsing($text);
		$endP = microtime(true);

		//Will fix HTML symbol inside <code> & <pre>
		if(self::$process_codepre){
			$text = self::fixCodePreBloc($text);
		}

		//Will enable SMARTY tags
		/*if(self::$process_smarty_security){
			$text = self::fixSmarty($text);
		}*/
		
		$end = microtime(true);
		

		if($debug){
			$text .= "<h1> DEBUG : Time of execution : ".round(($end-$start) * 1000,2)."ms (".round(($endP-$startP) * 1000,2)."ms for parsing)</h1>";
		}

		return $text;
	}

	protected static function fixQuoteBloc($text){
		// blocquote
		$search = array('`\n ?&gt; &gt; &gt; &gt; &gt; &gt; `','`\n ?&gt; &gt; &gt; &gt; &gt; `','`\n ?&gt; &gt; &gt; &gt; `','`\n ?&gt; &gt; &gt; `','`\n ?&gt; &gt; `','`\n ?&gt; `');
		$replace = array('> > > > > >', '> > > > > ','> > > > ','> > > ','> > ','> ');
		$text = preg_replace($search, $replace, $text);
		$search = array('`^ ?&gt; &gt; &gt; &gt; &gt; &gt; `','`^ ?&gt; &gt; &gt; &gt; &gt; `','`^ ?&gt; &gt; &gt; &gt; `','`^ ?&gt; &gt; &gt; `','`^ ?&gt; &gt; `','`^ ?&gt; `');
		$text = preg_replace($search, $replace, $text);

		//$search = array("# ?(&gt; )?(&gt; )?(&gt; )?(&gt; )?(&gt; )?#msi");  // #2 -> 5 level of quote
		// $search = array("# ?(&gt; )?(&gt; )?(&gt; )?(&gt; )?(&gt; )?#msi");  // #2 -> 5 level of quote
		// $replace = array('>');
		// $text = preg_replace($search, $replace, $text);
		return $text;
	}

	/*protected static function fixSmarty($text){
		//Transform smarty tags
		$search = array('{root_url}'); 
		$replace = array(self::$config['root_url']); 
		$text = str_replace($search, $replace, $text);
		return $text;
	}*/

	protected static function fixImageUrl($text){
		//Transform specific tags
		$search = array('&#33;'); 
		$replace = array('!'); 
		$text = str_replace($search, $replace, $text);
		return $text;
	}


	protected static function fixCodePreBloc($text){
		//Fix inline/bloc <code></code> and <code class='xxx'></code> by decoding HTML entity
		$patternS = '`<code(?:[^>]*)>([^<]*)<\/code>`i';
		preg_match_all( $patternS, $text, $matches, PREG_SET_ORDER);
		$search = array();
		$replace = array();
		foreach($matches as $match) {
			$search[] = $match[0];
			$replace[] = html_entity_decode($match[0]);
		}
		$text = str_replace($search,$replace,$text);
		return $text;
	}
}
?>
