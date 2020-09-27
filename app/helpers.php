<?php
if (!function_exists('notFound')) {
    /**
     * @param string|null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function notFound(?string $message = null)
    {
        if ($message === null) {
            $message = __('Page not found');
        }

        return response()->json([
            'message' => $message
        ], 404);
    }
}
