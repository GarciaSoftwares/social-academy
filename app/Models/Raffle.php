<?php

namespace App\Models;

use App\Enums\RaffleDisplayTicketsEnum;
use App\Enums\RaffleTicketQuantityEnum;
use App\Enums\Statuses\RaffleStatusEnum;
use App\Observers\RaffleObserver;
use Database\Factories\RaffleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
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
 * @property int $raffle_category_id
 * @property string $name
 * @property string $description
 * @property string $ticket_price
 * @property string $starting_number
 * @property RaffleTicketQuantityEnum $ticket_quantity
 * @property RaffleStatusEnum $status
 * @property RaffleDisplayTicketsEnum $display_tickets
 * @property int $display_ranking
 * @property array|null $theme
 * @property array|null $data
 * @property string $release_at
 * @property string $delivered_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static RaffleFactory factory($count = null, $state = [])
 * @method static Builder|Raffle newModelQuery()
 * @method static Builder|Raffle newQuery()
 * @method static Builder|Raffle onlyTrashed()
 * @method static Builder|Raffle query()
 * @method static Builder|Raffle whereCreatedAt($value)
 * @method static Builder|Raffle whereData($value)
 * @method static Builder|Raffle whereDeletedAt($value)
 * @method static Builder|Raffle whereDeliveredAt($value)
 * @method static Builder|Raffle whereDescription($value)
 * @method static Builder|Raffle whereDisplayRanking($value)
 * @method static Builder|Raffle whereDisplayTickets($value)
 * @method static Builder|Raffle whereEnterpriseId($value)
 * @method static Builder|Raffle whereId($value)
 * @method static Builder|Raffle whereName($value)
 * @method static Builder|Raffle whereRaffleCategoryId($value)
 * @method static Builder|Raffle whereReleaseAt($value)
 * @method static Builder|Raffle whereStartingNumber($value)
 * @method static Builder|Raffle whereStatus($value)
 * @method static Builder|Raffle whereTheme($value)
 * @method static Builder|Raffle whereTicketPrice($value)
 * @method static Builder|Raffle whereTicketQuantity($value)
 * @method static Builder|Raffle whereUpdatedAt($value)
 * @method static Builder|Raffle withTrashed()
 * @method static Builder|Raffle withoutTrashed()
 * @mixin Eloquent
 */
class Raffle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $casts = [
        'theme'           => AsArrayObject::class,
        'data'            => AsArrayObject::class,
        'display_tickets' => RaffleDisplayTicketsEnum::class,
    ];

    /**
     * Relationship's enterprise model.
     *
     * @return BelongsTo
     */
    public function enterprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise::class);
    }

    /**
     * Relationship's category model.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(RaffleCategory::class, 'raffle_category_id');
    }
}
