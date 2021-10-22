<?php

namespace MyApp\Client;

use Exception;

class ApiClientException extends Exception
{
    public string $exception_message;
    public int $exception_code;

    public function __construct(string $exception_message, int $exception_code)
    {
        parent::__construct();
        $this->exception_message = $exception_message;
        $this->exception_code = $exception_code;
    }

    /**
     * @return string
     */
    public function getExceptionMessage(): string
    {
        return $this->exception_message;
    }

    /**
     * @param string $exception_message
     */
    public function setExceptionMessage(string $exception_message): void
    {
        $this->exception_message = $exception_message;
    }

    /**
     * @return int
     */
    public function getExceptionCode(): int
    {
        return $this->exception_code;
    }

    /**
     * @param int $exception_code
     */
    public function setExceptionCode(int $exception_code): void
    {
        $this->exception_code = $exception_code;
    }
}