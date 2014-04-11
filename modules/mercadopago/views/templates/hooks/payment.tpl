{*
 * Mercadopago Payment Gateway Module for Prestashop
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.5
 *}

<p class="payment_module">
    <a href="{$paymentPath}" title="{$buttonText}">
        <img src="{$imagePath}mercadopago_{$mpCountry}.png" alt="{$buttonText}" /> {$buttonText}
        <br /><i>{$buttonText2}</i>
        <br/><br/> <strong>{$mpFee}</strong><br/>
    </a><br/>
    {if $sandboxMode}<span class="warning">{$sandboxMode}</span>{/if}
</p>
<script>//<!--      loader image preloading to cache
    $('<img src="{$imagePath}loading.gif" />');
//--></script>