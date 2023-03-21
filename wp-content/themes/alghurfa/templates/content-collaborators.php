<?php
global $collaborators;
if($collaborators) {
foreach($collaborators as $collaborator) {
  $collaborator_id = $collaborator[0];
  $collaborator_name = get_term( $collaborator_id )->name;
?>
  <li>
      <a class="text-lg font-normal leading-normal transition-all duration-300 ease-in-out md:text-main hover:opacity-50" data-colid="<?php echo $collaborator_id; ?>">
          <?php echo $collaborator_name; ?>
      </a>
  </li>
<?php }} ?>