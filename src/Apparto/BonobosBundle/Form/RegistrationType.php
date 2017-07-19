<?php

namespace Apparto\BonobosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
                $builder->add('name');
        $builder->add('famille');
                $builder->add('race');
                        $builder->add('age');
                                $builder->add('nouriture');




    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}