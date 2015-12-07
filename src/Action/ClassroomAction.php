<?php

namespace Classroom\Action;

use Classroom\Entity\ClassroomEntity;
use Common\Http\RestfulActionTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Classroom\Service\ClassroomService;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;

class ClassroomAction
{
    use RestfulActionTrait;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var ClassroomService
     */
    private $classroomService;

    /**
     * @param RouterInterface $router
     * @param ClassroomService $classroomService
     */
    public function __construct(
        RouterInterface $router,
        ClassroomService $classroomService
    ) {
        $this->router           = $router;
        $this->classroomService = $classroomService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return JsonResponse
     */
    public function get(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $classroomCollection = $this->classroomService->findAll(array(
            'teacher_id' => $request->getAttribute($this->identifier)
        ));

        if (empty($classroomCollection)) {
            return $response->withStatus(404, 'Not Found');
        }

        $data = array();
        foreach ($classroomCollection as $classroom) {
            /** @var ClassroomEntity $classroom */
            $data[] = array(
                'teacher_id' => $classroom->getTeacherid(),
                'student_id' => $classroom->getStudentid()
            );
        }

        return new JsonResponse($data);
    }
}
