<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\cabalAuth;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('painel.auth.login');
    }

    public function login(LoginRequest $request)
	{
        // get account
        $account = cabalAuth::where('ID', $request->ID)->first();

        // check account banned
        if($account && $account->AuthType ==2 || $account->AuthType==3)
        {
            return redirect()->back()->with('error', 'Atenção, sua conta está bloqueada não é possivel fazer login!!');
        }

        // VALIDACAO SE EXISTE EMAIL NA CONTA
        if(!$account->Email)
        {
            return redirect()->back()->with('error', 'Atenção, Você precisa de email valido para poder acessar o painel. Caso tenha duvidas entre em contato com o ADM!!');
        }

        // check login
        $loginAccount = collect(DB::select(
            DB::raw("EXEC Account.dbo.cabal_tool_strdeveloped_login_web '$account->UserNum','$request->password'")
        )[0])->implode(':');


        if($loginAccount == 1)
        {
            // Auth login
            Auth::loginUsingId($account->UserNum, true);
            return redirect()->route('dashboard')->with('success', 'Logado com sucesso, Seja bem vindo ao painel user - Cabal Darkness!');
        }
        else
        {
            return redirect()->back()->with('error', 'Atenção, Informações de Login incorretas!');
        }
	}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userName'       => 'required',
            'userID'         => 'required',
            'userEmail'      => 'required',
            'userPassword'   => 'required',
            'userChave'      => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json(['status' => 'error', 'msg' => $validator->errors()], 400);
        }

         // validacao dados SQL
        #----------verificação de email----------#
        $email = cabalAuth::where('email', '=', $request->userEmail)->count();

        #---------verificação de usuário---------#
        $account =  cabalAuth::where('ID', '=',  $request->userID)->count();
        // dd($account);
        if($email > 0)
        {
            return response()->json(['status' => 'error', 'msg' => 'O e-mail que deseja usar já está sendo utilizado']);
        }
        else if ($account > 0)
        {
            return response()->json(['status' => 'error', 'msg' => 'O login que deseja utilizar já está sendo utilizado']);
        }
        else{

            $IP = $_SERVER['REMOTE_ADDR'];
            $chave = $request->userChave;

            // cria novo usuario cabal
            $createAccount = DB::select(
                DB::raw("SET NOCOUNT ON;EXEC Account.dbo.cabal_tool_strdeveloped_register_web '$request->userID','$request->userPassword','$request->userEmail',
                '$chave', '$IP'")
            );

            //$user = cabalAuth::where('ID', $request->ID)->first();
            // email data
            /*$email_data = array(
                'name'  => $user->ID,
                'email' => $user->Email,
                'link'  => route('web.active', ['key' => $chave, 'account' => $user->UserNum])
            );*/
            // send email with the template
            /*Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'], $email_data['name'])
                    ->subject('CADASTRO - GAMES DARKNESS')
                    ->from('suporte@gamesdarkness.com', 'Suporte Games DarkNess');
            });*/
            //$user->notify(new WelcomeEmailNotification());
            //dd($user);

            if($createAccount)
            {
                $response = array(
                    'status' => 'success',
                    'msg' => 'Olá, '.$request->userID.' sua conta foi cadastrada, agradecemos a preferencia, tenha um bom jogo.',
                );

                return response()->json($response);
            }
            else {
                $response = array(
                    'status' => 'error',
                    'msg' => 'Falha no cadastro tente novamente!.',
                );

                return response()->json($response);
            }

        }

    }

    public function logout()
    {
        Auth::logout();
	    return redirect()->route('web.home');
    }
}
