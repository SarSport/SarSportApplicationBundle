<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\SarSportApplicationBundle\Form\Extension;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SarSport\Bundle\SarSportApplicationBundle\Entity\Application;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class XcmGroupType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritDoc}
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices'=> array(
                Application::APPLICATION_GROUP_MJ_VALUE => Application::APPLICATION_GROUP_MJ_NAME,
                Application::APPLICATION_GROUP_MA_VALUE => Application::APPLICATION_GROUP_MA_NAME,
                Application::APPLICATION_GROUP_MR_VALUE => Application::APPLICATION_GROUP_MR_NAME,
                Application::APPLICATION_GROUP_WJ_VALUE => Application::APPLICATION_GROUP_WJ_NAME,
                Application::APPLICATION_GROUP_WA_VALUE => Application::APPLICATION_GROUP_WA_NAME,
                Application::APPLICATION_GROUP_WR_VALUE => Application::APPLICATION_GROUP_WR_NAME
            )
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sarsport_application_form_type_class';
    }

}
