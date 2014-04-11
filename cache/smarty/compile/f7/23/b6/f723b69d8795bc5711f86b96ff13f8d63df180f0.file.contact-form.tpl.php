<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:02
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/contact-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104739937753485b1a052589-76995173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f723b69d8795bc5711f86b96ff13f8d63df180f0' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/contact-form.tpl',
      1 => 1397249577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104739937753485b1a052589-76995173',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53485b1a05f7e7_93892758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b1a05f7e7_93892758')) {function content_53485b1a05f7e7_93892758($_smarty_tpl) {?>
<div class="alert_background"></div>
<div class="alert_box"><a class="close" title="Cerrar">Cerrar</a></div>
<div id="contact_wrapper">
    <h1>Contacto</h1>
    <div id="map_wrapper">
        <p>Malitzin 165 Local 3, Coyoacán.</p>
        <div id="map">
            <!--a href="https://www.google.com.mx/maps/search/Malintzin+165+Local+3,+Col.+Del+Carmen,+Coyoac%C3%A1n,+Ciudad+de+M%C3%A9xico+c.p.04100/@19.3517761,-99.1632018,19z" title="Sooná" target="_blank"-->
                <img src="themes/soona/img/soona_img/images_soona/soona-sucursal.jpg" alt="Sucursal" width="443" height="426" />
            <!--/a-->
        </div>
    </div>
    <div id="contact_form_wrapper">
        <p>Llena el formulario y nos pondremos en contacto.</p>
        <form action="Code/snippets/dispatcher.php?action=sendContact" method="post" accept-charset="utf-8">
            <fieldset>
                <div class="input">
                    <input id="contact_name" type="text" name="contact_name" value="" placeholder="Nombre">
                </div>
                <div class="input">
                    <input id="contact_mail" type="text" name="contact_mail" value="" placeholder="Correo Electrónico">
                </div>
                <div class="input">
                    <input id="contact_subject" type="text" name="contact_subject" value="" placeholder="Asunto">
                </div>
                <div class="textarea">
                    <textarea id="contact_message" name="contact_message" value="" placeholder="Mensaje" maxlength="250"></textarea>
                </div>
                <div class="submit">
                    <input id="contact_submit" type="submit" name="contact_submit" value="Enviar" placeholder="Enviar">
                </div>
            </fieldset>
        </form>
    </div>
</div>




<?php }} ?>