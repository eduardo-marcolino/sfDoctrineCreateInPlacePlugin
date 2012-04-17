<form method="post" action="<?php echo url_for('sfDoctrineCreateInPlace/create?model='.$sf_params->get('model').'&id='.$sf_params->get('id'))?>" <?php echo $form->isMultipart() ? 'enctype="multipart/form-data"' : '' ?>>
  <table style="padding:30px;">  
    <?php echo $form ?>
    <tr>
      <td colspan="2"><input type="submit" value="Salvar"></td>
    </tr>
  </table>
</form>

<script type="text/javascript">
  <?php if(!$form->getObject()->isNew()): ?>
    var newOption   = opener.document.createElement('option');
    newOption.text  =  '<?php echo $form->getObject() ?>'
    newOption.value = '<?php echo $form->getObject()->getId() ?>';
    
    parentSelect = opener.document.getElementById('<?php echo $sf_params->get('id') ?>');
    try {
      parentSelect.add(newOption, null); // standards compliant; doesn't work in IE
    } catch(ex) {
      parentSelect.add(newOption);
    }
    
    parentSelect.value = newOption.value;
    self.close();
  <?php endif; ?>
</script>


<?php use_javascripts_for_form($form) ?>