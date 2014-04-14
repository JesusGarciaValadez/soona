<<<<<<< HEAD:cache/smarty/compile/64/1f/e2/641fe269c0ac1b4d1e2c4aef766911d91f053d4b.file.blockpermanentlinks-header.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:06
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:396537172531ea44ac7d377-37746216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:13:59
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9087351353485b17eecf45-66267208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/3c/6b/17/3c6b17b80811d8a4ebe8b4006e5aeeebf041aa24.file.blockpermanentlinks-header.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c6b17b80811d8a4ebe8b4006e5aeeebf041aa24' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/64/1f/e2/641fe269c0ac1b4d1e2c4aef766911d91f053d4b.file.blockpermanentlinks-header.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1392270667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '396537172531ea44ac7d377-37746216',
=======
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1394482860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9087351353485b17eecf45-66267208',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/3c/6b/17/3c6b17b80811d8a4ebe8b4006e5aeeebf041aa24.file.blockpermanentlinks-header.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/64/1f/e2/641fe269c0ac1b4d1e2c4aef766911d91f053d4b.file.blockpermanentlinks-header.tpl.php
  'unifunc' => 'content_531ea44acc74b8_90270571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44acc74b8_90270571')) {function content_531ea44acc74b8_90270571($_smarty_tpl) {?>
=======
  'unifunc' => 'content_53485b18038929_49268724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b18038929_49268724')) {function content_53485b18038929_49268724($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/3c/6b/17/3c6b17b80811d8a4ebe8b4006e5aeeebf041aa24.file.blockpermanentlinks-header.tpl.php

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