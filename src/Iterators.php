<?php

declare(strict_types=1);

namespace drupol\phpermutations;

use Countable;

abstract class Iterators extends Combinatorics implements Countable, IteratorInterface
{
    /**
     * A copy of the dataset at a give time.
     *
     * @var array<int, mixed>
     */
    protected $current;

    /**
     * @var int
     */
    protected $key = 0;

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->current;
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->key = 0;
    }

    /**
     * Convert the iterator into an array.
     *
     * @return array<int, mixed>
     *               The elements
     */
    public function toArray()
    {
        $data = [];

        for ($this->rewind(); $this->valid(); $this->next()) {
            $data[] = $this->current();
        }

        return $data;
    }
}
