<?php

namespace Encore\Admin\Auth\Database;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use DefaultDatetimeFormat;

    protected $guarded = [];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('admin.database.users_profile_table'));

        parent::__construct($attributes);
    }

    /**
     * Get photo attribute.
     *
     * @param string $photo
     *
     * @return string
     */
    public function getPhotoAttribute(string $photo)
    {
        if ($photo && url()->isValidUrl($photo)) {
            return $photo;
        }

        $disk = config('admin.upload.disk');

        if ($photo && array_key_exists($disk, config('filesystems.disks'))) {
            return Storage::disk(config('admin.upload.disk'))->url($photo);
        }

        $default = match($this->gender) {
            1 => '/vendor/laravel-admin/laravel-admin/img/user-profile-image-male.png',
            2 => '/vendor/laravel-admin/laravel-admin/img/user-profile-image-female.png',
        };

        return admin_asset($default);
    }

    /**
     * A user owned this profile.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        $relatedModel = config('admin.database.users_model');

        return $this->belongsTo($relatedModel, 'id', 'user_id');
    }
}
