<?php
/* Smarty version 3.1.36, created on 2023-10-07 22:18:05
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/markdown-guide.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6521cb0d2e4577_81121022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbffb91f8dbc151c6b2062d000d2b7751a9076e3' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/markdown-guide.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6521cb0d2e4577_81121022 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.emphasis'),$_smarty_tpl ) );?>
</h4>
        <pre>
**<strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.bold'),$_smarty_tpl ) );?>
</strong>**
*<em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.italics'),$_smarty_tpl ) );?>
</em>*</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.headers'),$_smarty_tpl ) );?>
</h4>
        <pre>
# <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.bigHeader'),$_smarty_tpl ) );?>

## <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.mediumHeader'),$_smarty_tpl ) );?>

### <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.smallHeader'),$_smarty_tpl ) );?>

#### <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.tinyHeader'),$_smarty_tpl ) );?>
</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.lists'),$_smarty_tpl ) );?>
</h4>
        <pre>
* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.genericListItem'),$_smarty_tpl ) );?>

* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.genericListItem'),$_smarty_tpl ) );?>

* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.genericListItem'),$_smarty_tpl ) );?>


1. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.numberedListItem'),$_smarty_tpl ) );?>

2. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.numberedListItem'),$_smarty_tpl ) );?>

3. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.numberedListItem'),$_smarty_tpl ) );?>
</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.links'),$_smarty_tpl ) );?>
</h4>
        <pre>[<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.textToDisplay'),$_smarty_tpl ) );?>
](<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.exampleLink'),$_smarty_tpl ) );?>
)</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.quotes'),$_smarty_tpl ) );?>
</h4>
        <pre>
> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.thisIsAQuote'),$_smarty_tpl ) );?>

> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.quoteMultipleLines'),$_smarty_tpl ) );?>
</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.tables'),$_smarty_tpl ) );?>
</h4>
        <pre>
| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnOne'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnTwo'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnThree'),$_smarty_tpl ) );?>
 |
| -------- | -------- | -------- |
| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.john'),$_smarty_tpl ) );?>
     | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.doe'),$_smarty_tpl ) );?>
      | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.male'),$_smarty_tpl ) );?>
     |
| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.mary'),$_smarty_tpl ) );?>
     | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.smith'),$_smarty_tpl ) );?>
    | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.female'),$_smarty_tpl ) );?>
   |

<em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.withoutAligning'),$_smarty_tpl ) );?>
</em>

| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnOne'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnTwo'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.columnThree'),$_smarty_tpl ) );?>
 |
| -------- | -------- | -------- |
| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.john'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.doe'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.male'),$_smarty_tpl ) );?>
 |
| <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.mary'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.smith'),$_smarty_tpl ) );?>
 | <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.female'),$_smarty_tpl ) );?>
 |</pre>

        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.displayingCode'),$_smarty_tpl ) );?>
</h4>
        <pre>
`var example = "hello!";`

<em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'markdown.spanningMultipleLines'),$_smarty_tpl ) );?>
</em>

```
var example = "hello!";
alert(example);
```</pre>
    </div>
</div>
<?php }
}
