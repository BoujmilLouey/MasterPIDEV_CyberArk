<?php

namespace App\Controller;

use App\Entity\EventsReservation;
use App\Form\EventsReservationType;
use App\Repository\EventsReservationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twilio\Rest\Client;

/**
 * @Route("/events/reservation")
 */
class EventsReservationController extends AbstractController
{
    /**
     * @Route("/", name="app_events_reservation_index", methods={"GET"})
     */
    public function index(EventsReservationRepository $eventsReservationRepository): Response
    {
        return $this->render('events_reservation/index.html.twig', [
            'events_reservations' => $eventsReservationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_events_reservation_new", methods={"GET", "POST"})
     */
    public function new(UserRepository $usrRep ,Request $request, EventsReservationRepository $eventsReservationRepository): Response
    {
        $eventsReservation = new EventsReservation();
        $form = $this->createForm(EventsReservationType::class, $eventsReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser()->getUsername();
            $currentuser=$usrRep->findOneBy(array('Username'=>$user));
            $eventsReservation->setUser($currentuser);
            $eventsReservationRepository->add($eventsReservation);
            $sid ='AC43b65f8da7650a3e5124ed658337a625';
            $token = '28a290be0fa2eed1610da71edc8db2da';
            $client = new Client($sid,$token);
            $to = $eventsReservation->getTel();
            $client->messages->create($to,array('from'=> '+14158401375',
                'body' => 'Salut!Tu as '.(string)$eventsReservation->getReservations().' reservation(s)'));
            return $this->redirectToRoute('base', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('events_reservation/new.html.twig', [
            'events_reservation' => $eventsReservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_events_reservation_show", methods={"GET"})
     */
    public function show(EventsReservation $eventsReservation): Response
    {
        return $this->render('events_reservation/show.html.twig', [
            'events_reservation' => $eventsReservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_events_reservation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EventsReservation $eventsReservation, EventsReservationRepository $eventsReservationRepository): Response
    {
        $form = $this->createForm(EventsReservationType::class, $eventsReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventsReservationRepository->add($eventsReservation);
            return $this->redirectToRoute('app_events_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('events_reservation/edit.html.twig', [
            'events_reservation' => $eventsReservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_events_reservation_delete", methods={"POST"})
     */
    public function delete(Request $request, EventsReservation $eventsReservation, EventsReservationRepository $eventsReservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eventsReservation->getId(), $request->request->get('_token'))) {
            $eventsReservationRepository->remove($eventsReservation);
        }

        return $this->redirectToRoute('app_events_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
