<?php

namespace App\Controller;

use App\Entity\Day;
use App\Repository\DayRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/getOrCreateDays/{stringList}', name:'get_create')]
    public function getCreateDays(string $stringList, DayRepository $dayRep, EntityManagerInterface $manager) : Response
    {
        $objectList = array();
        $list = explode(',', $stringList);
        foreach($list as $item) {
            $dateTimeVar = new DateTime($item);
            $day = $dayRep->findOneBy(array('date' => $dateTimeVar));
            if($day != null) {
                $objectList[] = $day->getDate()->format('Y-m-d');
            }
            else {
                $stringDate = new DateTime($item);
                $day = new Day();
                $day->setDate($stringDate);
                $day->setIsPublicHoliday(false);
                $objectList[] = $day->getDate()->format('Y-m-d');
                $manager->persist($day);
                $manager->flush();
            }
        }
        return new JsonResponse($objectList);
    }

    #[Route('/api/getCurrentDate', name:'current_date')]
    public function getDate(): Response
    {
        $currentDate = date('Y-m-d');
        return new JsonResponse($currentDate);
    }
}
