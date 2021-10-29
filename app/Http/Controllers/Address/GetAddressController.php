<?php
declare(strict_types=1);

namespace Speeden\Http\Controllers\Address;

use Illuminate\Http\JsonResponse;
use Speeden\Http\Controllers\Controller;
use Speeden\Src\BoundedContext\Address\Infrastructure\GetAddressController as GetAddress;

final class GetAddressController extends Controller
{
    public function __construct(private GetAddress $getAddressController)
    {

    }

    public function __invoke(int $id): JsonResponse
    {
        $address = $this->getAddressController->__invoke($id);

        return is_null($address)
            ? response()->json([
                'data'    => [],
                'error'   => 'Model not found',
                'success' => false
            ], 404)
            : response()->json([
                'data'    => [
                    'id'          => $address->id()->value(),
                    'name'        => $address->name(),
                    'address'     => $address->address()->value(),
                    'locality'    => $address->locality()->value(),
                    'state'       => $address->state()->value(),
                    'country'     => $address->country()->value(),
                    'postal_code' => $address->postalCode()->value(),
                    'user'        => [
                        'id'   => $address->userId()->value(),
                        'name' => $address->userName()->value()
                    ],
                ],
                'errors'  => [],
                'success' => true
            ], 200);

    }
}
