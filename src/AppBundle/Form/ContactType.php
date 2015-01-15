<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Contact form type
 */
class ContactType extends AbstractType
{
    /**
     * Builder form
     *
     * @param FormBuilderInterface $builder Builder
     * @param array                $options Options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject', 'text', array('max_length' => 100))
                ->add('email', 'email', array('max_length' => 200))
                ->add('content', 'textarea');
    }

    /**
     * Default options
     *
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'class' => 'AppBundle\Model\Contact',
        );
    }

    /**
     * Get name of form
     *
     * @return string
     */
    public function getName()
    {
        return 'Contact';
    }
}
