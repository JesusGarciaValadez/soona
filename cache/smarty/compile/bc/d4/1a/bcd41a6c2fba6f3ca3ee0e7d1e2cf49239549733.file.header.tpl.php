<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:47:01
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157983884152f948d52f34e8-87218313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcd41a6c2fba6f3ca3ee0e7d1e2cf49239549733' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/header.tpl',
      1 => 1392061664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157983884152f948d52f34e8-87218313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_language' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'content_dir' => 0,
    'base_uri' => 0,
    'static_token' => 0,
    'token' => 0,
    'priceDisplayPrecision' => 0,
    'currency' => 0,
    'priceDisplay' => 0,
    'roundMode' => 0,
    'css_dir' => 0,
    'js_dir' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_TOP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f948d5522e76_10315157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f948d5522e76_10315157')) {function content_52f948d5522e76_10315157($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"> <![endif]-->
<!--[if IE 7]><html class="no-js ie7" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><!--<![endif]-->
    <head>
        <title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>
        <?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value){?>
        <meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'html', 'UTF-8');?>
" />
        <?php }?>
        
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
        <meta http-equiv="content-language" content="<?php echo $_smarty_tpl->tpl_vars['meta_language']->value;?>
" />
        <meta name="HandheldFriendly" content="True"/><!-- Palm -->
        <meta name="MobileOptimized" content="320"/><!-- Windows -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /><!-- Safari, Android, BB, Opera -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        
        <meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value){?>no<?php }?>follow" /><!-- robots -->
        <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
        <script type="text/javascript">
            var baseDir = '<?php echo addslashes($_smarty_tpl->tpl_vars['content_dir']->value);?>
';
            var baseUri = '<?php echo addslashes($_smarty_tpl->tpl_vars['base_uri']->value);?>
';
            var static_token = '<?php echo addslashes($_smarty_tpl->tpl_vars['static_token']->value);?>
';
            var token = '<?php echo addslashes($_smarty_tpl->tpl_vars['token']->value);?>
';
            var priceDisplayPrecision = <?php echo $_smarty_tpl->tpl_vars['priceDisplayPrecision']->value*$_smarty_tpl->tpl_vars['currency']->value->decimals;?>
;
            var priceDisplayMethod = <?php echo $_smarty_tpl->tpl_vars['priceDisplay']->value;?>
;
            var roundMode = <?php echo $_smarty_tpl->tpl_vars['roundMode']->value;?>
;
        </script>

        
        <!-- ================ Additional Links By Tempaltemela : START  ============= -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
megnor/custom.css" />
        <!--[if lt IE 9]><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/html5.js"></script><![endif]-->
        <!-- ================ Additional Links By Tempaltemela : END  ============= -->
        
<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
    <?php } ?>
<?php }?>
        
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>

        <!-- ================ By Tempaltemela : START  ============= -->
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/megnor.min.js"></script>
    <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'||$_smarty_tpl->tpl_vars['page_name']->value=='category'||$_smarty_tpl->tpl_vars['page_name']->value=='product'||$_smarty_tpl->tpl_vars['page_name']->value=='order'||$_smarty_tpl->tpl_vars['page_name']->value=='order-opc'){?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/carousel.min.js"></script>
    <?php }?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/custom.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/jquery.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/scrolltop.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/jquery.formalize.min.js"></script> 
        <!--[if lt IE 9]><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
megnor/respond.min.js"></script><![endif]-->
        <!-- ================ By Tempaltemela : END  ============= -->  
    </head>
    <body <?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)){?>id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['page_name']->value, 'htmlall', 'UTF-8');?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value){?>hide-left-column <?php }?> <?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value){?>hide-right-column <?php }?> <?php if ($_smarty_tpl->tpl_vars['content_only']->value){?> content_only <?php }?>">
    <?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
        <?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value){?>
        <div id="restricted-country">
            <p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['geolocation_country']->value;?>
</span></p>
        </div>
        <?php }?>
        <div id="page" class="clearfix<?php if ($_smarty_tpl->tpl_vars['page_name']->value!=='index'&&$_smarty_tpl->tpl_vars['page_name']->value!==''){?> internal<?php }?>">
            <!-- Header -->
            <header id="header" class="alpha omega">
                <div class="header_container">
                    <div class="header-container-inner">
                        <div id="header_left">
                            <a id="header_logo" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['shop_name']->value, 'htmlall', 'UTF-8');?>
">
                                <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['shop_name']->value, 'htmlall', 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['logo_image_width']->value){?>width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['logo_image_height']->value){?>height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
" <?php }?> />
                            </a>
                        </div>  
                        <div id="header_right" class="grid_9 omega">
                            <?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>

                        </div>
                    </div>
                </div>
            </header>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'TemplateMelaSlider'),$_smarty_tpl);?>

        </div>
        <div id="columns" class="alpha omega clearfix<?php if ($_smarty_tpl->tpl_vars['page_name']->value!=='index'&&$_smarty_tpl->tpl_vars['page_name']->value!==''){?> internal<?php }?>">
            <div class="columns_inner">
                <section id="center_column_inner" class="clearfix" role="main"><!-- Center -->
                    <div id="center_column" class=" grid_5">
    <?php }?>
<?php }} ?>