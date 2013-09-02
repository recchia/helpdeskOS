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
use Recchia\HelpdeskBundle\Entity\Tarea;

class TareaToNumberTransformer implements DataTransformerInterface {
    
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
    * Transforms an object (Tarea) to a string (number).
    *
    * @param Tarea|null $tarea
    * @return string
    */
    public function transform($tarea)
    {
        if (null === $tarea) {
            return "";
        }

        return $tarea->getId();
    }

    /**
    * Transforms a string (number) to an object (Tarea).
    *
    * @param string $id
    * @return Tarea|null
    * @throws TransformationFailedException if object (Tarea) is not found.
    */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $tarea = $this->om
            ->getRepository('HelpdeskBundle:Tarea')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $tarea) {
            throw new TransformationFailedException(sprintf(
                'La Tarea con id "%s" no existe!',
                $id
            ));
        }

        return $tarea;
    }
}

?>
