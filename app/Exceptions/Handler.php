<?php

namespace App\Exceptions;
use Illuminate\Contracts\Foundation\Exceptions\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request ;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($request->expectsJson()){
            if ($e instanceof ModelNotFoundException){
                return response()->json([
                    'errors'=> 'Product Model Not Found / Unavailabe'
                ], Response::HTTP_NOT_FOUND);
            }
            if($e instanceof NotFoundHttpException){
                return response()->json([
                    'errors'=> 'Incorrect Route, Please Check'
                ], Response::HTTP_NOT_FOUND);
            }
    
    }
        //dd($e);
        return parent::render($request, $e);
   }

    
}
