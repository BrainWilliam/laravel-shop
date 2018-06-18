<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserAddress::class, function (Faker $faker) {
    $addresses = [
        ["北京市", "市辖区", "东城区"],
        ["河北省", "石家庄市", "长安区"],
        ["江苏省", "南京市", "浦口区"],
        ["江苏省", "苏州市", "相城区"],
        ["广东省", "深圳市", "福田区"],
    ];
    $address = $faker->randomElement($addresses);
    return [
        'province'      => $address[0],
        'city'          => $address[1],
        'distinct'      => $address[2],
        'address'       => sprintf('第%s个街道，第%s个门',$faker->randomNumber(3),$faker->randomNumber(2)),
        'zip'           => $faker->postcode,
        'contact_name'  => $faker->name,
        'contact_phone' => $faker->phoneNumber
    ];
});
