<script type="text/javascript" src="{$base_dir}modules/gogallery/js/jquery.js"></script>
<script type="text/javascript" src="{$base_dir}modules/gogallery/js/jquery.lightbox-0.5x.js"></script>
<link rel="stylesheet" type="text/css" href="{$base_dir}modules/gogallery/css/jquery.lightbox-0.5.css" media="screen" />
{literal}
<style type="text/css">
<!--
#gallery {
	margin: 0px;
	padding: 0px;
	width: 100%;
}
#gallery .gal img {
	border: 20px solid #CCCCCC;
	float: left;
	width: 200px;
	height: 200px;
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
	height: 250px;
	width: 236px;
}
-->
</style>



{/literal}

<div id="gallery">
{foreach from=$gallery_detail item=g}
 <div class="gal">
    	<a href="{$base_dir}modules/gogallery/pictures/{$g.gd_img}" class="trip"><img src="{$base_dir}modules/gogallery/pictures/{$g.gd_img}"></a>
  	  </div>		
{/foreach}
</div>
{literal}
 <script>
 var gal = jQuery.noConflict();
 gal(document).ready(function(){
 	gal('#gallery .trip').lightBox();;
 });
</script>
{/literal}
