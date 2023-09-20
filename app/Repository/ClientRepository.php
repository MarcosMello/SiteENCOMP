<?php

namespace App\Repository;

use App\Models\Client;
use App\Repository\Interfaces\AddressRepositoryInterface;
use App\Repository\Interfaces\ClientRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    private AddressRepositoryInterface $addressRepository;

    /**
     * @param Client $client
     * @param AddressRepositoryInterface $addressRepositoryInterface
     */
    #[Pure]
    public function __construct(Client $client, AddressRepositoryInterface $addressRepositoryInterface)
    {
        $this->addressRepository = $addressRepositoryInterface;
        parent::__construct($client);
    }

    /**
     * @override
     * @throws \Throwable
     */
    public function create(array $attributes): Model
    {
        return \DB::transaction(function () use ($attributes) {
            $address = $this->addressRepository->create($attributes);
            $attributes['address_id'] = $address->id;
            return parent::create($attributes);
        });
    }
}
