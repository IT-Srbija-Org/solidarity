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

$statuses = \Solidarity\Donor\Entity\Donor::getHrStatuses();
$statusCollection = (new OptionCollection(new Option('1', 'New')))->fromArray($statuses, $data['model']?->status);
$statusSelect = (new Select('status', $statusCollection, 'Status'))
    ->required('Status is required', '');
$email = (new Email('email', $data['model']?->email, 'Email'));
//    ->emailInvalidMessage('Email is invalid');
$comment = (new \Skeletor\Form\InputTypes\TextArea\TextArea('comment', $data['model']->comment, 'Comment'));
$amount = (new \Skeletor\Form\InputTypes\Input\Number('amount', $data['model']?->amount, 'Amount'))
    ->required('amount is required');
$monthly = [1 => 'Yes', 0 => 'No'];
$monthlyCollection = (new OptionCollection(new Option('1', 'Yes')))->fromArray($monthly, $data['model']?->monthly);
$monthlySelect = (new Select('monthly', $monthlyCollection, 'Monthly'))
    ->required('Monthly is required', '');

$inputGroup1 = (new InputGroup())
    ->addInput($email)
    ->addInput($comment);

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup($inputGroup1)
    ->addInputGroup((new InputGroup())
        ->addInput($amount))
    ->addInputGroup((new InputGroup())
        ->addInput($monthlySelect))
    ->addInputGroup((new InputGroup())
        ->addInput($statusSelect))
);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>