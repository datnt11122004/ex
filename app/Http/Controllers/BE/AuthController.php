<?php

    namespace App\Http\Controllers\BE;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use App\Http\Requests\AuthRequest;
    use Illuminate\Support\Facades\Auth;


class AuthController extends Controller{
        public function __construct(){

        }

        public function index(){
//            dd(Auth::user());
            if (Auth::user() > 0){
                return redirect() -> route('dashboard.index');
            }else {
                return view('BE.auth.login');
            }
        }

        public function login(AuthRequest $request){

            $credentials = [
                'email' => $request -> input('email'),
                'password' => $request -> input('password'),
            ];

            if (Auth::attempt($credentials)) {
                return redirect() -> route('dashboard.index') -> with('success', 'Đăng nhập vào trang quản trị thành công');
            }

            return redirect()->route('auth.admin') -> with('error','Email hoặc mật khẩu không chính xác');

        }

        public function logout(Request $request): RedirectResponse{
            Auth::logout();
            $request -> session() -> invalidate();
            $request -> session() -> regenerateToken();
            return redirect() -> route('auth.admin') -> with('info','Đã đăng xuất');
        }

    }
?>
