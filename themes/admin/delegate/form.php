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
$statusCollection = (new OptionCollection(new Option('1', 'New')))->fromArray($statuses, $data['model']?->status);
$linkSentCollection = (new OptionCollection(new Option('0', 'No')))->fromArray($formLinkSent, $data['model']?->formLinkSent);
$statusSelect = (new Select('status', $statusCollection, 'Status'));
$formLinkSentSelect = (new Select('formLinkSent', $linkSentCollection, 'Form link sent?'));
$name = (new Text('name', $data['model']?->name, 'Name'));
$phone = (new Text('phone', $data['model']?->phone, 'Phone'));
$verifiedBy = (new Text('verifiedBy', $data['model']?->verifiedBy, 'Verified by'));
$schoolType = (new Text('schoolType', $data['model']?->schoolType, 'School type'));
$schoolName = (new Text('schoolName', $data['model']?->schoolName, 'School name'));
$city = (new Text('city', $data['model']?->city, 'City'));
$count = (new Text('count', $data['model']?->count, 'Count total', '0'));
$countBlocking = (new Text('countBlocking', $data['model']?->countBlocking, 'Count blocking', '0'));
$email = (new Email('email', $data['model']?->email, 'Email'));
//    ->emailInvalidMessage('Email is invalid');
$comment = (new \Skeletor\Form\InputTypes\TextArea\TextArea('comment', $data['model']?->comment, 'Comment'));
$sendRoundStartMail = (new Checkbox('sendRoundStartMail', false, 'Pošalji email za prijavu oštećenih'));
$school = (new Hidden(name: 'school', value: $data['model']?->school->id));

$inputGroup1 = (new InputGroup())
    ->addInput($email)
    ->addInput($school)
    ->addInput($schoolType)
    ->addInput($verifiedBy);
$inputGroup2 = (new InputGroup())
    ->addInput($name)
    ->addInput($schoolName)
    ->addInput($count);
$inputGroup3 = (new InputGroup())
    ->addInput($phone)
    ->addInput($city)
    ->addInput($countBlocking);
$inputGroup4 = (new InputGroup())
    ->addInput($formLinkSentSelect)
    ->addInput($statusSelect)
    ->addInput($comment)
    ->addInput($sendRoundStartMail);

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup($inputGroup1)
    ->addInputGroup($inputGroup2)
    ->addInputGroup($inputGroup3)
    ->addInputGroup($inputGroup4)
);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>
