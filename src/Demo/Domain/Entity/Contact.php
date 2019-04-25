<?php

namespace Distinc\Demo\Domain\Entity
{
    use Illuminate\Database\Eloquent\Model;

    class Contact extends Model
    {
        protected $fillable = [
            'first_name',
            'last_name'
        ];

        public function details()
        {
            return $this->hasManybelongsTo(Contact::class);
        }
    }
}