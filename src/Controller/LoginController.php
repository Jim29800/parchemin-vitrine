<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class LoginController extends Controller
{
    /**
     * @Route("/api/login", name="login", methods="POST")
     */
    public function index(Request $request)
    {
        $json = $request->getContent();
        // $vars = json_decode($json, true);
        $jwtManager = $this->container
            ->get('lexik_jwt_authentication.jwt_manager');
        $user = new User();
        return $this->json([
            // 'vars' => $vars,
            'token' => $jwtManager->create($user),
        ]);
    }
}