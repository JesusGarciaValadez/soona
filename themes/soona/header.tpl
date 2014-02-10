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
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6" lang="{$lang_iso}"> <![endif]-->
<!--[if IE 7]><html class="no-js ie7" lang="{$lang_iso}"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8" lang="{$lang_iso}"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="{$lang_iso}"><!--<![endif]-->
    <head>
        <title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
        {if isset($meta_description) AND $meta_description}
        <meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
        {/if}
        {*if isset($meta_keywords) AND $meta_keywords}
        <meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
        {/if*}
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
        <meta http-equiv="content-language" content="{$meta_language}" />
        <meta name="HandheldFriendly" content="True"/><!-- Palm -->
        <meta name="MobileOptimized" content="320"/><!-- Windows -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /><!-- Safari, Android, BB, Opera -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        
        <meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" /><!-- robots -->
        <link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
        <link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
        <script type="text/javascript">
            var baseDir = '{$content_dir|addslashes}';
            var baseUri = '{$base_uri|addslashes}';
            var static_token = '{$static_token|addslashes}';
            var token = '{$token|addslashes}';
            var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
            var priceDisplayMethod = {$priceDisplay};
            var roundMode = {$roundMode};
        </script>
{*if isset($css_files)}
    {foreach from=$css_files key=css_uri item=media}
        <link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
    {/foreach}
{/if*}
        
        <!-- ================ Additional Links By Tempaltemela : START  ============= -->
        <link rel="stylesheet" type="text/css" href="{$css_dir}megnor/custom.css" />
        <!--[if lt IE 9]><script type="text/javascript" src="{$js_dir}megnor/html5.js"></script><![endif]-->
        <!-- ================ Additional Links By Tempaltemela : END  ============= -->
        
{if isset($js_files)}
    {foreach from=$js_files item=js_uri}
        <script type="text/javascript" src="{$js_uri}"></script>
    {/foreach}
{/if}
        
        {$HOOK_HEADER}
        <!-- ================ By Tempaltemela : START  ============= -->
        <script type="text/javascript" src="{$js_dir}megnor/megnor.min.js"></script>
    {if $page_name == 'index' || $page_name == 'category' || $page_name == 'product' || $page_name == 'order' || $page_name == 'order-opc'}
        <script type="text/javascript" src="{$js_dir}megnor/carousel.min.js"></script>
    {/if}
        <script type="text/javascript" src="{$js_dir}megnor/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="{$js_dir}megnor/custom.js"></script>
        <script type="text/javascript" src="{$js_dir}megnor/jquery.custom.min.js"></script>
        <script type="text/javascript" src="{$js_dir}megnor/scrolltop.min.js"></script>
        <script type="text/javascript" src="{$js_dir}megnor/jquery.formalize.min.js"></script> 
        <!--[if lt IE 9]><script type="text/javascript" src="{$js_dir}megnor/respond.min.js"></script><![endif]-->
        <!-- ================ By Tempaltemela : END  ============= -->  
    </head>
    <body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if $hide_left_column}hide-left-column {/if} {if $hide_right_column}hide-right-column {/if} {if $content_only} content_only {/if}">
    {if !$content_only}
        {if isset($restricted_country_mode) && $restricted_country_mode}
        <div id="restricted-country">
            <p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
        </div>
        {/if}
        <div id="page" class="clearfix{if $page_name !== 'index' and $page_name !== '' } internal{/if}">
            <!-- Header -->
            <header id="header" class="alpha omega">
                <div class="header_container">
                    <div class="header-container-inner">
                        <div id="header_left">
                            <a id="header_logo" href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
                                <img class="logo" src="{$logo_url}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} />
                            </a>
                        </div>  
                        <div id="header_right" class="grid_9 omega">
                            {$HOOK_TOP}
                        </div>
                    </div>
                </div>
            </header>
            {hook h='TemplateMelaSlider'}
        </div>
        <div id="columns" class="alpha omega clearfix{if $page_name !== 'index' and $page_name !== '' } internal{/if}">
            <div class="columns_inner">
                <section id="center_column_inner" class="clearfix" role="main"><!-- Center -->
                    <div id="center_column" class=" grid_5">
    {/if}
