<?php

namespace App\Service\Frontend;

use App\Models\Advertisement;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WishlistService
{
    public function store(Request $request)
    {
        return $this->addItemAdvertisement($request);
    }

    public function numberOfAdvertisement()
    {
        $numberOfAdvertisement = Cart::instance('wishlist')
            ->content()
            ->count();

        return ['numberOfAdvertisement' => $numberOfAdvertisement];
    }

    public function index()
    {
        return Cart::instance('wishlist')->content();
    }

    public function delete($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);

        return ['message' => 'delete successful'];
    }

    private function addItemAdvertisement($request)
    {
        $advertisement = Advertisement::with('realEstateType:id,name',
            'advertisingPictures:id,image,advertisement_id')
            ->findOrFail($request->product_id);

        $pictures = [];

        foreach ($advertisement->advertisingPictures as $picture) {
            $pictures[] = $picture->image;
        }

        Cart::instance('wishlist')->add([
            'id' => $advertisement->id,
            'name' => $advertisement->realEstateType->name,
            'price' => $advertisement->price,
            'qty' => 1,
            'options' => ['description' => $advertisement->description,
                'space' => $advertisement->space,
                'created_at' => Carbon::parse($advertisement->created_at)->diffForHumans(),
                'number_of_room' => $advertisement->number_of_room,
                'floor_number' => $advertisement->floor_number,
                'number_of_hall' => $advertisement->number_of_hall,
                'number_of_bathroom' => $advertisement->number_of_bathroom,
                'images' => $pictures],
        ]);

        return ['message' => 'Add successful'];
    }
}
