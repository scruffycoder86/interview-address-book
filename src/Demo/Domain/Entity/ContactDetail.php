<?php

namespace Distinc\Demo\Domain\Entity
{
    use Illuminate\Database\Eloquent\Model;

    class ContactDetail extends Model
    {
        protected $fillable = [
            'mobile',
            'email',
            'contact_id'
        ];

        public function contact()
        {
            return $this->belongsTo(Contact::class, 'contact_id');
        }
    }
}