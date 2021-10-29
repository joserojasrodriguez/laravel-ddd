<?php
declare(strict_types=1);

namespace Speeden\Http\Controllers\Address;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Speeden\Http\Controllers\Controller;
use Speeden\Models\User;
use Speeden\Src\BoundedContext\Address\Infrastructure\StoreAddressController as StoreAddress;

final class StoreAddressController extends Controller
{
    public function __construct(private StoreAddress $storeAddressController)
    {

    }

    public function __invoke(User $user, Request $request): JsonResponse
    {
        $this->validate($request, [
            'name'        => 'required',
            'address'     => 'required',
            'locality'    => 'required',
            'state'       => 'required',
            'postal_code' => 'required',
            'country'     => 'required',
        ]);

        $data = [
            'userId'     => $user->id,
            'name'       => $request->input('name'),
            'address'    => $request->input('address'),
            'locality'   => $request->input('locality'),
            'state'      => $request->input('state'),
            'postalCode' => $request->input('postal_code'),
            'country'    => $request->input('country'),
        ];
        try {
            $address = $this->storeAddressController->__invoke($data);
        }catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }


        return response()->json([], 201);
    }
}
