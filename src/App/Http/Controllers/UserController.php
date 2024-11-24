<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;

use Doctrine\ORM\Exception\ORMException;
use Jhonattan\PizzariaDelivery\Core\EntityManager;
use Jhonattan\PizzariaDelivery\Core\Http\Request;
use Jhonattan\PizzariaDelivery\Domain\Entities\User;
use Jhonattan\PizzariaDelivery\Core\Http\ResponseFactory;
use Nyholm\Psr7\Response;

class UserController extends Controller
{
    private $em;
    public function __construct()
    {
        parent::__construct();
        $this->em = EntityManager::getEntityManager();
    }


    public function index(Request $request): Response
    {
        $users = $this->em->getRepository(User::class)->findAll();
        return ResponseFactory::response(200, [], $users);

    }
    public function show(Request $request, $id)
    {
        self::$logger->info('Show user with id: ' . $id);
        echo "show";
    }

    /**
     * @throws ORMException
     */
    public function store(Request $request):Response
    {
        try {

            $user = new User();
            $user->name = "Jhonattan";

            $this->em->persist($user);

            $this->em->flush();

            return ResponseFactory::response(201, [],
                ['success' => true, 'message' => 'Usuário criado com sucesso']
            );

        } catch (\Exception $e) {
            // Log do erro
            error_log($e->getMessage());

            // Retorna mensagem de erro

            return ResponseFactory::response(400, [],
                ['success' => true, 'message' => 'Erro ao criar usuário']
            );
        }

    }
}