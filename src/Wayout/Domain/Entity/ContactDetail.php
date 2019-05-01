<?php

namespace Distinc\Wayout\Domain\Entity
{
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class ContactDetail
     *
     * @package Distinc\Wayout\Domain\Entity
     */
    class ContactDetail extends Model
    {
        /**
         * Mass-Assignable property list
         *
         * @var array $fillable
         */
        protected $fillable = [
            'value',
            'contact_id'
        ];

        /**
         * Contact object reference
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function contact()
        {
            return $this->belongsTo(Contact::class, 'contact_id');
        }
    }
}