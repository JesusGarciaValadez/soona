{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

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
                                    <a href="{$base_dir}corporativo/11-suscripcion.html" title="Haz tus pedidos" target="_self">Suscripciones</a>
                                </h3>
                                <p>
                                    <a href="{$base_dir}corporativo/11-suscripcion.html" title="Haz tus pedidos" target="_self">Haz tus pedidos</a>
                                </p>
                            </article>
                            <article id="testimonial_square">
                                <h3>Testimoniales</h3>
                                <p>
                                    “<span>Rogelio Rodríguez</span>. Un excelente servicio, encontré las flores que le gustan a mi esposa y pude hacer el pedido desde E.U., quedamos muy contentos”
                                </p>
                            </article>
                        </aside>
                        <div id="featured_products_wrapper">
                            <p class="title_block">{l s='Featured products' mod='homefeatured'}</p>
                            {if isset($products) AND $products}
                            <div class="block_content">
                                <!-- Megnor start -->
                                {assign var='sliderFor' value=11} <!-- Define Number of product for SLIDER -->
                                {assign var='productCount' value=count($products)}
                                {if $productCount >= $sliderFor}
                                <div class="customNavigation">
                                    <a class="btn prev">&nbsp;</a>
                                    <a class="btn next">&nbsp;</a>
                                </div>
                                {/if}
                                <!-- Megnor End -->
                                <ul id="{if $productCount >= $sliderFor}featured-carousel{else}featured-grid{/if}" class="{if $productCount >= $sliderFor}product-carousel{else}product_list{/if} clearfix">
                                    {*assign var='itemCount' value=0*}
                                    {foreach from=$products item=product name=homeFeaturedProducts}
                                    {*if $itemCount=8}{break}{/if*}
                                    {if $product@index eq 3}
                                        {break}
                                    {/if}
                                    <li class="ajax_block_product {if $productCount >= $sliderFor}slider-item{/if}">
                                        {$itemCount}
                                        <div class="product-block">
                                            <div class="product-inner">
                                                <!-- Imagen del producto -->
                                                <a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}" class="product_image">
                                                    <img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'hightlight_soona')|escape:'html'}" height="{$hightlightSize.height}" width="{$hightlightSize.width}" alt="{$product.name|escape:html:'UTF-8'}" />
                                                </a><!-- Imagen del producto -->
                                                {if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order AND !isset($restricted_country_mode) AND $product.minimal_quantity == 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE}
                                                    {if ($product.quantity > 0 OR $product.allow_oosp)}
                                                <a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart')|escape:'html'}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title="{l s='Add to cart' mod='homefeatured'}">
                                                    {l s='Add to cart' mod='homefeatured'}
                                                </a><!-- Añadir al carrito -->
                                                    {else}
                                                <span class="exclusive">{l s='Add to cart' mod='homefeatured'}</span>
                                                    {/if}
                                                {/if}
                                                <div>
                                                    <p class="s_title_block"><!-- Nombre de producto -->
                                                        <a href="{$product.link|escape:'html'}" title="{$product.name|truncate:50:'...'|escape:'htmlall':'UTF-8'}">{$product.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a>
                                                    </p><!-- Nombre de producto -->
                                                    {if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                                                    <p class="price_container"><!-- Precio -->
                                                        <span class="price">
                                                        {if !$priceDisplay}
                                                            {convertPrice price=$product.price}
                                                        {else}
                                                            {convertPrice price=$product.price_tax_exc}
                                                        {/if}
                                                        </span>
                                                    </p><!-- Precio -->
                                                    {/if}
                                                    <hr />
                                                    <!--img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'hightlight_image')|escape:'html'}" height="{$hightlight.height}" width="{$hightlightSize.width}" alt="{$product.name|escape:html:'UTF-8'}" /-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    {/foreach}
                                </ul>
                            </div>
                            {else}
                            <p class="no-products">{l s='No featured products' mod='homefeatured'}</p>
                            {/if}
                        </div>
                        <img src="{$img_dir}soona_img/images_soona/banner_entrega.jpg" alt="Entrega a Domicilio" width="669" height="103" />
                        <section id="catalog_home">
                            <h3>Catálogo</h3>
                            <ul class="catalog_list">
                                {*foreach from=$products item=product name=homeFeaturedProducts*}
                                {*foreach from=$productsCategory item=product*}
                                {for $foo=0 to 9 step 3}
                                <li>
                                    <article>
                                        <img src="{$link->getImageLink($products[$foo].link_rewrite, $products[$foo].id_image, 'catalog_soona')|escape:'html'}" width="{$catalogSize.width}" height="{$catalogSize.height}" alt="{$products[$foo].name|escape:'htmlall':'UTF-8'}" />
                                        <div class="product_information_wrapper">
                                            <div class="product_information left">
                                                {if $products[$foo].name && !empty($products[$foo].name)}
                                                <p class="product_name_catalog">{$products[$foo].name|truncate:12:'...'|escape:'htmlall':'UTF-8'}</p>
                                                {/if}
                                                {if $products[$foo].show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                                                <p class="product_price_catalog">
                                                    {if !$priceDisplay}
                                                    {convertPrice price=$products[$foo].price}
                                                    {else}
                                                    {convertPrice price=$products[$foo].price_tax_exc}
                                                    {/if}
                                                </p>
                                                {/if}
                                            </div>
                                            <div class="cart_link right">
                                                <a href="{$link->getPageLink('cart')|escape:'html'}?qty=1&amp;id_product={$products[$foo].id_product}&amp;token={$static_token}&amp;add" title="{l s='Agregar al carrito' mod='homefeatured'}" target="_self">Agregar al Carrito</a>
                                            </div>
                                            <hr />
                                            <a href="{$products[$foo].link|escape:'html'}" title="Conoce Más" class="to_know_more" target="_self">Conoce Más</a>
                                        </div>
                                    </article>
                                </li>
                                {/for}
                                {*/foreach*}
                            </ul>
                        </section>
                    </div>
                    <span class="featured_default_width" style="display:none; visibility:hidden"></span>
                    <!-- /MODULE Home Featured Products -->