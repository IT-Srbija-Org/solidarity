<?php
namespace Solidarity\Educator\Service;

use Solidarity\Educator\Repository\EducatorRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Educator\Filter\Educator as EducatorFilter;
use Tamtamchik\SimpleFlash\Flash;

class Educator extends TableView
{

    /**
     * @param EducatorRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        EducatorRepository $repo, Session $user, Logger $logger, EducatorFilter $filter, private \DateTime $dt
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function getForMapping()
    {
        return $this->repo->fetchForMapping();
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Educator\Entity\Educator $educator */
        foreach ($entities as $educator) {
            $itemData = [
                'id' => $educator->getId(),
                'name' =>  [
                    'value' => $educator->name,
                    'editColumn' => true,
                ],
                'amount' => number_format($educator->amount, 0, '.', ','),
                'status' => ($educator->status) ? 'Yes ': 'Ne',
                'schoolName' => $educator->schoolName,
//                'slipLink' => $educator->slipLink,
                'accountNumber' => $educator->accountNumber,
                'createdAt' => $educator->getCreatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $educator->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'schoolName', 'label' => 'School name'],
            ['name' => 'amount', 'label' => 'Amount', 'rangeFilter' => ['type' => 'number']],
            ['name' => 'accountNumber', 'label' => 'Account Number'],
            ['name' => 'status', 'label' => 'Status', 'filterData' => [0 => 'New', 1 => 'Ready']],
//            ['name' => 'slipLink', 'label' => 'slipLink'],
            ['name' => 'createdAt', 'label' => 'Created at'],
        ];

        return $columnDefinitions;
    }

}