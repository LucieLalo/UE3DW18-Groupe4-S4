<?php

namespace Watson\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        $links = $app['dao.link']->findAll();
        $tabnbrlien = $app['dao.link']->nbrlien();//appelle de la fonction qui permet de compter le nbr de lien
        $nbrlienX = $tabnbrlien;//calcule qui me servée a faire des test
        $nbrlien = 16;//variable qui ma permsi de faire des test pour creer un valeur fictive des lien enregistrées
        $lienParPage=15;//nombre de line souhaitezr par page
        $nombreDePage=ceil($nbrlien/$lienParPage);//calclul du nombre de page
        $liensdespages = $app['dao.link']->liensparpages($nombreDePage,$lienParPage);//appelle de le fonction permettant d'avoir les pages avec leur lien qui leur corresponde
        return $app['twig']->render('index.html.twig', array(
            'nbrlienx'=>$nbrlienX,
            'nbrlien'=>$nbrlien,
            'links' => $links,
            'nombreDePage' => $nombreDePage,
            'liensdespages' =>$liensdespages
        ));
    }

    /**
     * Link details controller.
     *
     * @param integer $id Link id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function linkAction($id, Request $request, Application $app) {
        $link = $app['dao.link']->find($id);
       /* echo "<pre>";
        var_dump($link);exit;*/
        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            // A user is fully authenticated : he can add comments
            // Check if he's author for manage link

        }
        return $app['twig']->render('link.html.twig', array(
            'link' => $link
        ));
    }

    /**
     * Links by tag controller.
     *
     * @param integer $id Tag id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function tagAction($id, Request $request, Application $app) {
        $links = $app['dao.link']->findAllByTag($id);
        $tag   = $app['dao.tag']->findTagName($id);

        return $app['twig']->render('result_tag.html.twig', array(
            'links' => $links,
            'tag'   => $tag
        ));
    }

    /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            )
        );
    }
}
