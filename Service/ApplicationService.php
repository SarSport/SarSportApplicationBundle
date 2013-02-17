<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace SarSport\Bundle\SarSportApplicationBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use SarSport\Bundle\SarSportApplicationBundle\Entity\ApplicationManager;
use SarSport\Bundle\SarSportApplicationBundle\Events;
use SarSport\Bundle\SarSportApplicationBundle\Event\ApplicationPersistEvent;
use SarSport\Bundle\SarSportApplicationBundle\Event\ApplicationRemoveEvent;
use SarSport\Bundle\SarSportApplicationBundle\Event\ApplicationEvent;
use SarSport\Bundle\SarSportApplicationBundle\Exception\ApplicationException;
use SarSport\Bundle\SarSportApplicationBundle\Model\ApplicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationService
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var ApplicationManager
     */
    protected $manager;

    public function __construct(EventDispatcherInterface $eventDispatcher, ApplicationManager $manager)
    {
        $this->dispatcher = $eventDispatcher;
        $this->manager = $manager;
    }

    /**
     * Saves application entities
     *
     * @param ApplicationInterface $application
     * @throws ApplicationException
     */
    public function save(ApplicationInterface $application)
    {
        $event = new ApplicationPersistEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_PRE_PERSIST, $event);

        if ($event->isPersistenceAborted()) {
            throw ApplicationException::savingAbortedByPrePersistEvent();
        }

        $this->manager->save($application, true);

        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_POST_PERSIST, $event);
    }

    /**
     * Removes application entities
     *
     * @param ApplicationInterface $application
     * @throws ApplicationException
     */
    public function remove(ApplicationInterface $application)
    {
        $event = new ApplicationRemoveEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_PRE_REMOVE, $event);

        if ($event->isRemovingAborted()) {
            throw ApplicationException::removingAbortedByPreRemovingEvent();
        }

        $this->manager->remove($application, true);

        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_POST_REMOVE, $event);
    }

    /**
     * Saves application entities
     *
     * @param ApplicationInterface $application
     */
    public function create()
    {
        $application = $this->manager->create();
        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_CREATE, $event);

        return $application;
    }

    /**
     * Returns application
     *
     * @param integer $id
     * @return ApplicationInterface
     */
    public function findApplicationById($id)
    {
        return $this->manager->find($id);
    }

    /**
     * @param $competition
     * @return ApplicationInterface[]
     */
    public function findByCompetition($competition)
    {
        return $this->manager->findByCompetition($competition);
    }

    /**
     * Returns EventDispatcher
     *
     * @return EventDispatcherInterface
     */
    protected function getDispatcher()
    {
        return $this->dispatcher;
    }
}
