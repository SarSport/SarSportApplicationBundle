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
class CompetitionType extends AbstractType
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
                Application::RACE_MULTIGONKA_SLUG => Application::RACE_MULTIGONKA_NAME,
                Application::RACE_VELOGONKA_SLUG => Application::RACE_VELOGONKA_NAME
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
