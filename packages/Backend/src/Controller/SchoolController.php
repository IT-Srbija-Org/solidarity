<?php
namespace Solidarity\Backend\Controller;

use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\School\Service\City;
use Solidarity\School\Service\School;
use Solidarity\School\Service\SchoolType;
use Tamtamchik\SimpleFlash\Flash;

class SchoolController extends AjaxCrudController
{
    const TITLE_VIEW = "View school";
    const TITLE_CREATE = "Create new school";
    const TITLE_UPDATE = "Edit school: ";
    const TITLE_UPDATE_SUCCESS = "School updated successfully.";
    const TITLE_CREATE_SUCCESS = "School created successfully.";
    const TITLE_DELETE_SUCCESS = "School deleted successfully.";
    const PATH = 'School';

    /**
     * @param School $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        School $service, Session $session, Config $config, Flash $flash, Engine $template, private City $city,
        private SchoolType $schoolType
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
    }

    public function form(): Response
    {
        $this->formData['cities'] = $this->city->getFilterData();
        $this->formData['types'] = $this->schoolType->getFilterData();

        return parent::form();
    }

    public function import()
    {
        ini_set('max_execution_time', 1200);
        foreach ($this->getConfig()->offsetGet('schoolsMap') as $key => $values) {
            $city = $this->city->create(['name' => $key]);
            foreach ($values as $value) {
                $type = null;
                if (str_contains($value, 'Osnovna') || str_contains($value, 'osnovna')) {
                    $type = $this->schoolType->getEntities(['name' => 'Osnovna škola'])[0];
                }
                if (str_contains($value, 'Srednja') || str_contains($value, 'srednja')) {
                    $type = $this->schoolType->getEntities(['name' => 'Srednja škola'])[0];
                }
                if (str_contains($value, 'Gimnazija') || str_contains($value, 'gimnazija')) {
                    $type = $this->schoolType->getEntities(['name' => 'Gimnazija'])[0];
                }
                if (str_contains($value, 'osnovno i srednje')) {
                    $type = $this->schoolType->getEntities(['name' => 'Škola za osnovno i srednje obrazovanje'])[0];
                }
                if (str_contains($value, 'balet') || str_contains($value, 'uzičk') || str_contains($value, 'balet') || str_contains($value, 'Balet')
                    || str_contains($value, 'primenjen')) {
                    $type = $this->schoolType->getEntities(['name' => 'Umetnička škola'])[0];
                }
                if (str_contains($value, 'ekonomsk') || str_contains($value, 'tehničk') || str_contains($value, 'Tehničk')
                || str_contains($value, 'poljoprivredn') || str_contains($value, 'Poljoprivredn') || str_contains($value, 'brodogradnju') || str_contains($value, 'Ekonomsk')
                || str_contains($value, 'Građevins') || str_contains($value, 'građevins') || str_contains($value, 'medicin') || str_contains($value, 'Medicin')  || str_contains($value, 'tručna')  || str_contains($value, 'gostitelj')
                    || str_contains($value, 'ašinsk') || str_contains($value, 'ehnološk')  || str_contains($value, 'aobraćajna') || str_contains($value, 'etnička')  || str_contains($value, 'izajn') || str_contains($value, 'oslovn')  || str_contains($value, 'emijsk') || str_contains($value, 'govačka')) {
                    $type = $this->schoolType->getEntities(['name' => 'Srednja stručna škola'])[0];
                }
                $this->service->create([
                    'name' => $value,
                    'city' => $city,
                    'schoolType' => $type,
                ]);
            }
        }


        die('done all');
    }
}