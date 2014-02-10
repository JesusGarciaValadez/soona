<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:46:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212671771952f948d12ff382-86888071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1f4ff866bae0fcf67d7bed1025ca6a508ac4e04' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1391804927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212671771952f948d12ff382-86888071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
    'PS_CATALOG_MODE' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'blockuser_cart_flag' => 0,
    'cart' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f948d13b6d18_44650383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f948d13b6d18_44650383')) {function content_52f948d13b6d18_44650383($_smarty_tpl) {?>
                    <!-- Block user information module HEADER -->
                    <div class="welcome_link">
                        <p id="header_user_info">
                            <?php if ($_smarty_tpl->tpl_vars['logged']->value){?>
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="logout" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="your_account" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
                            <?php }else{ ?>
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Login to your customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="login" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
                            <?php }?>
                        </p>
                    </div>
                    <div class="block_userinfo">
                        <div id="header_user" <?php if ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>class="header_user_catalog"<?php }?>>
                            <div class="shopping_cart_header clearfix">
                                <ul id="header_nav">
                                    <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
                                    <li id="shopping_cart">
                                        <div class="ajax_cart_a"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockuserinfo'),$_smarty_tpl);?>

                                            <span class="ajax_cart_quantity<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?> hidden<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
                                            <span class="ajax_cart_product_txt<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=1){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
                                            <span class="ajax_cart_product_txt_s<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'Products','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
                                            <span class="ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?> hidden<?php }?>">
                                            <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?>
                                                <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
                                                    <?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

                                                <?php }else{ ?>
                                                    <?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

                                                <?php }?>
                                            <?php }?>
                                            </span>
                                            <span class="ajax_cart_no_product<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'(empty)','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
soona_img/images_soona/visa.png" alt="Logo Visa" width="25" height="15" id="visa_logo_cart" />
                                <img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
soona_img/images_soona/mastercard.png" alt="Logo Mastercard" width="31" height="18" id="mastercard_logo_cart" />
                                <img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
soona_img/images_soona/paypal.png" alt="Logo PayPal" width="41" height="11" id="paypal_logo_cart" />
                            </div>
                        </div>
                    </div>
                    <!-- /Block user information module HEADER -->
<?php }} ?>