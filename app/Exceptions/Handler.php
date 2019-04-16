<?php

namespace App\Exceptions;

use App\Http\Controllers\ErrorsController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)){
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if (! $request->ajax()) {

            if ($this->isHttpException($exception)) {

                if ($exception->getStatusCode() == 404) {

                    $content = app(ErrorsController::class)->errorsContent();
                    return response()->view('errors.' . '404', $content, 404);
                }

                /* if ($exception->getStatusCode() == 500) {
                     return response()->view('errors.' . '500', [], 500);
                 }*/
            }

            if ($exception instanceof ModelNotFoundException) {
                $content = app(ErrorsController::class)->errorsContent();
                return response()->view('errors.' . '404', $content, 404);
            }
        }

        return parent::render($request, $exception);
    }
}
