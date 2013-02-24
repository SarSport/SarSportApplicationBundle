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

use Symfony\Component\Security\Core\User\UserInterface;
use SarSport\Bundle\UserBundle\Entity\User;
use SarSport\Bundle\SarSportApplicationBundle\Model\Application as BaseApplication;
use SarSport\Bundle\SarSportApplicationBundle\Model\SignedApplicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Application extends BaseApplication implements SignedApplicationInterface
{
    const RACE_MULTIGONKA_SLUG = 'stay-alive';
    const RACE_XCM_SLUG = 'xcm-2013';
    const RACE_MULTIGONKA_NAME = 'application.competitions_name.multigonka';
    const RACE_XCM_NAME = 'application.competitions_name.xcm';

    const APPLICATION_SEX_MAN_NAME = 'application.sex_name.man';
    const APPLICATION_SEX_WOMAN_NAME = 'application.sex_name.woman';
    const APPLICATION_SEX_MAN_VALUE = 1;
    const APPLICATION_SEX_WOMAN_VALUE = 2;

    const APPLICATION_GROUP_MM_NAME = 'application.group_name.mm';
    const APPLICATION_GROUP_MW_NAME = 'application.group_name.mw';
    const APPLICATION_GROUP_MMR_NAME = 'application.group_name.mmr';
    const APPLICATION_GROUP_MWR_NAME = 'application.group_name.mwr';
    const APPLICATION_GROUP_MJ_NAME = 'application.group_name.mj';
    const APPLICATION_GROUP_MA_NAME = 'application.group_name.ma';
    const APPLICATION_GROUP_MR_NAME = 'application.group_name.mr';
    const APPLICATION_GROUP_WJ_NAME = 'application.group_name.wj';
    const APPLICATION_GROUP_WA_NAME = 'application.group_name.wa';
    const APPLICATION_GROUP_WR_NAME = 'application.group_name.wr';
    const APPLICATION_GROUP_MM_VALUE = 1;
    const APPLICATION_GROUP_MW_VALUE = 2;
    const APPLICATION_GROUP_MMR_VALUE = 3;
    const APPLICATION_GROUP_MWR_VALUE = 4;
    const APPLICATION_GROUP_MJ_VALUE = 5;
    const APPLICATION_GROUP_MA_VALUE = 6;
    const APPLICATION_GROUP_MR_VALUE = 7;
    const APPLICATION_GROUP_WJ_VALUE = 8;
    const APPLICATION_GROUP_WA_VALUE = 9;
    const APPLICATION_GROUP_WR_VALUE = 10;

    const APPLICATION_CLASS_SPORT_NAME = 'application.class_name.sport';
    const APPLICATION_CLASS_TOURISM_NAME = 'application.class_name.tourism';
    const APPLICATION_CLASS_SPORT_VALUE = 1;
    const APPLICATION_CLASS_TOURISM_VALUE = 2;

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var User
     */
    protected $user;

    /**
     * {@inheritDoc}
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     *
     * @param User $user
     * @return Application
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
