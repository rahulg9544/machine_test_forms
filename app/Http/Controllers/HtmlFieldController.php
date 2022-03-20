<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HtmlFieldService;

class HtmlFieldController extends Controller
{
    public function __construct(HtmlFieldService $htmlFieldService)
    {
        $this->htmlFieldService = $htmlFieldService;
    }

    public function index()
    {
        return $this->htmlFieldService->index();
    }

   
    public function store(Request $request)
    {
        return $this->htmlFieldService->store($request);
    }

    public function list_form()
    {
        return $this->htmlFieldService->list_form();
    }

    public function show($formId)
    {
        return $this->htmlFieldService->show($formId);
    }
    public function update(Request $request)
    {
        return $this->htmlFieldService->update($request);
    }
    public function destroy($formId)
    {
        return $this->htmlFieldService->delete($formId);
    }

}
