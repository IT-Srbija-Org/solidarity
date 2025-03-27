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

$statuses = [1 => 'Active', 0 => 'Inactive'];
$statusCollection = (new OptionCollection(new Option('1', 'Status')))->fromArray($statuses, $data['model']?->status);
$statusSelect = (new Select('status', $statusCollection, 'Status'))
    ->required('Status is required', '');
$name = (new Text('name', $data['model']?->name, 'Name'));
$amount = (new \Skeletor\Form\InputTypes\Input\Number('amount', $data['model']?->amount, 'Amount'))
    ->required('amount is required');
$accountNumber = (new \Skeletor\Form\InputTypes\Input\Number('accountNumber', $data['model']?->accountNumber, 'Account number'));
$slipLink = (new Text('slipLink', $data['model']?->slipLink, 'Slip link'));
$schoolName = (new Text('schoolName', $data['model']?->schoolName, 'School name'));
$comment = (new \Skeletor\Form\InputTypes\TextArea\TextArea('comment', $data['model']?->comment, 'Comment'));

$inputGroup1 = (new InputGroup())
    ->addInput($name)
    ->addInput($accountNumber)
    ->addInput($amount)
    ->addInput($schoolName);
$inputGroup2 = (new InputGroup())
    ->addInput($slipLink)
    ->addInput($statusSelect)
    ->addInput($comment);

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup($inputGroup1)
    ->addInputGroup($inputGroup2)
);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>