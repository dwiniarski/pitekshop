<?php


namespace PitekShop\Cart\Traits;


trait ContainsMetadata
{
    /**
     * @var array $metadata
     */
    protected $metadata = [];

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata(array $metadata): void
    {
        $this->metadata = $metadata;
    }

    /**
     * @param $key string
     * @param $value
     */
    public function setMetadataByKey(string $key, $value): void
    {
        $this->metadata[$key] = $value;
    }

    /**
     * @param $key string
     */
    public function removeMetadataByKey(string $key): void
    {
        if ($this->existsMetadataByKey($key)) {
            unset($this->metadata[$key]);
        }
    }

    /**
     * Get metadata by key. If not exists returns null
     * @param string $key
     * @return
     */
    public function getMetadataByKey(string $key)
    {
        if ($this->existsMetadataByKey($key)) {
            return $this->metadata[$key];
        } else {
            return null;
        }
    }

    /**
     * Checks if given metadata exists
     * @param string $key
     * @return bool
     */
    public function existsMetadataByKey(string $key): bool
    {
        return isset($this->metadata[$key]);
    }
}
