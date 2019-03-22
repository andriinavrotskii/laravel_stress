<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $timestamps = false;
    public $incrementing = false;

    protected $map = [
        'cardFrom' => 'cardFrom',
        'cardFromExpMonth' => 'cardFromExpMonth',
        'cardFromExpYear' => 'cardFromExpYear',
        'cardFromSecureCode' => 'cardFromSecureCode',
        'amountInCents' => 'amountInCents',
        'cardTo' => 'cardTo',
        'currency' => 'currency'
    ];

    protected $fillable = [
        'cardFrom',
        'cardFromExpMonth',
        'cardFromExpYear',
        'cardFromSecureCode',
        'amountInCents',
        'cardTo',
        'currency'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->id = Str::uuid();
            $query->createdAt = new \DateTime('now');
        });
    }

    protected function setUUID()
    {
        $this->id = preg_replace('/\./', '', uniqid('bpm', true));
    }
}
