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

{if isset($products)}


	<!-- Products list -->
	<!-- <ul id="product_list" class="clearfix"> -->
    <ul class="catalog_list">
	{foreach from=$products item=product name=products}
		<li>
        
                                    <article>
                                        <a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_img_link" title="{$product.name|escape:'htmlall':'UTF-8'}">
											<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'catalog_soona')|escape:'html'}" alt="{$product.legend|escape:'htmlall':'UTF-8'}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} />
						{if isset($product.new) && $product.new == 1}<span class="new">{l s='New'}</span>{/if}
					</a>
                    
                                        <div class="product_information_wrapper">
                                            <div class="product_information left">
                                                {if $product.name && !empty($product.name)}
                                                <p class="product_name_catalog">{$product.name|escape:'htmlall':'UTF-8'}</p>
                                                {/if}
                                                {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                                <p class="product_price_catalog">
                                                    {if !$priceDisplay}
                                                    {convertPrice price=$product.price}
                                                    {else}
                                                    {convertPrice price=$product.price_tax_exc}
                                                    {/if}
                                                </p>
                                                {/if}
                                            </div>
                                            <div class="cart_link right">
                                                <a href="{$link->getPageLink('cart')|escape:'html'}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title="{l s='Agregar al carrito'}" target="_self">{l s='Agregar al carrito'}</a>
                                            </div>
                                            <hr />
                                            <a href="{$product.link|escape:'html'}" title="{l s='Conoce Mas'}" class="to_know_more" target="_self">{l s='Conoce Mas'}</a>
                                        </div>
                                    </article>
                                </li>		

	{/foreach}
	</ul>
<script>
{literal}
// <![CDATA[

$(document).ready(function () {
    $("#view_as_grid").click(function () {
		setListGrid('grid_view');
		$('ul.grid_view').smartColumnsRows({
				defWidthClss : 'grid_default_width',
				subElement   : 'li',
				subClass     : 'product-block'
		});	
		
	});
	$("#view_as_list").click(function () {
		setListGrid('list_view');
		
		$("ul.product_list").css('width', 'auto'); 
		$(".list_view li").css('width', '100%'); 
		$(".list_view li").css('height', 'auto'); 
		$('.list_view .product-block').css("height", "auto");
		$('.list_view .product-block').css("width", "auto");		
	});
}); 

productListAutoSet = function() { 
	$('ul.grid_view').smartColumnsRows({
		defWidthClss : 'grid_default_width',
		subElement   : 'li',
		subClass     : 'product-block'
	});
}
$(document).ready(productListAutoSet);
$(window).bind('resize', productListAutoSet);

//]]>
{/literal}
</script>		
	<!-- /Products list -->
{/if}
