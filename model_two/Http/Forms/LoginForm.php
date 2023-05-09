<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;
use http\Exception;

class LoginForm
{

    protected array $errors = [];

    public function __construct(public array $attributes)
    {

        if ( ! Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please enter a valid email address";
        }

        if ( ! Validator::string($attributes['password'])) {
            $this->errors['password'] = "Please provide a valid password";
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($attributes): LoginForm|Exception
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(): Exception
    {
        return ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed(): bool
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message): self
    {
        $this->errors[$field] = $message;

        return $this;
    }
}