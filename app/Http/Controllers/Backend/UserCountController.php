<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\UserCountService;

class UserCountController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request, UserCountService $userCountService)
  {
    return response()->json(
      $userCountService->userCount()
    );
  }
}
