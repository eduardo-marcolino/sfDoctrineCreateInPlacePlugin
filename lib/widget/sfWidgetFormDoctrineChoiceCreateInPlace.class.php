<?php
/**
 * sfWidgetFormDoctrineChoiceCreateInPlace represents a select with the option to 
 * create a choice withou leave the current form
 * 
 * @package     sfDoctrineCreateInPlacePlugin
 * @subpackage  widget
 * @author      Eduardo Marcolino <eduardo.marcolino@gmail.com>
 * @version     0.1
 */
class sfWidgetFormDoctrineChoiceCreateInPlace extends sfWidgetFormDoctrineChoice 
{
  
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('width', 600);
    $this->addOption('height', 400);
    $this->addOption('url', sfContext::getInstance()->getController()->genUrl('sfDoctrineCreateInPlace/create'));
    
    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $script = '
      <script type="text/javascript">
        $("#'.$this->generateId($name).'_add").click(function(){
          window.open("'.$this->getOption('url').'?model='.$this->getOption('model').'&id='.$this->generateId($name).'","page","toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='.$this->getOption('width').',height='.$this->getOption('height').'");
        })
      </script>
    ';
    
    $input = parent::render($name, $value, $attributes, $errors);
    return $input.' '.image_tag('/sf/sf_admin/images/add.png', array('style' => 'cursor: pointer','id' => $this->generateId($name).'_add')).$script;
  }
}
?>
