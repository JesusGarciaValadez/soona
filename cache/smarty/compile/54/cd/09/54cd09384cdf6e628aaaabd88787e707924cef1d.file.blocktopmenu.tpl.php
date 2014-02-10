<?php /* Smarty version Smarty-3.1.14, created on 2014-02-07 14:45:34
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169394052752f545ee23a830-22591736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54cd09384cdf6e628aaaabd88787e707924cef1d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1391019377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169394052752f545ee23a830-22591736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'MENU_SEARCH' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f545ee2593d6_69530226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f545ee2593d6_69530226')) {function content_52f545ee2593d6_69530226($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>        </div>
    </div>
<?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
    <!-- Menu -->
    <div class="sf-contener nav-container clearfix">
        <ul id="main_menu" class="sf-menu clearfix">
            <?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

            <?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value){?>
                <li class="sf-search noBack" style="float:right">
                    <form id="searchbox" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" method="get">
                        <p>
                            <input type="hidden" name="controller" value="search" />
                            <input type="hidden" value="position" name="orderby"/>
                            <input type="hidden" value="desc" name="orderway"/>
                            <input type="text" name="search_query" value="<?php if (isset($_GET['search_query'])){?><?php echo smarty_modifier_escape($_GET['search_query'], 'htmlall', 'UTF-8');?>
<?php }?>" />
                        </p>
                    </form>
                </li>
            <?php }?>
        </ul>
    </div>
    <div class="sf-right">&nbsp;</div>
    
    <script type="text/javascript">
        $( document ).ready( function( ) {
            $( ".nav-button" ).click( function () {
                $( ".primary-nav" ).toggleClass( "open" );
            });
        });
    </script>
    
    <!-- Mobile Menu -->
    <div class="nav-container-mobile">
        <div class="nav-button main-but">
            <div class="sf-menu-top">
            <div class="tm_mobilemenu_text"><?php echo smartyTranslate(array('s'=>'Menu'),$_smarty_tpl);?>
</div>
            <div class="tm_mobilemenu_img">&nbsp;</div>
        </div>
    </div>
        <ul id="main_menu_mobile" class="primary-nav tree dhtml">
            <?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

        </ul>
    </div>
    <!--/ Menu -->
<?php }?>
<?php }} ?>