<?php
 class GogalleryShowgalModuleFrontController extends ModuleFrontController{
	 
	 public $ssl=true;
	 
	
	 
	 public function initContent()
	{
		$id=Tools::getValue('id');
		
		//$this->display_column_left = false;
		parent::initContent();
		
		if(empty($id)){
				$query="select * from "._DB_PREFIX_."gallery order by g_id desc LIMIT 0,4";
	  			$row = Db::getInstance()->ExecuteS($query);

				$this->context->smarty->assign(array(
					'gallery' => $row,
					'this_path' => $this->module->getPathUri(),
					'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
				));
		
				$this->setTemplate('showgal.tpl');
		}else{
			$query="select * from "._DB_PREFIX_."gallery_detail where g_id='$id'";
	  		$row = Db::getInstance()->ExecuteS($query);
			$this->context->smarty->assign(array(
					'gallery_detail' => $row,
					'this_path' => $this->module->getPathUri(),
					'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
				));
				
			$this->setTemplate('showgaldet.tpl');	
		}
		
		
	}
	 
	 
 }
?>