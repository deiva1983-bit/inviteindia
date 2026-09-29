{$header}
<main id="main-content" role="main">
    {$content}
</main>
{* Exit-intent popup for homepage lead capture *}
{if $smarty.server.REQUEST_URI|strpos:'index.php' !== false}
    {include file="default/exit_intent_popup.tpl"}
{/if}
{$footer}
