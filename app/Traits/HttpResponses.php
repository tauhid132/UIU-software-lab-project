<?php

namespace App\Traits;
trait HttpResponses{
    protected function success($message = null, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
    protected function error($message = null, $data = [], $status)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
}


?>