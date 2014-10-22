<?php
namespace HVP\CoreApiBundle\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductEventInstanceFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ProductEvent', 'filter_entity',array(
        	'class'=>'HVPCoreModelBundle:ProductEvent',
			'property'=>'name'
        ));
        $builder->add('ProductInstance', 'filter_entity',array(
        	'class'=>'HVPCoreModelBundle:ProductInstance',
			'property'=>'ID'
        ));
        $builder->add('timestamp', 'filter_datetime_range');
        $builder->add('processed', 'filter_datetime_range');
    }

    public function getName()
    {
        return 'filter';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}