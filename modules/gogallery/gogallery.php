<?php

class gogallery extends Module
{
  public $_html;
  
  function __construct()
	{
	 	$this->name = 'gogallery';
	 	$this->tab = 'front_office_features';
	 	$this->version = '1.0';
		$this->author = 'GE-MXS';
		$this->displayName = 'Go Gallery';
		
	 	parent::__construct();
		
		$this->description = $this->l('Galeria de Imagenes');
		$this->confirmUninstall = $this->l('Esta seguro que desea eliminarlo ?');

	}

	function install()
	{
		if (!parent::install() || !$this->registerHook('displayHome') || !$this->registerHook('displayRightColumn') )
			return false;
		
		$this->create();
		return true;
	}
	
	function uninstall()
	{
		if (!parent::uninstall())
			return false;
		$this->destroy();	
		return true;
	}
	
	public function create()
	{
     $query='CREATE TABLE `'._DB_PREFIX_.'gallery` (
	  `g_id` int(11) NOT NULL AUTO_INCREMENT,
	  `g_name` varchar(255) NOT NULL,
	  `g_desc` text NOT NULL,
	  `g_imgmain` varchar(66) NOT NULL,
	  PRIMARY KEY (`g_id`)
	) ENGINE=MyISAM ;';		
	 Db::getInstance()->Execute($query);
	 
