<?php

use Skeletor\Form\InputGroup\InputGroup;
use Skeletor\Form\InputGroup\InputGroupWidth;
use Skeletor\Form\InputTypes\ContentEditor\ContentEditor;
use Skeletor\Form\InputTypes\Input\Email;
use Skeletor\Form\InputTypes\Input\Checkbox;
use Skeletor\Form\InputTypes\Input\Hidden;
use Skeletor\Form\InputTypes\Input\Password;
use Skeletor\Form\InputTypes\Input\Text;
use Skeletor\Form\InputTypes\Select\Collection\OptionCollection;
use Skeletor\Form\InputTypes\Select\Option;
use Skeletor\Form\InputTypes\Select\Select;
use Skeletor\Form\Renderer\TabbedFormRenderer;
use Skeletor\Form\Tab\Tab;
use Skeletor\Form\TabbedForm;

$form = new TabbedForm($data['formAction'], $data['dataAction'], $this->formTokenArray());

$action = $data['dataAction'] === 'create' ? 'Create' : 'Edit';

$statuses = \Solidarity\Delegate\Entity\Delegate::getHrStatuses();
$formLinkSent = [1 => 'Yes', 0 => 'No'];
$cityCollection = (new OptionCollection())->fromArray($data['cities'], $data['model']?->city->id);
$citySelect = (new Select('city', $cityCollection, 'City'));
$typeCollection = (new OptionCollection())->fromArray($data['types'], $data['model']?->schoolType->id);
$typeSelect = (new Select('schoolType', $typeCollection, 'School type'));

$name = (new Text('name', $data['model']?->name, 'Name'));

$inputGroup1 = (new InputGroup())
    ->addInput($name);
$inputGroup2 = (new InputGroup())
    ->addInput($citySelect);
$inputGroup3 = (new InputGroup())
    ->addInput($typeSelect);

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup($inputGroup1)
    ->addInputGroup($inputGroup2)
    ->addInputGroup($inputGroup3)
);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>