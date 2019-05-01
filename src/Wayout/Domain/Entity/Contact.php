<?php

namespace Distinc\Wayout\Domain\Entity
{
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Contact
     *
     * @package Distinc\Wayout\Domain\Entity
     */
    class Contact extends Model
    {
        /**
         * Mass-Assignable property list
         *
         * @var array $fillable
         */
        protected $fillable = [
            'first_name',
            'last_name'
        ];

        /**
         * Contact details object reference
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function details()
        {
            return $this->hasMany(ContactDetail::class);
        }

        /**
         * @throws \Exception
         */
        public function delete()
        {
            $this->details()->delete();

            parent::delete();
        }
    }
}