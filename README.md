Markdown Parser
===============

A wrapper for MARKDOWN's engines for CmsMadeSimple with differents rendering engines

If it's the first time you play with Markdown, please take a few moment [to read this](http://daringfireball.net/projects/markdown/syntax)

You can call the parser in differents way

```php 
<?php 
  $parser = ModuleOperations::get_instance()->get_module_instance('Parser');
  echo $parser->GetParserInstance()->process($text);
?> 
```
or

```php 
<?php 
  $config = cmsms()->GetConfig();
  include_once($config['root_path'].'/modules/Parser/lib/class.Engine.php');
  echo Engine::initInstance()->process($text);
?> 
```
or in your Smarty templates : 

```smarty
{$untrustedText|markdown}
```

There is also more options available : 
```php 
<?php 
  $config = cmsms()->GetConfig();
  include_once($config['root_path'].'/modules/Parser/lib/class.Engine.php');
  echo Engine::initInstance(Engine::$PARSDOWN)->process($text, true); 
  // will use PARSDOWN and will produce some debug trace.
?> 
```
We propose 3 differents engine for MarkDown : 

*  [Engine::$MICHELF (v1.5.0)](https://github.com/michelf/php-markdown)
*  [Engine::$MICHELF_EXTRA (v1.5.0)](https://github.com/michelf/php-markdown)
*  [Engine::$PARSDOWN (v1.4)](https://github.com/erusev/parsedown-extra)

Thank you erusev and michelf for your work.