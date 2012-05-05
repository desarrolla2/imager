<?php

namespace Desarrolla2\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('text', new \Symfony\Component\Form\Extension\Core\Type\TextType(), array(
            'required' => true,
            'attr'     => array(
                'placeholder' => 'search ...',
                'class'       => 'input-medium search-query span3',
            ),
        ));
    }

    public function getName()
    {
        return 'search_type';
    }

    public function getDefaultOptions(array $options)
    {
        return array();
    }

}