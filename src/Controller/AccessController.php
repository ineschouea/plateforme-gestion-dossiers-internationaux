<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Attend;
use App\Entity\Validation;
use App\Entity\User;



// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class AccessController extends Controller
{
    /**
     * @Route("/access", name="access")
     */
    public function consulter(Request $request): Response
    {   
        $session = $request->getSession();
        if($session->get('name') == "user1"){
        $repo=$this->getDoctrine()->getRepository(Attend::class);
        $Allconventions=$repo->findAll();
         // Paginate the results of the query
         $conventions = $this->get('knp_paginator')->paginate(
            // Doctrine Query, not results
            $Allconventions,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            1
        );

        return $this->render('access/consultation.html.twig', [
            'controller_name' => 'AccessController',
            'conventions' => $conventions

        ]);
    }else{
        return $this->render('access/error.html.twig');


    }
    }
     /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, $id)
    {
        $conv=new Attend();
         $repo =$this->getDoctrine()->getRepository(Attend::class);
         $conv= $repo->find($id);
        $form= $this->createFormBuilder($conv)
                ->add('AvisDRI',ChoiceType::class, [
                    'choices' => [
                        'Validé' => 'Validé',
                        'Validé avec condition' => 'Validé avec condition',
                        'Refusé' => 'Refusé',
                    ]
                ])
                ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('access');
        }

        
        return $this->render('access/edit.html.twig', [
            'formConv' => $form->createView(),
            'conv' => $conv,
            'controller_name' => 'AccessController'
        ]);
    }
   /**
     * @Route("/pdf/{id}", name="pdf")
     */
    public function pdf(Request $request, $id)
      { 
          // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $conv=new Attend();
        $repo =$this->getDoctrine()->getRepository(Attend::class);
        $conv= $repo->find($id);
        
    
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('access/pdf.html.twig', [
            'conv' => $conv
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);      
    }
     /**
     * @Route("/conv/{id}", name="conv")
     */
    public function show(Request $request, $id)
      { 
          
        $conv=new Attend();
        $repo =$this->getDoctrine()->getRepository(Attend::class);
        $conv= $repo->find($id);
        
    
        return $this->render('access/conv.html.twig', [
            'conv' => $conv
        ]);
        
              
    }
      /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, $id)
    {
        $conv=new Attend();
         $repo =$this->getDoctrine()->getRepository(Attend::class);
         $conv= $repo->find($id);
    
            
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->remove($conv);
            $entityManager->flush();
            return $this->redirectToRoute('access');
        

        
        return $this->render('access/delete.html.twig', [
            'conv' => $conv

        ]);
    }
     /**
     * @Route("/", name="home")
     */
    public function home(Request $request): Response
    {
        $session = new Session();
        if ($session->getId() == "") {
            $session->start();
        }

        if ($request->isMethod('POST')) {
            if ($request->request->get("action") == "login") {
                $repository = $this->getDoctrine()->getRepository(User::class);
                $email = $request->request->get('email');
                $user = $repository->findOneBy(array('email' => $email));
                if ($user != null) {
                    if ($user->getPassword() == $request->request->get('password')) {

                        $session->set('name', $user->getRole());
                        if ($user->getRole() == "admin") {

                            return $this->redirectToRoute('admin', $request->query->all());
                        }
                        if ($user->getRole() == "user1") {
                           
                            return $this->redirectToRoute('access', $request->query->all());
                        }
                        if ($user->getRole() == "user2") {
                            return $this->redirectToRoute('validation', $request->query->all());
                        }
                    }
                }
            }
            if ($request->request->get("action") == "logout") {
                $session->clear();
            }
        }
        $logged = $session->get('name');



        return $this->render('access/home.html.twig', [
            'logged' => $logged
        ]);
    }
     /**
     * @Route("/recherche", name="recherche")

     */
    public function recherche(Request $request)
    {
       
        $conv=new Attend();
        
       $form= $this->createFormBuilder($conv)
               ->add('Id_conv',TextType::class)
               ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
        $idconv=$conv->getIdConv();
        $repo =$this->getDoctrine()->getRepository(Attend::class);
        $conv=$repo->findBy(['Id_conv'=> $idconv]);
        if($conv){
        return $this->render('access/recherche.html.twig', [
            'conventions' => $conv
        ]);
       }else{
        return $this->render('access/rechForm.html.twig', [
            'formConv' => $form->createView(),

        ]);
       }
       }
       return $this->render('access/rechForm.html.twig', [
        'formConv' => $form->createView(),

    ]);
      
        }

   /**
     * @Route("/validation", name="validation")
     */
    public function validation(Request $request)
    {
        $session = $request->getSession();
        if($session->get('name') == "user2"){
        $repo=$this->getDoctrine()->getRepository(Validation::class);
        $AllValidations=$repo->findAll();
         // Paginate the results of the query
         $validations = $this->get('knp_paginator')->paginate(
            // Doctrine Query, not results
            $AllValidations,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            1
        );

        return $this->render('access/validation.html.twig', [
            'controller_name' => 'AccessController',
            'validations' => $validations

        ]);
        }else{
            return $this->render('access/error.html.twig');
    
    
        }
    }
    /**
     * @Route("/projet/{id}", name="projet")
     */
    public function showProjet(Request $request, $id)
      { 
          
        $projet=new Validation();
        $repo =$this->getDoctrine()->getRepository(Validation::class);
        $projet= $repo->find($id);
        
    
        return $this->render('access/avancement.html.twig', [
            'projet' => $projet
        ]);
        
              
    }

    /**
     * @Route("/pdfAvnc/{id}", name="pdfAvnc")
     */
    public function pdfAvnc(Request $request, $id)
      { 
          // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $projet=new validation();
        $repo =$this->getDoctrine()->getRepository(Validation::class);
        $projet= $repo->find($id);
        
    
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('access/pdfAvancement.html.twig', [
            'projet' => $projet
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);      
    }
     /**
     * @Route("/recherchePrj", name="recherchePrj")

     */
    public function recherchePrj(Request $request)
    {
       
        $projet=new Validation();
        
       $form= $this->createFormBuilder($projet)
               ->add('Id_conv',TextType::class)
               ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
        $idconv=$projet->getIdConv();
        $repo =$this->getDoctrine()->getRepository(Validation::class);
        $projet=$repo->findBy(['Id_conv'=> $idconv]);
        if($projet){
        return $this->render('access/recherchePrj.html.twig', [
            'projet' => $projet
        ]);
       }else{
        return $this->render('access/rechFormPrj.html.twig', [
            'formPrj' => $form->createView(),

        ]);
       }
       }
       return $this->render('access/rechFormPrj.html.twig', [
        'formPrj' => $form->createView(),

    ]);
      
        }
        /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request): Response
    {
        $session = new Session();
        if ($session->getId() == "") {
            $session->start();
        }

        if ($request->isMethod('POST')) {

            $action = $request->request->get("action");
            if ($action == "logout") {
                $session->clear();
                return $this->redirectToRoute('home', $request->query->all());
            }
            if ($action == "supprimer") {
                if ($request->request->get('id') != 1) {
                    $repository = $this->getDoctrine()->getRepository(User::class);
                    $user = $repository->find($request->request->get('id'));
                    if ($user != null) {
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->remove($user);
                        $entityManager->flush();
                    }
                }
            }
            if ($action == "modifier") {
                if ($request->request->get('id') != 1) {
                    $repository = $this->getDoctrine()->getRepository(User::class);
                    $user = $repository->find($request->request->get('id'));
                    if ($user != null) {
                        $user->setNom($request->request->get('nom'))
                            ->setPrenom($request->request->get('prenom'))
                            ->setEmail($request->request->get('email'))
                            ->setRole($request->request->get('role'));

                        if ($request->request->get('password') != '') {
                            $user->setPassword($request->request->get('password'));
                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->flush();
                        } else {
                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->flush();
                        }
                    }
                }
            }
            if ($action == "ajouter") {
                $user = new User();
                $user->setNom($request->request->get('nom'))
                    ->setPrenom($request->request->get('prenom'))
                    ->setEmail($request->request->get('email'))
                    ->setRole($request->request->get('role'))
                    ->setPassword($request->request->get('password'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            }
        }


        if ($session->get("name") == "admin") {
            $repository = $this->getDoctrine()->getRepository(User::class);
            $users = $repository->findAll();
            return $this->render('access/admin.html.twig', [
                'users' => $users,
            ]);
        } else {
            return $this->render('access/error.html.twig');
        }
    }
    
}
