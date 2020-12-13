<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

final class TechnoFactory
{
    public function create(array $technos): TechnoCollection
    {
        $technoCollection = new TechnoCollection();

        foreach ($technos as $technoId => $techno) {
            $parent = !empty($techno['parent']) ? $technoCollection->get($techno['parent']) : null;
            $technoObj = new Techno($technoId, $techno['label'], $techno['type'], $parent);
            if ($parent !== null) {
                $parent->addChild($technoObj);
            }
            $technoCollection->add($technoObj);
        }

        return $technoCollection;
    }
}
