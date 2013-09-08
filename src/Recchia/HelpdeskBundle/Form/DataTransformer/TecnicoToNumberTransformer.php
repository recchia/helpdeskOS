<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TareaToNumberTransformer
 *
 * @author recchia
 */
namespace Recchia\HelpdeskBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Entity\User;

class TecnicoToNumberTransformer implements DataTransformerInterface {
    
    /**
    * @var ObjectManager
    */
    private $om;

    /**
    * @param ObjectManager $om
    */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
    * Transforms an object (User) to a string (number).
    *
    * @param Tarea|null $tarea
    * @return string
    */
    public function transform($tecnico)
    {
        if (null === $tecnico) {
            return null;
        }

        return $tecnico->getId();
    }

    /**
    * Transforms a string (number) to an object (User).
    *
    * @param string $id
    * @return Tarea|null
    * @throws TransformationFailedException if object (User) is not found.
    */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $tecnico = $this->om
            ->getRepository('Application\Sonata\UserBundle\Entity\User')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $tecnico) {
            throw new TransformationFailedException(sprintf(
                'El técnico con id "%s" no existe!',
                $id
            ));
        }

        return $tecnico;
    }
}

?>
