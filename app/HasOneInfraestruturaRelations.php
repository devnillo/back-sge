<?php

namespace App;

trait HasOneInfraestruturaRelations
{
    protected function infraRelation(string $related)
    {
        return $this->hasOne($related, 'escola_infra_id');
    }
}
