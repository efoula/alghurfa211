<?php
global $post_types;
if($post_types) {
foreach($post_types as $post_type) {
  $posttype_ar_name = get_translation($post_type);
?>
  <li>
      <a id="<?php echo $post_type; ?>" class="text-lg font-normal leading-normal transition-all duration-300 ease-in-out md:text-main hover:opacity-50">
          <?php echo $posttype_ar_name; ?>
      </a>
  </li>
<?php }} ?>