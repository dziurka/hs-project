<?php

namespace Support\DataTransferObjects;

class DataTransferObject {

    public function toArray(): array
    {
        $properties = (new \ReflectionClass($this))->getProperties();
        $outputArray = [];

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $outputArray[$property->getName()] = $property->getValue($this);
        }

        return $outputArray;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
