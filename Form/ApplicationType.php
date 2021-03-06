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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\SexType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\ClassType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\CompetitionType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\GroupType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\YearType;
use SarSport\Bundle\SarSportApplicationBundle\Form\Extension\TShirtSizeType;

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('competition', new CompetitionType(), array('label' => 'application.competition'))
            ->add('teamName', null, array('label' => 'application.teamName'))
            ->add('phonenumber', null, array('label' => 'application.phonenumber'))
            ->add('class', new ClassType(), array('label' => 'application.class'))
            ->add('group', new GroupType(), array('label' => 'application.group'))
            ->add('city', null, array('label' => 'application.city'))
            ->add('comment', null, array('label' => 'application.comment'))
            ->add('additionalMaps', null, array('label' => 'application.additionalMaps'))
            ->add('firstPlayerFirstName', null, array('label' => 'application.player_firstname'))
            ->add('firstPlayerLastName', null, array('label' => 'application.player_lastname'))
            ->add('firstPlayerBirthday', new YearType(), array('label' => 'application.birthday'))
            ->add('firstPlayerSex', new SexType(), array('label'=> 'application.sex'))
            ->add('firstPlayerTShirt', null, array('label' => 'application.t-shirt'))
            ->add('firstPlayerTShirtSize', new TShirtSizeType(),  array('label' => 'application.t-shirt_size', 'required' => false))
            ->add('secondPlayerFirstName', null, array('label' => 'application.player_firstname'))
            ->add('secondPlayerLastName', null, array('label' => 'application.player_lastname'))
            ->add('secondPlayerBirthday', new YearType(), array('label' => 'application.birthday'))
            ->add('secondPlayerSex', new SexType(), array('label'=> 'application.sex'))
            ->add('secondPlayerTShirt', null,  array('label' => 'application.t-shirt'))
            ->add('secondPlayerTShirtSize', new TShirtSizeType(),  array('label' => 'application.t-shirt_size', 'required' => false))
        ;
    }

    public function getName()
    {
        return 'sarsport_application_application';
    }
}
