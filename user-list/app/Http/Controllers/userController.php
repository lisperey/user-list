<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function index(Request $request)
{
    $api = Http::get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
    $users = $api->json()['users'];

    $page = $request->get('page', 1);
    $perPage = 10;

    $items = collect($users);

    $users = new LengthAwarePaginator(
        $items->forPage($page, $perPage),
        $items->count(),
        $perPage,
        $page,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('userList', compact('users'));
}

public function edit($id)
{
    $response = Http::get("https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0/}");
    $users = $response->json()['users'];
    $retorno = '';
    foreach($users as $user){
        if($user['id'] == $id){
            $retorno = $user;
            break;
        }
    }

    if ($response->successful()) {
        $user = $retorno;
        return view('modalEdit', compact('user'));
    } else {
        return redirect()->route('users.index')->with('error', 'Usuário não encontrado.');
    }
}

public function update(Request $request, $id)
{
    $response = Http::put("https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0/users/{$id}", $request->all());

    if ($response->successful()) {
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    } else {
        return back()->withInput()->with('error', 'Erro ao atualizar o usuário.');
    }
}

public function destroy($id)
{
    $response = Http::delete("https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0/users/{$id}"); 

    if ($response->successful()) {
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    } else {
        return redirect()->route('users.index')->with('error', 'Erro ao excluir o usuário.');
    }
}
}
