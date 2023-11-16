<?php

namespace app\models;
use app\core\ProjectModel;

class Project extends ProjectModel
{
    // const STATUS_INACTIVE = 0;
    // const STATUS_ACTIVE = 1;
    // const STATUS_DELETED = 2;

    public string $title = '';
    public string $file = '';
    // public int $status = self::STATUS_INACTIVE;
    public array $videos = [];
    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            // 'file' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'title' => 'Enter your video title',
            // 'file' => 'Upload you video',
        ];
    }

    public static function tableName(): string
    {
        return 'projects';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }
    public function attributes(): array
    {
        return ['title'];
    }

    public function save()
    {
        // $this->status = self::STATUS_INACTIVE;
        return parent::save();
    }

    public function getDisplayVideos(): array
    {
        $this->videos = $this->findAll();
        return $this->videos;
    }

    public function update($where)
    {
        return parent::update(['id' => '11']);
    }

}