<?php

use Skeletor\Form\InputGroup\InputGroup;
use Skeletor\Form\InputGroup\InputGroupWidth;
use Skeletor\Form\InputTypes\ContentEditor\ContentEditor;
use Skeletor\Form\InputTypes\Input\Email;
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

$statuses = \Solidarity\Educator\Entity\Educator::getHrStatuses();
$statusCollection = (new OptionCollection(new Option('1', 'New')))->fromArray($statuses, $data['model']?->status);
$statusSelect = (new Select('status', $statusCollection, 'Status'));
$name = (new Text('name', $data['model']?->name, 'Name'));
$amount = (new \Skeletor\Form\InputTypes\Input\Number('amount', $data['model']?->amount, 'Amount'));
$accountNumber = (new \Skeletor\Form\InputTypes\Input\Number('accountNumber', $data['model']?->accountNumber, 'Account number'));
$city = (new Text('city', $data['model']?->city, 'City'));
$comment = (new \Skeletor\Form\InputTypes\TextArea\TextArea('comment', $data['model']?->comment, 'Comment'));
$schoolName = (new Text('schoolName', $data['model']?->schoolName, 'School name'));
$school = (new Hidden(name: 'school', value: $data['model']?->school->id));

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup((new InputGroup())
        ->addInput($name)
        ->addInput($school)
        ->addInput($comment))
    ->addInputGroup((new InputGroup())
        ->addInput($accountNumber)
        ->addInput($schoolName))
    ->addInputGroup((new InputGroup())
        ->addInput($amount)
        ->addInput($city))
    ->addInputGroup((new InputGroup())
        ->addInput($statusSelect))
);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>