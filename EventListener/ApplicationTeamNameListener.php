<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\SarSportApplicationBundle\EventListener;

use DateTime;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use SarSport\Bundle\SarSportApplicationBundle\Events;
use SarSport\Bundle\SarSportApplicationBundle\Event\ApplicationEvent;

/**
 * Updates date and time in the application
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationTeamNameListener implements EventSubscriberInterface
{
    /**
     * Update DateTime value in application
     *
     * @param ApplicationEvent $event
     */
    public function setTeamName(ApplicationEvent $event)
    {
        $application = $event->getApplication();

        if ($application->getId() != null) {
            $application->setTeamName($application->getCity());
        }
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            Events::APPLICATION_CREATE => 'setTeamName',
            Events::APPLICATION_PRE_PERSIST => 'setTeamName'
        );
    }
}
