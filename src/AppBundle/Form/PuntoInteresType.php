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
     * 
     * La función add() agrega campos al formulario. Tiene tres parámetros:
     * nombre del campo, tipo (null si es una propiedad) y arreglo de opciones.
     * Para cambiar la etiqueta de un campo, se debe pasar el nuevo nombre
     * usando el arreglo de opciones. Ejemplo: 'label' => 'Link de interés'.
     * Para asignar clases CSS a un campo, se pasa el elemento 'attr' por el
     * arreglo de opciones. 
     * Ejemplo: 
     * 'attr' => array(
     *     'class' => 'select2-combo'
     * )
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opcionesDescripcion = array(
            'label' => 'Descripción'
        );

        $opcionesLinkInteres = array(
            'label' => 'Link de interés'
        );

        $opcionesDireccion = array(
            'label' => 'Dirección'
        );

        $opcionesLocalidad = array(
            'class' => 'AppBundle:Localidad', 
            'attr'  =>  array(
                'class' => 'select2-combo'
            )
        );

        $opcionesCategorias = array(
            'label' => 'Categorías',
            'class' => 'AppBundle:Categoria',
            'attr'  => array(
                'class' => 'select2-combo'
            ),
            'multiple' => true,
            'expanded' => false,
        );

        $builder
            ->add('nombre')
            ->add('descripcion', 'textarea', $opcionesDescripcion)
            ->add('latitud')
            ->add('longitud')
            ->add('link_interes', null, $opcionesLinkInteres)
            ->add('direccion', null, $opcionesDireccion)
            ->add('localidad', 'entity', $opcionesLocalidad)
            ->add('categorias', 'entity', $opcionesCategorias)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $opciones = array(
            'data_class' => 'AppBundle\Entity\PuntoInteres'
        );

        $resolver->setDefaults($opciones);
    }
}
