{*
 * Header Wrapper Template
 *
 * File: templates/default/header-wrapper.tpl
 * Description: Allows gradual migration from old header to new global header
 *
 * Usage in controller:
 *   if ($use_new_header) {
 *       $smarty->assign('use_new_header', true);
 *   }
 *   $smarty->assign('header', $smarty->fetch('default/header-wrapper.tpl'));
 *}

{if $use_new_header eq 1}
    {* Use new global header *}
    {include file="default/header-global.tpl"}
{else}
    {* Use existing header for backward compatibility *}
    {include file="default/header.tpl"}
{/if}
