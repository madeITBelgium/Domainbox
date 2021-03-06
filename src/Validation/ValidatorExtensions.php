<?php

namespace MadeITBelgium\Domainbox\Validation;

class ValidatorExtensions
{
    /**
     * @var MadeITBelgium\Domainbox\Validation\Validator
     */
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateDomainname($attribute, $value)
    {
        return $this->validator->isDomainname($value);
    }

    public function validateDomainavailable($attribute, $value)
    {
        return $this->validator->isDomainAvailable($value);
    }
}
