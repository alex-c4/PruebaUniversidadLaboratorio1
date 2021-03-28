<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Plan_User;
use App\Quiniela;
use UserUtils;
use Carbon\Carbon;


class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function purchaseXportgamePlanView($idPlan){
        $planInfo = DB::table('plans')
                    ->select('plans.id as planid', 'plans.name as planname', 'plans.description as plandescription', 'plans.amount as planamount', 'expirations.name as expirationname')
                    ->where('plans.id', '=', $idPlan)
                    ->join('expirations', 'expirations.id', '=', 'plans.id_expiration')
                    ->first();

        return view('plan.purchaseXportGamePlan', compact('planInfo'));
    }

    public function purchaseXportGamePlanStore(){
        $idPlan = request()->hIdPlan;
        $idUser = auth()->user()->id;
        $userName = ucfirst(auth()->user()->name);
        $userLastName = ucfirst(auth()->user()->lastName);

        /**
         * Obtener informacion del plan
         */
        $planInfo = DB::table('plans')
            ->where('id', '=', $idPlan)
            ->first();

        /**
         * Valida que usuario contenta saldo
         */
        $balance = UserUtils::getBalanceGold($idUser);

        if($balance >= $planInfo->amount){
            $date = Carbon::today()->addDays(20);
            $todayplus20 = $date->format('Y-m-d');
            /**
             * Primero busca si ya posee este plan en la tabla plan_user para actualizarlo
             */
            $hasPlan = DB::table('plans_user')
                ->where('id_user', '=', $idUser)
                ->where('id_plan', '=', $idPlan)
                ->first();
            
            /**
             * Si ya tiene un plan actualizamos, de lo contrario creamos el plan para el usuario
             */
            if($hasPlan != null){
                DB::beginTransaction();
                try {
                    /**
                     * Actualiza el plan del usuario
                     */
                    $hasPlan->expiration_date = $todayplus20;
                    $hasPlan->update();
                    
                    /**
                     * Descuenta del balance
                     */
                    $planAmount = floatval($planInfo->amount);
                    $total = $balance - $planAmount;

                    DB::table('balances')
                        ->where('id_user', '=', $idUser)
                        ->update([
                            'amount' => $total,
                            'updated_at' => Carbon::now('UTC')
                            ]);
                    
                    /**
                     * Actualizar todos los XportGames creado por el usuario, no mayor a 1 mes
                     */
                    $dateSubMonth = Carbon::today()->subMonth();
                    Quiniela::where('id_user_creador', '=', $idUser)
                        ->where('created_at', '>', $dateSubMonth)
                        ->update([
                            'id_plan_user' => $idPlan
                        ]);
                    
                    DB::commit();
                    
                } catch (\Throwable $th) {
                    DB::rollBack();

                    // registro de mensaje de error en el archivo laravel.log
	                UserUtils::logRegister($th->getMessage());

                    $data = [
                        'title' => 'Información',
                        'class' => 'alert-warning',
                        'message' => 'Hubo un error en la carga de la información, por favor intente de nuevo, o contacte a nuestro personal Administrativo a través del correo <b>xportgoldmail.xportgold.com.</b>',
                        'footer' => 'Disculpe los inconvenientes.',
                        'returnPage' => 'dasboardindex'
                    ];
                    return UserUtils::muestraAlert($data);
                }
            }else{
                DB::beginTransaction();
                try {
                    /**
                     * Crear el plan del usuario
                     */
                    Plan_User::create([
                        'id_plan' => $idPlan,
                        'id_user' => $idUser,
                        'expiration_date' => $todayplus20,
                        'created_by' => $idUser,
                        'updated_by' => $idUser,
                        'updated_at' => Carbon::now('UTC'),
                        'created_at' => Carbon::now('UTC')
                    ]);

                    /**
                     * Descontar del balance
                     */
                    $planAmount = floatval($planInfo->amount);
                    $total = $balance - $planAmount;

                    DB::table('balances')
                        ->where('id_user', '=', $idUser)
                        ->update([
                            'amount' => $total,
                            'updated_at' => Carbon::now('UTC')
                            ]);

                    /**
                     * Actualizar todos los XportGames creado por el usuario, no mayor a 1 mes
                     */
                    $dateSubMonth = Carbon::today()->subMonth();
                    Quiniela::where('id_user_creador', '=', $idUser)
                        ->where('created_at', '>', $dateSubMonth)
                        ->update([
                            'id_plan_user' => $idPlan
                        ]);
                    
                    DB::commit();

                } catch (\Throwable $th) {
                    DB::rollBack();

                    // registro de mensaje de error en el archivo laravel.log
	                UserUtils::logRegister($th->getMessage());

                    $data = [
                        'title' => 'Información',
                        'class' => 'alert-warning',
                        'message' => 'Hubo un error en la carga de la información, por favor intente de nuevo, o contacte a nuestro personal Administrativo a través del correo <b>xportgoldmail.xportgold.com.</b>',
                        'footer' => 'Disculpe los inconvenientes.',
                        'returnPage' => 'dasboardindex'
                    ];
                    return UserUtils::muestraAlert($data);
                }
                

                $data = [
                    'title' => 'Información',
                    'class' => 'alert-success',
                    'message' => 'Sr(a). '. $userName .' '. $userLastName .' su plan ha sido activado de manera satisfactoria, ya puede contar con las bondades que le ofrece el plan '. $planInfo->name,
                    'footer' => 'El equipo de XportGold le desea mucha suerte y éxitos en sus pronósticos',
                    'returnPage' => 'dasboardindex'
                ];

    
                return UserUtils::muestraAlert($data); 
            }
        }else{
            $data = [
                'title' => 'Información',
                'class' => 'alert-warning',
                'message' => 'Sr(a). '. $userName .' '. $userLastName .' actualmente no cuenta con el saldo necesario para adquirir el plan <b>'. $planInfo->name .', le invitamos a realizar una recarga en el siguiente link: <a href="'. route("rechargeBalance") .'">Recargar Saldo</a></b>.',
                'footer' => 'Si desea mas información acerca de los planes y costos, por favor no dude en enviarnos un correo electrónico y con gusto le suministraremos la información a la siguiente dirección '. env('EMAIL_ADMIN') .'.',
                'returnPage' => 'dasboardindex'
            ];

            return UserUtils::muestraAlert($data);
        }

        
    }
}
