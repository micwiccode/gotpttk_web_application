<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends AbstractController
{
  /**
   * @Route("/login")
   */
  public function index()
  {
    return $this->render('login.html.twig');
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
    
    //check email
    if($request->request->get('email') == 'user@user.com'){
      $bEmail = true;
      //check password
      if($request->request->get('password') == '1234'){
        $bPassword = true;
        return $this->redirect('book');    
      }
      else{
        $this->addFlash(
          'password',
          'visible'
        );
      }
    }
    else{
      $this->addFlash(
        'email',
        'visible'
      );
    }
    return $this->render('login.html.twig');
    //return new Response('<html><body>'.$email.'</body></html>');
  }


}