<?php

// interface ou abstrata
interface Observer
{
    /**
     * @param array $unknown
     * @return void
     */
    public function update(...$unknown): void;
}
