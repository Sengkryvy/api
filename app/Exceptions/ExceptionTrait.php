<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


trait ExceptionTrait {
    public function apiException($request, $exception) {

        if ($this->isModel($exception)) {
            return $this->ModelResponse();
        }

        if ($this->isHttp($exception)) {
            return $this->HttpResponse();
        }

        return parent::render($request, $exception);

    }

    protected function HttpResponse() {
        return response([
            'errors' => 'URL is not found.',
        ], Response::HTTP_NOT_FOUND);
    }

    protected function ModelResponse() {
        return response([
            'errors' => 'Product model not found.',
        ], Response::HTTP_NOT_FOUND);
    }

    protected function isModel($exception) {
        return $exception instanceof ModelNotFoundException;
    }

    protected function isHttp($exception) {
        return $exception instanceof NotFoundHttpException;
    }
}