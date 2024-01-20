<?php

namespace App\Models;   //not to duplicate class

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public function __construct(public $title,public $slug,public $intro,public $body)
    {
        
    }
    public static function all(){

        $path = resource_path('blog/'); //static variable / all blog folder path

        //solution

        $files = File::files($path);     //class in Facades can make static method but these are not real.
                                        // output will all blog [file obj,file obj,file obj]
        
       // return $blogs[0]-> filename;
       // devloper made not to overwrite filename with getter and setter;
       //we can use getter to open it;
       //return $blogs[0] -> getfilename();
       //return $blogs[0] -> getContents();
       $blogs = [];
        foreach($files as $fileobj){
            $yamalobj = YamlFrontMatter::parse($fileobj-> getContents());
           $blogs[]= new blog($yamalobj->title, $yamalobj->slug,$yamalobj->intro, $yamalobj->body());  //inputing array and using obj and call yamalobj from contrator
        };
       //dd(YamlFrontMatter::parse($blogs[0] -> getContents()));
      // dd($yamalobj->title);
       //dd($blogs);
       return $blogs;

       //in Parse
       //without parse , we get contents normally to format it we use parse
       //then we want to loop output it so use foreach
    }

    //Now we will find blog with slug// earlier we find with filename
    //we have function of calling all blogs
    //then slug of blog we want will pull


    public static function find($slug){
        dd('hello');
        dd($slug);  //call all blogs

    }















    public static function example($filename){
        $path = resource_path('blog/' . $filename.'.html'); //the whole is path /single blog path
   
    if(file_Exists($path)){
        $blog = file_get_contents($path); //resource_path is laravel function
        $blog = cache() -> remember($filename, 10, function() use ($path) { //in blog we got cache data, cache is helper function
                                                             //user ကဒီdata cacheထဲမှာရှိလားမရှိရင် funtionပြန်runမယ်ရှိရင် ထုတ်ပေးမယ်
            var_dump('heavy ooperation code is running'); // with cahe this code will run one time in 10s 
            //performance issue

            return file_get_contents($path); //resource_path is laravel function this will bring the blog so make this output return

        });
          //Uniquename , time , function inthat code that can issue performance , use to know $path
                                //unique name in remember
                                //to store $blog in cache
                                //filename က userဝင်လာတဲ့အခါတစ်ခုနဲ့တစ်ခုမတူနိုင်ပေမဲ့ သူ့ကိုပဲဖြတ်ရပီးဘုံဖြစ်နေလို့ uniqueဖြစ်တယ်

            /*cache ထဲမှာ data သိမ်းပေးပါ
            user ဝင်လာတဲ့သက်ဆိုင်ရာblog filenameနဲ့သိမ်းပေးပါ
            10sကြာကြာသိမ်းပေးပါ
            ဘာကိုလဲဆို performance issueဖြစ်စေတဲ့fileကိုဆွဲထုတ်တဲ့ codeနဲ့ blogကိုသိမ်းပေးပါ*/
        return $blog;
        
        
    }else{
        abort(404);     // abort is laravel helper function
    }; 
    }

    /*
cache
 user တစ်သိနိးလုံးက တစ်ချိန်ထဲမှာ ဒီblogထဲဝင်ရင် လေးနိုင်တယ်
ဒီဟာကိုperformance issue codeလို့သတ်မှတ်မယ်
အဲ့တာကိုဘလိုပြန်ပြင်မလဲဆိုရင်
pcမာRam ပါတယ်
tempory သိမ်းပေးတာ
အဲ့codeတွေကိုလည်းramမာသိမ်းလို့ရတယ် အဲ့လိုသိမ်းမယ်ဆိုcacheကိုသုံးရတယ်
*/

};


