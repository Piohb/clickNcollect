<?php

namespace App\Controller;


use App\Repository\ShopRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;


class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index($post = null): Response
    {
        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
            'test' => $post
        ]);
    }

    /**
     * @Route("/contactmail", name="contactmail")
     * @Method("POST")
     */
    public function ContactMail(Request $request, ShopRepository $shopRepository, MailerInterface $mailer)
    {
        $request = Request::createFromGlobals();

        $name = $request->get('name');
        $email = $request->get('email');
        $shop = $request->get('shop');
        $shopmail = $shopRepository->find($shop);
        $subject = $request->get('subject');
        $content = $request->get('content');

        $email = (new Email())
            ->from($email)
            ->to($shopmail['email'])
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text($content)
            ->html('<p>Envoyé via click&collect, un message de '.$name.'.</p>');

        $mailer->send($email);

        return $this->forward('App\Controller\ClientController::contact');
    }

}
