<?php

namespace Desarrolla2\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\Collection;

class SearchType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('q', new \Symfony\Component\Form\Extension\Core\Type\SearchType(), array(
            'required' => true,
            'trim'     => true,
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
                    'q' => new MinLength(array(
                        'limit'   => 3,
                        'message' => 'This value is too short.',
                    )),
                ));
        return array(
            'validation_constraint' => $collectionConstraint,
            'csrf_protection'       => false,
        );
    }

}