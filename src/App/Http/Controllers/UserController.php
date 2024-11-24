<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;
use Doctrine\ORM\Exception\ORMException;
use Jhonattan\PizzariaDelivery\Core\EntityManager;
use Jhonattan\PizzariaDelivery\Core\Request;
use Jhonattan\PizzariaDelivery\Domain\Entities\User;

class UserController extends Controller
{
    private $em;
    public function __construct()
    {
        parent::__construct();
        $this->em = EntityManager::getEntityManager();
    }
    public function index()
    {
        $users = $this->em->getRepository(User::class)->findAll();
        var_dump($users);
        echo "index";
    }
    public function show(Request $request, $id)
    {
        self::$logger->info('Show user with id: ' . $id);
        echo "show";
    }

    /**
     * @throws ORMException
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = "Jhonattan";

            $this->em->persist($user);

            $this->em->flush();

            return [
                'success' => true,
                'message' => 'Usuário criado com sucesso',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name
                ]
            ];

        } catch (\Exception $e) {
            // Log do erro
            error_log($e->getMessage());

            // Retorna mensagem de erro
            return [
                'success' => false,
                'message' => 'Erro ao criar usuário: ' . $e->getMessage()
            ];
        }

    }
}