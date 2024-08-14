<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PruebaApiController extends Controller
{
   
    public function index()
    {          
    
        $response = Http::get('https://randomuser.me/api/', [
            'results' => 5
        ]);
        
        
        $users = $response->json()['results'];
        $names = array_map(function ($user) {
            return $user['name']['first'] . ' ' . $user['name']['last'];
        }, $users);
        
        
        $letterCounts = [];
        
        foreach ($names as $name) {
            $name = strtolower(str_replace(' ', '', $name)); 
            
            foreach (str_split($name) as $char) {
               
                if (array_key_exists($char, $letterCounts)) {
                    $letterCounts[$char]++;
                } else {
                    $letterCounts[$char] = 1;
                }
            }
        }
        
        
        arsort($letterCounts);
        $mostUsedLetter = array_key_first($letterCounts);

       
        return response()->json([
            'names' => $names,
            'most_used_letter' => $mostUsedLetter,
            'letter_count' => $letterCounts[$mostUsedLetter]
        ]);
    }
    

   
}
