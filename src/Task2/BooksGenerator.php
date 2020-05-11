<?php

declare(strict_types=1);

namespace App\Task2;

class BooksGenerator
{

    public function __construct(
        int $minPagesNumber,
        array $libraryBooks,
        int $maxPrice,
        array $magazineBooks
    )
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->magazineBooks = $magazineBooks;
    }

    public function generate(): \Generator
    {
        foreach ($this->libraryBooks as $libraryBook) {
            if ($libraryBook->getPagesNumber() >= $this->minPagesNumber) {
                yield $libraryBook;
            }
        }

        foreach ($this->magazineBooks as $magazineBook) {
            if ($magazineBook->getPrice() < $this->maxPrice) {
                yield $magazineBook;
            }
        }
    }
}