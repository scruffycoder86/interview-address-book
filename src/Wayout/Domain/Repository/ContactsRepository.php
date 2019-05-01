<?php

namespace Distinc\Wayout\Domain\Repository;

use Distinc\Wayout\Domain\Entity\Contact;
use Distinc\Wayout\Domain\Entity\ContactDetail;

/**
 * Class ContactsRepository
 *
 * @package Distinc\Wayout\Domain\Repository
 */
class ContactsRepository extends AbstractRepository
{
    /**
     * @return Contact[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        return Contact::with('details')->get();
    }

    /**
     *
     * @param array $data
     *
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data)
    {
        $contact = Contact::create($data[0]);

        try{

            foreach($data[1] as $entry){
                $entries[] = new ContactDetail([
                    'value' => json_encode($entry),
                    'contact_id' => $contact->id
                ]);

                $contact->details->saveMany($entries);
            }

        }catch(\Exception $exc){

        }

        return $contact->with('details')->get();
    }

    /**
     * @param $contactId
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $contact = Contact::findOrFail($id);

        return (function($data) use($contact){

            $contact->update($data);

            return $contact->with('details')
                ->get();

        })($data);
    }

    /**
     * Deletes a Contact from database
     *
     * @param $contactId
     * @return mixed
     */
    public function delete($id)
    {
        return Contact::where('id', '=', $id)
            ->first()
            ->delete();
    }
}