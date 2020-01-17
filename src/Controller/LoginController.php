<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TouristRepository;
use App\Entity\Tourist;

use Symfony\Component\HttpFoundation\Session\Session;


class LoginController extends AbstractController
{
  /**
   * @Route("/login", name="login")
   */
  public function index()
  {
    $session = $this->get('session');
    $session->clear();
    return $this->render('login.html.twig', array('login' => ''));
  }

  /**
   * @Route("/resetPassword")
   */
  public function resetPassword()
  {
    return $this->render('resetPassword.html.twig');
  }

  /**
   * @Route("/verifyLogin", methods={"POST"})
   */
  public function verifyLogin()
  {
    $request = Request::createFromGlobals();
    $bEmail = false;
    $bPassword = false;

    //from post
    $email = $request->request->get('email');
    $password = $request->request->get('password');

    //filtering
    $emailF = filter_var($email, FILTER_SANITIZE_EMAIL);
    $passwordF = filter_var($password, FILTER_SANITIZE_STRING);
    
    //check email
    if($email==$emailF && filter_var($emailF, FILTER_VALIDATE_EMAIL)==true){
      $repository = $this->getDoctrine()->getRepository(Tourist::class);
      $tourist = $repository->findOneByLogin($emailF);
      
      if(!is_null($tourist)){
        $bEmail = true;
        
        //check password
        if($password==$passwordF && $tourist->getPassword() == $password){
          $bPassword = true;
          
          //setting sessions parameters
          $session = $this->get('session');
          $session->start();
          $session->set('id', $tourist->getIdTu());
          $session->set('imie', $tourist->getFirstName());
          $session->set('nazwisko', $tourist->getLastName());
          $session->set('logged', true);

          return $this->redirect('book');
          //return $this->forward('App\Controller\BookController::id', ['id' => $Tourist->getIdTu()]);
        }    
        else{
          //password incorrect message
          $this->addFlash(
            'password',
            'visible'
          );
        }
      }
    }
    //email incorrect message
    if(!$bEmail){
      $this->addFlash(
        'email',
        'visible'
      );
    }
    return $this->render('login.html.twig', array('login' => $email));
    //return new Response('<html><body>'.$email.'</body></html>');
  }
}
