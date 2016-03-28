<link rel="stylesheet" href="{root_url}/modules/Parser/lib/css/codemirror.css" />
<link rel="stylesheet" href="{root_url}/modules/Parser/lib/css/uikit.min.css" />
<link rel="stylesheet" href="{root_url}/modules/Parser/lib/css/htmleditor.gradient.min.css" />
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/uikit.min.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/codemirror.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/markdown.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/overlay.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/gfm.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/xml.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/marked.js"></script>
<script type="text/javascript" src="{root_url}/modules/Parser/lib/js/htmleditor.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('textarea.Parser').each(function(){UIkit.htmleditor(this, { markdown:'true'})})
});
</script>
<style>#oe_pagemenu{padding-left:0}#oe_mainarea ul.uk-htmleditor-navbar-nav{list-style: outside none none; margin:0}.CodeMirror-wrap pre{display: block;}</style>
