<?php

namespace App\Services;

use App\HtmlField;
use App\Form;
use App\FormDetail;
use App\Option;
use App\Http\Resources\HtmlFieldResource; 
use App\Http\Resources\ListFormResource;
use App\Http\Resources\FormDetailsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HtmlFieldService
{
    public function index()
    {
        $services = HtmlField::orderBy('id', 'asc')->get();
        $data = HtmlFieldResource::collection($services);
        return $data->additional([
            'status' => 'success',
            'message' => 'Fields list',
        ]);
    }


    public function store(Request $request)
    {
       //dd($request);
        $forms = new Form;
        $forms->form_name = $request->form_label;
        $result = $forms->save();
        $insertedFormId = $forms->id;
        
        if($insertedFormId!='')
        {
            for($i=0;$i<count($request->html_field);$i++)
            {
                if(isset($request->html_field[$i]))
                {
                    $formDetails = new FormDetail;
                    $formDetails->html_field_id  = $request->html_field[$i];
                    $formDetails->html_field_value = $request->form_name[$i];
                    $formDetails->form_id       = $insertedFormId;
                    $result = $formDetails->save();
                    $insertedDetailId = $formDetails->id;
                    $prev = '';
                    if($request->html_field[$i] == "3")
                    {
                       $curr = $insertedDetailId;
                        if(isset($request->static_field_count))
                        {
                            
                            $divCount = $request->static_field_count;
                            for($j=1;$j<=$divCount;$j++)
                            {
                                if(isset($request["select_option_value".$j]))
                                {
                                    
                                    $countOption = count($request["select_option_value".$j]);
                                    if($prev!=$curr)
                                    {
                                        for($k=0;$k<$countOption;$k++)
                                        {
                                            $optionDetails = new Option;
                                            $optionDetails->form_details_id  = $insertedDetailId;
                                            $optionDetails->form_id       = $insertedFormId;
                                            $optionDetails->value = $request["select_option_value".$j][$k];
                                            $optionDetails->label = $request["select_option_label".$j][$k];
                                            $result = $optionDetails->save();
                                        }
                                        unset($request["select_option_value".$j]); 
                                        unset($request["select_option_label".$j]); 
                                    }
                                    $prev=$curr;
                                    
                                }
                            }
                        }
                    }
                    
                }
            
            }
        }
    }

    public function list_form()
    {
        $forms = Form::where('status', 1)->orderBy('updated_at', 'desc')->get();
        $data = ListFormResource::collection($forms);
        return $data->additional([
            'status' => 'success',
            'message' => 'Fields list',
        ]);
    }


    public function show($formId)
    {
        // $details = Form::find($formId);
        // $data = new FormDetailsResource($details);
        // return $data->additional([
        //     'status' => 'success',
        //     'message' => '',
        // ]);

        $forms = Form::select(
            'forms.id as id',
            'forms.form_name as form_name',
            'form_details.id as form_detail_id',
            'form_details.html_field_id as html_field_id',
            'form_details.html_field_value as html_field_value',

           
        )
        ->leftJoin(
            'form_details',
            'form_details.form_id',
            '=',
            'forms.id'
        )
        ->where('forms.id', $formId)->get();

        $data = FormDetailsResource::collection($forms);
        return $data->additional([
                'status' => 'success',
                'message' => '',
            ]);
    }


    public function update(Request $request)
    {
        
       // dd($request);

        if(isset($request->form_id))
        {
            DB::table('form_details')->where('form_id',$request->form_id)->delete();
            DB::table('options')->where('form_id',$request->form_id)->delete();
        }
        $forms = Form::find($request->form_id);
        $forms->form_name = $request->form_label;

        $result = $forms->save();



        for($i=0;$i<count($request->html_field);$i++)
        {
            if(isset($request->html_field[$i]))
            {
                $formDetails = new FormDetail;
                $formDetails->html_field_id  = $request->html_field[$i];
                $formDetails->html_field_value = $request->form_name[$i];
                $formDetails->form_id       = $request->form_id;
                $result = $formDetails->save();
                $insertedDetailId = $formDetails->id;
                $prev = '';
                if($request->html_field[$i] == "3")
                {
                   $curr = $insertedDetailId;
                    if(isset($request->static_field_count))
                    {
                        
                        $divCount = $request->static_field_count;
                        for($j=1;$j<=$divCount;$j++)
                        {
                            if(isset($request["select_option_value".$j]))
                            {
                                
                                $countOption = count($request["select_option_value".$j]);
                                if($prev!=$curr)
                                {
                                    for($k=0;$k<$countOption;$k++)
                                    {
                                        $optionDetails = new Option;
                                        $optionDetails->form_details_id  = $insertedDetailId;
                                        $optionDetails->form_id       = $request->form_id;
                                        $optionDetails->value = $request["select_option_value".$j][$k];
                                        $optionDetails->label = $request["select_option_label".$j][$k];
                                        $result = $optionDetails->save();
                                    }
                                    unset($request["select_option_value".$j]); 
                                    unset($request["select_option_label".$j]); 
                                }
                                $prev=$curr;
                                
                            }
                        }
                    }
                }
                
            }
        
        }
     }
     public function delete($formId)
     {
         DB::table('form_details')->where('form_id',$formId)->delete();
         DB::table('options')->where('form_id',$formId)->delete();
         $result = Form::find($formId)->delete();
         if ($result) {
             return response()->json([
                'status' => 'success',
                'message' => 'form deleted successfully',
                'data' => [],
            ], 200);
         } else {
             $data = [
                 'status' => '0',
                 'msg' => 'fail'
             ];
             return response()->json($data);
         }
     }

}
