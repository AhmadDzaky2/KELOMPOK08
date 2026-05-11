use App\Models\Product;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    // Jika belum login → tampil landing page
    if (!Auth::check()) {
        return view('welcome');
    }

    // Jika login sebagai admin → masuk ke halaman admin
    if (Auth::user()->role === 'admin') {
        return redirect('/admin/orders');
    }

    // Jika login sebagai customer → tampil dashboard produk
    $products = Product::all();
    return view('dashboard', compact('products'));
});