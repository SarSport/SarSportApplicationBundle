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

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class YearType extends AbstractType
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
                'choices'=> static::getYears()
            )
        );
    }

    /**
     * {@inheritDoc}
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sarsport_application_form_type_year';
    }

    /**
     * Returns years
     *
     * @static
     * @return array
     */
    private static function getYears()
    {
        $years = array();
        for ($i = date('Y')-90; $i <= date('Y'); $i++) {
            $years[$i] = $i;
        }

        return $years;
    }

}
