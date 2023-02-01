<?php

namespace App\Http\Controllers;

//use App\Http\Requests\UserRequest;
use App\Models\Author;

//use App\Services\AuthorService;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request){
        return $request->all();
    }

    public function show(Request $request){
        return $request->all();
    }


    public function author()
    {
        $author_id = \auth()->user()->author_id;
        $author = Author::FindOrFail($author_id);
        return view('users.author', compact('author'));
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userRole = $user->role;
            if ($userRole == \App\Models\User::ROLE_AUTHOR) {
                /*Author*/
                return redirect()->route('author');
            } elseif ($userRole == \App\Models\User::ROLE_USER) {
                redirect('/');
                return view('home');
            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function registration(Request $request/* AuthorService $authorService*/)
    {
        dump($request->all());
        die();
        $data = $request->all();
        if ($request->role == 0) {
            /*Author*/
            $author = new Author();
            $author =$author->fill([
                'name' => $request->name,
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name
            ]);

            $author->save();
//            $author = Author::created($request->name, $request->first_name, $request->last_name);

            $data['author_id'] = $author->id;
            return $this->create($data);

        }
        if ($request->role == 1) {
            /*custom*/
            $data['author_id'] = null;
            $this->create($data);
        }
        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'author_id' => $data['author_id']
        ]);
    }

    public function logign(Request $request)
    {
        //User check
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            //Setting login response
            $success['token'] = $this->apiToken;
            $success['name'] = $user->name;
            return response()->json([
                'status' => 'success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]);
        }
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

//        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        return Auth::logout();

//        return Redirect('login');
    }

    public function edit(string $idB)/*?????*/
    {
        $book = Book::findOrFail($idB);

//        return view('users.edit', compact('book'));
    }

}



