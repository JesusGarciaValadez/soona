<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

/**
 * This file will be removed in 1.6
 */
if (!defined('_PS_VERSION_'))
    exit;

class HomeFeatured extends Module
{
    private $_html = '';
    private $_postErrors = array();

    function __construct()
    {
        $this->name = 'homefeatured';
        $this->tab = 'front_office_features';
        $this->version = '1.1';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Featured products on the homepage.');
        $this->description = $this->l('Displays featured products in the middle of your homepage.');
    }

    function install()
    {
        $this->_clearCache('homefeatured.tpl');
        Configuration::updateValue('HOME_FEATURED_NBR', 8);

        if (!parent::install()
            || !$this->registerHook('displayHome')
            || !$this->registerHook('header')
            || !$this->registerHook('addproduct')
            || !$this->registerHook('updateproduct')
            || !$this->registerHook('deleteproduct')
            || !$this->registerHook('internalhome')
        )
            return false;
        return true;
    }
    
    public function uninstall()
    {
        $this->_clearCache('homefeatured.tpl');
        return parent::uninstall();
    }
    
    public function hookDisplayInternalHome($params)
    {
        if (!$this->isCached('homefeatured.tpl', $this->getCacheId('homefeatured')))
        {
            $category           = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
            $nb                 = (int)Configuration::get('HOME_FEATURED_NBR');
            $products           = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), "position");
            $productCategory    = $category->getProducts((int)Context::getContext()->language->id, 1, 8, "position");
            
            $this->smarty->assign(array(
                'products'          => $products,
                'productsCategory'  => $productCategory,
                'add_prod_display'  => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
                'homeSize'          => Image::getSize(ImageType::getFormatedName('home')),
                'catalogSize'       => Image::getSize(ImageType::getFormatedName('catalog_soona')),
                'hightlightSize'    => Image::getSize(ImageType::getFormatedName('hightlight_soona')),
            ));
        }
        
        return $this->display(__FILE__, 'homefeatured.tpl', $this->getCacheId('homefeatured'));
    }

}
