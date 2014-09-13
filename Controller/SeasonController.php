<?php
namespace Volleyball\Bundle\EnrollmentBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

use Volleyball\Bundle\EnrollmentBundle\Entity\Season;
use Volleyball\Bundle\EnrollmentBundle\Form\Type\SeasonType;
use Volleyball\Bundle\UtilityBundle\Controller\UtilityController as Controller;

class SeasonController extends Controller
{
    /**
     * @Route("/", name="volleyball_season_index")
     * @Template("VolleyballEnrollmentBundle:Season:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        // get route name/params to decypher data to delimit by
        $query = $this->get('doctrine')
            ->getRepository('VolleyballEnrollmentBundle:Season')
            ->createQueryBuilder('l')
            ->orderBy('l.updated, l.name', 'ASC');

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'seasons' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/{slug}", name="volleyball_season_show")
     * @Template("VolleyballEnrollmentBundle:Season:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $season = $this->getDoctrine()
            ->getRepository('VolleyballEnrollmentBundle:Season')
            ->findOneBySlug($slug);

        if (!$season) {
            $this->get('session')
                ->getFlashBag()->add(
                    'error',
                    'no matching season found.'
                );
            $this->redirect($this->generateUrl('volleyball_season_index'));
        }

        return array('season' => $season);
    }

    /**
     * @Route("/new", name="volleyball_season_new")
     * @Template("VolleyballEnrollmentBundle:Season:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $season = new Season();
        $form = $this->createForm(new SeasonType(), $season);

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($season);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'season created.'
                );

                return $this->render(
                    'VolleyballEnrollmentBundle:Season:show.html.twig',
                    array(
                        'season' => $season
                    )
                );
            }
        }

        return array('form' => $form->createView());
    }
}
