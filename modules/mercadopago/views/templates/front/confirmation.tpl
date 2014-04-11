{*
* Mercadopago Payment Gateway Module for Prestashop
*
*  @author Rinku Kazeno <development@kazeno.co>
*  @file-version 1.0
*}

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $mpType == 'modal'}
    <div id="mercadopago-placeholder" style="display: block; font-size: 18px; font-weight: 800; line-height: 24px; text-decoration: none; text-align: center; padding-top: 24px; height: 180px;">{$loadingText}
        <br /><br /><br /><img src="{$mpBase}modules/mercadopago/loading.gif" alt="{$loaderText}" width="44" height="44" />
    </div>
  {literal}
    <script>//<!--
        $(document).ready(function() {
            $('#mercadopago-placeholder').text("{/literal}{$mpOverlay}{literal}");
            $MPC.openCheckout({
                url: "{/literal}{$mpInit}{literal}",
                mode: "modal",
                onreturn: function(data) {
                    $('#mercadopago-placeholder').html('{/literal}{$mpRedirecting}{literal} <br /><br /><br /><img src="{/literal}{$mpBase}{literal}modules/mercadopago/loading.gif" alt="{/literal}{$loaderText}{literal}" />');
                    window.location = data.collection_status ? "{/literal}{$mpForward}{literal}" : "{/literal}{$mpBack}{literal}";
                }
            })

        });
    //--></script>
    <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
  {/literal}
{elseif $mpType == 'iframe'}
  {literal}
    <iframe src="{$mpInit}" name="MP-Checkout" width="740" height="600" frameborder="0"></iframe>

    <script type="text/javascript">
        (function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
    s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
    var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}
    window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;})();
    </script>
  {/literal}
{/if}

