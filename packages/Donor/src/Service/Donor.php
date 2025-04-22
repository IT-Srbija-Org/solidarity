<?php
namespace Solidarity\Donor\Service;

use Solidarity\Donor\Repository\DonorRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Donor\Filter\Donor as DonorFilter;
use Solidarity\Mailer\Service\Mailer;
use Tamtamchik\SimpleFlash\Flash;

class Donor extends TableView
{

    /**
     * @param DonorRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        DonorRepository $repo, Session $user, Logger $logger, DonorFilter $filter, private \DateTime $dt,
        private Mailer $mailer
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function getForMapping()
    {
        return $this->repo->fetchForMapping();
    }

    public function create(array $data)
    {
        $entity = $this->getEntities(['email' => $data['email']]);
        if (count($entity)) {
            $data['id'] = $entity[0]->id;
            $entity = parent::update($data);
        } else {
            $entity = parent::create($data);
        }
        $this->mailer->sendDonorRegisteredMail($entity->email);

        return $entity;
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Donor\Entity\Donor $donor */
        foreach ($entities as $donor) {
            $itemData = [
                'id' => $donor->getId(),
                'email' =>  [
                    'value' => $donor->email,
                    'editColumn' => true,
                ],
                'amount' => number_format($donor->amount, 0, '.', ','),
                'status' => \Solidarity\Donor\Entity\Donor::getHrStatus($donor->status),
                'monthly' => ($donor->monthly) ? 'Yes ': 'No',
                'createdAt' => $donor->getCreatedAt()->format('d.m.Y'),
                'updatedAt' => $donor->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $donor->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {
        $columnDefinitions = [
            ['name' => 'email', 'label' => 'Email'],
            ['name' => 'status', 'label' => 'Status', 'filterData' => \Solidarity\Donor\Entity\Donor::getHrStatuses()],
            ['name' => 'monthly', 'label' => 'Monthly', 'filterData' => [0 => 'No', 1 => 'Yes']],
            ['name' => 'amount', 'label' => 'Amount', 'rangeFilter' => ['type' => 'number']],
            ['name' => 'updatedAt', 'label' => 'Updated at'],
            ['name' => 'createdAt', 'label' => 'Created at'],
        ];

        return $columnDefinitions;
    }

}