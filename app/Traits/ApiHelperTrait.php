<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;


trait ApiHelperTrait{

    /**
     * JSON response for APIs
     *
     * @param bool $status
     * @param string|array $message
     * @param array $data
     * @param int $code
     * @return Response
     */
    public function returnJSON($data = [], $status = true,
        $code = JsonResponse::HTTP_OK, $message = '')
    { 
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return response for success opertation
     *
     * @return Response
     */
    public function returnSuccess($message = 'Your request done successfully')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
        ],   JsonResponse::HTTP_OK);
    }

    /**
     * Return response for wrong opertation
     *
     * @return Response
     */
    public function returnWrong($message = 'Your Request Is Invalid' ,  $code = JsonResponse::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => false,
            'message' =>['global' => $message] ,
        ], $code);
    }

}
