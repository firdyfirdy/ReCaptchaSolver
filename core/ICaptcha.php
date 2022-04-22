<?php

interface ICaptcha
{
    public function verify();

    public function setSiteKey(string $site_key): object;

    public function setSiteUrl(string $site_url): object;

    public function isSuccess(): bool;

    public function getErrorMessage(): string;

    public function getResponse(): string;
}