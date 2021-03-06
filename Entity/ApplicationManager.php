<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\SarSportApplicationBundle\Entity;

use Doctrine\ORM\EntityManager;
use Fightmaster\Model\Manager\DoctrineManager;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationManager extends DoctrineManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     * @param string $class
     */
    public function __construct(EntityManager $entityManager, $class)
    {
        parent::__construct($entityManager, $class);
        $this->entityManager = $entityManager;
    }

    /**
     * @param $competition
     * @return Application[]
     */
    public function findByCompetition($competition)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $query = $qb->select('a', 'u')
            ->from($this->getClass(), 'a')
            ->innerJoin('a.user', 'u')
            ->where('a.competition = :competition')
            ->orderBy('a.class')
            ->addOrderBy('a.group')
            ->setParameter('competition', $competition)
            ->getQuery();
        return $query->execute();
        //return $this->findBy(array('competition' => $competition));
    }
}
