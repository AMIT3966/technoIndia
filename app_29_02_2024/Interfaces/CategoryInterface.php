<?php

namespace App\Interfaces;

interface CategoryInterface {
    public function listAll();

    public function findById($id);
    public function getSearchJobCategory(string $term);
}
