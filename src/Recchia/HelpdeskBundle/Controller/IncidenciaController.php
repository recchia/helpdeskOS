<?php

namespace Recchia\HelpdeskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Recchia\HelpdeskBundle\Entity\Incidencia;
use Recchia\HelpdeskBundle\Form\IncidenciaType;

/**
 * Incidencia controller.
 *
 * @Route("/incidencia")
 */
class IncidenciaController extends Controller
{
    /**
     * Lists all Incidencia entities.
     *
     * @Route("/", name="incidencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HelpdeskBundle:Incidencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Incidencia entity.
     *
     * @Route("/", name="incidencia_create")
     * @Method("POST")
     * @Template("HelpdeskBundle:Incidencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Incidencia();
        $form = $this->createForm(new IncidenciaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'La Incidencia ha sido registrada!');

            return $this->redirect($this->generateUrl('incidencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Incidencia entity.
     *
     * @Route("/new", name="incidencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Incidencia();
        $form   = $this->createForm(new IncidenciaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HelpdeskBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Incidencia entity.
     *
     * @Route("/{id}/edit", name="incidencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HelpdeskBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $editForm = $this->createForm(new IncidenciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_update")
     * @Method("PUT")
     * @Template("HelpdeskBundle:Incidencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HelpdeskBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IncidenciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('incidencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HelpdeskBundle:Incidencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Incidencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('incidencia'));
    }

    /**
     * Creates a form to delete a Incidencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
    * Busca los datos del empleado
    *
    * @Route("/buscar_empleado", name="buscar_empleado")
    * @Method("POST")
    */
    public function getDatosEmpleadoAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            try {
                $cliente = new \SoapClient('http://192.168.0.20/sigespServices/sigespServer.php?wsdl');
                $_datos = $cliente->mostrarEmpleado($request->request->get('cedula'));
                $response = new \Symfony\Component\HttpFoundation\Response(json_encode($_datos));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            } catch (Exception $e) {
                return new \Symfony\Component\HttpFoundation\Response("La solicitud no se pudo procesar: " . $e->getMessage());
            }
        } else {
            return new \Symfony\Component\HttpFoundation\Response("Acceso Denegado");
        }
    }
}
