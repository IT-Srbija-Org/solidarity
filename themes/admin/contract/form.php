<?php

use Skeletor\Form\InputGroup\InputGroup;
use Skeletor\Form\InputGroup\InputGroupWidth;
use Skeletor\Form\InputTypes\ContentEditor\ContentEditor;
use Skeletor\Form\InputTypes\Input\Checkbox;
use Skeletor\Form\InputTypes\Input\Date;
use Skeletor\Form\InputTypes\Input\Email;
use Skeletor\Form\InputTypes\Input\Hidden;
use Skeletor\Form\InputTypes\Input\Number;
use Skeletor\Form\InputTypes\Input\Password;
use Skeletor\Form\InputTypes\Input\Text;
use Skeletor\Form\InputTypes\Select\Collection\OptionCollection;
use Skeletor\Form\InputTypes\Select\Select;
use Skeletor\Form\Renderer\TabbedFormRenderer;
use Skeletor\Form\Tab\Tab;
use Skeletor\Form\TabbedForm;

$form = new TabbedForm($data['formAction'], $data['dataAction'], $this->formTokenArray());
$action = $data['dataAction'] === 'create' ? 'Create' : 'Edit';

$deadline = (new Text('deadline', $data['model']?->deadline, 'Deadline'))
    ->required('Deadline is required');
$number = (new Text('number', $data['model']?->number, 'Number'))
    ->required('Number is required');
$info = (new Text('info', $data['model']?->info, 'Info'));
$amount = (new Text('amount', $data['model']?->getDisplayPrice(), 'Amount'))
    ->required('Amount is required');
$currency = (new Text('currency', $data['model']?->currency, 'Currency'))
    ->required('Currency is required');

$servicesCollection = (new OptionCollection())->fromArray($data['services'], $data['model']?->service->id);
$servicesSelect = (new Select('service', $servicesCollection, 'Select service'));
$tenantCollection = (new OptionCollection())->fromArray($data['tenants'], $data['model']?->tenant->id);
$tenantSelect = (new Select('tenant', $tenantCollection, 'Owner'));
$currencyCollection = (new OptionCollection())->fromArray(\Fakture\Price\Entity\Price::getHrCurrencies(), $data['model']?->currency);
$currencySelect = (new Select('currency', $currencyCollection, 'Currency'))
    ->required('Currency is required', $currencyCollection->getDefaultOption()->getValue());

$signedAt = (new Date('signedAt', $data['model']->signedAt?->format('Y-m-d'), $this->t('Signed at')));
$validUntil = (new Date('validUntil', $data['model']->validUntil?->format('Y-m-d'), $this->t('Valid until')));

$priceAmount = 0;
if ($data['model']?->amount) {
    $priceAmount = number_format($data['model']->amount, 2, '.');
}
$price = (new Number('amount', $priceAmount, 'Price', 'E.g. 123.12'))
    ->required('Price is required')
    ->addAttribute(new \Skeletor\Form\Attribute\Attribute('step', '.01'));

$inputGroup1 = (new InputGroup())
    ->addInput($servicesSelect)
    ->addInput($amount)
    ->addInput($currencySelect);

$inputGroup2 = (new InputGroup())
    ->addInput($deadline)
    ->addInput($number)
    ->addInput($info)
    ->addInput((new Hidden('donor', $data['model']?->client->id)));
if (!$data['loggedInTenantId']) {
    $inputGroup2->addInput($tenantSelect);
} else {
    $inputGroup2->addInput(new Hidden('tenant', $data['loggedInTenantId']));
}

$inputGroup3 = (new InputGroup())
    ->addInput($signedAt)
    ->addInput($validUntil);

$form->addTab((new Tab('Basic Info'))
    ->addInputGroup($inputGroup1)
    ->addInputGroup($inputGroup2)
    ->addInputGroup($inputGroup3));

$formRenderer = new TabbedFormRenderer($form, $data['formTitle']);
?>
<?= $formRenderer->render() ?>