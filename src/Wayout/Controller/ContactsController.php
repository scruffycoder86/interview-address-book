<?php

namespace Distinc\Wayout\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Distinc\Wayout\Service\ContactService;
use Distinc\Wayout\Domain\Repository\ContactsRepository;

/**
 * Class ContactsController
 *
 * @package App\ContactApi\Controller
 */
class ContactsController
{
    protected $contactsRepository;

    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }

    /**
     * List all contacts with default detail values
     */
    public function index()
    {
        $payload = ContactService::fixPayload(
            $this->contactsRepository->getList()
                ->toArray()
        );

        return new JsonResponse($payload, 200
        );
    }

    /**
     * Save contact
     *
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        return $this->contactsRepository->create(
            $request->json()->all())
            ->toArray();
    }

    /**
     * Updates Contact
     */
    public function update(Request $request, $id)
    {
        return $this->contactsRepository->update(
            $id, $request->json()->all()[0])
            ->toArray();
    }

    /**
     * Updates Contact
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        dump($id);
        $this->contactsRepository->delete($id);

        return 204;
    }
}