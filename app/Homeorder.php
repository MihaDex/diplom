<?phpnamespace App;use Illuminate\Database\Eloquent\Model;class Homeorder extends Model{    protected $fillable = ['name','phone','email','comment','type', 'calculate'];    public $timestamps = false;}