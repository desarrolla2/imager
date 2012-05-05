<?php

namespace Desarrolla2\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\Collection;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('q', new \Symfony\Component\Form\Extension\Core\Type\TextType(), array(
            'required' => true,
            'attr'     => array(
                'placeholder' => 'search ...',
                'class'       => 'input-medium search-query span3',
            ),
        ));
    }

    public function getName()
    {
        return 's';
    }

    public function getDefaultOptions(array $options)
    {

        $collectionConstraint = new Collection(array(
                    'q' => new MinLength(3),
                ));
        return array(
            'validation_constraint' => $collectionConstraint,
            'csrf_protection'       => false,
        );
    }

}