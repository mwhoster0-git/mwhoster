<?php
/* Smarty version 3.1.36, created on 2022-11-05 15:59:06
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/knowledgebase.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6366884aeef930_36576958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1413158d1605594f857ee22998dae144fe4803f8' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/knowledgebase.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6366884aeef930_36576958 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/sites/9a/b/b8e4fafe72/public_html/clientarea/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<form role="form" method="post" action="<?php echo routePath('knowledgebase-search');?>
">
    <div class="input-group input-group-lg kb-search">
        <input type="text" id="inputKnowledgebaseSearch" name="search" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientHomeSearchKb'];?>
" />
        <span class="input-group-btn">
            <input type="submit" id="btnKnowledgebaseSearch" class="btn btn-primary btn-input-padded-responsive" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['search'];?>
" />
        </span>
    </div>
</form>

<h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasecategories'];?>
</h2>

<?php if ($_smarty_tpl->tpl_vars['kbcats']->value) {?>
    <div class="row kbcategories">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kbcats']->value, 'kbcat', false, NULL, 'kbcats', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['kbcat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kbcat']->value) {
$_smarty_tpl->tpl_vars['kbcat']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_kbcats']->value['iteration']++;
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
                    <i class="far fa-folder-open"></i>
                    <?php echo $_smarty_tpl->tpl_vars['kbcat']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['kbcat']->value['numarticles'];?>
)
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
            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_kbcats']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_kbcats']->value['iteration'] : null) % 3 == 0) {?>
                </div><div class="row kbcategories">
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['knowledgebasenoarticles'],'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['kbmostviews']->value) {?>

    <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasepopular'];?>
</h2>

    <div class="kbarticles">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kbmostviews']->value, 'kbarticle');
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

<?php }
}
}
