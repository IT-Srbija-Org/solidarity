<?php

use Skeletor\User\Entity\User;
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

//@todo some roles can't change some settings, for example staff cant change their role or other user roles
$statuses = [1 => 'Active', 0 => 'Inactive'];
$roles = User::getHrRoles();
if ($data['loggedInTenantId']) {
    unset($roles[User::ROLE_ADMIN]);
}
$rolesCollection = (new OptionCollection(new Option('3', 'Merchant admin')))->fromArray($roles, $data['model']?->role);
$statusCollection = (new OptionCollection(new Option('1', 'Active')))->fromArray($statuses, $data['model']?->isActive);
$email = (new Email('email', $data['model']?->email, 'Email'))
    ->required('Email is required')
    ->emailInvalidMessage('Email is invalid');
$firstName = (new Text('firstName', $data['model']?->firstName, 'First Name'))
    ->required('First Name is required')
    ->minLength(2, 'First Name must be at least 2 characters');
$lastName = (new Text('lastName', $data['model']?->lastName, 'Last Name'))
    ->required('Last Name is required')
    ->minLength(2, 'Last Name must be at least 2 characters');
$displayName = (new Text('displayName', $data['model']?->displayName, 'Display Name'))
    ->required('Display Name is required')
    ->minLength(4, 'Display Name must be at least 4 characters');
$password = (new Password('password', '', 'Password', id: 'password'))
    ->required('Password is required', $action === 'Create')
    ->minLength(6, 'Password must be at least 6 characters', $action === 'Create')
    ->matches('confirmPassword', 'Passwords do not match');
$confirmPassword = (new Password('password2', '', 'Confirm Password', id: 'confirmPassword'))
    ->required('Confirm Password is required', $action === 'Create')
    ->minLength(6, 'Confirm Password must be at least 6 characters', $action === 'Create')
    ->matches('password', 'Passwords do not match');
$rolesSelect = (new Select('role', $rolesCollection, 'Role'));
//    ->required('Role is required', $rolesCollection->getDefaultOption()->getValue());
$statusSelect = (new Select('isActive', $statusCollection, 'Status'));


$groupOne = (new InputGroup())
    ->addInput($email)
    ->addInput($firstName)
    ->addInput($lastName);

$groupTwo = (new InputGroup())
    ->addInput($displayName)
    ->addInput($password)
    ->addInput($confirmPassword);

$groupThree = (new InputGroup())
    ->addInput($rolesSelect)
    ->addInput($statusSelect);

$basicInfoTab = (new Tab('Basic Info'))
    ->addInputGroup($groupOne)
    ->addInputGroup($groupTwo)
    ->addInputGroup($groupThree);

$form->addTab($basicInfoTab);

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>

