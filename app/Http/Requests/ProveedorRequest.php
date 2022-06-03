<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
//        dd($this->request->all());
        if ($this->request->get("regimen_fiscal") == 0) {
            $regex = 'regex:/^([A-ZÑ&]{4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/';
        } else {
            $regex = 'regex:/^([A-ZÑ&]{3}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/';
        }
        return [

            'regimen_fiscal' => 'required',
            'nombre_organizacion' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'rfc' => ['required', $regex],
            'sitio_web' => 'required|url',
            'razon_social' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'domicilio.calle' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'domicilio.numero_exterior' => 'required',
            'domicilio.codigo_postal' => ['required', 'regex:/^([0-9]{5})$/'],
            'domicilio.estado' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'domicilio.municipio' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'domicilio.localidad' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'contacto.nombre_contacto' => ['required', 'regex:/^([A-Za-zñÑ& ]*)$/'],
            'contacto.email' => 'required|email',
            'contacto.url' => 'required|url',
        ];
    }
}
