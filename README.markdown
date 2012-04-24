sfDoctrineCreateInPlacePlugin
=============================

## Installation ##

Install plugin:

    symfony plugin:install sfDoctrineCreateInPlacePlugin -s alpha


## Usage ##

First, enable the sfDoctrineCreateInPlace module in the settings.yml:
    
    all:
        .settings:
             ...
             enabled_modules:         [ default, sfDoctrineCreateInPlace ]


Then, change your form:

    [php]
    $this->widgetSchema['author_id'] = new sfWidgetFormDoctrineChoiceCreateInPlace(array(
        'height' => 300,
        'model' => $this->getRelatedModelName('Author'), 
        'add_empty' => false
    ));

