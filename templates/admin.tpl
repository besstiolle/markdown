<style>

.box{
	border:1px solid #000;
	background-color: #CCC;
	padding: 10px;
	border-radius: 5px;
	margin-bottom: 5px; 
}

.boxW{
	padding: 10px;
	margin-bottom: 5px; 
}

.box h2{
	margin-top: 0;
}

.box p{
	margin: 10px 0;
}

.choice{
	color: #666;
	margin-left: 20px;
}
.choice:before{

}

</style>

{$form_save}

<div class='box'>
	<h2>Select the default Engine</h2>
	<label for='{$actionid}default_engine'>Default Engine</label>
	{$itemsEngine}
	<p>Select the default Engine. It will have two major consequence : some of them are more complete and some of them are more fast to process your text. Here my advice</p>
	<ul>
	<li><b>MICHELF :</b> A not-so-fast engine (3.51<exp>[*]</exp>) which has less possibilities than the others</li>
	<li><b>MICHELF EXTRA:</b> A slow engine (4.81<exp>[*]</exp>) which support all the Markdown language + the Github extension</li>
	<li><b>PARSDOWN :</b> A fast engine (0.93<exp>[*]</exp>) which support all the Markdown language + the Github extension</li>
	</ul>
	<p><exp>[*]</exp> : seconde(s) for processing a 2K caracters string 1000 times.</p>
</div>

<div class='box'>
	<h2>Select a Security Policy against Markdown's vulnerabilities</h2>
	<p><b>For Security reason</b>, you can't trust your visitors so you shouldn't process data blindly with this module. If you don't trust the editors, you can activate this option which will try to improve the security of the parsers. It will desactivate Javascript, Iframe and other in the Markdown text. If you activate this option, you should take a look at the next options</p>
	
	<div class='choice'>
	<label for='{$actionid}process_security1'>Active the security</label>
	<input type='radio' name='{$actionid}process_security' id='{$actionid}process_security1' value='1' {if $process_security}checked{/if}>
	<label for='{$actionid}process_security0'>Nope</label>
	<input type='radio' name='{$actionid}process_security' id='{$actionid}process_security0' value='0' {if !$process_security}checked{/if}>
	</div>
	<p>If you've activated the Security Option, it will break some stuff, but don't panic, if you checked these options, everything will be alright. </p>

	<blockquote>
	<p><b>#1</b> : it will fix the &lt;quote/&gt; tag in Markdown</p>
	
	<div class='choice'>
	<label for='{$actionid}process_quote1'>Patch me !</label>
	<input type='radio' name='{$actionid}process_quote' id='{$actionid}process_quote1' value='1' {if $process_quote}checked{/if}>
	<label for='{$actionid}process_quote0'>Nope</label>
	<input type='radio' name='{$actionid}process_quote' id='{$actionid}process_quote0' value='0' {if !$process_quote}checked{/if}>
	</div>


	<p><b>#2</b> : it will fix the &lt;img /&gt; + &lt;a /&gt; tag in Markdown</p>

	<div class='choice'>
	<label for='{$actionid}process_img1'>Patch me !</label>
	<input type='radio' name='{$actionid}process_img' id='{$actionid}process_img1' value='1' {if $process_img}checked{/if}>
	<label for='{$actionid}process_img0'>Nope</label>
	<input type='radio' name='{$actionid}process_img' id='{$actionid}process_img0' value='0' {if !$process_img}checked{/if}>
	</div>


	<p><b>#3</b> : it will fix the &lt;code /&gt; + &lt;pre /&gt; tag and their content in Markdown</p>

	<div class='choice'>
	<label for='{$actionid}process_codepre1'>Patch me !</label>
	<input type='radio' name='{$actionid}process_codepre' id='{$actionid}process_codepre1' value='1' {if $process_codepre}checked{/if}>
	<label for='{$actionid}process_codepre0'>Nope</label>
	<input type='radio' name='{$actionid}process_codepre' id='{$actionid}process_codepre0' value='0' {if !$process_codepre}checked{/if}>
	</div>
</blockquote>
</div>
{*
<div class='box'>
	<h2>Select a Security Policy against Smarty's vulnerabilities</h2>
	<p>Another option <b>for Security : </b>trust me you wouldn't want let untrusted people using Smarty tags in your website... But just in case, if you trust the editors (i won't if i were you) you can disable this option</p>
	
	<div class='choice'>
	<label for='{$actionid}process_smarty1'>Active the security</label>
	<input type='radio' name='{$actionid}process_smarty_security' id='{$actionid}process_smarty_security1' value='1' {if $process_smarty_security}checked{/if}>
	<label for='{$actionid}process_smarty0'>Nope, let me use Smarty Tags inside the Markdown stuff</label>
	<input type='radio' name='{$actionid}process_smarty_security' id='{$actionid}process_smarty_security0' value='0' {if !$process_smarty_security}checked{/if}>
	</div>
</div>
*}


<input type='submit' value='Save'/>

</form>

<div class='boxW'>
{$text}
</div>