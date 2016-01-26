Markdown Parser
===============

A wrapper for MARKDOWN's engines for CmsMadeSimple with differents rendering engines.


If it's the first time you play with Markdown, please take a few moment [to read this](http://daringfireball.net/projects/markdown/syntax).


Markdown Parser is include with a WYSIWYG editor, this is for realtime display of the markdown text. It doesn't render or convert to HTML, you will need turn on Automatic Processing of Content Blocks (on the Markdown Parser admin page) or parse the text with the Smarty markdown modifier(see below).


You can call the parser in differents way

```php 
<?php 
  Parser::exec_parser($text);
?> 
```
or you can override the default Markdown Parser Engine

```php 
<?php 
  Parser::exec_parser($text,Engine::$MICHELF_EXTRA);
?> 
```
or in your Smarty templates : 

```smarty
{$untrustedText|markdown}
```

There is also more options available : 
```php 
<?php 
  echo Engine::initInstance(Engine::$PARSDOWN)->process($text, true); 
  // will use PARSDOWN and will produce some debug trace.
?> 
```
We propose 3 differents engine for MarkDown : 

*  [Engine::$MICHELF (v1.5.0)](https://github.com/michelf/php-markdown)
*  [Engine::$MICHELF_EXTRA (v1.5.0)](https://github.com/michelf/php-markdown)
*  [Engine::$PARSDOWN (v1.4)](https://github.com/erusev/parsedown-extra)

Thank you erusev and michelf for your work.