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

                    {if !$content_only}
                        </div> <!-- ===== End Center Column ==== -->
                    </section>
                    {*if $page_name !== 'index'} 
                    <div id="left_column" class="column grid_2 alpha">
                        <aside id="left_column_inner" role="complementary"><!-- Left -->
                            {$HOOK_LEFT_COLUMN}
                        </aside>
                        <aside id="right_column_inner" role="complementary"><!-- Right -->
                            {$HOOK_RIGHT_COLUMN}
                        </aside>
                    </div>
                    {/if*} 
                </div><!-- End columns_inner Div -->
            </div><!-- ===== end columns ==== -->
            <footer id="footer" class=""><!-- Footer -->
                <div class="footer_inner">
                    <ul>
                        <li id="faq_footer">
                            <a href="{$base_dir}content/6-preguntas-frecuentes" title="FAQ's" target="_self">FAQ's</a>
                        </li>
                        <li id="social_links_footer">
                            <h5>Síguenos</h5>
                            <ul>
                                <li id="social_links_footer_facebook">
                                    <a href="http://www.facebook.com/soona.mx" title="Soona en Facebook" target="_blank">Soona en Facebook</a>
                                </li>
                                <li id="social_links_footer_twitter">
                                    <a href="http://www.twitter.com/SoonaMX" title="Soona en Twitter" target="_blank">Soona en Twitter</a>
                                </li>
                                <li id="social_links_footer_pinterest">
                                    <a href="" title="Soona en Pinterest" target="_blank">Soona en Pinterest</a>
                                </li>
                            </ul>
                        </li>
                        <li id="shopping_cart">
                            <a href="{$link->getPageLink("order", true)|escape:'html'}" title="{l s='Ver mi Carrito de Compra' mod='blockcart'}" target="_blank" rel="nofollow">{l s='Carrito' mod='blockcart'}</a>
                        </li>
                    </ul>
                    <section id="first_footer_column">
                        <article id="soona_footer">
                            <h5>Suscripciones</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}11-suscripcion.html" title="Recibe flores en tu casa" target="_self">Recibe flores en tu casa</a>
                                </li>
                            </ul>
                        </article>
                        <article id="occasions">
                            <h5>Catálogo</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}4-catalogo" title="Catálogo de Flores" target="_self">Catálogo de Flores</a>
                                </li>
                            </ul>
                        </article>
                    </section>
                    <section id="second_footer_column">
                        <article id="photo_gallery">
                            <h5>Galería</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}index.php?fc=module&module=gogallery&controller=showgal" title="Arreglos Florales" target="_self">Arreglos Florales</a>
                                </li>
                            </ul>
                        </article>
                        <article id="associated">
                            <h5>Eventos y Fiestas</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}content/4-eventos-y-fiestas" title="Arreglos Florales Especiales" target="_self">Arreglos Florales Especiales</a>
                                </li>
                            </ul>
                        </article>
                    </section>
                    <section id="third_footer_column">
                        <article id="accesories">
                            <h5>Sooná</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}content/7-soona" title="Información de Sooná" target="_self">Información de Sooná</a>
                                </li>
                            </ul>
                        </article>
                        <article id="contact">
                            <h5>Contacto</h5>
                            <ul>
                                <li>
                                    <a href="{$base_dir}contacto" title="Contáctanos" target="_self">Contáctanos</a>
                                </li>
                            </ul>
                        </article>
                    </section>
                    <section id="fourth_footer_column">
                        <article id="coverage_areas">
                            <h5>Zonas de Cobertura</h5>
                            <p>
                                <a href="{$base_dir}content/7-soona" title="Conoce nuestras zonas de cobertura" target="_self">Conoce nuestras zonas de cobertura</a>
                            </p>
                            <img src="{$img_dir}soona_img/images_soona/mapa_df_footer.png" alt="Mapa del Distrito Federal" width="97" height="133" />
                        </article>
                    </section>
                    {*$HOOK_FOOTER*}
                    {*if $PS_ALLOW_MOBILE_DEVICE}
                    <p class="browse-mobile center clearBoth"><a href="{$link->getPageLink('index', true)}?mobile_theme_ok">{l s='Browse the mobile site'}</a></p>
                    {/if*}
                    {*if $page_name == 'index'} 
                    <div class="tm_footerlink" style="display:none;">
                        Theme By <a href="http://www.templatemela.com/" title="TemplateMela" target="_blank">TemplateMela</a>
                    </div>
                    {/if*}
                </div>
                <div class="footer_bottom">
                    <div id="footer_wrapper">
                        <p>&copy; 2003 - 2014 Soona Reservados todos los derechos.</p>
                        <ul>
                            <li>
                                <a href="{$base_dir}content/3-condiciones-de-uso" title="Términos y Condiciones" target="_self">Términos y Condiciones</a>
                            </li>
                            <li>
                                <a href="{$base_dir}content/2-aviso-legal" title="Aviso Legal" target="_self">Aviso Legal</a>
                            </li>
                            <li>
                                <a href="{$base_dir}content/6-preguntas-frecuentes" title="Preguntas Frecuentes" target="_self">Preguntas Frecuentes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
        {/if}
        <span class="grid_default_width" style="display:none; visibility:hidden"></span>
        {if $page_name == 'contact'}
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        {/if}
        <script type="text/javascript" src="{$js_dir}plugins.min.js"></script>
        <script type="text/javascript" src="{$js_dir}main.js"></script>
    </body>
</html>
