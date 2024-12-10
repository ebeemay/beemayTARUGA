<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm($userType)
    {
        session(['user_type' => $userType]); // Salva o tipo de usuário na sessão
        return view('login', compact('userType')); // Mostra a página de login
    }

    public function showRegisterForm($userType)
    {
        session(['user_type' => $userType]); // Salva o tipo de usuário na sessão
        return view('register', compact('userType')); // Mostra a página de login
    }



    public function login(Request $request)
    {
        $userType = session('user_type'); // Obtém o tipo de usuário da sessão

        switch ($userType) {
            case 'student':
                return app()->make(\App\Http\Controllers\StudentAuthController::class)->login($request);
            case 'institution':
                return app()->make(\App\Http\Controllers\InstitutionController::class)->login($request);
            case 'teacher':
                return app()->make(\App\Http\Controllers\TeacherController::class)->login($request);
            default:
                return redirect('/')->withErrors(['error' => 'Tipo de usuário inválido.']);
        }
    }

      public function logout()
    {
        Auth::logout();
        session(['user_type' => null]);
        return redirect()->route('student.identification');
    }
}
