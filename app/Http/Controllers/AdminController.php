<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $datas = DB::select('select * from game WHERE soft_delete = 0');

        return view('admin.index')
            ->with('datas', $datas);
    }

    public function index2() {
        $datas = DB::select('select * from platform WHERE soft_delete = 0');

        return view('admin.index2')
            ->with('datas', $datas);
    }

    public function recyclebin() {
        $datas = DB::select('select * from game WHERE soft_delete = 1');

        return view('admin.recyclebin')
            ->with('datas', $datas);
    }

    public function recyclebin2() {
        $datas = DB::select('select * from platform WHERE soft_delete = 1');

        return view('admin.recyclebin2')
            ->with('datas', $datas);
    }

    public function search(Request $request) {
        // return $request;
        $keyword =  $request['term'];
        $datas = DB::select("select * from data_game WHERE name LIKE '%$keyword%' AND soft_delete = 0");

        return view('admin.search')
            ->with('datas', $datas);
    }

    // public function search2() {
    //     if(isset($_GET['search'])){
    //         $search = $_GET['search'];
    //         $listhandphone = mysqli_query($link, "SELECT game.name, game.release_year, platform.name AS platform_name, publisher.name AS publisher_name FROM game JOIN platform ON game.FK_platform = platform.platform_id JOIN publisher ON game.FK_publisher = publisher.publisher_id AND nama LIKE '%".$search."%'");
    //     } else {
    //         $listhandphone = mysqli_query($link, "SELECT game.name, game.release_year, platform.name AS platform_name, publisher.name AS publisher_name FROM game JOIN platform ON game.FK_platform = platform.platform_id JOIN publisher ON game.FK_publisher = publisher.publisher_id");
    //     }
    // }

    public function create() {
        return view('admin.add');
    }

    public function create2() {
        return view('admin.add2');
    }

    public function store(Request $request) {
        $request->validate([
            'game_id' => 'required',
            'name' => 'required',
            'release_year' => 'required',
            'FK_platform' => 'required',
            'FK_publisher' => 'required',
        ]);

        DB::insert('INSERT INTO game(game_id, name, release_year, FK_platform, FK_publisher) VALUES (:game_id, :name, :release_year, :FK_platform, :FK_publisher)',
        [
            'game_id' => $request->game_id,
            'name' => $request->name,
            'release_year' => $request->release_year,
            'FK_platform' => $request->FK_platform,
            'FK_publisher' => $request->FK_publisher,
        ]
        );

        return redirect()->route('admin.index')->with('success', 'Data Game berhasil disimpan');
    }

    public function store2(Request $request) {
        $request->validate([
            'platform_id' => 'required',
            'name' => 'required',
            'support' => 'required',
        ]);

        DB::insert('INSERT INTO platform(platform_id, name, support) VALUES (:platform_id, :name, :support)',
        [
            'platform_id' => $request->platform_id,
            'name' => $request->name,
            'support' => $request->support,
        ]
        );

        return redirect()->route('admin.index2')->with('success', 'Data Platform berhasil disimpan');
    }

    
    public function adduser() {
        return view('login.adduser');
    }

    public function storeuser(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|unique:user_data|alpha_dash',
            'password' => 'required|alpha_dash'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id) {
        $data = DB::table('game')->where('game_id', $id)->first();

        return view('admin.edit')->with('data', $data);
    }

    public function edit2($id) {
        $data = DB::table('platform')->where('platform_id', $id)->first();

        return view('admin.edit2')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'game_id' => 'required',
            'name' => 'required',
            'release_year' => 'required',
            'FK_platform' => 'required',
            'FK_publisher' => 'required',
        ]);

        DB::update('UPDATE game SET game_id = :game_id, name = :name, release_year = :release_year, FK_platform = :FK_platform, FK_publisher = :FK_publisher WHERE game_id = :id',
        [
            'id' => $id,
            'game_id' => $request->game_id,
            'name' => $request->name,
            'release_year' => $request->release_year,
            'FK_platform' => $request->FK_platform,
            'FK_publisher' => $request->password,
        ]
        );

        return redirect()->route('admin.index')->with('success', 'Data Game berhasil diubah');
    }

    public function update2($id, Request $request) {
        $request->validate([
            'platform_id' => 'required',
            'name' => 'required',
            'support' => 'required',
        ]);

        DB::update('UPDATE platform SET platform_id = :platform_id, name = :name, support = :support WHERE platform_id = :id',
        [
            'id' => $id,
            'platform_id' => $request->platform_id,
            'name' => $request->name,
            'support' => $request->support,
        ]
        );

        return redirect()->route('admin.index2')->with('success', 'Data Platform berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE game SET soft_delete = 1 WHERE game_id = :game_id', ['game_id' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index')->with('success', 'Data Game berhasil dihapus');
    }

    public function delete2($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE platform SET soft_delete = 1 WHERE platform_id = :platform_id', ['platform_id' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index2')->with('success', 'Data Platform berhasil dihapus');
    }

    public function restore($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE game SET soft_delete = 0 WHERE game_id = :game_id', ['game_id' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index')->with('success', 'Data Game berhasil restore');
    }

    public function restore2($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE platform SET soft_delete = 0 WHERE platform_id = :platform_id', ['platform_id' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index2')->with('success', 'Data Platform berhasil direstore');
    }

    public function deletepermanent($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM game WHERE game_id = :game_id', ['game_id' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.recyclebin')->with('success', 'Data Game berhasil dihapus');
    }
}
