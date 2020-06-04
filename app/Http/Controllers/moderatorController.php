<?php

namespace App\Http\Controllers;

use App\Moderator;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class moderatorController extends Controller
{

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->token = session('moderators');
            if ($this->token === null) {
                return redirect(route('backend-home'));
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moderators = Moderator::all();
        return view('backend.moderators.index', compact('moderators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.moderators.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:moderators',
            'password' => 'required|string|min:6',
        ]);
        $hashedPass =  bcrypt($request->password);
        $moderator = new Moderator;
        $moderator->name = $request->name;
        $moderator->email = $request->email;
        $moderator->password = $hashedPass;
        if ($request->status == 1) { $moderator->status = 1; } else { $moderator->status = 0; }
        if ($request->admin == 1) { $moderator->admin = 1; } else { $moderator->admin = 0; }
        $moderator->save();
        $permissions = $request->permissions;
        foreach ($permissions as $permission){
            $new_permission = new Permission;
            $new_permission->moderator_id = $moderator->id;
            $new_permission->permissions = $permission;
            $new_permission->save();
        }
        session()->flash('done','تم اضافة المشرف بنجاح');
        return redirect(route('moderators.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (empty($request->select)) {
            session()->flash('error','من فضلك قم بتحديد المراد تطبيق العملية عليه');
            return redirect()->back();
        }
        if ($request->option == 0) {
            foreach($request->select as $selection) {
                $page = Moderator::where('id', $selection)->first();
                $page->status = 1;
                $page->save();
            }
        } elseif ($request->option == 1) {
            foreach($request->select as $selection) {
                $page = Moderator::where('id', $selection)->first();
                $page->status = 0;
                $page->save();
            }
        } elseif ($request->option == 2) {
            foreach($request->select as $selection) {
                Moderator::where('id', $selection)->delete();
            }
        }
        session()->flash('done','تمت العملية بنجاح');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moderator = Moderator::find($id);
        $roles = Role::all();
        return view('backend.moderators.edit', compact('moderator', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $moderator = Moderator::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|' . Rule::unique('moderators')->ignore($moderator->id),
        ]);
        $moderator->name = $request->name;
        $moderator->email = $request->email;
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'min:6',
            ]);
            $moderator->password = bcrypt($request->password);
        }
        if ($request->status == 1) { $moderator->status = 1; } else { $moderator->status = 0; }
        if ($request->admin == 1) { $moderator->admin = 1; } else { $moderator->admin = 0; }
        $moderator->save();
        if (!empty($request->permissions)) {
            $permissions = $request->permissions;
            Permission::where('moderator_id', $id)->delete();
            foreach ($permissions as $permission){
                $new_permission = new Permission;
                $new_permission->moderator_id = $moderator->id;
                $new_permission->permissions = $permission;
                $new_permission->save();
            }
        } else {
            Permission::where('moderator_id', $id)->delete();
        }
        session()->flash('done','تم تعديل بيانات المشرف بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modertaor = Moderator::find($id);
        $modertaor->delete();
        session()->flash('done','تم حذف المشرف بنجاح');
        return redirect()->back();
    }
}
