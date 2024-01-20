<?php

use Illuminate\Support\Facades\Route;
use App\Models\blog;

use function PHPUnit\Framework\fileExists;

Route::get('/', function () {
    $blogs = Blog::all();  // we make a static method.

    //dd($blogs); 
     //debuging a function
     //call a functin with static and output with dd
     //all code in blog.php will comeout
     //we will put it into real view method   

   return view('welcome',[      //all blog obj will reach to welcomeq
    'blogs' => $blogs
   ]);
});
// / is localhost:8000
// call vuew is calling views folder in resources folder
// 404 not found is there is no route definition
// for tne mixing of html and php ,so php variables are put to this views
// put it in function and we need to code that we want to send this variable to welcome.
//so  '' Samw variable name  => variable that we want to sent.

//3 helper function
//die dump
//like dev output function (var_dump) , 
//in laravel there is dd(die dump) , kill all process below it and then output what it want to be/

Route::get('/blogs' , function(){
    $name = 'sett paing oo';
    sleep(5);   //the page will run after 5s
    echo 'hello world';
   // var_dump($name);  In PHP,

   // die;
   //for dev tracing debug .eg/ to look what in variable

   dd($name);
    echo'hello world';
    echo 'hello world 3';
});



//wildcard
/*
Route::get('/blog/{filename}' , function($filename){

    $path = resource_path('blog/' . $filename.'.html'); //the whole is path
   
    if(file_Exists($path)){
        $blog = file_get_contents($path); //resource_path is laravel function
        return view('blog-detail', [
            'blog' => $blog
        ]);
        
    }else{
        abort(404);     // abort is laravel helper function
    }; 
    
});
*/


Route::get('/blog/{slug}' , function($slug){

        return view('blog-detail', [
            'blog' => Blog::find($slug)
        ]);
});

//blog ထဲကမှ သက်ဆိုင်ရာ filename နဲ့ရောက်လာရင်
//အဲ့blog ကိုရှာပေးပါ filenameနှင်တကွရှာပေးပါ
//ရှိခဲ့ရင်blog variableရလာမယ်
//blog detail ထဲမှာထုတ်ပြမယ်
//မရှိခဲ့ရင် 404ပြမယ်
//there is blog folder in resorces
// i want to run this html when i call with the route of blog/first-blog
// So we can output with dd or var_dump or echo
//put variable and assign variable , in there we must assign the way how to run this html folder
//for this way , we can use file_get_contents(); function .
//now in this we can call resource_path() and put path and we got it 
//So we continue this in real template so call view

// we got date in $blog , we want to send these to blog-detail
//ok we got blog in blade.php 
//but if we put next blog , we must create another route

//so dynamite this path 

route::get('/about', function(){
    return view('about');
});

route::get('/about-us' , function(){
    return redirect('/about');
});

//redirect 
//redirect is that if user getin about-us , the route will go to the about.


Route::get('/pause', function () {
    $blogs = Blog::all();  // we make a static method.

    //dd($blogs); 
     //debuging a function
     //call a functin with static and output with dd
     //all code in blog.php will comeout
     //we will put it into real view method   

   return view('pause',[      //all blog obj will reach to welcomeq
    'blogs' => $blogs
   ]);
});

//parse
//problem is HTML contents are repeat 
// TO solve this , store only data without html
//with code pullout data , eg. only we call title ,this pullout all title contents
//between pullingout and showing in site , we need pause . pause is pullout data from blog folder and use in .blade.php
// So in this , pulling out is File::files($path) and showing is retun=rn $blogs . so code will be between them
//parse is from third party package . so download from git and use.

