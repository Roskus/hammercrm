<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $company = new Company();
        $data['companies'] = $company->getAll();
        return view('company.index',$data);
    }

    public function add()
    {
        $company = new Company();
        $data['company'] = $company;
        return view('company.company',$data);
    }

    public function edit(Request $request,$id)
    {
        $company = Company::find($id);
        $data['company'] = $company;
        return view('company/company',$data);
    }

    public function save(Request $request)
    {
        if(empty($request->id)) {
            $company = new Company();
        } else {
            $company = Company::find($request->id);
        }
        $company->name = $request->name;
        $company->status = Company::ACTIVE;
        $company->save();
        return redirect('/company');
    }
}
