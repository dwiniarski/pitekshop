<?php


namespace PitekShop\Cart;


interface MetadataObject
{
    public function getMetadata(): array;

    public function setMetadata(array $metadata): void;

    public function setMetadataByKey(string $key, $value): void;

    public function getMetadataByKey(string $key);

    public function existsMetadataByKey(string $key): bool;

    public function removeMetadataByKey(string $key): void;
}
