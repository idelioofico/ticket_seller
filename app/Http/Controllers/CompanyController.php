<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::all();
        return view("company.table", compact('companies'));
    }

    public function create()
    {
        $company = new Company();
        return view("company.create", compact('company'));
    }

    public function store(CompanyRequest $request)
    {
        if (Company::create($request->all())) {
            return redirect()->back()->with("success", "Company registado com sucesso!");
        } else {
            return redirect()->back()->with("error", "Ocorreu um erro ao tentar registar Company!");
        }
    }

    public function show(Company $company)
    {
        return view("company.show", compact("company"));
    }


    public function update(CompanyRequest $request, Company $company)
    {
        if ($company->update($request->all())) {
            return redirect()->back()->with('success', "Dados actualizados!");
        } else {
            return redirect()->back()->with('success', "Ocorreu um erro ao tentar actualizar os dados.");
        }
    }
}
