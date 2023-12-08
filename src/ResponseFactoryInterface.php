<?php

declare(strict_types=1);

namespace Lsp\Contracts\Message\Factory;

use Lsp\Contracts\Message\FailureResponseInterface;
use Lsp\Contracts\Message\IdentifiableInterface;
use Lsp\Contracts\Message\IdInterface;
use Lsp\Contracts\Message\SuccessfulResponseInterface;

interface ResponseFactoryInterface
{
    /**
     * Returns successful response instance from ID (or ID provider) and payload.
     *
     * @template TResult of mixed
     *
     * @param TResult $result
     *
     * @return SuccessfulResponseInterface<TResult>
     */
    public function createSuccess(
        IdInterface|IdentifiableInterface $id,
        mixed $result
    ): SuccessfulResponseInterface;

    /**
     * Returns failure response instance from ID (or ID provider) and error
     * payload (code + message + arbitrary optional data).
     */
    public function createFailure(
        IdInterface|IdentifiableInterface $id,
        int $code = 0,
        string $message = '',
        mixed $data = null
    ): FailureResponseInterface;
}
