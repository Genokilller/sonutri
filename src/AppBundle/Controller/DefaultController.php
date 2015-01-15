<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/qui-suis-je", name="quisuisje")
     */
    public function quisuisjeAction()
    {
        return $this->render('default/quisuisje.html.twig');
    }

    /**
     * @Route("/tarifs", name="tarifs")
     */
    public function tarifsAction()
    {
        return $this->render('default/tarifs.html.twig');
    }

    /**
     * @Route("/coaching", name="coaching")
     */
    public function coachingAction()
    {
        return $this->render('default/coaching.html.twig');
    }

    /**
     * @Route("/prestations", name="prestations")
     */
    public function prestationsAction()
    {
        return $this->render('default/prestations.html.twig');
    }

    /**
     * @Route("/zones", name="zones")
     */
    public function zonesAction()
    {
        return $this->render('default/zones.html.twig');
    }

    /**
     * @Route("/temoignages", name="temoignages")
     */
    public function temoignagesAction()
    {
        return $this->render('default/temoignages.html.twig');
    }

    /**
     * @Route("/dietetique", name="dietetique")
     */
    public function dietetiqueAction()
    {
        return $this->render('default/dietetique.html.twig');
    }

    /**
     * @Route("/idees", name="idees")
     */
    public function ideesAction()
    {
        return $this->render('default/idees.html.twig');
    }

    /**
     * @Route("/semainier", name="semainier")
     */
    public function semainierAction()
    {
        return $this->render('default/semainier.html.twig');
    }

    /**
     * @Route("/actu", name="actu")
     */
    public function actuAction()
    {
        return $this->render('default/actu.html.twig');
    }

    /**
     * @Route("/devis", name="devis")
     */
    public function devisAction()
    {
        return $this->render('default/devis.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        // Check the method
        if ($request->isMethod("post")) {

            // Bind value with form
            $form->bind($request);

            // Valid
            if ($form->isValid()) {

                // Send message
                $contact = $form->getData();

                $message = \Swift_Message::newInstance();
                $message->setContentType('text/html');
                $message->setSubject($contact['subject']);
                $message->setTo('sonutri59@gmail.com');
                $message->setFrom($contact['email']);
                $message->setBody($contact['email'].'<br><br><br>'.$contact['content']);

                // Sending
                $this->get('mailer')->send($message);

                return $this->render('default/thank-you.html.twig');
            }

            $this->flashFormError();
        }

        return $this->render('default/contact.html.twig', array('form' => $form->createView()));
    }
}
