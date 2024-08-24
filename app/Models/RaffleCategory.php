<?php

namespace App\Models;

use App\Enums\Statuses\RaffleCategoryStatusEnum;
use Database\Factories\RaffleCategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $enterprise_id
 * @property int|null $dad_id
 * @property int|null $son_id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static RaffleCategoryFactory factory($count = null, $state = [])
 * @method static Builder|RaffleCategory newModelQuery()
 * @method static Builder|RaffleCategory newQuery()
 * @method static Builder|RaffleCategory query()
 * @method static Builder|RaffleCategory whereCreatedAt($value)
 * @method static Builder|RaffleCategory whereDadId($value)
 * @method static Builder|RaffleCategory whereDeletedAt($value)
 * @method static Builder|RaffleCategory whereEnterpriseId($value)
 * @method static Builder|RaffleCategory whereId($value)
 * @method static Builder|RaffleCategory whereName($value)
 * @method static Builder|RaffleCategory whereSlug($value)
 * @method static Builder|RaffleCategory whereSonId($value)
 * @method static Builder|RaffleCategory whereStatus($value)
 * @method static Builder|RaffleCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class RaffleCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $casts = ['status' => RaffleCategoryStatusEnum::class];

    /**
     * Relationship's with the enterprise.
     *
     * @return BelongsTo
     */
    public function enterprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise::class);
    }
}
