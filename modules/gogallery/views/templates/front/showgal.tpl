<script type="text/javascript" src="{$base_dir}modules/gogallery/js/jquery.js"></script>
<script type="text/javascript" src="{$base_dir}modules/gogallery/js/jquery.lightbox-0.5x.js"></script>
<link rel="stylesheet" type="text/css" href="{$base_dir}modules/gogallery/css/jquery.lightbox-0.5.css" media="screen" />
{literal}
<style type="text/css">
<!--
#gallery {
	margin: 0px;
	padding: 0 0 0 23px;
	width: 100%;
}
#gallery .gal img {
	/*border: 20px solid #CCCCCC;*/
	float: left;
	width: 467px;
	height: 394px;
}
#gallery .gal p {
	float: left;
	width: 250px;
	margin: 0px;
	padding: 0px;
}
#gallery .gal {
	margin: 5px;
	padding: 0px;
	float: left;
	/*height: 700px;
	width: 900px;*/
}

#lightbox-container-image-box {
  max-width:970px; // Or your max-width
}

#block_icons_gal{
	position:absolute;
	padding-left: 26em;
}

#block_icons _gal ul{
	padding:0;
	margin:0;
	
}

#block_icons_gal ul li{
	list-style:none;
}

#block_icons_gal ul li .img{
	width:42px;
	height:42px;
}

#soona_icons_gal{
	position:absolute;
	top:7px;
	right:24px;
}

#soona_icons_gal ul{
	padding:0;
	margin:0;
	
}

#soona_icons_gal ul li{
	list-style:none;
	float:left;
	margin-right:3px;
}

#soona_icons_gal ul li .img{
	width:42px;
	height:42px;
}

#txt{
	position:absolute;
	top:-17px;
	right:0px;
	
}
-->
</style>



{/literal}
    <h1 class="titulo">{l s="Galeria de fotos" mod="gogallery"}</h1>
    <div id="sello_galeria"><img src="{$img_dir}soona_img/images_soona/icono_galeria.png"/></div>
    <div id="txt">{l s="Si te gusta algún arreglo que viste en la galería, puedes llamarnos al teléfono 6273 0078" mod="gogallery"}</div>
    <div id="soona_icons_gal">
        <ul>
            <li class="hint--bottom" data-hint="Amistad"><img src="{$img_dir}soona_img/iconos/amistad.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Ampr"><img src="{$img_dir}soona_img/iconos/amor.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Compromiso"><img src="{$img_dir}soona_img/iconos/compromiso.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Corporativo"><img src="{$img_dir}soona_img/iconos/corporativo.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Hogar"><img src="{$img_dir}soona_img/iconos/hogar.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Nacimiento"><img src="{$img_dir}soona_img/iconos/nacimiento.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Reconciliación"><img src="{$img_dir}soona_img/iconos/reconciliacion.png" class="img" /></li>
            <li class="hint--bottom" data-hint="Salud"><img src="{$img_dir}soona_img/iconos/salud.png" class="img" /></li>
        </ul>
    </div>
    <div id="gallery">
        {foreach from=$gallery item=g}
        <div class="gal">
            <a href="{$base_dir}modules/gogallery/pictures/{$g.g_imgmain}" class="trip"><img src="{$base_dir}modules/gogallery/pictures/{$g.g_imgmain}"></a>
            <!--div id="block_icons_gal">
                <ul>
                    <li><img src="{$img_dir}soona_img/iconos/amor.png" class="img" /></li>
                    <li><img src="{$img_dir}soona_img/iconos/compromiso.png" class="img"  /></li>
                    <li><img src="{$img_dir}soona_img/iconos/corporativo.png" class="img" /></li>
                </ul>
            </div-->
        </div>
        {/foreach}
<a href="javascript:;" onclick="next(4)" style="position:absolute; top:358px; right:4px;"><img src="{$base_dir}modules/gogallery/images/next.png"></a>
</div>
{literal}
 <script>
 var gal = jQuery.noConflict();
 gal(document).ready(function(){
 	gal('#gallery .trip').lightBox();
 });
 
 gal(document).click(function(){
 	gal('#gallery .trip').lightBox();
 });
 
 
 function next(page){
	 $.ajax({
	 type:'POST',
	 url:'modules/gogallery/getNextPage.php',
	 async:false,
	 data:"page="+page,
	 success: function(data){
		document.getElementById('gallery').innerHTML=data; 
	  }	
	});	 
 }
 
 function startLightbox(){
	 
 }
</script>
{/literal}
