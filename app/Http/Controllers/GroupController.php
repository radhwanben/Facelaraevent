<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\group as Group;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
{

  public function __construct( Group $group )
  {
      $this->group = $group;
  }

    public function index()
    {
        $data = [];

        $data['groups'] = $this->group->all();
        return view('groups/index', $data);
    }


    public function newGroup( Request $request, Group $group )
    {
        $data = [];


        $data['group'] = $request->input('group');
        $data['contact_name'] = $request->input('contact_name');
        $data['address'] = $request->input('address');
        $data['post_code'] = $request->input('post_code');
        $data['city'] = $request->input('city');

        $data['email'] = $request->input('email');





        if( $request->isMethod('post') )
        {
            //dd($data);
            $this->validate(
                $request,
                [
                    'group' => 'required',
                    'contact_name' => 'required',
                    'address' => 'required',
                    'post_code' => 'required',
                    'city' => 'required',

                    'email' => 'required',

                ]
            );

            $group->insert($data);

        
            return redirect('groups');
        }

        $data['modify'] = 0;
        return view('group/form', $data);
    }

    public function create()
    {
            return view('groups/create');
    }

    public function show($group_id, Request $request)
    {
        $data = []; 
        $data['group_id'] = $group_id;
        $data['modify'] = 1;
        $group_data = $this->group->find($group_id);
        $data['group'] = $group_data['group'];
        $data['contact_name'] = $group_data['contact_name'];

        $data['address'] = $group_data['address'];
        $data['post_code'] = $group_data['post_code'];
        $data['city'] = $group_data['city'];

        $data['email'] = $group_data['email'];

        $request->session()->put('last_updated', $group_data['group'] . ' ' .
        $group_data['contact_name']);

        return view('groups/form', $data);
    }
    public function modify( Request $request, $group_id, Group $group )
    {
        $data = [];

        $data['group'] = $request->input('group');
        $data['contact_name'] = $request->input('contact_name');
        $data['address'] = $request->input('address');
        $data['post_code'] = $request->input('post_code');

        $data['city'] = $request->input('city');
        $data['email'] = $request->input('email');



        if( $request->isMethod('post') )
        {
            //dd($data);
            $this->validate(
                $request,
                [
                    'group' => 'required',
                    'contact_name' => 'required',
                    'address' => 'required',
                    'post_code' => 'required',
                    'city' => 'required',
                    'email' => 'required',

                ]
            );

            $group_data = $this->group->find($group_id);

            $group_data->group = $request->input('group');
            $group_data->contact_name = $request->input('contact_name');
            $group_data->address = $request->input('address');
            $group_data->post_code = $request->input('post_code');
            $group_data->city = $request->input('city');

            $group_data->email = $request->input('email');

            $group_data->save();

            return redirect('groups');
        }

        return view('group/form', $data);
    }
    public function export()
    {
        $data = [];

        $data['groups'] = $this->group->all();
        header('Content-Disposition: attachment;filename=export.xls');
        return view('group/export', $data);
    }
    public function destroy(Group $group)
    {
        DB::table('groups')->where ('id',$group->id)->delete();

        return redirect()->action('GroupController@index');
    }

}
