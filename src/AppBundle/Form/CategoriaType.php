<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoriaType extends AbstractType
{
    /**
     * Crea un formulario a partir de la entidad AppBundle\Entity\Categoria
     * definida a través de la función configureOptions.
     * 
     * La función add() agrega campos al formulario. Tiene tres parámetros:
     * nombre del campo, tipo (null si es una propiedad) y arreglo de opciones.
     * Para cambiar la etiqueta de un campo, se debe pasar el nuevo nombre
     * usando el arreglo de opciones. Ejemplo: 'label' => 'Código postal'.
     * Para asignar clases CSS a un campo, se pasa el elemento 'attr' por el
     * arreglo de opciones. 
     * Ejemplo: 
     * 'attr' => array(
     *     'class' => 'btn btn-primary'
     * )
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opcionesGuardar = array(
            'attr'  =>  array(
                'class' => 'btn btn-primary'
            )
        );

        $builder
            ->add('nombre')
            ->add('guardar', 'submit', $opcionesGuardar)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $opciones = array(
            'data_class' => 'AppBundle\Entity\Categoria'
        );

        $resolver->setDefaults($opciones);
    }
}
