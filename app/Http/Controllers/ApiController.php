<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ApiController extends Controller
{
    public function index()
    {
		$client = new GuzzleHttp\Client(['base_uri' => 'https://wger.de/api/v2/']);
		$response = $client->getWorkout('https://wger.de/api/v2/workout/');
		$response = $client->getWorkoutSession('https://wger.de/api/v2/workoutsession/');
		// $response = $client->head('https://wger.de/api/v2/get');
		// $response = $client->options('https://wger.de/api/v2/get');
		// $response = $client->patch('https://wger.de/api/v2/patch');
		// $response = $client->post('https://wger.de/api/v2/post');
		// $response = $client->put('https://wger.de/api/v2/put');
		
    	// $client = new Client();
    	// $response = $client->request('GET', 'https://wger.de/api/v2/');
    	// $statusCode = $response->getStatusCode();
    	// $body = $response->getBody()->getContents();

    	// return $body;
    }
}



// "schedulestep": "https://wger.de/api/v2/schedulestep/",
// "schedule": "https://wger.de/api/v2/schedule/",
// "day": "https://wger.de/api/v2/day/",
// "set": "https://wger.de/api/v2/set/",
// "setting": "https://wger.de/api/v2/setting/",
// "workoutlog": "https://wger.de/api/v2/workoutlog/",
// "userprofile": "https://wger.de/api/v2/userprofile/",
// "language": "https://wger.de/api/v2/language/",
// "daysofweek": "https://wger.de/api/v2/daysofweek/",
// "license": "https://wger.de/api/v2/license/",
// "setting-repetitionunit": "https://wger.de/api/v2/setting-repetitionunit/",
// "setting-weightunit": "https://wger.de/api/v2/setting-weightunit/",
// "exerciseinfo": "https://wger.de/api/v2/exerciseinfo/",
// "exercise": "https://wger.de/api/v2/exercise/",
// "equipment": "https://wger.de/api/v2/equipment/",
// "exercisecategory": "https://wger.de/api/v2/exercisecategory/",
// "exerciseimage": "https://wger.de/api/v2/exerciseimage/",
// "exercisecomment": "https://wger.de/api/v2/exercisecomment/",
// "muscle": "https://wger.de/api/v2/muscle/",
// "ingredient": "https://wger.de/api/v2/ingredient/",
// "weightunit": "https://wger.de/api/v2/weightunit/",
// "ingredientweightunit": "https://wger.de/api/v2/ingredientweightunit/",
// "nutritionplan": "https://wger.de/api/v2/nutritionplan/",
// "meal": "https://wger.de/api/v2/meal/",
// "mealitem": "https://wger.de/api/v2/mealitem/",
// "weightentry": "https://wger.de/api/v2/weightentry/"