	 $query='CREATE TABLE `'._DB_PREFIX_.'gallery_detail` (
	  `gd_id` int(11) NOT NULL AUTO_INCREMENT,
	  `gd_img` varchar(255) NOT NULL,
	  `gd_comment` varchar(255) NOT NULL,
	  `g_id` int(11) NOT NULL,
	  PRIMARY KEY (`gd_id`)
	) ENGINE=MyISAM ;';
	
	Db::getInstance()->Execute($query);
	 
	}
	
	public function destroy(){
	  $query='DROP TABLE `'._DB_PREFIX_.'gallery';
	  Db::getInstance()->Execute($query);
	  
	  $query='DROP TABLE `'._DB_PREFIX_.'gallery_detail';
	  Db::getInstance()->Execute($query);
	  
	  $this->deletePictures();
	
	}
	
	function deletePictures()
	{
	 $pictures = scandir(dirname(__FILE__).'/pictures');
	 foreach ($pictures as $pictures)
	 	unlink(dirname(__FILE__).'/pictures/'.$pictures);
	 return true;
	}
	
	public function getContent()
	{
	 
	 $id_gallery=Tools::getValue('id_gallery');
	 
	 if(Tools::isSubmit('btnNGSubmit'))
	 {
	  
	  
	  $name=Tools::getValue('name');
	  $desc=Tools::getValue('desc');
	  

	  if(empty($name))
	  {
	   $this->_html.='<div  class="alert error">'.$this->l('Hay campos requerido sin diligenciar').'</div>';
	  }
	  elseif(!isset($_FILES['main']['tmp_name']))
	  {
	   $this->_html.='<div class="alert error">'.$this->l('Por favor seleccione una Imagen').'</div>';
	  }
	  else
	  {
	   rename($_FILES['main']['tmp_name'], dirname(__FILE__).'/pictures/'.$_FILES['main']['name']);
	   chmod(dirname(__FILE__).'/pictures/'.$_FILES['main']['name'],0755);
	   $query="insert into "._DB_PREFIX_."gallery (g_name, g_desc, g_imgmain) values ('$name', '$desc','".$_FILES['main']['name']."')";
	   
	   Db::getInstance()->Execute($query);
	   
	   $this->_html.='<div class="conf confirm">'.$this->l('Album creado satisfactoriamente').'</div>';
	  }
	 }
	 
	 if(Tools::isSubmit('btnEGSubmit'))
	 {
	  
	  $id=Tools::getValue('id');
	  $name=Tools::getValue('name');
	  $desc=Tools::getValue('desc');
	  

	  if(empty($name))
	  {
	   $this->_html.='<div  class="alert error">'.$this->l('Hay campos requerido sin diligenciar').'</div>';
	  }
	  else
	  {
	   if(isset($_FILES['main']['tmp_name']))
	   {
		   rename($_FILES['main']['tmp_name'], dirname(__FILE__).'/pictures/'.$_FILES['main']['name']);
		   chmod(dirname(__FILE__).'/pictures/'.$_FILES['main']['name'],0755);
		   $query="update "._DB_PREFIX_."gallery set g_imgmain='".$_FILES['main']['name']."' where g_id='".$id."'";
		   Db::getInstance()->Execute($query);
	   }
	   
	  $query="update "._DB_PREFIX_."gallery set g_name='".$name."', g_desc='".$desc."' where g_id='".$id."'";
	  Db::getInstance()->Execute($query);
	   
	   $this->_html.'<div class="conf confirm">'.$this->l('Album guardado satisfactoriamente').'</div>';
	  }
	 }
	 
	 if(Tools::isSubmit('btnDGSubmit'))
	 {
	  
	  $id=Tools::getValue('id');
	  
	   
	  $query="delete from "._DB_PREFIX_."gallery where g_id='".$id."'";
	  Db::getInstance()->Execute($query);
	  
	  $query="delete from "._DB_PREFIX_."gallery_detail where g_id='".$id."'";
	  Db::getInstance()->Execute($query);
	   
	   $this->_html.'<div class="conf confirm">'.$this->l('Album eliminado satisfactoriamente').'</div>';
	  
	 }
	 
	 if(Tools::isSubmit('btnDGDSubmit'))
	 {
	  
	  $id=Tools::getValue('id');
	  
	  
	  $query="delete from "._DB_PREFIX_."gallery_detail where gd_id='".$id."'";
	  Db::getInstance()->Execute($query);
	   
	   $this->_html.'<div class="conf confirm">'.$this->l('Foto eliminado satisfactoriamente').'</div>';
	  
	 }
	 
	 if(Tools::isSubmit('btnNGDSubmit'))
	 {
	  
	  if(isset($_FILES['main']['tmp_name']))
	   {
		   rename($_FILES['main']['tmp_name'], dirname(__FILE__).'/pictures/'.$_FILES['main']['name']);
		   chmod(dirname(__FILE__).'/pictures/'.$_FILES['main']['name'],0755);
		   $query="insert into "._DB_PREFIX_."gallery_detail (gd_img,g_id) values ('".$_FILES['main']['name']."','$id_gallery')";
		   Db::getInstance()->Execute($query);
		   $this->_html.'<div class="conf confirm">'.$this->l('Foto agregada satisfactoriamente').'</div>';
	   }else{
		   
		    $this->_html.='<div  class="alert error">'.$this->l('Seleccione una fotografia').'</div>';
		   
	   }
	  
	  
	 }
	 
	 
	 if(empty($id_gallery)){
	 
	 	$this->_displayFrmNewGallery();
	 	$this->_displayListGallery();
	 
	 }else{
		
		$this->_displayFrmGalleryDetail($id_gallery);	
		$this->_displayListGalleryDetail($id_gallery);	 
	 
	 }
	 
	 
	 
	 return $this->_html; 
	 
	}
	
	public function _displayFrmNewGallery(){
		$this->_html.='<p>&nbsp;</p>
		<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post" enctype="multipart/form-data">
			<fieldset>
			<legend><img src="'.__PS_BASE_URI__.'modules/gogallery/logo.gif" />'.$this->l('Nuevo Album').'</legend>
				<table border="0" width="639" cellpadding="4" cellspacing="4" id="form">
					<tr>
					 <td width="313"><strong>'.$this->l("Nombre del Album").'*:</strong></td>
					 <td width="326"><input type="text" name="name" id="name" /></td>
					</tr>
					<tr>
					 <td width="313"><strong>'.$this->l("Descripción").'*:</strong></td>
					 <td width="326"><textarea name="desc" id="desc" cols="45" rows="5"></textarea></td>
					</tr>
					<tr>
					 <td><strong>'.$this->l("Imagen Principal").'*:</strong></td>
					 <td><input type="file" name="main" id="mainimg" />'.$this->l("Tamaño de imagen sugerida 200px X 200px").'</td>
					</tr>					
					<tr><td colspan="2" align="center"><br /><input class="button" name="btnNGSubmit" value="'.$this->l('Guardar').'" type="submit" /></td></tr>
					<tr><td colspan="2" align="center"><div align="left"><br />
					        <font color="#FF0000"><sup>*</sup>'.$this->l('Campos requeridos').'</font></div></td></tr>
				</table>
			</fieldset>
		</form><p>&nbsp;</p>';
	}
	
	public function _displayListGallery(){
		
		
		
		$this->_html .=
		'
			<p>&nbsp;</p>
			<fieldset>
			<legend><img src="'.__PS_BASE_URI__.'modules/gogallery/logo.gif" />'.$this->l('Albumnes').'</legend>
				<table border="0" width="100%" cellpadding="4" cellspacing="4" id="form">';
					$i=1;
					$query="select * from "._DB_PREFIX_."gallery";
	    			$row = Db::getInstance()->ExecuteS($query);
					
					foreach($row as $row)
					{
					$this->_html.='<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post" enctype="multipart/form-data">
					<tr valign="top">
					 <td width="313">'.$i.'</td>
					 <td width="313"><img src="'.__PS_BASE_URI__."modules/gogallery/pictures/".$row["g_imgmain"].'" width="100" height="100" /><br />
</td>
					<td><input type="file" name="main" id="mainimg" /></td>	
					 <td width="326"><input type="text" name="name" value="'.$row["g_name"].'" style="width: 300px;" /><input type="hidden" name="id" value="'.$row["g_id"].'" style="width: 300px;" /></td>
					 <td width="326"><textarea name="desc" id="desc" cols="45" rows="5">'.$row["g_desc"].'</textarea></td>
					 <td width="326"><a href="'.$_SERVER['PHP_SELF'].'?tab=AdminModules&amp;configure='.$this->name.'&amp;token='.$_GET['token'].'&id_gallery='.$row["g_id"].'"><img src="../img/admin/details.gif" /></a></td>
					 <td width="326"><input name="btnEGSubmit" type="image" src="../img/admin/edit.gif" /></td>
					 <td width="326"><input name="btnDGSubmit" type="image" src="../img/admin/delete.gif"/></td>
					</tr>
					</form>';
					
					$i++;
					
					}
					$this->_html.='<tr><td colspan="2" align="center"><div align="left"><br />
					        <font color="#FF0000"><sup>*</sup>'.$this->l('Campos requeridos').'</font></div></td></tr>
				</table>
			</fieldset>';
		
	
			
	}
	
	public function _displayFrmGalleryDetail($id_gallery){
		$this->_html.='<p>&nbsp;</p>
		<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post" enctype="multipart/form-data">
			<fieldset>
			<legend><img src="'.__PS_BASE_URI__.'modules/gogallery/logo.gif" />'.$this->l('Nueva Foto').'</legend>
				<table border="0" width="639" cellpadding="4" cellspacing="4" id="form">
					<tr>
					 <td><strong>'.$this->l("Fotografia").'*:</strong></td>
					 <td><input type="file" name="main"  /><input name="id_gallery" type="hidden" value="'.$id_gallery.'" /></td>
					</tr>					
					<tr><td colspan="2" align="center"><br /><input class="button" name="btnNGDSubmit" value="'.$this->l('Guardar').'" type="submit" /></td></tr>
					<tr><td colspan="2" align="center"><div align="left"><br />
					        <font color="#FF0000"><sup>*</sup>'.$this->l('Campos requeridos').'</font></div></td></tr>
				</table>
			</fieldset>
		</form><p>&nbsp;</p>';
	}
	
	public function _displayListGalleryDetail($id_gallery){
		
		$this->_html .=
		'
			<p>&nbsp;</p>
			<fieldset>
			<legend><img src="'.__PS_BASE_URI__.'modules/gogallery/logo.gif" />'.$this->l('Fotografias').'</legend>
				<table border="0" width="100%" cellpadding="4" cellspacing="4" id="form">';
					
					$query="select * from "._DB_PREFIX_."gallery_detail where g_id='$id_gallery'";
	    			$row = Db::getInstance()->ExecuteS($query);
					
					foreach($row as $row)
					{
					$this->_html.='<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post" enctype="multipart/form-data">
					<tr>
					 <td width="313"><img src="'.__PS_BASE_URI__."modules/gogallery/pictures/".$row["gd_img"].'" width="200" height="200" /></td>
					 <td width="326"><input type="hidden" name="id" value="'.$row["gd_id"].'" style="width: 300px;" /><input type="hidden" name="id_gallery" value="'.$id_gallery.'" style="width: 300px;" /></td>
					 <td width="326"><input name="btnDGDSubmit" type="image" src="../img/admin/delete.gif"/></td>
					</tr>
					</form>';
					
					}
					$this->_html.='<tr><td colspan="2" align="center"><div align="left"><br />
					        <font color="#FF0000"><sup>*</sup>'.$this->l('Campos requeridos').'</font></div></td></tr>
				</table>
			</fieldset>';
	
	}
	
	public function nextPage(){
		
		$page=$_POST['page'];
		
		$i=1;
		
		$query="select * from "._DB_PREFIX_."gallery";
		$row = Db::getInstance()->ExecuteS($query);
		foreach($row as $row){
		 $i++;	
		}
		
		$html='';
		$query="select * from "._DB_PREFIX_."gallery order by g_id desc LIMIT $page,4";
	  	$row = Db::getInstance()->ExecuteS($query);
		
		$nextpage=$page+4;
		$prevpage=$page-4;
		
		foreach($row as $row){
		 $html.='<div class="gal">
    			<a href="'.__PS_BASE_URI__.'modules/gogallery/pictures/'.$row["g_imgmain"].'" class="trip"><img src="'.__PS_BASE_URI__.'modules/gogallery/pictures/'.$row["g_imgmain"].'"></a>
				<!--div id="block_icons_gal">
                               <ul>
                                <li><img src="http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'themes/soona/img/soona_img/iconos/amor.png" class="img" /></li>
                                <li><img src="http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'themes/soona/img/soona_img/iconos/compromiso.png" class="img"  /></li>
                                <li><img src="http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'themes/soona/img/soona_img/iconos/corporativo.png" class="img" /></li>
                               </ul>
                              </div-->
  	 		</div>
			
			';
			
		 	$last_id=$row["g_id"];
		}
		
		
		if($last_id!=$this->getFirstIdImg()){
		$html.='<a href="javascript:;" onclick="next('.$nextpage.')" style="position:absolute; top:358px; right:0px;"><img src="'.__PS_BASE_URI__.'modules/gogallery/images/next.png"></a>';
		}
		if($prevpage!=-4){
			$html.='<a href="javascript:;" onclick="next('.$prevpage.')" style="position:absolute; top:358px; left:4px;"><img src="'.__PS_BASE_URI__.'modules/gogallery/images/prev.png"></a>'; 
		  }	
		
		return $html;
	}
	
	public function getFirstIdImg(){
	 $sql="select * from "._DB_PREFIX_."gallery order by g_id asc LIMIT 0,1";
	 $row = Db::getInstance()->ExecuteS($sql);
	 foreach($row as $row){
	   return $row["g_id"];	 
	 }	
	}
	
	//HOOKs
	
	public function hookdisplayRightColumn()
	{
	  $query="select * from "._DB_PREFIX_."gallery order by g_id desc LIMIT 0,1";
	  $row = Db::getInstance()->ExecuteS($query);
	  foreach($row as $row){
		$img=$row["g_imgmain"];  
	  }
	  
	  $this->smarty->assign('img',$img);
	  
	  return $this->display(__FILE__, 'startgallery.tpl');
	  	
	}
	
}
?>
