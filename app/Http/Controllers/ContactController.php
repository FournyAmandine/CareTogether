<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactMessage;
use App\Models\User;
/*use App\Notifications\NewAdoptionRequest;
use App\Notifications\NewContactMessage;*/
use http\Message;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request){

        $contactMessage = ContactMessage::create(
            $request->validated()
        );

        return redirect()->back()->with('success', 'Merci, le message a bien été envoyé ! On vous recontacte dans les plus brefs délais');
    }
}
