<?php

namespace App\Http\Resources;

use App\Contracts\HasLabel;
use UnitEnum;
use BackedEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected function resolveEnumLabels(array $data): array
    {
        foreach ($data as $key => $value) {
            if ($value instanceof BackedEnum && $value instanceof HasLabel) {
                $data["{$key}_label"] = $value->label();
            }
        }

        return $data;
    }
}
