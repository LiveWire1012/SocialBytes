<?php

namespace App\Helpers;

class ResponseHelper {
    public static function success($message = 'success', $data = []) {
        return response()->json(['success' => true, 'data' => $data, 'message' => $message], 200);
    }

    public static function error($message = 'Something went wrong', $data = [], $statusCode = 400) {
        return response()->json(['success' => false,'data' => $data, 'message' => $message], $statusCode);
    }

}
