use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

/*
|-------------------------
| HOME
|-------------------------
*/
Route::get('/', function () {

    if (!Auth::check()) {
        return view('welcome');
    }

    if (Auth::user()->role === 'admin') {
        return redirect('/admin/orders');
    }

    $products = Product::all();
    return view('dashboard', compact('products'));
});


/*
|-------------------------
| AUTH + CART (CUSTOMER)
|-------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index']);

    // ✅ INI WAJIB ADA (FIX ERROR cart.add not defined)
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])
        ->name('cart.add');

    Route::post('/checkout', [CheckoutController::class, 'store']);
});