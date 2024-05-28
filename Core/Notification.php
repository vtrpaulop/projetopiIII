<?php

namespace Core;

class Notification
{
    public static function set(string $status, string $message)
    {
        Session::setTemp('_info', [
            'status' => $status,
            'message' => $message
        ]);
    }

    public static function get(): array|null
    {
        return Session::getTemp('_info') ?? null;
    }

    public static function getStatus(): string|null
    {
        return static::get()['status'];
    }

    public static function getMessage(): string|null
    {
        return static::get()['message'];
    }
}