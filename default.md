## Some Examples of the Markdown Result.

Welcome on this little presentation. [You can read the original text here](../modules/Parser/default.md).

Some tips : 

*   The default language is "MarkDown". If it's the first time for you to write in "Markdown" mode, take a few moment [to read this](http://daringfireball.net/projects/markdown/syntax)
*   HTML tags like `<b>bold</b>` or `<a href='#'>links</a>`could be processed by the engine "MarkDown" in a normal case but are disabled in the module MARKDOW by default for security reasons (ex : <script>alert('this javascript shouldn\'t be executed');</script>).
*   It's pretty easy to embedded some code inside the text.. you can do it inline ```php <?php echo "hello world" ?> ``` or with a bloc of code : 

```php 
<?php 
  echo "hello world" 
?> 
```

*   Smarty tags and CmsMadeSimple tags like `{"hello"|capitalize}` or `{News}` are not processed by the engine "MarkDown". It's your job to do it ! 


In fact, the "MarkDown" language is a **editorial language** and not a **programmatic language** (like Smarty is)
 
And finally, here some advice by "Duky", the loyal Duck.

![quack](http://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Grave_eend_maasmuur.jpg/256px-Grave_eend_maasmuur.jpg)

> Quack, quack quack quack...  

> > O' really ?

> > My God !

**The END !**

PS : You can call the parser like this 

```php 
<?php 
  echo $this->GetParserInstance()->process($text);
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

There is also more options : 
```php 
<?php 
  $config = cmsms()->GetConfig();
  include_once($config['root_path'].'/modules/Parser/lib/class.Engine.php');
  echo Engine::initInstance(Engine::$PARSDOWN)->process($text, true); 
  // will use PARSDOWN and will produce some debug trace.
?> 
```
**The END (2) !**