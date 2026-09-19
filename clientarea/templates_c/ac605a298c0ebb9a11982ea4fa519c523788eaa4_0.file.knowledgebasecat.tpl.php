<?php
/* Smarty version 3.1.36, created on 2022-12-05 14:20:55
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/knowledgebasecat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_638dfe47029d82_48764801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac605a298c0ebb9a11982ea4fa519c523788eaa4' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/knowledgebasecat.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638dfe47029d82_48764801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/sites/9a/b/b8e4fafe72/public_html/clientarea/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<form role="form" method="post" action="<?php echo routePath('knowledgebase-search');?>
">
    <div class="input-group input-group-lg kb-search">
        <input type="text"  id="inputKnowledgebaseSearch" name="search" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientHomeSearchKb'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['searchterm']->value;?>
" />
        <span class="input-group-btn">
            <input type="submit" id="btnKnowledgebaseSearch" class="btn btn-primary btn-input-padded-responsive" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['search'];?>
" />
        </span>
    </div>
</form>

<?php if ($_smarty_tpl->tpl_vars['kbcats']->value) {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasecategories'];?>
</h2>

    <div class="row kbcategories">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kbcats']->value, 'kbcat', false, NULL, 'kbasecats', array (
));
$_smarty_tpl->tpl_vars['kbcat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kbcat']->value) {
$_smarty_tpl->tpl_vars['kbcat']->do_else = false;
?>
            <div class="col-sm-4">
                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['kbcat']->value['id'];
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kbcat']->value['urlfriendlyname'];
$_prefixVariable2 = ob_get_clean();
echo routePath('knowledgebase-category-view',$_prefixVariable1,$_prefixVariable2);?>
">
                    <span class="glyphicon glyphicon-folder-close"></span> <?php echo $_smarty_tpl->tpl_vars['kbcat']->value['name'];?>
 <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['kbcat']->value['numarticles'];?>
</span>
                </a>
                <?php if ($_smarty_tpl->tpl_vars['kbcat']->value['editLink']) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['kbcat']->value['editLink'];?>
" class="admin-inline-edit">
                        <i class="fas fa-pencil-alt fa-fw"></i>
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['edit'];?>

                    </a>
                <?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['kbcat']->value['description'];?>
</p>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['kbarticles']->value || !$_smarty_tpl->tpl_vars['kbcats']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['tag']->value) {?>
        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['kbviewingarticlestagged'];?>
 '<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
'</h2>
    <?php } else { ?>
        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasearticles'];?>
</h2>
    <?php }?>

    <div class="kbarticles">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kbarticles']->value, 'kbarticle');
$_smarty_tpl->tpl_vars['kbarticle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kbarticle']->value) {
$_smarty_tpl->tpl_vars['kbarticle']->do_else = false;
?>
            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['kbarticle']->value['id'];
$_prefixVariable3 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kbarticle']->value['urlfriendlytitle'];
$_prefixVariable4 = ob_get_clean();
echo routePath('knowledgebase-article-view',$_prefixVariable3,$_prefixVariable4);?>
">
                <span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['title'];?>

            </a>
            <?php if ($_smarty_tpl->tpl_vars['kbarticle']->value['editLink']) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['editLink'];?>
" class="admin-inline-edit">
                    <i class="fas fa-pencil-alt fa-fw"></i>
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['edit'];?>

                </a>
            <?php }?>
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['kbarticle']->value['article'],100,"...");?>
</p>
        <?php
}
if ($_smarty_tpl->tpl_vars['kbarticle']->do_else) {
?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['knowledgebasenoarticles'],'textcenter'=>true), 0, true);
?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }
}
}
