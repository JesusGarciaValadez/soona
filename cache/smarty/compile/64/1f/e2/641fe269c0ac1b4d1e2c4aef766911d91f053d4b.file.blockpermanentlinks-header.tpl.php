<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:46:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72222146552f948d152b368-02149485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '641fe269c0ac1b4d1e2c4aef766911d91f053d4b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1391113138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72222146552f948d152b368-02149485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f948d1585f20_03143893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f948d1585f20_03143893')) {function content_52f948d1585f20_03143893($_smarty_tpl) {?>

<!-- Block permanent links module HEADER -->
<ul id="header_links">
    <li id="header_link_contact"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
    <li id="header_link_sitemap"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
    
</ul>
<!-- /Block permanent links module HEADER -->

<!-- Start Header Link Mobile Menu -->
<div class="tm_permalinkmenu">
    <div class="tm_permenu_inner"><div class="headertoggle_img">&nbsp;</div></div>
    <ul class="header_links">
        <li class="header_link_contact"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
        <li class="header_link_sitemap"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap');?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
        
    </ul>
</div>
<!-- End Header Link Mobile Menu -->

<script type="text/javascript">
    $( document ).ready( function ( ) {
        
        $( ".tm_permenu_inner" ).click( function( ) {
            
            $( ".header_links" ).toggle( 'slow' );
        } );
    } );
</script><?php }} ?>