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
        /** @var ClassroomEntity $classroom */
        $classroom = $this->classroomService->findById(
            $request->getAttribute($this->identifier)
        );

        if (!$classroom->isValid()) {
            return $response->withStatus(404, 'Not Found');
        }

        return new JsonResponse([
            'id'         => $classroom->getId(),
            'teacher_id' => $classroom->getTeacherId(),
            'student_id' => $classroom->getStudentId(),
            'school_id'  => $classroom->getSchoolId()
        ]);
    }
}
