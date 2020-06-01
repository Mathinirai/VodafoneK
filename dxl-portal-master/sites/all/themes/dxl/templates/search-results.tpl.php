<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<div class="content dxl-search-results"> 
<?php if ($search_results): ?>
    <h3 class="heading heading--3 heading--center heading--leading space--bottom search-snack__heading">
        <?php print $search_totals; ?>
    </h3>
    <table class="table table--search table--dark">
        <tbody class="table__body">
            <?php print $search_results; ?>
        </tbody>    
    </table>
    <?php print $pager; ?>
  <?php else : ?>
    <h2><?php print t('Your search yielded no results');?></h2>
    <?php print search_help('search#noresults', drupal_help_arg()); ?>
  <?php endif; ?>
</div>  


 
