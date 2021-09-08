<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller
{

    public function viewCart(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'products' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'data' => [
                    'message' => $validate->messages()
                ]
            ]);
        }

        $group_one = [];
        $group_two = [];
        $products = json_decode($request->products);

        foreach ($products as $value) {
            $product = Product::find($value->product_id);
            if ($product->category->group == 1) {
                $product['buying_qty'] = $value->qty;
                array_push($group_one, $product);
            } else {
                $product['buying_qty'] = $value->qty;
                array_push($group_two, $product);
            }
        }
        // calculate price
        $group_one_total = 0;
        $group_two_total = 0;


        if ($group_one != null) {

            $buying_qty = 0;
            foreach ($group_one as $product) {
                $buying_qty += $product->buying_qty;
            }

            // return $buying_qty;

            foreach ($group_one as $product) {
                if ($buying_qty == 9000) {
                    // check category;
                    if ($product->category->name == "Lip Stick") {
                        $group_one_total += 5900;
                    } else if ($product->category->name == "Clay Mask") {
                        $group_one_total += 7900;
                    } else if ($product->category->name == "Foundation") {
                        $group_one_total += 6200;
                    } else if ($product->category->name == "Powder") {
                        $group_one_total += 6200;
                    } else if ($product->category->name == "Body Scrub") {
                        $group_one_total += 6200;
                    }
                } else if ($buying_qty >= 4500) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 5950;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 3000) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6050;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 1500) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 780) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 480) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6550;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 240) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 108) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6850;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 48) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6900;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 24) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6950;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 10000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 12) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 7000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 10500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $$amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    }
                }
            }
        }

        if ($group_two != null) {
            $buying_qty = 0;
            foreach ($group_two as $product) {
                $buying_qty += $product->buying_qty;
            }

            foreach ($group_two as $product) {
                if ($buying_qty == 4500) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 4800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 4800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5540;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5540;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 1500) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5023;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5023;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5800;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 300) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5170;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5170;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5970;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5970;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 60) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5245;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5245;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 6055;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 6055;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 12) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5765;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5765;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 6650;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 6650;
                        $group_two_total += $amount;
                    }
                }
            }
        }


        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => [
                'products' => $products,
                'group_one_total_amount' => $group_one_total,
                'group_two_total_amount' => $group_two_total,
                'total_amount' => $group_one_total + $group_two_total,
            ]
        ]);
    }


    public function checkout(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'products' => 'required',
            'payment' => 'required',
            'payment_slip' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'data' => [
                    'message' => $validate->messages()
                ]
            ]);
        }

        // order start


        // check which group
        $group_one = [];
        $group_two = [];
        $products = json_decode($request->products);

        foreach ($products as $value) {
            $product = Product::find($value->product_id);
            if ($product->category->group == 1) {
                $product['buying_qty'] = $value->qty;
                array_push($group_one, $product);
            } else {
                $product['buying_qty'] = $value->qty;
                array_push($group_two, $product);
            }
        }
        // calculate price
        $group_one_total = 0;
        $group_two_total = 0;

        if ($group_one != null) {

            $buying_qty = 0;
            foreach ($group_one as $product) {
                $buying_qty += $product->buying_qty;
            }

            // return $buying_qty;

            foreach ($group_one as $product) {
                if ($buying_qty == 9000) {
                    // check category;
                    if ($product->category->name == "Lip Stick") {
                        $group_one_total += 5900;
                    } else if ($product->category->name == "Clay Mask") {
                        $group_one_total += 7900;
                    } else if ($product->category->name == "Foundation") {
                        $group_one_total += 6200;
                    } else if ($product->category->name == "Powder") {
                        $group_one_total += 6200;
                    } else if ($product->category->name == "Body Scrub") {
                        $group_one_total += 6200;
                    }
                } else if ($buying_qty >= 4500) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 5950;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 6500;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 3000) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6050;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 6800;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 1500) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 8800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7100;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 780) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7200;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 480) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6550;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9200;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7300;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 240) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7400;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 108) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6850;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7500;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 48) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6900;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 9800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7600;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 24) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 6950;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 10000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $amount = $product->buying_qty * 7700;
                        $group_one_total += $amount;
                    }
                } else if ($buying_qty >= 12) {
                    if ($product->category->name == "Lip Stick") {
                        $amount = $product->buying_qty * 7000;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Clay Mask") {
                        $amount = $product->buying_qty * 10500;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Foundation") {
                        $amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Powder") {
                        $amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    } else if ($product->category->name == "Body Scrub") {
                        $$amount = $product->buying_qty * 7800;
                        $group_one_total += $amount;
                    }
                }
            }
        }

        if ($group_two != null) {
            $buying_qty = 0;
            foreach ($group_two as $product) {
                $buying_qty += $product->buying_qty;
            }

            foreach ($group_two as $product) {
                if ($buying_qty == 4500) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 4800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 4800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5540;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5540;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 1500) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5023;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5023;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5800;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5800;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 300) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5170;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5170;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 5970;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 5970;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 60) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5245;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5245;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 6055;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 6055;
                        $group_two_total += $amount;
                    }
                } else if ($buying_qty >= 12) {
                    if ($product->category->name == "Lip Oil Normal") {
                        $amount = $product->buying_qty * 5765;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Scrub") {
                        $amount = $product->buying_qty * 5765;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Remover") {
                        $amount = $product->buying_qty * 6650;
                        $group_two_total += $amount;
                    } else if ($product->category->name == "Lip Oil Gold Digger") {
                        $amount = $product->buying_qty * 6650;
                        $group_two_total += $amount;
                    }
                }
            }
        }
        $order_id = IdGenerator::generate(['table' => 'orders', 'field' => 'order_id', 'length' => 8, 'prefix' => 'BDO']);


        $order = new Order();
        $order->user_id = Auth::id();
        $order->order = json_encode($request->products);
        $order->order_id = $order_id;
        $order->group_one_total = $group_one_total;
        $order->group_two_total = $group_two_total;
        $order->total_amount = $group_one_total + $group_two_total;
        $order->payment = $request->payment;
        if ($request->file('payment_slip')) {
            $file = $request->file('payment_slip');
            $name = time() . rand(1, 100) . '.' . $file->extension();
            $path = 'BurmeseDream/Payment/Images';
            Storage::disk('ln_spaces')->putFileAs($path, $file, $name, 'public');
            $order->payment_slip = $name;
        }
        $order->save();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => [
                'order_id' => $order->order_id,
                'products' => json_decode($order->order),
                'group_one_total_amount' => $order->group_one_total,
                'group_two_total_amount' => $order->group_two_total,
                'total_amount' => $order->total_amount,
                'payment' => $order->payment,
                'ordered_at' => $order->created_at->format('d-m-Y h:i A'),
            ]
        ]);
    }
}
