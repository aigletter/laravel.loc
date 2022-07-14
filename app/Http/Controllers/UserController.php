<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->limit(100000)->with(['orders'])->get();
        foreach ($users as $user) {
            $counts[] = count($user->orders);
        }

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = '';
    }

    public function comments($id)
    {
        $user = User::query()->where('id', $id)->first();
        $comments = $user->comments;
    }

    public function action($id)
    {
        $user = User::query()->where('id', $id)->first();

        if ($user->canDo('create_order')) {
            return 'Can create order';
        }

        throw new \Exception('Not allowed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        /*$userStdClass = DB::table('users')
            ->where('id', $id)
            ->first();*/

        $user = User::query()->where('id', $id)->first();

        if (true) {

        }

        if (true):

        endif;

        return view('users.show', [
            //'var' => 'Test variable',
            'user' => $user
        ]);

        /*return [
            'data' => [
                'id' => (int) $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'meta' => [
                'cached' => false,
            ],
            'links' => [
                route('api.users.show', ['id' => $user->id]),
                route('api.users.update', ['id' => $user->id]),
            ]
        ];*/

        //$orders1 = Order::query()->where('userId', $id)->get();
        $orders = $user->orders;

        $name = $user->name;

        print_r($user);


        /*$test = collect([
            [
                'id' => 1,
                'name' => 'test1'
            ],
            [
                'id' => 2,
                'name' => 'test2'
            ],
        ]);*/
        /*$users = DB::table('users')->where('id', '>', 110)->get();
        $testWhere = DB::table('users')->where([
            ['id', '>', 110],
            ['id', '<', 125],
        ])->where(function (Builder $builder) {
            $builder->where('id', '!=', 114);
        })->whereBetween('id', [112, 117])->get();

        //$users = array_column($users, null, 'id');
        $withIdKeys = $users->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
        $only = $withIdKeys->only([115, 122]);
        foreach ($users as $item) {
            print_r($item);
        }
        $test = $users[10];
        print_r($user);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        return 'Edit form for user id ' . $id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
