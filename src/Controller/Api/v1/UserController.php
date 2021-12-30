<?php


namespace App\Controller\Api\v1;

use App\Service\UserService;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;

/**
 * Class UserController
 * @package App\Controller\Api\v1
 *
 * @Annotations\Route("/api/v1/user")
 */
class UserController
{
    /** @var UserService */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Annotations\Post("")
     *
     * @Annotations\RequestParam(name="login")
     */
    public function saveUserAction(string $login): View
    {
        $userId = $this->userService->saveUser($login);

        [$data, $code] = is_null($userId) ?
            [['success' => false], 400] :
            [['success' => true, 'userId' => $userId], 200];

        return View::create($data, $code);
    }

    /**
     * @Annotations\Get("")
     *
     * @Annotations\QueryParam(name="perPage", requirements="\d+", nullable=true)
     * @Annotations\QueryParam(name="page", requirements="\d+", nullable=true)
     */
    public function getUsers(?int $page, ?int $perPage): View
    {
        $users = $this->userService->getUsers($page ?? 0, $perPage ?? 20);

        $code = empty($users) ? 204 : 200;

        return View::create(['users' => $users], $code);
    }
}