<?php

include_once(dirname(__FILE__).'/Parsedown/Parsedown.php');

class ParsedownEngine extends Engine{

	public function parsing($text){
		$parser = new Parsedown;
		$text = $parser->text($text);

		return $text;
	}
}
?>
