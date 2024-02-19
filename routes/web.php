    <?php

    use Illuminate\Support\Facades\Route;
    use App\Models\Students;
    use App\Http\Controllers\StudentsController;
    use App\Http\Controllers\KelasController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\DashboardController;



    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('home', [
            "title" => "home",
        ]);
    });

    Route::get('/about', function () {   
        return view('about', [
            "title" => "about",
            'nama' => 'Davin Kafila Haidar',
            'kelas' => '11 PPLG 2',
            'foto' => 'img/davin.jpg', 
        ]);
    });

    Route::get('/dashboard/index', function () {
        return view('dashboard.layouts.main');
    })->middleware('auth'); 


    Route::get('/students/all', [StudentsController::class, 'index'])->name('students.all');

    Route::get('/student/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/dashboard/detail/{student}', [DashboardController::class, 'showdashboard']);
    

    Route::get('/student/create', [StudentsController::class, 'create'])->name('student.create');
    Route::post('/students/store', [StudentsController::class, 'store']);
    Route::delete('/students/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/student/edit/{student}', [StudentsController::class, 'edit']);
    Route::post('/student/update/{student}', [StudentsController::class, 'update']);

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('/kelas/delete/{kelas}', [KelasController::Class, 'destroy']);

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login']);

  
    

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register')->middleware('guest');
    Route::post('/register/store', [RegisterController::Class, 'store'])->name('Register.store');

    Route::get('/dashboard/student', [DashboardController::Class, 'index']);
    Route::get('/dashboard/kelas', [DashboardController::Class, 'kelas']);
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
    Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('dashboard.student')->middleware('auth');
    Route::get('/dashboard/about', [DashboardController::Class, 'about']);
    Route::get('/student/create', [StudentsController::class, 'create'])->name('student.create')->middleware('auth');
    

