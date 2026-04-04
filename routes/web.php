<?php

use Illuminate\Support\Facades\Route;

// Activity 1: Navigation routes
Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');

// Activity 2: Form routes
Route::get('/formtest', function () {
    $emails = session()->get('emails', []);
    return view('formtest', ['emails' => $emails]);
});

Route::post('/formtest', function () {
    // Task 2: Validation
    $data = request()->validate([
        'email' => ['required', 'email'],
    ]);

    $email = $data['email'];
    $emails = session()->get('emails', []);

    // Task 6: Limit to 5 emails
    if (count($emails) >= 5) {
        return redirect('/formtest')->with('warning', 'Maximum of 5 emails reached. Delete one to add more.');
    }

    // Task 3: Prevent duplicates
    if (in_array($email, $emails)) {
        return redirect('/formtest')->with('error', 'That email has already been added.');
    }

    $emails[] = $email;
    session()->put('emails', $emails);

    // Task 5: Success flash message
    return redirect('/formtest')->with('success', 'Email added successfully!');
});

// Task 4: Delete single email by index
Route::post('/delete-email', function () {
    $index = request('index');
    $emails = session()->get('emails', []);

    if (isset($emails[$index])) {
        array_splice($emails, $index, 1);
        session()->put('emails', $emails);
    }

    return redirect('/formtest')->with('success', 'Email removed.');
});

// Clear all emails
Route::get('/delete-emails', function () {
    session()->forget('emails');
    return redirect('/formtest');
});
