<?php

class sfDoctrineCreateInPlaceActions extends sfActions
{
  public function executeCreate(sfWebRequest $request) 
  { 
    $className = sprintf('%sForm',$request->getParameter('model'));
    $this->form = new $className();
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->form->save();
      }
    }
  }
}
?>
