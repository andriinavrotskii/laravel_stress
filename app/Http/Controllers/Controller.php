<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());

        return [
            'id' => $transaction->id->toString(),
            'createdAt' => $transaction->createdAt->getTimestamp(),
            'cardFrom' => $transaction->cardFrom,
            'cardFromExpMonth' => $transaction->cardFromExpMonth,
            'cardFromExpYear' => $transaction->cardFromExpYear,
            'cardFromSecureCode' => $transaction->cardFromSecureCode,
            'amountInCents' => $transaction->amountInCents,
            'cardTo' => $transaction->cardTo,
            'currency' => $transaction->currency,
        ];
    }
}
