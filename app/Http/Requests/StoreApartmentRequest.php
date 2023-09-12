<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:5',
            'principal_image' => 'nullable',
            'serviceID' => 'required|exists:services,id',
            'price' => 'required|integer|regex:/^\d+$/',
            'country' => 'required|min:3|max:50',
            'city' => 'required|min:3|max:50',
            'num_rooms' => 'required|integer|between:1,15',
            'num_bathrooms' => 'required|integer|between:1,7',
            'square_meters' => 'required|integer|between:10,400',
            'address' => 'required|min:10|max:255',
            'visible' => 'required|boolean',
            //'latitude' => 'required',
            //'longitude' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            "title.required" => "Il Titolo è obbligatorio!",
            "title.min" => "Devi inserire almeno :min Caratteri",
            "title.max" => "Puoi inserire un massimo di :max caratteri",

            "description.required" => "Il contenuto è obbligatorio!",
            "description.min" => "Devi inserire almeno :min caratteri",

            "principal_image.max" => "Puoi inserire un massimo di :max caratteri",

            'serviceID.required' => "Devi inserire almeno un servizio",

            'price.required' => 'Indica il prezzo',
            'price.integer' => 'Il prezzo deve essere un numero intero',
            'price.regex' => 'Il prezzo non deve contenere simboli',

            'country.required' => 'Aggiungi città',
            'country.min' => 'Devi inserire almeno :min Caratteri',
            'country.max' => 'Puoi inserire un massimo di :max caratteri',

            'city.required' => 'Aggiungi città',
            'city.min' => 'Devi inserire almeno :min Caratteri',
            'city.max' => 'Puoi inserire un massimo di :max caratteri',

            'num_rooms.required' => 'Indica il numero di stanze disponibili',
            'num_bathrooms.required' => 'Indica il numero di bagni disponibili',

            'square_meters.required' => 'Indica i metri quadri disponibili',
            'square_meters.integer' => 'I metri quadri devono essere un numero intero',
            'square_meters.between' => 'I metri quadri devono essere tra 10 e 400',

            'address.required' => 'Aggiungi indirizzo',
            'address.min' => 'Devi inserire almeno :min Caratteri',
            'address.max' => 'Puoi inserire un massimo di :max caratteri',

            'visible.required' => 'Indica se privato o meno'

        ];
    }
}
