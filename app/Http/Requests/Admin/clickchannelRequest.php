<?php
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ClickchannelRequest extends Request
{
    /**
    * DateCreate 2016-01-25
    * Create By inimz
    */

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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            {
                return [
                  'name'         => ['required','alpha_dash'],
                  'link_url'     => ['required','string'],
                  'status'       => ['required','integer'],
                ] ;
            }
            case 'PATCH':
            case 'PUT':
            {
              return [
                'name'         => ['required','alpha_dash'],
                'link_url'     => ['required','string'],
                'status'       => ['required','integer'],
              ] ;
            }
            default:break;
        }
    }

    /**
    * Change Language from user choose.
    *
    * @return array
    */
    public function messages()
    {
        if (in_array($this->session()->get('lang'), Config('admin.listTransLang')))
        {
            return [] ;
        }

        return [] ;
    }
}
