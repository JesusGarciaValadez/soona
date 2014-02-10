<?php
/*
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
        )
            return false;
        return true;
    }
    
    public function uninstall()
    {
        $this->_clearCache('homefeatured.tpl');
        return parent::uninstall();
    }

    public function getContent()
    {
        $output = '<h2>'.$this->displayName.'</h2>';
        if (Tools::isSubmit('submitHomeFeatured'))
        {
            $nbr = (int)Tools::getValue('nbr');
            if (!$nbr OR $nbr <= 0 OR !Validate::isInt($nbr))
                $errors[] = $this->l('An invalid number of products has been specified.');
            else
                Configuration::updateValue('HOME_FEATURED_NBR', (int)($nbr));
            if (isset($errors) AND sizeof($errors))
                $output .= $this->displayError(implode('<br />', $errors));
            else
                $output .= $this->displayConfirmation($this->l('Your settings have been updated.'));
        }
        return $output.$this->displayForm();
    }

    public function displayForm()
    {
        $output = '
        <form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
            <fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
                <p>'.$this->l('To add products to your homepage, simply add them to the "home" category.').'</p><br />
                <label>'.$this->l('Define the number of products to be displayed.').'</label>
                <div class="margin-form">
                    <input type="text" size="5" name="nbr" value="'.Tools::safeOutput(Tools::getValue('nbr', (int)(Configuration::get('HOME_FEATURED_NBR')))).'" />
                    <p class="clear">'.$this->l('Define the number of products that you would like to display on homepage (default: 8).').'</p>

                </div>
                <center><input type="submit" name="submitHomeFeatured" value="'.$this->l('Save').'" class="button" /></center>
            </fieldset>
        </form>';
        return $output;
    }

    public function hookDisplayHeader($params)
    {
        $this->hookHeader($params);
    }

    public function hookHeader($params)
    {
        $this->context->controller->addCSS(($this->_path).'homefeatured.css', 'all');
    }

    public function hookDisplayHome($params)
    {
        if (!$this->isCached('homefeatured.tpl', $this->getCacheId('homefeatured')))
        {
            $category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
            $nb = (int)Configuration::get('HOME_FEATURED_NBR');
            $products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), "position");

            $this->smarty->assign(array(
                'products' => $products,
                'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
                'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
                'catalogSize' => Image::getSize(ImageType::getFormatedName('catalog_soona')),
                'hightlightSize' => Image::getSize(ImageType::getFormatedName('hightlight_soona')),
            ));
        }
        return $this->display(__FILE__, 'homefeatured.tpl', $this->getCacheId('homefeatured'));
    }
    
    public function hookCategoriesHome($params)
    {
        if (!$this->isCached('blockcategories_home.tpl', $this->getCacheId()))
        {
            // Get all groups for this customer and concatenate them as a string: "1,2,3..."
            $groups = implode(', ', Customer::getGroupsStatic((int)$this->context->customer->id));
            $maxdepth = Configuration::get('BLOCK_CATEG_MAX_DEPTH');
            if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT DISTINCT c.id_parent, c.id_category, cl.name, cl.description, cl.link_rewrite
                FROM `'._DB_PREFIX_.'category` c
                INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_lang` = '.(int)$this->context->language->id.Shop::addSqlRestrictionOnLang('cl').')
                INNER JOIN `'._DB_PREFIX_.'category_shop` cs ON (cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.(int)$this->context->shop->id.')
                WHERE (c.`active` = 1 OR c.`id_category` = '.(int)Configuration::get('PS_HOME_CATEGORY').')
                AND c.`id_category` != '.(int)Configuration::get('PS_ROOT_CATEGORY').'
                '.((int)$maxdepth != 0 ? ' AND `level_depth` <= '.(int)$maxdepth : '').'
                AND c.id_category IN (SELECT id_category FROM `'._DB_PREFIX_.'category_group` WHERE `id_group` IN ('.pSQL($groups).'))
                ORDER BY `level_depth` ASC, '.(Configuration::get('BLOCK_CATEG_SORT') ? 'cl.`name`' : 'cs.`position`').' '.(Configuration::get('BLOCK_CATEG_SORT_WAY') ? 'DESC' : 'ASC')))
                return;

            $resultParents = array();
            $resultIds = array();
            $isDhtml = (Configuration::get('BLOCK_CATEG_DHTML') == 1 ? true : false);

            foreach ($result as &$row)
            {
                $resultParents[$row['id_parent']][] = &$row;
                $resultIds[$row['id_category']] = &$row;
            }

            $blockCategTree = $this->getTree($resultParents, $resultIds, Configuration::get('BLOCK_CATEG_MAX_DEPTH'));
            unset($resultParents, $resultIds);

            $this->smarty->assign('blockCategTree', $blockCategTree);

            if (file_exists(_PS_THEME_DIR_.'modules/blockcategories/blockcategories_home.tpl'))
                $this->smarty->assign('branche_tpl_path', _PS_THEME_DIR_.'modules/blockcategories/category-tree-branch.tpl');
            else
                $this->smarty->assign('branche_tpl_path', _PS_MODULE_DIR_.'blockcategories/category-tree-branch.tpl');
            $this->smarty->assign('isDhtml', $isDhtml);
        }

        $id_category = (int)Tools::getValue('id_category');
        $id_product = (int)Tools::getValue('id_product');
        
        if (Tools::isSubmit('id_category'))
        {
            $this->context->cookie->last_visited_category = (int)$id_category;
            $this->smarty->assign('currentCategoryId', $this->context->cookie->last_visited_category);
        }

        if (Tools::isSubmit('id_product'))
        {
            if (!isset($this->context->cookie->last_visited_category)
                || !Product::idIsOnCategoryId($id_product, array('0' => array('id_category' => $this->context->cookie->last_visited_category)))
                || !Category::inShopStatic($this->context->cookie->last_visited_category, $this->context->shop))
            {
                $product = new Product((int)$id_product);
                if (isset($product) && Validate::isLoadedObject($product))
                    $this->context->cookie->last_visited_category = (int)$product->id_category_default;
            }
            $this->smarty->assign('currentCategoryId', (int)$this->context->cookie->last_visited_category);
        }

        $display = $this->display(__FILE__, 'blockcategories_home.tpl', $this->getCacheId());
        return $display;
    }

    public function hookAddProduct($params)
    {
        $this->_clearCache('homefeatured.tpl');
    }

    public function hookUpdateProduct($params)
    {
        $this->_clearCache('homefeatured.tpl');
    }

    public function hookDeleteProduct($params)
    {
        $this->_clearCache('homefeatured.tpl');
    }
}
