<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Clase PuntoInteresType
 * @author Roby <robysottini@gmail.com>
 */
class PuntoInteresType extends AbstractType
{
    /**
     * Crea un formulario a partir de la entidad AppBundle\Entity\PuntoInteres
     * definida a través de la función configureOptions.
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion', 'textarea')
            ->add('latitud')
            ->add('longitud')
            ->add('link_interes')
            ->add('direccion')
            ->add('localidad', 'entity', array(
                'class' => 'AppBundle\Entity\Localidad', 
                'attr'  =>  array(
                    'class' => 'select2-combo'
                )
            ))
            ->add('categorias', 'entity', array(
                'class' => 'AppBundle\Entity\Categoria', 
                'attr'  =>  array(
                    'class'    => 'select2-combo',
                    'multiple' => 'multiple'
                )
            ))
            ->add('guardar', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PuntoInteres'
        ));
    }
}
