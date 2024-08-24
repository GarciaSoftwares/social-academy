<?php

namespace App\Models;

use App\Enums\Statuses\EnterpriseStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $description
 * @property EnterpriseStatusEnum $status
 * @property string|null $internal_observation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\EnterpriseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereInternalObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise withoutTrashed()
 * @mixin \Eloquent
 */
class Enterprise extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $casts = ['status' => EnterpriseStatusEnum::class];

    /**
     * Relationship with user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
