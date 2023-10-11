<?php

namespace app\models;
use app\core\Model;

class Project extends Model
{
    public string $subject = '';
    public string $file = '';
    public string $messageBody = '';
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            // 'file' => [self::RULE_REQUIRED],
            // 'messageBody' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            // 'file' => 'Upload you video',
        ];
    }

    public function read()
    {
        return "Data reading";
    }

    public function create()
    {
        return true;
    }
}