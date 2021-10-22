<?php

namespace MyApp\Client;

class FileDTO
{
    private String $title;
    private String $size;
    private String $path;

    /**
     * FileDTO constructor.
     * @param String $title
     * @param String $size
     * @param String $path
     */
    public function __construct(string $title, string $size, string $path)
    {
        $this->title = $title;
        $this->size = $size;
        $this->path = $path;
    }

    /**
     * @return String
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return String
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param String $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return String
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param String $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

}