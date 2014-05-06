{if isset($tmleftbanner_slides)}
<div id="tm_leftbanner">
	<ul>
	{assign var='ItemsPerLine' value=1}
	{foreach from=$tmleftbanner_slides item=slide name=columnBanner}
	{if $slide.active}
		<li>
			<a href="{$slide.url}" target="_blank">
				<img src="{$smarty.const._MODULE_DIR_}/tmleftbanner/images/{$slide.image}" alt="{$slide.title}" title="{$slide.title}" />
			</a>
		</li>
	{/if}
	{/foreach}
	</ul>
</div>
{/if}
