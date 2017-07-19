<?php
namespace Apparto\BonobosBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use TunisiaMall\AdminBundle\Form\MediaType;
class modifierUser extends AbstractType {
    public function buildForm(FormBuilderInterface
    $builder, array $options) {
        $builder
                ->add('age')
                ->add('nouriture')
                ->add('famille')
                ->add('race');
                
    }
    public function getName() {
        return 'nom';
    }
}