{!! $phpTag !!}
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
@foreach( $columns as $column )
* @property string ${{$column->name}} {{$column->remark}}
@endforeach
*/
class {{$controllerName}} extends Model
{
@if ($soft_delete)
    use SoftDeletes;
@endif
    protected $table = '{{env('DB_PREFIX', '')}}{{$table}}';
@if (!$timestamps)
    protected $timestamps = false;
@endif
@if ($primaryKey != 'id')
    public $primaryKey = '{{$primaryKey}}';
@endif
    protected $fillable = [{!! $fillable !!}];

@if($rules)
    public $rules = [
@foreach( $rules as $field => $rule)
        '{{$field}}' => '{{$rule}}',
@endforeach
    ];
@endif

}
