<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Mail;

class ContactController extends Controller
{
    public function __construct(){
        
    }
    

 /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home/#contact';

     

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
    public function store()
    {
        try {
            $email_only = request()->email_only;
            $emailContact = request()->emailContact;
            $sendEmail = false;

            $nameContact = request()->nameContact;
            $subjectContact = request()->subjectContact;
            $messageContact = request()->messageContact;

            // email
            if($email_only != null){
                $email = $email_only;
            }else{
                $email = $emailContact;
                $sendEmail = true;
            }

            // name
            $name = ($nameContact != null ) ? $nameContact : "";
            // subject
            $subject = ($subjectContact != null ) ? $subjectContact : "";
            // message
            $subject = ($messageContact != null ) ? $messageContact : "";

        
            Contact::create([
                'emailContact' => $email,
                'nameContact' => $nameContact,
                'subject' => $subjectContact,
                'message' => $messageContact
            ]);

            //enviar correo 
            if($sendEmail == true){
                $data = array(
                    'emailContact' => $email,
                    'nameContact' => $nameContact,
                    'subject' => $subjectContact,
                    'messageCont' => $messageContact
                );
                $emailAdmin = env('EMAIL_ADMIN');
                
                Mail::send('emails.contact', $data, function($message) use($emailAdmin) {
                    $message->from($emailAdmin, 'XportGold');
                    $message->to($emailAdmin)->subject('Informacion de Contacto');
                });

            }

            $result = array(
                "success" => true,
                "message" => "Registro satisfactorio! <br/>Muchas gracias por otorgarnos su confianza, el equipo de XportGold le estará brindando información valiosa y de actualidad deportiva."
            );
        } catch (\Throwable $th) {
            $result = array(
                "success" => false,
                "message" => "No pudo ser procesada la información <br/>Por favor intente nuevamente, disculpen las molestias ocasionadas",
                "exeption" => $th->getMessage()
            );
        }

        return $result;
		
    }



/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'nameContact' => 'required|string|max:100',
            'emailContact' => 'required|string|email|max:100',
            'subject' => 'required|string|min:2',
            'mensaje' => 'required|string|min:10',

           
        ], $messages);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
