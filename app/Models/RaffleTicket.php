<?php

namespace App\Models;

use App\Enums\Statuses\RaffleTicketStatusEnum;
use Database\Factories\RaffleTicketFactory;
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
 * @property int $raffle_ticket_id
 * @property int $user_id
 * @property int $transaction_id
 * @property int $number
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static RaffleTicketFactory factory($count = null, $state = [])
 * @method static Builder|RaffleTicket newModelQuery()
 * @method static Builder|RaffleTicket newQuery()
 * @method static Builder|RaffleTicket onlyTrashed()
 * @method static Builder|RaffleTicket query()
 * @method static Builder|RaffleTicket whereCreatedAt($value)
 * @method static Builder|RaffleTicket whereDeletedAt($value)
 * @method static Builder|RaffleTicket whereId($value)
 * @method static Builder|RaffleTicket whereNumber($value)
 * @method static Builder|RaffleTicket whereRaffleTicketId($value)
 * @method static Builder|RaffleTicket whereStatus($value)
 * @method static Builder|RaffleTicket whereTransactionId($value)
 * @method static Builder|RaffleTicket whereUpdatedAt($value)
 * @method static Builder|RaffleTicket whereUserId($value)
 * @method static Builder|RaffleTicket withTrashed()
 * @method static Builder|RaffleTicket withoutTrashed()
 * @property-read \App\Models\User|null $client
 * @property-read \App\Models\Raffle|null $raffle
 * @property-read \App\Models\Transaction|null $transaction
 * @property int $raffle_id
 * @method static Builder|RaffleTicket whereRaffleId($value)
 * @mixin Eloquent
 */
class RaffleTicket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $casts = ['status' => RaffleTicketStatusEnum::class];

    /**
     * Relationship's for Raffle model.
     *
     * @return BelongsTo
     */
    public function raffle(): BelongsTo
    {
        return $this->belongsTo(Raffle::class);
    }

    /**
     * Relationship's for User model.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship's for Transaction model.
     *
     * @return BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
