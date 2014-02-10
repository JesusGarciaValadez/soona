<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:29:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63310357252f944b7329472-85140897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47c42f1603a05193985b4f3bf31f57596f943183' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/homefeatured/homefeatured.tpl',
      1 => 1392060477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63310357252f944b7329472-85140897',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir' => 0,
    'products' => 0,
    'productCount' => 0,
    'sliderFor' => 0,
    'product' => 0,
    'link' => 0,
    'hightlightSize' => 0,
    'add_prod_display' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'static_token' => 0,
    'priceDisplay' => 0,
    'hightlight' => 0,
    'img_dir' => 0,
    'productsCategory' => 0,
    'catalogSize' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f944b74cae17_09491235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f944b74cae17_09491235')) {function content_52f944b74cae17_09491235($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>

                    <!-- MODULE Home Featured Products -->
                    <div id="featured-products_block_center" class="block products_block clearfix">
                        <div class="crop_background"></div>
                        <aside id="left_disposition">
                            <article id="order_square">
                                <h3>Pedidos</h3>
                                <ul>
                                    <li>
                                        <p>Sooná</p>
                                    </li>
                                    <li id="shop_phone">
                                        <p>
                                            <span>62730078</span>
                                        </p>
                                    </li>
                                </ul>
                                <p>Malitzin 165 Local 3, Col. Del Carmen, <br /> Coyoacán, Ciudad de México C.P.04100</p>
                            </article>
                            <article id="suscriptions_square">
                                <h3>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
corporativo/11-suscripcion.html" title="Haz tus pedidos" target="_self">Suscripciones</a>
                                </h3>
                                <p>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
corporativo/11-suscripcion.html" title="Haz tus pedidos" target="_self">Haz tus pedidos</a>
                                </p>
                            </article>
                            <article id="testimonial_square">
                                <h3>Testimoniales</h3>
                                <p>
                                    <span>@LoremIpsum:</span> Quisque eget magna sed lorem rhoncus molestie. Nunc felis nibh, locinia a arcu
                                </p>
                            </article>
                        </aside>
                        <div id="featured_products_wrapper">
                            <p class="title_block"><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'homefeatured'),$_smarty_tpl);?>
</p>
                            <?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value){?>
                            <div class="block_content">
                                <!-- Megnor start -->
                                <?php $_smarty_tpl->tpl_vars['sliderFor'] = new Smarty_variable(10, null, 0);?> <!-- Define Number of product for SLIDER -->
                                <?php $_smarty_tpl->tpl_vars['productCount'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['products']->value), null, 0);?>
                                <?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>
                                <div class="customNavigation">
                                    <a class="btn prev">&nbsp;</a>
                                    <a class="btn next">&nbsp;</a>
                                </div>
                                <?php }?>
                                <!-- Megnor End -->
                                <ul id="<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>featured-carousel<?php }else{ ?>featured-grid<?php }?>" class="<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>product-carousel<?php }else{ ?>product_list<?php }?> clearfix">
                                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                                    <li class="ajax_block_product <?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>slider-item<?php }?>">
                                        <div class="product-block">
                                            <div class="product-inner">
                                                <!-- Imagen del producto -->
                                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
" class="product_image">
                                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'hightlight_soona'), ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo $_smarty_tpl->tpl_vars['hightlightSize']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['hightlightSize']->value['width'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
" />
                                                </a><!-- Imagen del producto -->
                                                <?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']==1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
                                                    <?php if (($_smarty_tpl->tpl_vars['product']->value['quantity']>0||$_smarty_tpl->tpl_vars['product']->value['allow_oosp'])){?>
                                                <a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'homefeatured'),$_smarty_tpl);?>
">
                                                    <?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'homefeatured'),$_smarty_tpl);?>

                                                </a><!-- Añadir al carrito -->
                                                    <?php }else{ ?>
                                                <span class="exclusive"><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'homefeatured'),$_smarty_tpl);?>
</span>
                                                    <?php }?>
                                                <?php }?>
                                                <div>
                                                    <p class="s_title_block"><!-- Nombre de producto -->
                                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],50,'...'), 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],35,'...'), 'htmlall', 'UTF-8');?>
</a>
                                                    </p><!-- Nombre de producto -->
                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
                                                    <p class="price_container"><!-- Precio -->
                                                        <span class="price">
                                                        <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value){?>
                                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                                                        <?php }else{ ?>
                                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                                                        <?php }?>
                                                        </span>
                                                    </p><!-- Precio -->
                                                    <?php }?>
                                                    <hr />
                                                    <!--img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'hightlight_image'), ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo $_smarty_tpl->tpl_vars['hightlight']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['hightlightSize']->value['width'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
" /-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php }else{ ?>
                            <p class="no-products"><?php echo smartyTranslate(array('s'=>'No featured products','mod'=>'homefeatured'),$_smarty_tpl);?>
</p>
                            <?php }?>
                        </div>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
soona_img/images_soona/banner_entrega.jpg" alt="Entrega a Domicilio" width="669" height="103" />
                        <section id="catalog_home">
                            <h3>Catálogo</h3>
                            <ul class="catalog_list">
                                
                                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productsCategory']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                                <li>
                                    <article>
                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'catalog_soona'), ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['catalogSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['catalogSize']->value['height'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'htmlall', 'UTF-8');?>
" />
                                        <div class="product_information_wrapper">
                                            <div class="product_information left">
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['name']&&!empty($_smarty_tpl->tpl_vars['product']->value['name'])){?>
                                                <p class="product_name_catalog"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],12,'...'), 'htmlall', 'UTF-8');?>
</p>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
                                                <p class="product_price_catalog">
                                                    <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value){?>
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                                                    <?php }else{ ?>
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                                                    <?php }?>
                                                </p>
                                                <?php }?>
                                            </div>
                                            <div class="cart_link right">
                                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" title="<?php echo smartyTranslate(array('s'=>'Agregar al carrito','mod'=>'homefeatured'),$_smarty_tpl);?>
" target="_self">Agregar al Carrito</a>
                                            </div>
                                            <hr />
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="Conoce Más" class="to_know_more" target="_self">Conoce Más</a>
                                        </div>
                                    </article>
                                </li>
                                <?php } ?>
                            </ul>
                        </section>
                    </div>
                    <span class="featured_default_width" style="display:none; visibility:hidden"></span>
                    <!-- /MODULE Home Featured Products --><?php }} ?>