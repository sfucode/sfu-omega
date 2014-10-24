<article<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);

      // print render($content);
	print '<div class="product-sku">';
      print '<strong>SKU: '.$node->model.'</strong>';
	print '</div>';
	print '<div class="product-price">';
      print '<strong>PRICE: $'.money_format('%i', $node->sell_price).'</strong>';
	print '</div>';
	$pathr= $node->uc_product_image['und'][0]['filename'];
	$thumb= 'medium';
	print '<img style="float: right;border:1px solid #ccc; padding: 2px;margin-left: 10px;" src="'.image_style_url( $thumb, $pathr).'" />';
       	print $node->body['und']['0']['value'];
	print render($content['add_to_cart']);
// print_r($node);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>
