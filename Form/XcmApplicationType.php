<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\SarSportApplicationBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\ClassType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\SexType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\TShirtSizeType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\XcmCompetitionType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\XcmGroupType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\YearType;

class XcmApplicationType extends ApplicationType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('competition', new XcmCompetitionType(), array('label' => 'application.competition'))
            ->add('city', null, array('label' => 'application.city'))
            ->add('phonenumber', null, array('label' => 'application.phonenumber'))
            ->add('class', new ClassType(), array('label' => 'application.class'))
            ->add('group', new XcmGroupType(), array('label' => 'application.group'))
            ->add('comment', null, array('label' => 'application.comment'))
            ->add('firstPlayerFirstName', null, array('label' => 'application.player_firstname'))
            ->add('firstPlayerLastName', null, array('label' => 'application.player_lastname'))
            ->add('firstPlayerBirthday', new YearType(), array('label' => 'application.birthday'))
            ->add('firstPlayerSex', new SexType(), array('label'=> 'application.sex'))
            ->add('firstPlayerTShirt', null, array('label' => 'application.t-shirt'))
            ->add('firstPlayerTShirtSize', new TShirtSizeType(),  array('label' => 'application.t-shirt_size', 'required' => false))
        ;
    }
}
